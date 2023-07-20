<!-- Muestra un encabezado centrado con el título obtenido de la variable $title -->
<h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>

<!-- Inicia una tarjeta (card) -->
<div class="card">

    <!-- Crea un encabezado para la tarjeta -->
    <div class="card-header">

        <!-- Crea un enlace (botón) que dirige al usuario a la página que muestra todos los proyectos -->
        <a class="btn btn-outline-info float-right" href="<?php echo base_url('supervisor');?>"> 
            View All Supervisors
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
        
        <!-- Formulario para editar un proyecto existente. Se envía al controlador 'supervisor/update' utilizando el método POST -->
        <form action="<?php echo base_url('supervisor/update/' . $supervisor->id);?>" method="POST">
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
                    value="<?php echo $supervisor->name;?>">
            </div>

            <div class="form-group">
                <label for="name">Email</label>
                <!-- Input para el nombre del proyecto, muestra el nombre actual del proyecto -->
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    value="<?php echo $supervisor->email;?>">
            </div>

            <div class="form-group">
                <label for="name">Phone</label>
                <!-- Input para el nombre del proyecto, muestra el nombre actual del proyecto -->
                <input
                    type="text"
                    class="form-control"
                    id="phone"
                    name="phone"
                    value="<?php echo $supervisor->phone;?>">
            </div>

            <div class="form-group">
                <label for="name">Department</label>
                <!-- Input para el nombre del proyecto, muestra el nombre actual del proyecto -->
                <input
                    type="text"
                    class="form-control"
                    id="department"
                    name="department"
                    value="<?php echo $supervisor->department;?>">
            </div>

          
            <!-- Botón para enviar el formulario y guardar los cambios del proyecto -->
            <button type="submit" class="btn btn-outline-primary">Save Supervisor</button>
        </form>
       
    </div>
</div>
