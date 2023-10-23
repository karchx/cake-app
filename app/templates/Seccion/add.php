<h1>Nueva Seccion</h1>
<?php
    echo $this->Form->create($seccion);
    echo $this->Form->control('descripcion');

    echo $this->Form->button(__('Crear Seccion'));
    echo $this->Form->end();
?>
