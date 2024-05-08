<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
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
<script>
        // Cari setiap item menu yang tidak memiliki kelas 'active'
        $('li.nav-item:not(.active)').each(function() {
            // Temukan link di dalam item menu
            var $navLink = $(this).find('a.nav-link');

            // Tambahkan kelas 'collapsed' ke link
            $navLink.addClass('collapsed');
        });
</script>

<body>
    <?php $this->beginBody() ?>
    <!-- Page Header Start-->
    <?= $this->render('header') ?>
    <!-- Page Header Ends -->


    <?php
    // require 'menu.php';
    echo $this->render('menu');
    ?>
    <!-- close menus -->



    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
