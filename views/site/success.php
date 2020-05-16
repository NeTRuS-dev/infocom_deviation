<?php

/* @var $this yii\web\View */

use yii\bootstrap4\Html;

/* @var $row string */
/* @var $result float|null */

$this->title = 'Результаты';
?>
<div class="d-flex justify-content-center align-items-center h-100">
    <div class="d-flex justify-content-between align-items-center flex-column h-50 mt-auto mb-auto">
        <div class="h1">Успех</div>
        <div class="h3">Рассчитываемый ряд:</div>
        <?php $row_len = mb_strlen($row) ?>
        <div class="h4"><?= Html::encode(mb_substr($row, 0, $row_len > 250 ? 250 : $row_len)) ?></div>
        <div class="h3">Результат</div>
        <div class="h4"><?= Html::encode($result) ?></div>
        <?= Html::a('Вычислить новый ряд', '/', ['class' => 'btn btn-primary']) ?>
    </div>
</div>

