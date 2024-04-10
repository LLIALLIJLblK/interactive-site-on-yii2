<?php

$this->title = 'История расчетов';

?>

<div class="container">
    <h1><?= $this->title ?></h1>

    <table class="table">
        <thead>
            <tr>
                <th>Сырьё</th>
                <th>Месяц</th>
                <th>Тоннаж</th>
                <th>Цена</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historyData as $data): ?>
                <tr>
                    <td><?= $data['raw'] ?></td>
                    <td><?= $data['month'] ?></td>
                    <td><?= $data['tonnage'] ?></td>
                    <td><?= $data['price'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

