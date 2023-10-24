<h1>Secciones</h1>
<?= $this->Html->link('<button class="bnt-success">Agregar <i class="fa-solid fa-plus fa-lg"></i></button>', ['action' => 'add'], ['escape' => false]) ?>

<table>
    <tr>
        <th>ID</th>
        <th>Semestre</th>
        <th>Action</th>
    </tr>

    <?php foreach ($secciones as $seccion) : ?>
        <tr>
            <td>
                <?= $seccion->id ?>
            </td>
            <td>
                <?= $seccion->descripcion ?>
            </td>
            <td>
                <?= $this->Html->link('Editar', ['action' => 'edit', $seccion->id]) ?>
                <?= $this->Form->postLink(
                    'Eliminar',
                    ['action' => 'delete', $seccion->id],
                    ['confirm' => 'Seguro de eliminar?']
                )
            ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
