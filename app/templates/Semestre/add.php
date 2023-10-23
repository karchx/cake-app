<h1>Nuevo Semestre</h1>
<?php
    echo $this->Form->create($semestre);
    echo $this->Form->control('descripcion');

    echo $this->Form->button(__('Crear Semestre'));
    echo $this->Form->end();
?>
