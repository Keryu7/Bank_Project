<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Soft */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="soft-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'soft_name')->dropDownList([ 'Agilis 3.0' => 'Agilis 3.0', 'Agilis 2.4' => 'Agilis 2.4', 'Kalignite' => 'Kalignite', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
