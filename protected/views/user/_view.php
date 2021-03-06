<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="media">
	<div class="media-body">
		<h1 class="media-heading">
			<?php echo CHtml::encode($data->getAttributeLabel('id')); ?>: <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
			<?php echo CHtml::encode($data->username); ?> <small> <?php echo CHtml::encode($data->email); ?></small>
		</h1>
		<p>
			<?php echo CHtml::encode($data->password); ?>
		</p>
	</div>
</div>