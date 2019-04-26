<?php
use yii\helpers\Html;
?>
<p>Вы ввели следующую информацию:</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Last Name</label>: <?= Html::encode($model->lastName) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
</ul>