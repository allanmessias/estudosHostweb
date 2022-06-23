<div class="row-fluid">
	<div class="span6">
		<h1>Create Role</h1>
		<?php $form = $this->beginWidget('CActiveForm', array(
			'id' => 'role-form',
			'enableAjaxValidation' => true,
			'enableClientValidation' => true, 
		)) ?>

		<div class="row">
			<?= $form->labelEx($role, 'name'); ?>
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