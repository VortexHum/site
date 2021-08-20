<?php

namespace app\models\search;
namespace app\controllers;
use Yii;
use app\models\Car;
use yii\web\Controller;
use app\models\search\CarSearch;

class CarController extends Controller
{
    public function actionCreate()
    {
        $model = new Car();
        if( $model->load(Yii::$app->request->post()) && $model->validate() ) {
            if( $model->save() ) {
                return $this->refresh();
            }
        }
        return $this->render('create', ['model' => $model]);
    }

    protected function findModel($id)
    {
        if (($model = Car::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Запрашиваемая страница не найдена.');
        }
    }

    public function actionIndex()
    {
        $searchModel = new CarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAbout()
    {
        $rows = Car::find()->all();
        return $this->render('cars');
    }
}
