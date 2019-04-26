<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Address */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_address')->textInput() ?>

    <?= $form->field($model, 'region')->dropDownList([ 'Минск и Минская область' => 'Минск и Минская область', 'Брестская область' => 'Брестская область', 'Витебская область' => 'Витебская область', 'Гомельская область' => 'Гомельская область', 'Гродненская область' => 'Гродненская область', 'Могилевская область' => 'Могилевская область', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
