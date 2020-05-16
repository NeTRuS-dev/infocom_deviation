<?php

/* @var $this yii\web\View */

use yii\bootstrap4\Html;

/* @var $row string */
/* @var $result float|null */

$this->title = 'Результаты';
?>
<div class="row no-gutters">
    <div class="col-6 offset-3">
        <div class="h1">Успех</div>
        <div class="h3"><?= Html::encode($row) ?></div>
        <div class="h3">Результат</div>
        <div class="h3"><?= Html::encode($result) ?></div>
        <?= Html::a('Вычислить новый ряд', 'site/index', ['class' => 'btn btn-primary']) ?>
    </div>
</div>

