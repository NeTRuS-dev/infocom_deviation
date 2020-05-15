<?php


namespace app\models;


use Yii;
use yii\db\Exception;

class RowCalculator extends \yii\base\Model
{
    public function calculate(array $row): ?float
    {
        $result = null;
        try {
            Yii::$app->db->createCommand()->batchInsert('rows', ['value'], $row)->execute();
            $result = Yii::$app->db->createCommand('EXEC [DeviationDB].[calculate]')->queryAll();
        } catch (Exception $e) {
        }
        return $result;

    }
}