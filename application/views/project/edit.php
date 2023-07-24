<!-- Muestra un encabezado centrado con el título obtenido de la variable $title -->
<h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>

<!-- Inicia una tarjeta (card) -->
<div class="card">

    <!-- Crea un encabezado para la tarjeta -->
    <div class="card-header">

        <!-- Crea un enlace (botón) que dirige al usuario a la página que muestra todos los proyectos -->
        <a class="btn btn-outline-info float-right" href="<?php echo base_url('project'); ?>">
            View All Projects
        </a>
    </div>

    <!-- Cuerpo de la tarjeta (card body) -->
    <div class="card-body">

        <!-- Verifica si existen mensajes de error almacenados en la sesión flash 'errors' -->
        <?php if ($this->session->flashdata('errors')) { ?>
            <!-- Si hay mensajes de error, muestra una alerta de peligro con los mensajes de error -->
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('errors'); ?>
            </div>
        <?php } ?>

        <!-- Formulario para editar un proyecto existente. Se envía al controlador 'project/update' utilizando el método POST -->
        <form id="project-form" method="POST">
            <!-- Campo oculto para indicar al controlador que se utilizará el método PUT para actualizar el proyecto -->
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="name">Name</label>
                <!-- Input para el nombre del proyecto, muestra el nombre actual del proyecto -->
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $project->name; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <!-- Textarea para la descripción del proyecto, muestra la descripción actual del proyecto -->
                <textarea class="form-control" id="description" rows="3" name="description"><?php echo $project->description; ?></textarea>
            </div>

            <div class="form-group">
                <label for="area">Area</label>
                <select class="form-control" id="area" name="area">
                    <option value="" disabled selected>Select an Area</option>
                    <?php foreach ($areas as $area) : ?>
                        <option value="<?php echo $area->id; ?>" <?php echo ($project->area_id == $area->id) ? 'selected' : ''; ?>>
                            <?php echo $area->name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="supervisor">Supervisor</label>
                <select class="form-control" id="supervisor" name="supervisor">
                    <option value="" disabled selected>Select a Supervisor</option>
                    <?php foreach ($supervisors as $supervisor) : ?>
                        <option value="<?php echo $supervisor->id; ?>" <?php echo ($project->supervisor_id == $supervisor->id) ? 'selected' : ''; ?>>
                            <?php echo $supervisor->name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>



            <div class="form-group">
                <label for="image">Image</label>
                <br>
                <img src="<?php echo base_url('uploads/' . $project->image); ?>" alt="" width="100" class="img-thumbnail" id="image-preview">
                <input type="file" class="form-control" id="image" name="image" onchange="previewImage(event)">
            </div>

            <!-- Botón para enviar el formulario y guardar los cambios del proyecto -->
            <button type="submit" class="btn btn-outline-primary">Save Project</button>
        </form>

    </div>
</div>


<script>
    $(document).ready(function() {
        // Capturar el evento submit del formulario
        $("#project-form").submit(function(event) {
            event.preventDefault(); // Evitar que el formulario se envíe normalmente

            var formData = new FormData(this); // Crea un objeto FormData con los datos del formulario

            Swal.fire({
                title: 'Do you want to save the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    // Realizar la solicitud AJAX
                    $.ajax({
                        
                        type: "POST", // Especifica el método HTTP de la solicitud (POST en este caso)
                        url: "<?php echo base_url('project/update/' . $project->id); ?>", // URL de destino para la solicitud AJAX
                        data: formData, // Los datos serializados que se enviarán al servidor
                        processData: false, // Indica a jQuery que no procese los datos (ya que es FormData)
                        contentType: false, // Indica a jQuery que no configure el tipo de contenido (ya que es FormData)
                        dataType: 'json', // Especifica que esperas una respuesta JSON del servidor

                        // La función 'success' se ejecutará cuando la solicitud AJAX sea exitosa
                        success: function(response) {
                            // Aquí puedes manejar la respuesta del servidor si es necesario

                            // Comprueba si la respuesta del servidor tiene un estado de 'success'
                            if (response.status === 'success') {
                                // Si la respuesta es exitosa, muestra un mensaje de éxito en la consola
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Éxito',
                                    text: response.message
                                });

                                // Redirecciona a la URL después de que el usuario haya cerrado el cuadro de diálogo de éxito
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Éxito',
                                    text: response.message,
                                }).then(function() {
                                    window.location = "<?php echo base_url('project/'); ?>";
                                });
                            } else if (response.status === 'error') {
                                // Si la respuesta es un error, muestra el mensaje de validación en la consola
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

                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        });
    });

    // Función para mostrar la vista previa de la imagen seleccionada
    function previewImage(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>