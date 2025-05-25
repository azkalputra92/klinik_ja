<?php

namespace frontend\controllers;
use common\models\Produk;
use common\models\Treatment;


use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionTreatment()
    {
        $model = Treatment::find()->all();
        return $this->render('treatment',['model'=>$model]);
    }
    public function actionProduct()
    {
        $model = Produk::find()->all();
        return $this->render('product',['model'=>$model]);
    }
}
