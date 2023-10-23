<h1>Alumnos</h1>
<p><?= $this->Html->link("Agregar", ['action' => 'add']) ?></p>

<table>
    <tr>
        <th>ID</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Fecha de Nacimiento</th>
        <th>Fotografia</th>
        <th>Carrera</th>
        <th>Action</th>
    </tr>

    <?php foreach ($alumnos as $alumno) : ?>
        <tr>
            <td>
                <?= $alumno->id ?>
            </td>
            <td>
                <?= $alumno->nombres ?>
            </td>
            <td>
                <?= $alumno->apellidos ?>
            </td>
            <td>
                <?= $alumno->fecha_nacimiento ?>
            </td>
            <td>
                <?= $alumno->fotografia ?>
            </td>
            <td>
                <?= $alumno->carrera ?>
            </td>
            <td>
                <?= $this->Html->link('Editar', ['action' => 'edit', $alumno->id]) ?>
                <?= $this->Form->postLink(
                    'Eliminar',
                    ['action' => 'delete', $alumno->id],
                    ['confirm' => 'Seguro de eliminar?']
                )
            ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
