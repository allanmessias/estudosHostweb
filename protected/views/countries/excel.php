<table>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Status</th>
    </tr>
    <?php foreach ($model as $data) : ?>
        <tr>
            <td><?php echo $data->id ?></td>
            <td><?php echo $data->name ?></td>
            <td><?php echo $data->status ?></td>
        </tr>
    <?php endforeach ?>
</table>