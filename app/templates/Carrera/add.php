<h1>Nueva Carrera</h1>
<?php
    echo $this->Form->create($carrera);
    // Hard code the user for now.
    echo $this->Form->control('descripcion');
    echo $this->Form->button(__('Crear carrera'));
    echo $this->Form->end();
?>
