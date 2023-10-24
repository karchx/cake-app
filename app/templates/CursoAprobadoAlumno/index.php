<h1>Alumnos</h1>
<?= $this->Html->link('<button class="bnt-success">Agregar <i class="fa-solid fa-plus fa-lg"></i></button>', ['action' => 'add'], ['escape' => false]) ?>

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
                <?= $this->Html->link('Aprobar curso', ['action' => 'aprobar', $alumno->id]) ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
