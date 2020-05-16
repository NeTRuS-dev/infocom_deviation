<?php

namespace app\controllers;

use app\models\RowCalculator;
use app\models\RowGeneratorForm;
use app\models\RowInputForm;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $rowGenerator = new RowGeneratorForm();
        $rowInput = new RowInputForm();
        return $this->render('index', [
            'rowGenerator' => $rowGenerator,
            'rowInput' => $rowInput
        ]);
    }

    public function actionRandomRow()
    {
        $row_worker = new RowGeneratorForm();
        if ($row_worker->load(Yii::$app->request->post()) && $row_worker->validate()) {
            $calc = new RowCalculator();
            $row = $row_worker->getRow();
            $result = $calc->calculate($row);
            return $this->render('success', [
                'row' => implode(', ', array_map(function ($item) {
                    return $item[0];
                }, $row)),
                'result' => $result
            ]);
        } else {
            return $this->render('index', [
                'rowGenerator' => $row_worker,
                'rowInput' => new RowInputForm(),
            ]);
        }
    }

    public function actionInputedRow()
    {
        $row_worker = new RowInputForm();
        if ($row_worker->load(Yii::$app->request->post()) && $row_worker->validate()) {
            $calc = new RowCalculator();
            $row = $row_worker->getRow();
            $result = $calc->calculate($row);
            return $this->render('success', [
                'row' => implode(', ', array_map(function ($item) {
                    return $item[0];
                }, $row)),
                'result' => $result
            ]);

        } else {
            return $this->render('index', [
                'rowGenerator' => new RowGeneratorForm(),
                'rowInput' => $row_worker,
            ]);
        }
    }

}
