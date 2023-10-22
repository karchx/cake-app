<h1>Carreras</h1>
<p><?= $this->Html->link("Agregar", ['action' => 'add']) ?></p>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre Carrera</th>
        <th>Action</th>
    </tr>

    <?php foreach ($carreras as $carrera) : ?>
        <tr>
            <td>
                <?= $carrera->id ?>
            </td>
            <td>
                <?= $carrera->descripcion ?>
            </td>
            <td>
                <?= $this->Html->link('Editar', ['action' => 'edit', $carrera->id]) ?>
                <?= $this->Form->postLink(
                    'Eliminar',
                    ['action' => 'delete', $carrera->id],
                    ['confirm' => 'Seguro de eliminar?'])
            ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
