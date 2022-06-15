<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>


<p>Please fill out the following form with your login credentials:</p>

<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'method' => 'post', 
	'action' => 'site/index', 
	'enableAjaxValidation' => true,
	'enableClientValidation' => true,
	'focus' => array($model, 'username')
)); ?>
<?php $this->endWidget()?>
</div>
<!-- end form -->