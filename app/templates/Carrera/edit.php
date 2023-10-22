<h1>Editar Carrera</h1>
<?php
    echo $this->Form->create($carrera);
    echo $this->Form->control('descripcion');
    echo $this->Form->button(__('Guardar'));
    echo $this->Form->end();
?>
