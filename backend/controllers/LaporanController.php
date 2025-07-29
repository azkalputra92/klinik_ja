<?php

namespace backend\controllers;
use kartik\mpdf\Pdf;
use common\models\LoginForm;
use common\models\Penanganan;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\base\DynamicModel;
/**
 * Laporan controller
 */
class LaporanController extends Controller
{
    public function actionIndex()
    {
        $request = Yii::$app->request;

        $model = new DynamicModel(['tanggal_dari', 'tanggal_sampai']);
        $model->addRule(['tanggal_dari', 'tanggal_sampai'], 'safe');
        $model->addRule(['tanggal_dari', 'tanggal_sampai'], 'required');
        $model->tanggal_dari = date('Y-m-d');
        $model->tanggal_sampai = date('Y-m-d');
        if ($request->isPost and $model->load($request->post())) {

            $data = Penanganan::find()
            ->andFilterWhere(['BETWEEN', 'tanggal', $model->tanggal_dari, $model->tanggal_sampai])
            ->all();
            $content = $this->renderPartial('cetak', [
                'data' => $data,
                'model' => $model,
            ]);
            return $this->generatePdf($content);
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }
    private function generatePdf($content)
    {
        $pdf = new Pdf([
            'filename' => 'Laporan Pasien JA Medical Skincare.pdf',
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'format' => Pdf::FORMAT_FOLIO,
            'content' => $content,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'methods' => [
                'SetFooter' => ['<hr style="margin:0;padding:0" />
                            <div style="margin:5px;padding:0;width:100%;overflow: hidden;">
                                <div style="width:50%;float: left;text-align:left">
                                <i style="font-size:7pt">Print ' . date("d/m/Y H:i") . '  WIB</i>
                                </div>
                                <div style="width:50%;float: left;text-align:right">
                                <i style="font-size:7pt">Halaman ke {PAGENO} dari {nb}</i>
                                </div>
                            </div>'],
            ]
        ]);
        $pdf->tempPath = Yii::getAlias('@common/temp');

        return $pdf->render();
    }
}
