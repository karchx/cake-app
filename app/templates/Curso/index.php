<h1>Cursos</h1>
<p><?= $this->Html->link("Agregar", ['action' => 'add']) ?></p>

<table>
    <tr>
        <th>ID</th>
        <th>Curso</th>
        <th>Action</th>
    </tr>

    <?php foreach ($cursos as $curso) : ?>
        <tr>
            <td>
                <?= $curso->id ?>
            </td>
            <td>
                <?= $curso->descripcion ?>
            </td>
            <td>
                <?= $this->Html->link('Editar', ['action' => 'edit', $curso->id]) ?>
                <?= $this->Form->postLink(
                    'Eliminar',
                    ['action' => 'delete', $curso->id],
                    ['confirm' => 'Seguro de eliminar?']
                )
            ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
