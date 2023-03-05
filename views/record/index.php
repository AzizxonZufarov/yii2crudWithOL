
<?php
use yii\helpers\Html;
?>
<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-4">Yii2 TODO application</h1>
        <p class="lead">Yii2 TODO application using Optimistic Locking</p>
    </div>
</div>
<div><?= Html::a('Create', 'record/create', ['class' => 'btn btn-primary'])?></div>
<table class="table table-striped table-bordered table-hover text-center">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Priority</th>
        <th scope="col">Done</th>
        <th scope="col">Operation</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($model as $value) {?>
        <tr>
            <td><?= $value->id?></td>
            <td><?= $value->title?></td>
            <td><?= $value->priority?></td>
            <td style="font-weight: bold"><?
                if($value->done == 1) { echo '<span style="color: darkgreen;">DONE</span>'; }
                else{ echo '<span style="color: red;">NOT DONE</span>'; }
                ?></td>
            <td><?= Html::a('Edit', ['edit', 'id' => $value->id], ['class' => 'btn btn-primary'])?></td>
        </tr>
    <? }?>
    </tbody>
</table>





