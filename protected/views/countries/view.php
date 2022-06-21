<h1>Mostrando detalhes de <?php echo $model->name ?></h1>

<table class="table">
    <tr>
        <td><strong>ID</strong></td>
        <td><?php echo $model->id?></td>
    </tr>

    <tr>
        <td><strong>Nome</strong></td>
        <td><?php echo $model->name?></td>
    </tr>

    <tr>
        <td><strong>Status</strong></td>
        <td><span class="label label-<?php echo $model->status==1 ? 'info' : 'warning' ?>"><?php echo $model->status == 1 ? 'Ativo' : 'Inativo'; ?></span></td>
    </tr>
</table>