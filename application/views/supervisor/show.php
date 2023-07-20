<!-- Muestra un encabezado centrado con el título obtenido de la variable $title -->
<h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>

<!-- Inicia una tarjeta (card) -->
<div class="card">

    <!-- Crea un encabezado para la tarjeta -->
    <div class="card-header">

        <!-- Crea un enlace (botón) que dirige al usuario a la página que muestra todos los proyectos -->
        <a class="btn btn-outline-info float-right" href="<?php echo base_url('supervisor'); ?>">
            View All Supervisors
        </a>
    </div>

    <!-- Cuerpo de la tarjeta (card body) -->
    <div class="card-body">

        <!-- Muestra el nombre del proyecto en negrita -->
        <b class="text-muted">Name:</b>
        <!-- Muestra el valor del nombre del proyecto -->
        <p><?php echo $supervisor->name; ?></p>

        <!-- Muestra la descripción del proyecto en negrita -->
        <b class="text-muted">Email:</b>
        <!-- Muestra el valor de la descripción del proyecto -->
        <p><?php echo $supervisor->email; ?></p>

        <!-- Muestra el nombre del proyecto en negrita -->
        <b class="text-muted">Phone:</b>
        <!-- Muestra el valor del nombre del proyecto -->
        <p><?php echo $supervisor->phone; ?></p>

        <!-- Muestra la descripción del proyecto en negrita -->
        <b class="text-muted">Department:</b>
        <!-- Muestra el valor de la descripción del proyecto -->
        <p><?php echo $supervisor->department; ?></p>

    </div>
</div>