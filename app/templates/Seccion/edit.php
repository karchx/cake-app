<h1>Editar Seccion</h1>
<?php
    echo $this->Form->create($seccion);
    echo $this->Form->control('descripcion');
    echo $this->Form->button(__('Guardar'));
    echo $this->Form->end();
?>
