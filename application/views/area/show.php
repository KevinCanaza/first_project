<!-- Muestra un encabezado centrado con el título obtenido de la variable $title -->
<h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>

<!-- Inicia una tarjeta (card) -->
<div class="card">

    <!-- Crea un encabezado para la tarjeta -->
    <div class="card-header">

        <!-- Crea un enlace (botón) que dirige al usuario a la página que muestra todos los proyectos -->
        <a class="btn btn-outline-info float-right" href="<?php echo base_url('area'); ?>">
            View All Areas
        </a>
    </div>

    <!-- Cuerpo de la tarjeta (card body) -->
    <div class="card-body">

        <!-- Muestra el nombre del proyecto en negrita -->
        <b class="text-muted">Name:</b>
        <!-- Muestra el valor del nombre del proyecto -->
        <p><?php echo $area->name; ?></p>

        <!-- Muestra el nombre del proyecto en negrita -->
        <b class="text-muted">Location:</b>
        <!-- Muestra el valor del nombre del proyecto -->
        <p><?php echo $area->location; ?></p>

        <!-- Muestra el nombre del proyecto en negrita -->
        <b class="text-muted">Department:</b>
        <!-- Muestra el valor del nombre del proyecto -->
        <p><?php echo $area->department; ?></p>


    </div>
</div>