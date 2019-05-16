<?php
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use developit\captcha\Captcha;
?>
<div class="form-signin">
    <h1 style="text-align: center">Регистрация</h1>
    <p style="text-align: center">Пожалуйста, заполните поля для входа:</p>

<?php $form = ActiveForm::begin([
    'id' => 'signup-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-lg-3 control-label',
            'wrapper' => 'col-lg-9',
            'error' => '',
        ],
    ],
]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'lastname') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'role')->dropDownList(['engineer' => 'Инженер','operator' => 'Инкассатор']); ?>

    <?/*= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) */?>
    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(),[
        'template' => '<div class="row"><div class="col-lg-6">{image}</div><div class="col-lg-6">{input}</div></div>',]) ?>
    <div class="form-group">
        <div class="col-lg-12">
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-lg btn-primary btn-block', 'name' => 'signup-button']) ?>
        </div>
    </div>


<?php ActiveForm::end(); ?>
</div>

