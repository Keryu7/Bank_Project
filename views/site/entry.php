<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

    <div class="form-signin">
        <h2 style="text-align: center">Authorization</h2>

<?/*= $form->field($model, 'name') */?>

<?/*= $form->field($model, 'email') */?>

<?= $form->field($model, 'username', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
        ])->textInput()->input('name', ['placeholder' => "Enter Your Name"])?>
<?= $form->field($model, 'lastName')->textInput()->input('lastname', ['placeholder' => "Enter Your Last Name"])?>
<?= $form->field($model, 'password')->textInput()->input('password', ['placeholder' => "Enter Your Password"])?>


        <?= Html::submitButton('Отправить', ['class' => 'btn btn-lg btn-primary btn-block']) ?>
    </div>

<?php ActiveForm::end(); ?>