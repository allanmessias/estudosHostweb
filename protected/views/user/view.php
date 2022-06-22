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


<ul class="nav nav-tabs nav-stacked">
	<?php foreach (Yii::app()->authManager->getAuthItems() as $data) : ?>
		<?php $enabled = Yii::app()->authManager->checkAccess($data->name, $model->id) ?>
		<li><a href="#">
			<h4><?php echo $data->name ?> 
			<small>
				<?php if($data->type==0) echo 'Role'?>
				<?php if($data->type==1) echo 'Tipo'?>
				<?php if($data->type==2) echo 'Operação'?>
			</small>
			<?php echo CHtml::link($enabled ? "Off" : "On", array('user/assign', 'id' => $model->id), array('class'=> $enabled ? 'btn btn-primary'  : 'btn')) ?>
			</h4>
			<p>
				<?php echo $data->description ?>
			</p>
		</a></li>
	<?php endforeach ?>
</ul>