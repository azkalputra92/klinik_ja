<?php

namespace backend\controllers;

use Yii;
use common\models\RiwayatMedisPasien;
use backend\models\RiwayatMedisPasienSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\filters\AccessControl;


/**
 * RiwayatMedisPasienController implements the CRUD actions for RiwayatMedisPasien model.
 */
class RiwayatMedisPasienController extends Controller
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
                        //'actions' => ['index', 'view', 'update','create','delete','bulkdelete'],
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
    * Lists all RiwayatMedisPasien models.
    * @return mixed
    */
    public function actionIndex()
    {
        $searchModel = new RiwayatMedisPasienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
    * Displays a single RiwayatMedisPasien model.
    * @param integer $id
    * @return mixed
    */
    public function actionView($id_pasien)
    {
        $request = Yii::$app->request;
        $model = RiwayatMedisPasien::findOne(['id_pasien' => $id_pasien]);
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title'=> "Riwayat Medis Pasien",
                'size' => "large",
                'content'=>$this->renderAjax('view', [
                    'model' => $model,
                ]),
                'footer'=> Html::a('Ubah Data', ['update', 'id' => $model->id], ['class' => 'btn btn-primary fs-14', 'role' => 'modal-remote']).
                Html::button('Tutup',['class'=>'btn btn-default pull-left','data-bs-dismiss'=>"modal"])
                    

            ];
        }else{
            return $this->render('view', [
                'model' => $model,
            ]);
        }
    }

    /**
    * Creates a new RiwayatMedisPasien model.
    * For ajax request will return json object
    * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
    * @return mixed
    */
    public function actionCreate($id_pasien)
    {
        $request = Yii::$app->request;
        $model = new RiwayatMedisPasien();
        $model->id_pasien = $id_pasien;

        if($request->isAjax){
            /*
            * Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Tambah Data Riwayat Medis Pasien",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Tutup',['class'=>'btn btn-default pull-left fs-14','data-bs-dismiss'=>"modal"]).
                            Html::button('Simpan',['class'=>'btn btn-primary fs-14','type'=>"submit"])
                ];
            } else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Tambah Data RiwayatMedisPasien",
                    'content' => '
                            <div class="d-flex justify-content-center mb-3"><img src="/gif/konfirmasisukses.gif" width="150"></div>
                            <h5 class="text-dark text-center pb-2">Berhasil Tambah data</h5>',
                    'footer'=> Html::button('Tutup',['class'=>'btn btn-default pull-left fs-14','data-bs-dismiss'=>"modal"]).
                            Html::a('Tambah Lagi',['create'],['class'=>'btn btn-primary fs-14','role'=>'modal-remote'])
                ];
            } else{
                return [
                    'title'=> "Tambah Data Riwayat Medis Pasien",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Tutup',['class'=>'btn btn-default pull-left fs-14','data-bs-dismiss'=>"modal"]).
                            Html::button('Simpan',['class'=>'btn btn-primary fs-14','type'=>"submit"])
                ];
            }
        }else{
            /*
            * Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else{
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
    * Updates an existing RiwayatMedisPasien model.
    * For ajax request will return json object
    * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
    * @param integer $id
    * @return mixed
    */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        if($request->isAjax){
            /*
            * Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Ubah Data Riwayat Medis Pasien",
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Tutup',['class'=>'btn btn-default pull-left','data-bs-dismiss'=>"modal"]).
                            Html::button('Simpan',['class'=>'btn btn-primary','type'=>"submit"])
                ];
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Riwayat Medis Pasien #".$id,
                    'content'=> '
                            <div class="d-flex justify-content-center mb-3"><img src="/gif/konfirmasisukses.gif" width="150"></div>
                            <h5 class="text-dark text-center pb-2">Berhasil Ubah data</h5>',
                    'footer'=> Html::button('Tutup',['class'=>'btn btn-default pull-left','data-bs-dismiss'=>"modal"]).
                            Html::a('Ubah',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];
            }else{
                return [
                    'title'=> "Ubah Data RiwayatMedisPasien #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Tutup',['class'=>'btn btn-default pull-left','data-bs-dismiss'=>"modal"]).
                            Html::button('Simpan',['class'=>'btn btn-primary','type'=>"submit"])
                ];
            }
        }else{
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
    * Delete an existing RiwayatMedisPasien model.
    * For ajax request will return json object
    * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
    * @param integer $id
    * @return mixed
    */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            * Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            * Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
    }

    /**
    * Delete multiple existing RiwayatMedisPasien model.
    * For ajax request will return json object
    * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
    * @param integer $id
    * @return mixed
    */
    public function actionBulkdelete()
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            * Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            * Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
    }

    /**
    * Finds the RiwayatMedisPasien model based on its primary key value.
    * If the model is not found, a 404 HTTP exception will be thrown.
    * @param integer $id
    * @return RiwayatMedisPasien the loaded model
    * @throws NotFoundHttpException if the model cannot be found
    */
    protected function findModel($id)
    {
                if (($model = RiwayatMedisPasien::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}