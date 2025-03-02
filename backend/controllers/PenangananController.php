<?php

namespace backend\controllers;

use Yii;
use common\models\Penanganan;
use backend\models\PenangananSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;

/**
 * PenangananController implements the CRUD actions for Penanganan model.
 */
class PenangananController extends Controller
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
    public function beforeAction($action)
    {            
        $this->enableCsrfValidation = false;
    
        return parent::beforeAction($action);
    }
    /**
     * @inheritdoc
     */
    /**
     * Lists all Penanganan models.
     * @return mixed
     */
    public function actionIndex()
    {
            $searchModel = new PenangananSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->orderBy(['id' => SORT_DESC]);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
            }

    /**
     * Displays a single Penanganan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "Penanganan",
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
     * Creates a new Penanganan model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Penanganan();
        // $model->tanggal = date('d-m-Y');
        $model->tanggal = date('Y-m-d');
        
        if ($request->isAjax) {
            /*
             * Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Tambah Penanganan",
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
                        <div class="text-end">
                            <button type="button" class="btn-close text-7" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div id="modal-konfirmasi" style="margin: 5% 0 7%;">
                            <div class="d-flex justify-content-center mb-5"><img src="/admin/images/sukses.svg" class="mb-5"></div>
                            <h5 class="color-text-10 text-center fw-600 mb-5">Berhasil Membuat</h5>
                            <p class="text-center color-text-7 fs-14 mb-5">-</p>
                            <div class="d-flex justify-content-center pt-3"> '  .
                                Html::button('Batal', ['class' => 'btn btn-outline-primary pull-left', 'data-bs-dismiss' => "modal"]) .
                                Html::a('Tambah Lagi', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote', 'onclick'=>'showSiblingModel()' ]) . 
                            '</div>
                        </div>
                        <script>modalKonfirmasi(false,false);</script>
                    ',
                    'footer' => Html::button('Batal', ['class' => 'btn btn-outline-primary pull-left', 'data-bs-dismiss' => "modal"]) .
                        Html::a('Tambah Lagi', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Tambah Penanganan",
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
     * Updates an existing Penanganan model.
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
                    'title' => "Ubah Penanganan",
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
                        <div class="text-end">
                            <button type="button" class="btn-close text-7" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div id="modal-konfirmasi" style="margin: 5% 0 7%;">
                            <div class="d-flex justify-content-center mb-5"><img src="/admin/images/sukses.svg" class="mb-5"></div>
                            <h5 class="color-text-10 text-center fw-600 mb-5">Berhasil Mengubah</h5>
                            <p class="text-center color-text-7 fs-14 mb-5">-</p>
                            <div class="text-center pt-3">' . 
                                Html::button('Tutup', ['class' => 'btn btn-def-warning btn-block  btn-sm', 'data-bs-dismiss' => "modal"]) 
                        . '</div>
                        </div><script>modalKonfirmasi(false,false);</script>
                    ',
                    'footer' => Html::button('Batal', ['class' => 'btn btn-outline-primary pull-left', 'data-bs-dismiss' => "modal"])
                ];
            } else {
                return [
                    'title' => "Ubah Penanganan",
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
     * Delete an existing Penanganan model.
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
                        <div class="text-end">
                            <button type="button" class="btn-close text-7" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div id="modal-konfirmasi" style="margin: 5% 0 7%;">
                            <div class="d-flex justify-content-center mb-5"><img src="/admin/images/tong-sampah.svg" class="mb-5"></div>
                            <h5 class="color-text-10 text-center fw-600 mb-5">Berhasil Menghapus</h5>
                            <p class="text-center color-text-7 fs-14 mb-5">-</p>
                            <div class="text-center pt-3">' . 
                                Html::button('Tutup', ['class' => 'btn btn-def-warning btn-block  btn-sm', 'data-bs-dismiss' => "modal"]) 
                        . '</div>
                        </div><script>modalKonfirmasi(false,false);</script>
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
    public function actionUpdateStatus($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        if($model->status == 'Antrian'){
            $model->status = 'Penanganan';
        }elseif($model->status == 'Penanganan'){
            $model->status = 'Selesai Treatment';
        }elseif($model->status == 'Selesai Treatment'){
            $model->status = 'Selesai';
        }
        $model->save(false);

        if ($request->isAjax) {
            /*
             * Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'forceReload' => '#crud-datatable-pjax',
                'title' => "Konfirmasi Berhasil",
                'content' => '
                        <div class="text-end">
                            <button type="button" class="btn-close text-7" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div id="modal-konfirmasi" style="margin: 5% 0 7%;">
                            <div class="d-flex justify-content-center mb-5"><img src="/admin/images/sukses.svg" class="mb-5"></div>
                            <h5 class="color-text-10 text-center fw-600 mb-5">Berhasil Update Status</h5>
                            <p class="text-center color-text-7 fs-14 mb-5">-</p>
                            <div class="text-center pt-3">' . 
                                Html::button('Tutup', ['class' => 'btn btn-def-warning btn-block  btn-sm', 'data-bs-dismiss' => "modal"]) 
                        . '</div>
                        </div><script>modalKonfirmasi(false,false);</script>
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
     * Finds the Penanganan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Penanganan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
                if (($model = Penanganan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
