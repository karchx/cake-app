<h1>Editar Alumno</h1>
<?php
    echo $this->Form->create($alumno);
    echo $this->Form->control('nombres');
    echo $this->Form->control('apellidos');
    echo $this->Form->date('fecha_nacimiento');
    echo $this->Form->control('fotografia');
    echo $this->Form->select('carrera_id', $carreras);
    echo $this->Form->button(__('Guardar'));
    echo $this->Form->end();
?>
