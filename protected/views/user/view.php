<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
	'Users' => array('index'),
	$model->id,
);

$this->menu = array(
	array('label' => 'List User', 'url' => array('index')),
	array('label' => 'Create User', 'url' => array('create')),
	array('label' => 'Update User', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete User', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
	array('label' => 'Manage User', 'url' => array('admin')),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'htmlOptions' => array('class' => 'table table-striped'),
	'attributes' => array(
		'id',
		'username',
		'password',
		'email',
	),
)); ?>

<div class="row-fluid">
	<div class="span6">
		<h1>Create Role</h1>
		<?php $form = $this->beginWidget('CActiveForm') ?>

		<?= $form->errorSummary($role) ?>

		<div class="row">
			<?= $form->labelEx($role, 'nome'); ?>
			<?= $form->textField($role, 'name'); ?>
			<?= $form->error($role, 'name') ?>
		</div>

		<div class="row">
			<?= $form->labelEx($role, 'description'); ?>
			<?= $form->textArea($role, 'description'); ?>
			<?= $form->error($role, 'description') ?>
		</div>

		<div class="row">
			<?= CHtml::submitButton('Enviar', array('class'=>'btn btn-primary'))?>
		</div>

		<?php $this->endWidget() ?>
	</div>
	<div class="span6">
		<ul class="nav nav-tabs nav-stacked">
			<?php foreach (Yii::app()->authManager->getAuthItems() as $data) : ?>
				<?php $enabled = Yii::app()->authManager->checkAccess($data->name, $model->id) ?>
				<li>
					<h4><?php echo $data->name ?>
						<small>
							<?php if ($data->type == 0) echo 'Role' ?>
							<?php if ($data->type == 1) echo 'Tipo' ?>
							<?php if ($data->type == 2) echo 'Operação' ?>
						</small>
						<?php echo CHtml::link($enabled ? "Off" : "On", array('user/assign', 'id' => $model->id, 'item' => $data->name), array('class' => $enabled ? 'btn btn-primary'  : 'btn')) ?>
					</h4>
					<p>
						<?php echo $data->description ?>
					</p>
				</li>
			<?php endforeach ?>
		</ul>
	</div>
</div>