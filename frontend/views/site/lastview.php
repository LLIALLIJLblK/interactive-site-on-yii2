<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

    $form =  ActiveForm::begin([
        'id' => 'myForm',
        'method' => 'post',
        // 'enableAjaxValidation' => true,

    ]);
?>

<?php if(!Yii::$app->user->isGuest): ?>

<div class="alert alert-success" role="alert">
    Здравствуйте, <?= Yii::$app->user->identity->username?>, вы авторизовались в системе расчета стоимости доставки.
     Теперь все ваши расчеты будут сохранены для последующего просмотра в <a href="lastHistory" class="alert-link">истории расчётов</a>.
</div>

<?php endif;?>

<div class="contaier mt-5">           
    <div class="d-flex justify-content-center">
        <fieldset class="form-control" id ="disabledInput" type = "text" placeholder="disabled input here..." >
            <legend>Калькулятор стоимости доставки сырья</legend>
            <div>
                <div class="mb-3" >
                    <?=
                        $form
                        ->field($model, 'monthType')
                        ->label('Месяц')
                        ->dropDownList(
                            $dataRepository->getMonths(),
                            ['prompt' => 'Выберите месяц']
                        );
                    ?>
                </div>
                <div class="mb-3" >
                    <?=
                        $form
                        ->field($model,'tonnageType')
                        ->label('Тоннаж')
                        ->dropDownList(
                            $dataRepository->getTonnages(),
                            ['prompt'=>'Выберите тоннаж']
                        );
                    ?>
                </div>
            </div>

            <div class="mb-3" >
                    <?=
                        $form
                        ->field($model,'rawType')
                        ->label('Сырьё')
                        ->dropDownList(
                            $dataRepository->getRaws(),
                            ['prompt'=>'Выберите сырьё']
                        );
                    ?>
                </div>
            </div>

            <div class="container mt-3">
            <?= Html::submitButton('Рассчитать',['class'=>'btn btn-success']);?>
            </div>
        </fieldset>
    </div>
</div>
<?php ActiveForm::end();?>

<?php if ($model->load(Yii::$app->request->post()) && $model->validate()): ?>
    <?php
        $data = $dataRepository->getCalculateList($model->rawType);
        $prices =  $dataRepository->getPrice($model->rawType,$model->monthType,$model->tonnageType);
    ?>
<div id = "result-container">
    <div class="contaier mt-5"> 
        <div class ="submitted-values">
            <fieldset class="form-control">
                <legend>Введенные значения:</legend>
                        <p><strong>Сырьё:</strong> <?= Html::encode($model->monthType) ?></p>
                        <p><strong>Тоннаж:</strong> <?= Html::encode($model->tonnageType) ?></p>
                        <p><strong>месяц:</strong> <?= Html::encode($model->rawType) ?></p>
                        <p><strong>Цена:</strong> <?= Html::encode($model->price = $prices) ?></p>
            </fieldset>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>M/T</th>
                        <th>25</th>
                        <th>50</th>
                        <th>75</th>
                        <th>100</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $key => $value): ?>
                        <tr>
                            <td><?= $key ?></td>
                            <?php foreach ($value as $val): ?>
                                <td <?php if ($val == ($model->price) && $key ==($model->monthType)) 
                                    echo 'style="background-color: #ffa500;border-radius: 5px;"'; ?>><?= $val ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php endif; ?>



<?php

// $js = <<< JS
//     $('#myForm').on('beforeSubmit', function (e) {
//         var form = $(this);
//         $.ajax({
//             url: form.attr('action'),
//             type: 'post',
//             data: form.serialize(),
//             success: function (data) {
//                 // Handle the response from the server
//                 if (data.success) {
//                     // Validation passed, update the form or display success message
//                 } else {
//                     // Validation failed, display error messages
//                     form.yiiActiveForm('updateMessages', data.errors, true);
//                 }
//             }
//         });
//         return false;
//     }).on('submit', function (e) {
//         e.preventDefault();
//     });
// JS;

// $this->registerJs($js);




// $js = <<<JS
//     var form  = $('#myForm');
//     form.on('beforeSubmit',function(){
//         console.log('я в аяксе');
//         var data = form.serialize();
//         let mess =$('.mess');
//         $.ajax({
//             url:'last',
//             type:'POST',
//             data:data,
//             success: function(res){
//                 console.log(res);
//                 form[0].querySelectorAll('input, select, textarea').forEach(function(element) {
//                 $('#result-container').html();
               
//                 });
//             },
//             error: function(){
//                 alert('Error!');
//             }
//         }); 
//         return false;
//     });
// JS;
// $this->registerJS($js);


    // $js = <<<JS
    // var form  = $('#myForm');
    // form.on('beforeSubmit',function(){
    //     var data = form.serialize();
    //     $.ajax({
    //         url:form.attr('action'),
    //         type:'POST',
    //         data:data,
    //         success: function(res){
    //             console.log(res);
    //             form[0].reset();
    //         },
    //         error: function(){
    //             alert('Error!');
    //         }
    //     });
    //     return false;
    // });
    // JS;
    // $this->registerJS($js);
?>