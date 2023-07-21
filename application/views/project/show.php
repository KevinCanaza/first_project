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

        <!-- Muestra el nombre del proyecto en negrita -->
        <b class="text-muted">Name:</b>
        <!-- Muestra el valor del nombre del proyecto -->
        <p><?php echo $project->name;?></p>

        <!-- Muestra la descripción del proyecto en negrita -->
        <b class="text-muted">Description:</b>
        <!-- Muestra el valor de la descripción del proyecto -->
        <p><?php echo $project->description;?></p>

                <!-- Muestra el nombre del proyecto en negrita -->
                <b class="text-muted">Area:</b>
        <!-- Muestra el valor del nombre del proyecto -->
        <p><?php echo $project->area_name;?></p>

        <!-- Muestra la descripción del proyecto en negrita -->
        <b class="text-muted">Supervisor:</b>
        <!-- Muestra el valor de la descripción del proyecto -->
        <p><?php echo $project->supervisor_name;?></p>
       
    </div>
</div>
