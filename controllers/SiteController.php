<?php

namespace app\controllers;

use app\models\RowCalculator;
use app\models\RowGeneratorForm;
use app\models\RowInputForm;
use Yii;
use yii\web\Controller;
use yii\web\Response;

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
        return $this->render('index', compact('rowGenerator', 'rowInput'));
    }

    public function actionRandomRow()
    {
        $row_worker = new RowGeneratorForm();
        if ($row_worker->load(Yii::$app->request->post()) && $row_worker->validate()) {
            $calc = new RowCalculator();
            $row = $row_worker->getRow();
            $result = $calc->calculate($row);
            return $this->render('success', [
                'row' => implode(', ', $row),
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
                'row' => implode(', ', $row),
                'result' => $result
            ]);

        } else {
            return $this->render('index', [
                'rowGenerator' => new RowGeneratorForm(),
                'rowInput' => $row_worker,
            ]);
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

}
