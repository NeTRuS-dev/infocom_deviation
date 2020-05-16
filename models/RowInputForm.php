<?php


namespace app\models;

/**
 * Class RowInputForm
 * @package app\models
 * @property-read int[] formattedRow
 */
class RowInputForm extends \yii\base\Model implements IRowWorker
{
    public string $notFormattedRow;
    private array $formatted_row;

    public function __construct()
    {
        parent::__construct();
        $this->notFormattedRow = '';
    }

    public function rules()
    {
        return [
            ['notFormattedRow', 'trim'],
            ['notFormattedRow', 'required']
        ];
    }

    public function afterValidate()
    {
        parent::afterValidate();
        $this->parseRow();
    }

    public function attributeLabels()
    {
        return [
            'notFormattedRow' => 'Временной ряд'
        ];
    }

    private function parseRow()
    {
        $this->formatted_row = array_map('intval', explode(',', str_replace(' ', '', $this->notFormattedRow)));
    }

    private function getFormattedRow()
    {
        return $this->formatted_row;
    }

    public function getRow(): array
    {
        return $this->getFormattedRow();
    }
}