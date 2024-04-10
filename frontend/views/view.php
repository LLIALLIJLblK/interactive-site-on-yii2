<?php

use yii\bootstrap5\Html;

?>

<div class="col-md-12">
    <h1>Работа с моделями из бд</h1>

    <div class="contaier mt-5">           
    <div class="d-flex justify-content-center">
        <fieldset class="form-control" id ="disabledInput" type = "text" placeholder="disabled input here..." >
            <legend>Калькулятор стоимости доставки сырья</legend>
            <div>
                <div class="mb-3" >      
                    <label for="rawType1">RawTypes1:</label>
                    <select name="rawType1" id="rawType1">
                        <?php foreach ($modelRaw as $item) :?>
                            <option value="<?= $item->id ?>"><?= $item->rawtype ?></option>
                        <?php endforeach; ?>
                    </select>
                    
                </div>
                <div class="mb-3" >     
                    <label for="month1">Month1:</label>
                    <select name="month1" id="month1">
                        <?php foreach ($modelMonth as $item) :?>
                            <option value="<?= $item->id ?>"><?= $item->month ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3" >     
               <label for="tonnage1">Tonnage1:</label>
                    <select name="tonnage1" id="tonnage1">
                        <?php foreach ($modelTonnage as $item) :?>
                            <option value="<?= $item->id ?>"><?= $item->tonnage ?></option>
                        <?php endforeach; ?>
                    </select>
            </div>
            <?= Html::submitButton('Рассчитать',['class'=>'btn btn-success']);?>
        </fieldset>
    </div>
</div>

    <?php
        echo "<br>";
        foreach ($modelMonth as $item) {
            echo $item->id . " " ;
            echo $item->month;
            echo "<br>";
        }

        echo "<br>";
        foreach ($modelTonnage as $item) {
            echo $item->id . " " ;
            echo $item->tonnage;
            echo "<br>";
        }
        echo "<br>";

        foreach ($modelPrice as $col){
            echo "--------------------------------------------------------------------". "<br>";
            echo 'id:' . $col->id . " |" ;
            echo 'Raw:' . $col->rawTypes->rawtype. " |" ; 
            echo 'Month:' .$col->monthType->month. " |" ;
            echo 'Tonnage: '. $col->tonnageType->tonnage. " |" ;
            echo 'prce: ' . $col->price . " |" ;
            echo "<br>";
        }
    ?>
</div>