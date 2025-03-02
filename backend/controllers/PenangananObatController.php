<?php

namespace backend\controllers;

use Yii;
use common\models\PenangananObat;
use backend\models\PenangananObatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;

/**
 * PenangananObatController implements the CRUD actions for PenangananObat model.
 */
class PenangananObatController extends Controller
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
     * Lists all PenangananObat models.
     * @return mixed
     */
    public function actionIndex($id_penanganan = null)
    {
        $request = Yii::$app->request;
        $searchModel = new PenangananObatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['id_penanganan'=>$id_penanganan]);
        
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "PenangananObat",
                'content' => $this->renderAjax('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'id_penanganan' => $id_penanganan,
                ]),
                'footer' => Html::button('Batal', ['class' => 'btn btn-outline-primary pull-left', 'data-bs-dismiss' => "modal"]) 
            ];
        } else {
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'id_penanganan' => $id_penanganan,
            ]);
        }
            
    }

    /**
     * Displays a single PenangananObat model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "PenangananObat",
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
     * Creates a new PenangananObat model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_penanganan)
    {
        $request = Yii::$app->request;
        $model = new PenangananObat();
        $model->id_penanganan = $id_penanganan;
        $model->id_pasien = $model->penanganan->id_pasien;
        if ($request->isAjax) {
            /*
             * Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Tambah Penanganan Obat",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => 
                        Html::a('Batal', ['index','id_penanganan'=>$id_penanganan],['class' => 'btn btn-outline-primary pull-left', 'role' => 'modal-remote']).
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
                                Html::a('Batal', ['index','id_penanganan'=>$id_penanganan],['class' => 'btn btn-outline-primary pull-left', 'role' => 'modal-remote']).
                                Html::a('Tambah Lagi', ['create','id_penanganan'=>$id_penanganan], ['class' => 'btn btn-primary', 'role' => 'modal-remote', 'onclick'=>'showSiblingModel()' ]) . 
                            '</div>
                        </div>
                        <script>modalKonfirmasi(false,false);</script>
                    ',
                    'footer' => 
                        Html::a('Batal', ['index','id_penanganan'=>$id_penanganan],['class' => 'btn btn-outline-primary pull-left', 'role' => 'modal-remote']).
                        Html::a('Tambah Lagi', ['create','id_penanganan'=>$id_penanganan], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Tambah Penanganan Obat",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => 
                        Html::a('Batal', ['index','id_penanganan'=>$id_penanganan],['class' => 'btn btn-outline-primary pull-left', 'role' => 'modal-remote']).
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
     * Updates an existing PenangananObat model.
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
                    'title' => "Ubah Penanganan Obat",
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
                    'title' => "Ubah Penanganan Obat",
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
     * Delete an existing PenangananObat model.
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

    /**
     * Finds the PenangananObat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PenangananObat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
                if (($model = PenangananObat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
