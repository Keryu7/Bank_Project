<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bankatm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bankatm-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_atm')->textInput() ?>

    <?= $form->field($model, 'id_model')->textInput() ?>

    <?= $form->field($model, 'id_address')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
