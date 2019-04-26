<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Inkass */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inkass-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'amount_inkass')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_inkass')->textInput() ?>

    <?= $form->field($model, 'id_atm')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
