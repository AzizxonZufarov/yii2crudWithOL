<h1>index</h1>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>


<? $form = ActiveForm::begin(['options'=>['id'=> 'test']]);?>
<?= $form->field($model, 'text')->label('Text');?>
<?= Html::activeHiddenInput($model, 'version');?>
<?= Html::submitButton('Отправить', ['class' => 'btn btn-success']);?>
<?  ActiveForm::end();?>