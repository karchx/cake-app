<h1>Editar</h1>
<?php
    echo $this->Form->create($cursoAprobadoAlumno);
    echo $this->Form->label('Semestre');
    echo $this->Form->select('semestre_id', $semestres);
    echo $this->Form->label('Seccion');
    echo $this->Form->select('seccion_id', $secciones);
    echo $this->Form->label('Curso');
    echo $this->Form->select('curso_id', $cursos);
    echo $this->Form->control('nota', ['type' => 'number'], ['step' => 0.01], ['value' => 0.00]);

    echo $this->Form->button(__('Editar'));
    echo $this->Form->end();
?>
