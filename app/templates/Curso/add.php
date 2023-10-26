<h1>Nuevo Curso</h1>
<?php
    echo $this->Form->create($curso);
    echo $this->Form->control('descripcion');

    echo $this->Form->button(__('Crear Curso'));
    echo $this->Form->end();
?>
