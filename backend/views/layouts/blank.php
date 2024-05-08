<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\models\Pegawai;
use common\models\PegawaiCabang;
use common\models\RefCabang;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="page-profile">

    <?php $this->beginBody() ?>

    <header class="navbar navbar-header navbar-header-fixed">
        <div class="navbar-brand">
            <a href="../../" class="df-logo"><img src="/img/logo-gunung-sari.png" alt="" width="163"></a>
        </div><!-- navbar-brand -->


       
    </header>



    <div class="content-body">
        <!-- <div class="container pd-x-0"> -->
        <?= $content ?>
        <!-- </div> -->
    </div>
    </div>

    <?php $this->endBody() ?>
</body>

<footer class="footer d-flex justify-content-center" style="position: fixed; width: 100%; bottom: 0;">
    <span>&copy; 2023 Gunung Sari Supermarket Created by Codinglab.id </span>
</footer>

</html>
<?php $this->endPage();
