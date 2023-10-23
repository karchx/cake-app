<h1>Nueva Carrera</h1>
<?php
    echo $this->Form->create($curso);
    echo $this->Form->control('descripcion');

    echo $this->Form->button(__('Crear Seccion'));
    echo $this->Form->end();
?>
