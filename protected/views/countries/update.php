<?php /* @var $this = CountriesController */?>

<h1>Atualizar país: <?php echo $model->id ?></h1>
<?php $form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
))?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textField($model, "name") ?>
<?php echo $form->error($model, "name") ?>

<?php echo $form->textField($model, "status") ?>
<?php echo $form->error($model, "status") ?>

<?php echo CHtml::submitButton('Atualizar', array('class'=>'btn btn-primary'))?>
<?php $this->endWidget()?>