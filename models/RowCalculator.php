<?php


namespace app\models;


use Yii;
use yii\db\Exception;

class RowCalculator extends \yii\base\Model
{
    /**
     * @param int[] $row
     * @return float|null
     */
    public function calculate($row)
    {
        $result = null;
        try {
            Yii::$app->db->createCommand()->batchInsert('rows', ['value'], $row)->execute();

            $result = Yii::$app->db->createCommand('EXEC [DeviationDB].[calculate]')->queryOne();
        } catch (Exception $e) {
        }
        return $result;

    }
}