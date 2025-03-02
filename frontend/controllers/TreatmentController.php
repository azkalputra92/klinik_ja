<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class TreatmentController extends Controller
{
    public function actionIndex()
    {
        echo'asda';
        exit();
        return $this->render('index');
    }
}
