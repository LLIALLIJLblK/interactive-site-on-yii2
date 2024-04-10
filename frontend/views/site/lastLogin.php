<?php

    use yii\bootstrap5\ActiveForm;
    use yii\helpers\Html;

    $this->title = 'Вход';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->label('Ваше имя')->textInput() ?>
    <?= $form->field($model, 'password')->label('Ваш пароль')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
