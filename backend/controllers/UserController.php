<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use backend\models\SignupForm;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {            
        $this->enableCsrfValidation = false;
    
        return parent::beforeAction($action);
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionSignup()
    {
        $request = Yii::$app->request;
        $model = new SignupForm();
        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new User",
                    'content'=>$this->renderAjax('signup', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load(Yii::$app->request->post()) && $model->signup()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new User",
                    'content'=>'<span class="text-success">Create User success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }
        }else{
            if ($model->load(Yii::$app->request->post()) && $model->signup()) {
                return $this->redirect(['index']);
            } else {
                return $this->render('signup', [
                    'model' => $model,
                ]);
            }
        }
    }
    public function actionIndex()
    {
                    $searchModel = new UserSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
            }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "User",
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('Batal', ['class' => 'btn btn-outline-primary pull-left', 'data-bs-dismiss' => "modal"]) .
                    Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-danger', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new User model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new User();
        
        if ($request->isAjax) {
            /*
             * Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Tambah User",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Batal', ['class' => 'btn btn-outline-primary pull-left', 'data-bs-dismiss' => "modal"]) .
                        Html::button('Simpan Data', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Konfirmasi Berhasil",
                    'content' => '
                        <div id="modal-konfirmasi" style="margin: 20% 0 20%;">
                            <div class="d-flex justify-content-center mb-3"><img src="/admin/images/sukses.svg"></div>
                            <h5 class="color-text-10 text-center fw-600">Berhasil Membuat</h5>
                            <p class="text-center color-text-8">-</p>
                        </div><script>modalKonfirmasi();</script>
                    ',
                    'footer' => Html::button('Batal', ['class' => 'btn btn-outline-primary pull-left', 'data-bs-dismiss' => "modal"]) .
                        Html::a('Tambah Lagi', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Tambah User",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Batal', ['class' => 'btn btn-outline-primary pull-left', 'data-bs-dismiss' => "modal"]) .
                        Html::button('Simpan Data', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        } else {
            /*
             * Process for non-ajax request
             */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Updates an existing User model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        if ($request->isAjax) {
            /*
             * Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Ubah User",
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Batal', ['class' => 'btn btn-outline-primary pull-left', 'data-bs-dismiss' => "modal"]) .
                        Html::button('Simpan Data', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Konfirmasi Berhasil",
                    'content' => '
                        <div id="modal-konfirmasi" style="margin: 20% 0 20%;">
                            <div class="d-flex justify-content-center mb-3"><img src="/admin/images/sukses.svg"></div>
                            <h5 class="color-text-10 text-center fw-600">Berhasil Mengubah</h5>
                            <p class="text-center color-text-8">-</p>
                        </div><script>modalKonfirmasi();</script>
                    ',
                    'footer' => Html::button('Batal', ['class' => 'btn btn-outline-primary pull-left', 'data-bs-dismiss' => "modal"])
                ];
            } else {
                return [
                    'title' => "Ubah User",
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Batal', ['class' => 'btn btn-outline-primary  pull-left', 'data-bs-dismiss' => "modal"]) .
                        Html::button('Simpan Data', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        } else {
            /*
             * Process for non-ajax request
             */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing User model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if ($request->isAjax) {
            /*
             * Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'forceReload' => '#crud-datatable-pjax',
                'title' => "Konfirmasi Berhasil",
                'content' => '
                        <div id="modal-konfirmasi" style="margin: 20% 0 20%;">
                            <div class="d-flex justify-content-center mb-3"><img src="/admin/images/tong-sampah.svg"></div>
                            <h5 class="color-text-10 text-center fw-600">Berhasil Menghapus</h5>
                            <p class="text-center color-text-8">-</p>
                        </div><script>modalKonfirmasi();</script>
                    ',
                'footer' => Html::button('Batal', ['class' => 'btn btn-outline-primary pull-left', 'data-bs-dismiss' => "modal"])
            ];
        } else {
            /*
             * Process for non-ajax request
             */
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
                if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
