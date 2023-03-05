<h1>Edit page</h1>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?= \app\widgets\Alert::widget();?>
<? $form = ActiveForm::begin();?>
<?= $form->field($model, 'title')->label('Title');?>
<?= $form->field($model, 'priority')->label('Priority');?>
<?= $form->field($model, 'done')->checkbox(['class' => 'mb-3 form-group'])?>
<?= Html::activeHiddenInput($model, 'version');?>
<?=   Html::submitButton('Save', ['class' => 'btn btn-success']);?>
<?    ActiveForm::end();?>
<?= Html::a('Cancel', '/', ['class' => 'btn btn-warning right'])?>
<?= Html::a('Delete', ['delete', 'id' => $model->id, 'version' => $model->version], ['class' => 'btn btn-danger right'])?>
<?= Html::a('Edit again', ['edit', 'id' => $model->id], ['class' => 'btn btn-primary right'])?>
