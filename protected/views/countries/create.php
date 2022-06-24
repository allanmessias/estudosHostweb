<?php /* @var $this = CountriesController */?>

<h1>Create Countries</h1>
<?php $form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    'enableAjaxValidation' => true,
))?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textField($model, "name") ?>
<?php echo $form->error($model, "name") ?>

<?php echo $form->textField($model, "status") ?>
<?php echo $form->error($model, "status") ?>

<?php echo CHtml::submitButton('Enviar', array('btn btn-primary btn-large'))?>
<?php $this->endWidget()?>