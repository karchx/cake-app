<h1>Nuevo alumno</h1>
<?php
    echo $this->Form->create($alumno);
    echo $this->Form->control('nombres');
    echo $this->Form->control('apellidos');
    echo $this->Form->label('Fecha de Nacimiento');
    echo $this->Form->date('fecha_nacimiento');
    echo $this->Form->control('fotografia', ["type" => "file"]);
    echo $this->Form->label('Carrera');
    echo $this->Form->select('carrera_id', $carreras, ["label" => "Carrera"]);

    echo $this->Form->button(__('Crear alumno'));
    echo $this->Form->end();
?>
