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
        
        <!-- Formulario para editar un proyecto existente. Se envía al controlador 'project/update' utilizando el método POST -->
        <form action="<?php echo base_url('project/update/' . $project->id);?>" method="POST">
            <!-- Campo oculto para indicar al controlador que se utilizará el método PUT para actualizar el proyecto -->
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="name">Name</label>
                <!-- Input para el nombre del proyecto, muestra el nombre actual del proyecto -->
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    value="<?php echo $project->name;?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <!-- Textarea para la descripción del proyecto, muestra la descripción actual del proyecto -->
                <textarea
                    class="form-control"
                    id="description"
                    rows="3"
                    name="description"><?php echo $project->description;?></textarea>
            </div>
          
            <!-- Botón para enviar el formulario y guardar los cambios del proyecto -->
            <button type="submit" class="btn btn-outline-primary">Save Project</button>
        </form>
       
    </div>
</div>