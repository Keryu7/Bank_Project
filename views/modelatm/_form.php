<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Modelatm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modelatm-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'model_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_soft')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
