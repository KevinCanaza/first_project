<!-- Muestra un encabezado centrado con el título obtenido de la variable $title -->
<h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>

<!-- Inicia una tarjeta (card) -->
<div class="card">

    <!-- Crea un encabezado para la tarjeta -->
    <div class="card-header">

        <!-- Crea un enlace (botón) que dirige al usuario a la página de creación de un nuevo proyecto -->
        <a class="btn btn-outline-primary" href="<?php echo base_url('supervisor/create/');?>"> 
            Create New Supervisor
        </a>
    </div>

    <!-- Cuerpo de la tarjeta (card body) -->
    <div class="card-body">

        <!-- Verifica si existe un mensaje de éxito almacenado en la sesión flash 'success' -->
        <?php if ($this->session->flashdata('success')) {?>
            <!-- Si hay un mensaje de éxito, muestra una alerta de éxito con el contenido del mensaje -->
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
 
        <!-- Tabla que muestra la lista de proyectos -->
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
                <th width="240px">Action</th>
            </tr>

            <!-- Bucle que itera a través de la lista de proyectos y muestra cada proyecto en una fila de la tabla -->
            <?php foreach ($supervisors as $supervisor) { ?>      
            <tr>
                <td><?php echo $supervisor->name; ?></td>
                <td><?php echo $supervisor->email; ?></td>        
                <td><?php echo $supervisor->phone; ?></td>
                <td><?php echo $supervisor->department; ?></td>      
                <td>
                    <!-- Enlace para mostrar los detalles de un proyecto -->
                    <a class="btn btn-outline-info" href="<?php echo base_url('supervisor/show/'. $supervisor->id) ?>"> 
                        Show
                    </a>
                    <!-- Enlace para editar un proyecto -->
                    <a class="btn btn-outline-success" href="<?php echo base_url('supervisor/edit/'.$supervisor->id) ?>"> 
                        Edit
                    </a>
                    <!-- Enlace para eliminar un proyecto -->
                    <a class="btn btn-outline-danger" href="<?php echo base_url('supervisor/delete/'.$supervisor->id) ?>"> 
                        Delete
                    </a>
                </td>     
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
