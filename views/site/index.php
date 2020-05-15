<?php

/* @var $this yii\web\View */
/* @var $rowGenerator RowGeneratorForm */
/* @var $rowInput RowInputForm */

use app\models\RowGeneratorForm;
use app\models\RowInputForm;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;

$this->title = 'Отклонение';
?>
<div class="row no-gutters">
    <div class="col-5 offset-2">
        <div class="h1">Вычисление ряда онлайн</div>
        <div class="row no-gutters">
            <div class="col-6">
                <?php $form1 = ActiveForm::begin(['action' => Url::to('')]); ?>

                <?= $form1->field($rowInput, 'notFormattedRow') ?>

                <div class="form-group">
                    <?= Html::submitButton('Вычислить ряд') ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-6">
                <?php $form2 = ActiveForm::begin(['action' => Url::to('')]); ?>

                <?= $form2->field($rowGenerator, 'notFormattedrowSize') ?>

                <div class="form-group">
                    <?= Html::submitButton('Сгенерировать запрос') ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
