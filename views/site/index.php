<?php

/* @var $this yii\web\View */
/* @var $rowGenerator RowGeneratorForm */

/* @var $rowInput RowInputForm */

use app\models\RowGeneratorForm;
use app\models\RowInputForm;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Отклонение';
?>
<div class="row no-gutters justify-content-center align-items-center h-100">
    <div class="d-flex flex-column w-75">
        <div class="h1 text-center">Вычисление ряда онлайн</div>
        <div class="row no-gutters mt-5">
            <div class="col-5 pl-5 pr-5">
                <?php $form1 = ActiveForm::begin([
                    'method' => 'POST',
                    'action' => ['/inputted']]); ?>

                <?= $form1->field($rowInput, 'notFormattedRow')
                    ->input('text', ['placeholder' => 'Введите ряд через запятую', 'class' => 'form-control mb-3'])
                    ->label('Введите временной ряд', ['class' => 'w-100 text-center mb-3']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Вычислить ряд', ['class' => 'btn btn-primary ml-auto mr-auto mb-3 d-flex']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-2 pl-5 pr-5">
                <div class="h2 text-center mb-3">Или</div>
            </div>
            <div class="col-5 pl-5 pr-5">
                <?php $form2 = ActiveForm::begin([
                    'method' => 'POST',
                    'action' => ['/random']]); ?>

                <?= $form2->field($rowGenerator, 'notFormattedrowSize')
                    ->input('text', ['placeholder' => 'Введите длину ряда', 'class' => 'form-control mb-3'])
                    ->label('Введите длину ряда', ['class' => 'w-100 text-center mb-3']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Сгенерировать запрос', ['class' => 'btn btn-primary ml-auto mr-auto mb-3 d-flex']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
