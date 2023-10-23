<h1>Semestres</h1>
<p><?= $this->Html->link("Agregar", ['action' => 'add']) ?></p>

<table>
    <tr>
        <th>ID</th>
        <th>Semestre</th>
        <th>Action</th>
    </tr>

    <?php foreach ($semestres as $semestre) : ?>
        <tr>
            <td>
                <?= $semestre->id ?>
            </td>
            <td>
                <?= $semestre->descripcion ?>
            </td>
            <td>
                <?= $this->Html->link('Editar', ['action' => 'edit', $semestre->id]) ?>
                <?= $this->Form->postLink(
                    'Eliminar',
                    ['action' => 'delete', $semestre->id],
                    ['confirm' => 'Seguro de eliminar?']
                )
            ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
