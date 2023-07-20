<!-- Muestra un encabezado centrado con el título obtenido de la variable $title -->
<h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>

<!-- Inicia una tarjeta (card) -->
<div class="card">

    <!-- Crea un encabezado para la tarjeta -->
    <div class="card-header">

        <!-- Crea un enlace (botón) que dirige al usuario a la página que muestra todos los proyectos -->
        <a class="btn btn-outline-info float-right" href="<?php echo base_url('area');?>"> 
            View All Areas
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
        
        <!-- Formulario para crear un nuevo proyecto. Se envía al controlador 'area/store' mediante el método POST -->
        <form action="<?php echo base_url('area/store');?>" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="description">Location</label>
                <input type="text" class="form-control" id="location" rows="3" name="location"></input>
            </div>
            <div class="form-group">
                <label for="description">Department</label>
                <input type="text" class="form-control" id="department" rows="3" name="department"></input>
            </div>
          
            <!-- Botón para enviar el formulario y guardar el nuevo proyecto -->
            <button type="submit" class="btn btn-outline-primary">Save Project</button>
        </form>
       
    </div>
</div>
