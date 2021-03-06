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

<h1>Visualizando usuário:  #<?php echo $model->id; ?></h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'htmlOptions' => array('class' => 'table table-striped'),
	'attributes' => array(
		'id',
		'username',
		'password',
		'email',
		['name' => 'countries.name', 'label' => 'País']
	),
)); ?>

<?php $this->renderPartial('_role', ['role' => $role, 'model' => $model])?>

