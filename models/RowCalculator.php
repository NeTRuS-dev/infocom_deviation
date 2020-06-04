<?php


namespace app\models;


use Yii;
use yii\base\BaseObject;
use yii\db\Exception;

class RowCalculator extends BaseObject
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

            $result = floatval(Yii::$app->db->createCommand('EXEC calculate')->queryScalar());
        } catch (Exception $e) {
        }
        return $result;

    }
}