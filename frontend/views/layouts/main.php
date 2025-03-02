<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
    <?= $content ?>
    <div class="p-5">
      <div class="row p-5">
         <div class="col-md-6 ">
            <img src="/images/logo footer.png">
         </div>
         <div class="col-md-2">
         </div>
         <div class="col-md-3">
            <div style="text-align: right; color: #606161; font-size: 24px; font-family: Montserrat; font-style: italic; font-weight: 300; line-height: 36px; word-wrap: break-word">
               <br>
               <br>
               Visit Us, We'd Love to See You...
            </div>
         </div>
      </div>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
