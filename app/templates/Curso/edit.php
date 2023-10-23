<h1>Editar Curso</h1>
<?php
    echo $this->Form->create($curso);
    echo $this->Form->control('descripcion');
    echo $this->Form->button(__('Guardar'));
    echo $this->Form->end();
?>
