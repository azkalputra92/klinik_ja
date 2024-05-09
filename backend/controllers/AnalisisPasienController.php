<?php

namespace backend\controllers;

use Yii;
use common\models\AnalisisPasien;
use backend\models\AnalisisPasienSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * AnalisisPasienController implements the CRUD actions for AnalisisPasien model.
 */
class AnalisisPasienController extends Controller
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
    * Lists all AnalisisPasien models.
    * @return mixed
    */
    public function actionIndex()
    {
        $searchModel = new AnalisisPasienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
    * Displays a single AnalisisPasien model.
    * @param integer $id
    * @return mixed
    */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title'=> "AnalisisPasien",
                'content'=>$this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-bs-dismiss'=>"modal"]).
                        Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
            ];
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
    * Creates a new AnalisisPasien model.
    * For ajax request will return json object
    * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
    * @return mixed
    */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new AnalisisPasien();

        if ($request->isAjax) {
            /*
            * Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($model->load($request->post()) && $model->hitungHasil()) {

                $redirect =  Url::base(true) . '/hasil-analisis-pasien/index';
                return $this->asJson([
                    'success' => true,
                    'reset' => true,
                    'title' => " ",
                    'content' => "<div class='d-flex justify-content-center mb-3'><img src='/gif/konfirmasisukses.gif' width='150'></div>
                                <h5 class='text-dark text-center pb-2'>Berhasil tambah data</h5>
                                <script> redirectPage('$redirect');</script>
                            ",
                    'footer' => false,
                ]);
            }
            $result = [];
            // The code below comes from ActiveForm::validate(). We do not need to validate the model
            // again, as it was already validated by save(). Just collect the messages.
            foreach ($model->getErrors() as $attribute => $errors) {
                $result[Html::getInputId($model, $attribute)] = $errors;
            }

            if (!empty($result)) {
                return $this->asJson(['validation' => $result]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        } else {
            /*
            * Process for non-ajax request
            */

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
    * Updates an existing AnalisisPasien model.
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
                    'title'=> "Ubah Data AnalisisPasien",
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Tutup',['class'=>'btn btn-default pull-left','data-bs-dismiss'=>"modal"]).
                            Html::button('Simpan',['class'=>'btn btn-primary','type'=>"submit"])
                ];
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "AnalisisPasien #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Tutup',['class'=>'btn btn-default pull-left','data-bs-dismiss'=>"modal"]).
                            Html::a('Ubah',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];
            }else{
                return [
                    'title'=> "Ubah Data AnalisisPasien #".$id,
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
    * Delete an existing AnalisisPasien model.
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
    * Delete multiple existing AnalisisPasien model.
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
    * Finds the AnalisisPasien model based on its primary key value.
    * If the model is not found, a 404 HTTP exception will be thrown.
    * @param integer $id
    * @return AnalisisPasien the loaded model
    * @throws NotFoundHttpException if the model cannot be found
    */
    protected function findModel($id)
    {
                if (($model = AnalisisPasien::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}