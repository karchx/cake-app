<h1>Semestres</h1>
<?= $this->Html->link('<button class="bnt-success">Agregar <i class="fa-solid fa-plus fa-lg"></i></button>', ['action' => 'add'], ['escape' => false]) ?>

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
