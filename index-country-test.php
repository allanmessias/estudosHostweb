
<?php foreach ($countries as $data) : ?>

<div class="flex-container">
    <h3 class="country-name"><?php echo $data->name ?></h3>
    <a href="<?php echo $this->createUrl('enabled', array('id' => $data->id)); ?>">
        <span class="label label-<?php echo $data->status == 1 ? "info" : "warning" ?>">
            <?php echo $data->status == 1 ? 'Ativado' : 'Inativo'; ?>
        </span>
    </a>


</div>
<p>
    <small class='id'><?php echo $data->id ?></small>
    <button class="btn btn-primary">
        <?php echo CHtml::link('Atualizar', array('update', 'id' => $data->id)) ?>
    </button>
    <button class="btn btn-primary">
        <?php echo CHtml::link('Deletar', array('delete', 'id' => $data->id), array('confirm' => 'Você realmente deseja deletar este registro?')) ?>
    </button>
    <button class="btn btn-primary">
        <?php echo CHtml::link('Visualizar', array('view', 'id' => $data->id))?>
    </button>

</p>
<?php endforeach ?>

<style>

.country-name {
    margin-right: 10px;
}


.flex-container {
    display: flex;
    flex-wrap: wrap;
    align-content: center;
    flex-direction: row;
    align-items: baseline;
}

.id {
    margin-left: 10px;
    padding: 3px;
    background-color: #764394;
    color: #ffffff;
    border-radius: 50%;

}

a {
    color: white;
}

</style>