<h1>Cursos Aprobados de <?= $alumno ?></h1>
<?= $this->Html->link('<button class="bnt-success">Agregar <i class="fa-solid fa-plus fa-lg"></i></button>', ['action' => 'add', $alumnoID], ['escape' => false]) ?>

<table>
    <tr>
        <th>ID</th>
        <th>Curso</th>
        <th>Semestre</th>
        <th>Seccion</th>
        <th>Nota</th>
        <th>Action</th>
    </tr>

    <?php foreach ($cursoAprobadoAlumno as $row) : ?>
        <tr>
            <td>
                <?= $row->id ?>
            </td>
            <td>
                <?= $row->curso ?>
            </td>
            <td>
                <?= $row->semestre ?>
            </td>
            <td>
                <?= $row->seccion ?>
            </td>
            <td>
                <?= $row->nota ?>
            </td>
            <td>
                <?= $this->Html->link('Editar', ['action' => 'edit', $row->id, $alumnoID]) ?>
                <?= $this->Form->postLink(
                    'Eliminar',
                    ['action' => 'delete', $row->id, $alumnoID],
                    ['confirm' => 'Seguro de eliminar?']
                )
            ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
