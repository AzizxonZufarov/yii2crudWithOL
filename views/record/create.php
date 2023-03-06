<h1>Create page</h1>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<? $form = ActiveForm::begin();?>
<?= $form->field($model, 'title')->textarea(['rows'=>5])->label('Title');?>
<?= $form->field($model, 'priority')->label('Priority');?>
<?= $form->field($model, 'done')->checkbox(['class' => 'mb-3 form-group'])?>
<?= Html::activeHiddenInput($model, 'version');?>
<?=   Html::submitButton('Create', ['class' => 'btn btn-success']);?>
<?    ActiveForm::end();?>

