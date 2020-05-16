<?php


namespace app\models;

use yii\base\Model;

/**
 * Class RowGeneratorForm
 * @package app\models
 * @property-read int rowSize
 */
class RowGeneratorForm extends Model implements IRowWorker
{
    public string $notFormattedrowSize;
    private int $row_size;

    public function __construct()
    {
        parent::__construct();
        $this->notFormattedrowSize = '';
    }

    public function rules()
    {
        return [
            ['notFormattedrowSize', 'trim'],
            ['notFormattedrowSize', 'required'],
            ['notFormattedrowSize', 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'notFormattedrowSize' => 'Длина генерируемого ряда'
        ];
    }

    public function afterValidate()
    {
        parent::afterValidate();
        $this->row_size = intval($this->notFormattedrowSize);
    }

    private function generateRow()
    {
        $result = [];
        for ($i = 0; $i < $this->row_size; $i++) {
            try {
                $result[] = [random_int(0, 1000)];
            } catch (\Exception $e) {
            }
        }
        return $result;
    }

    public function getRowSize()
    {
        return $this->row_size;
    }

    public function getRow(): array
    {
        return $this->generateRow();
    }
}