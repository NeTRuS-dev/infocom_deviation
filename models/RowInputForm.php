<?php


namespace app\models;

/**
 * Class RowInputForm
 * @package app\models
 * @property-read int[] formattedRow
 */
class RowInputForm extends \yii\base\Model
{
    public string $notFormattedRow;
    private array $formatted_row;

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

    private function parseRow()
    {
        $this->formatted_row = array_map('intval', explode(',', str_replace(' ', '', $this->notFormattedRow)));
    }

    public function getFormattedRow()
    {
        return $this->formatted_row;
    }
}