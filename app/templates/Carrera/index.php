<h1>Carreras</h1>
<?= $this->Html->link('<button class="bnt-success">Agregar <i class="fa-solid fa-plus fa-lg"></i></button>', ['action' => 'add'], ['escape' => false]) ?>

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
