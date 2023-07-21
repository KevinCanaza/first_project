<!-- Muestra un encabezado centrado con el título obtenido de la variable $title -->
<h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>

<!-- Inicia una tarjeta (card) -->
<div class="card">

    <!-- Crea un encabezado para la tarjeta -->
    <div class="card-header">

        <!-- Crea un enlace (botón) que dirige al usuario a la página que muestra todos los proyectos -->
        <a class="btn btn-outline-info float-right" href="<?php echo base_url('project');?>"> 
            View All Projects
        </a>
    </div>

    <!-- Cuerpo de la tarjeta (card body) -->
    <div class="card-body">

        <!-- Verifica si existen mensajes de error almacenados en la sesión flash 'errors' -->
        <?php if ($this->session->flashdata('errors')) {?>
            <!-- Si hay mensajes de error, muestra una alerta de peligro con los mensajes de error -->
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('errors'); ?>
            </div>
        <?php } ?>
        
        <!-- Formulario para crear un nuevo proyecto. Se envía al controlador 'project/store' mediante el método POST -->
        <form id="project-form" action="<?php echo base_url('project/store');?>" method="POST">
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
        
        // Serializa los datos del formulario en un formato que se puede enviar mediante AJAX
        var formData = $(this).serialize();

        // Envía la solicitud AJAX al controlador 'project/store'
        $.ajax({
            type: "POST", // Especifica el método HTTP de la solicitud (POST en este caso)
            url: $(this).attr("action"), // Obtiene la URL del formulario donde enviar la solicitud AJAX
            data: formData, // Los datos serializados que se enviarán al servidor
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
                } else if (response.status === 'error') {
                    // Si la respuesta es un error, muestra el mensaje de validación en la consola
                    Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            html: response.message
                        });
                }
            },
            // La función 'error' se ejecutará si ocurre un error al enviar la solicitud AJAX
            error: function(xhr, status, error) {
                // Si ocurre un error al enviar el formulario, puedes manejarlo aquí
                console.log(xhr.responseText); // Imprime el mensaje de error en la consola
            }
        });
    });
});

</script>
