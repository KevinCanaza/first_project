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

        <!-- Formulario para crear un nuevo proyecto. Se envía al controlador 'project/store' mediante el método POST -->
        <form id="project-form" action="<?php echo base_url('project/store'); ?>" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="area">Area</label>
                <select class="form-control" id="area" name="area">
                    <option value="">Select an Area</option>
                    <?php foreach ($areas as $area) : ?>
                        <option value="<?php echo $area->id; ?>"><?php echo $area->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="supervisor">Supervisor</label>
                <select class="form-control" id="supervisor" name="supervisor">
                    <option value="">Select a Supervisor</option>
                    <?php foreach ($supervisors as $supervisor) : ?>
                        <option value="<?php echo $supervisor->id; ?>"><?php echo $supervisor->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="name">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <!-- Botón para enviar el formulario y guardar el nuevo proyecto -->
            <button type="submit" class="btn btn-outline-primary">Save Project</button>
        </form>

    </div>
</div>


<script>
    // Espera a que el documento esté completamente cargado antes de ejecutar el código
    $(document).ready(function() {
        // Cuando el formulario se envía (se hace clic en el botón "Save Project")
        $("#project-form").submit(function(event) {
            event.preventDefault(); // Evita que el formulario se envíe de forma convencional (sin AJAX)

            var formData = new FormData(this); // Crea un objeto FormData con los datos del formulario

            // Envía la solicitud AJAX al controlador 'project/store'
            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: formData, // Usa el objeto FormData en lugar de datos serializados
                processData: false, // Indica a jQuery que no procese los datos (ya que es FormData)
                contentType: false, // Indica a jQuery que no configure el tipo de contenido (ya que es FormData)
                dataType: 'json',

                success: function(response) {
                    // Manejo de la respuesta del servidor aquí
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: response.message
                        }).then(function() {
                            window.location = "<?php echo base_url('project/'); ?>";
                        });
                    } else if (response.status === 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            html: response.message
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>