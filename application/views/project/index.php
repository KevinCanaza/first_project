<!-- Muestra un encabezado centrado con el título obtenido de la variable $title -->
<h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>

<!-- Inicia una tarjeta (card) -->
<div class="card">

    <!-- Crea un encabezado para la tarjeta -->
    <div class="card-header">

        <!-- Crea un enlace (botón) que dirige al usuario a la página de creación de un nuevo proyecto -->
        <a class="btn btn-outline-primary" href="<?php echo base_url('project/create/'); ?>">
            Create New Project
        </a>
    </div>

    <!-- Cuerpo de la tarjeta (card body) -->
    <div class="card-body">

        <!-- Verifica si existe un mensaje de éxito almacenado en la sesión flash 'success' -->
        <?php if ($this->session->flashdata('success')) { ?>
            <!-- Si hay un mensaje de éxito, muestra una alerta de éxito con el contenido del mensaje -->
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>

        <!-- Tabla que muestra la lista de proyectos -->
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Description</th>

                <th>Area</th>
                <th>Supervisor</th>

                <th>Image</th>

                <th width="240px">Action</th>
            </tr>

            <!-- Bucle que itera a través de la lista de proyectos y muestra cada proyecto en una fila de la tabla -->
            <?php foreach ($projects as $project) { ?>
                <tr>
                    <td><?php echo $project->name; ?></td>
                    <td><?php echo $project->description; ?></td>

                    <td><?php echo $project->area_name ?></td>
                    <td><?php echo $project->supervisor_name ?></td>
                    <td>
                        <?php if ($project->image) { ?>
                            <!-- Muestra la imagen si está presente -->
                            <img src="<?php echo base_url('uploads/' . $project->image); ?>" alt="Project Image" width="100">
                        <?php } else { ?>
                            <!-- Muestra un mensaje si no hay imagen -->
                            No Image
                        <?php } ?>
                    </td>
                    <td>
                        <!-- Enlace para mostrar los detalles de un proyecto -->
                        <a class="btn btn-outline-info" href="<?php echo base_url('project/show/' . $project->id) ?>">
                            Show
                        </a>
                        <!-- Enlace para editar un proyecto -->
                        <a class="btn btn-outline-success" href="<?php echo base_url('project/edit/' . $project->id) ?>">
                            Edit
                        </a>
                        <!-- Enlace para eliminar un proyecto -->
                        <a id="delete" class="btn btn-outline-danger delete-link" href="#" data-project-id="<?php echo $project->id; ?>">
                            Delete
                        </a>
                    </td>

                </tr>
            <?php } ?>
        </table>
    </div>
</div>



<script>
    $(document).ready(function() {
        // Capturar el evento clic del enlace de eliminar
        $(".delete-link").click(function(event) {
            event.preventDefault(); // Evitar que el enlace se comporte como un enlace normal

            // Obtener el ID del proyecto desde el atributo 'data-project-id' del enlace
            var projectId = $(this).data('project-id');

            // Construir la URL de destino para eliminar el proyecto
            var deleteUrl = "<?php echo base_url('project/delete/'); ?>" + projectId;
            console.log('adwa');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    // Realizar la solicitud AJAX para eliminar el proyecto
                    $.ajax({
                        type: "POST", // Especifica el método HTTP de la solicitud (POST en este caso)
                        url: deleteUrl, // URL de destino para la solicitud AJAX
                        dataType: 'json', // Especifica que esperas una respuesta JSON del servidor


                        // La función 'success' se ejecutará cuando la solicitud AJAX sea exitosa
                        success: function(response) {
                            // Aquí puedes manejar la respuesta del servidor si es necesario

                            // Comprueba si la respuesta del servidor tiene un estado de 'success'
                            if (response.status === 'success') {
                                // Si la respuesta es exitosa, muestra un mensaje de éxito en la consola
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                ).then(function() {
                                    window.location = "<?php echo base_url('project/'); ?>";
                                });

                            } else if (response.status === 'error') {
                                // Si la respuesta es un error, muestra el mensaje de error en la consola
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    html: response.message
                                });
                            }
                        },

                        // La función 'error' se ejecutará si la solicitud AJAX falla
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText); // Muestra el mensaje de error en la consola
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: error
                            });
                        }
                    });
                }
            })
        });
    });
</script>