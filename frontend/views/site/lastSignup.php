<?php

    use yii\bootstrap5\ActiveForm;
    use yii\helpers\Html;

    $this->title = 'Регистрация';

?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->label('Ваше имя')->textInput() ?>
    <?= $form->field($model, 'email')->label('Ваша Почта')->textInput() ?>
    <?= $form->field($model, 'password')->label('Ваш пароль')->passwordInput() ?>
    <?= $form->field($model, 'repeatPassword')->label('Повторите пароль')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>


