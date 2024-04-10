<?php

    use frontend\models\CalculationForm;
    use yii\bootstrap5\ActiveForm;
    use yii\bootstrap5\Html;

    

    $model = new CalculationForm();

    $form =  ActiveForm::begin([
        'id' => 'form',
        'method' => 'post'
    ]);
?>


<div class="contaier mt-5">           
    <div class="d-flex justify-content-center">
        <fieldset class="form-control" id ="disabledInput" type = "text" placeholder="disabled input here..." >
            <legend>Калькулятор стоимости доставки сырья</legend>
            <div>
                <div class="mb-3" >      
                    <?= 
                        $form
                        ->field($model, 'raw_types')
                        ->label('Тип сырья')
                        ->dropDownList([
                            '' => 'выберите что нибудь',
                            'shrot' => 'Шрот',
                            'zhmih'=> 'Жмых',
                            'soya'=> 'Соя'
                        ]);
                    ?>
                </div>
                <div class="mb-3" >     
                    <?= 
                        $form
                        ->field($model, 'tonnage')
                        ->label('Тоннаж')
                        ->dropDownList([
                            '' => 'выберите что нибудь',
                            '25' => '25',
                            '50' => '50',
                            '75'=> '75',
                            '100'=> '100'
                        ]);
                    ?>
                </div>
                <div class="mb-3" >     
                    <?= 
                        $form
                        ->field($model, 'month')
                        ->label('Месяц')
                        ->dropDownList([
                            '' => 'выберите что нибудь',
                            'january' => 'январь',
                            'february'=> 'февраль',  
                            'august'=> 'август',
                            'september'=> 'сентябрь',
                            'october'=> 'октябрь',
                            'november'=> 'ноябрь',
                        ]);
                    ?>
                </div>
            </div>
            <?= Html::submitButton('Рассчитать',['class'=>'btn btn-success']);?>
        </fieldset>
    </div>
</div>

<?php ActiveForm::end();?>

  
<?php if ($model->load(Yii::$app->request->post()) && $model->validate()): ?>
    <div class="contaier mt-5"> 
        <div class ="submitted-values">
            <fieldset class="form-control">
                <legend>Введенные значения:</legend>
                        <p><strong>Сырьё:</strong> <?= Html::encode($model->raw_types) ?></p>
                        <p><strong>Тоннаж:</strong> <?= Html::encode($model->tonnage) ?></p>
                        <p><strong>месяц:</strong> <?= Html::encode($model->month) ?></p>
            </fieldset>
        </div>
    </div>
<?php endif; ?>

