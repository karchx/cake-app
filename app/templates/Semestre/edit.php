<h1>Editar Semestre</h1>
<?php
    echo $this->Form->create($semestre);
    echo $this->Form->control('descripcion');
    echo $this->Form->button(__('Guardar'));
    echo $this->Form->end();
?>
