<?php

namespace backend\controllers;

use backend\models\GantiPassword;
use common\models\LoginForm;
use Yii;
use yii\bootstrap5\Html;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index' , 'ubah-password'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
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
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    public function actionUbahPassword($id)
    {
        $request = Yii::$app->request;
        $model = new GantiPassword();

        $request = Yii::$app->request;
        if ($request->isAjax) {
            /*
            * Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Ubah Password",
                    'content' => $this->renderAjax('ubah-password', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Tutup', ['class' => 'btn btn-default pull-left fs-14', 'data-bs-dismiss' => "modal"]) .
                    Html::button('Simpan', ['class' => 'btn btn-primary fs-14', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->gantiPassword($id)) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Ubah Password",
                    'content' => '<div class="d-flex flex-column justify-content-center align-items-center mb-5">
                            <img src="/images/success.gif" >
                            <span class="fs-14">Berhasil Menambah Data</span>
                        </div>',
                    'footer' => Html::button('Tutup', ['class' => 'btn btn-default pull-left fs-14', 'data-bs-dismiss' => "modal"])
                ];
            } else {
                return [
                    'title' => "Ubah Password",
                    'content' => $this->renderAjax('ubah-password', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Tutup', ['class' => 'btn btn-default pull-left fs-14', 'data-bs-dismiss' => "modal"]) .
                    Html::button('Simpan', ['class' => 'btn btn-primary fs-14', 'type' => "submit"])
                ];
            }
        } 
    }
}
