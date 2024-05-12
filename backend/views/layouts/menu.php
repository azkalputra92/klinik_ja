<?php

use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\widgets\Menu;

$this->registerJs("
  $(document).ready(function() {
       $('li.nav-item.active').each(function(){
        // Temukan link di dalam item menu aktif
        var navLink = $(this).find('a.nav-link');
        
        // Tambahkan kelas 'collapsed' ke link
        navLink.removeClass('collapsed');
        });
    });
")
?>

<aside id="sidebar" class="sidebar">
    <?php
    $menuItems = [];

    $menuItems[] = [
        'label' => '<i class="bi bi-grid"></i><span>Menu</span>',
        'options' => ['class' => 'nav-link collapsed']
    ];

    $menuItems[] = [
        'label' => '<i class="bi bi-circle"></i><span>Data Pasien</span>',
        'url' => ['/pasien/create']
    ];
    $menuItems[] = [
        'label' => '<i class="bi bi-circle"></i><span>Rekam Medis</span>',
        'url' => ['/pasien/index']
    ];
    $menuItems[] = [
        'label' => '<i class="bi bi-circle"></i><span>Analisis Pasien</span>',
        'url' => ['/analisis-pasien/index']
    ];
    $menuItems[] = [
        'label' => '<i class="bi bi-circle"></i><span>Keluar</span>',
        'url' => ['/site/logout'],
        'options' => ['data-method' => 'post'],

        // 'options' => ['class' => 'nav-link collapsed']
    ];

    echo Menu::widget([
        'items' => $menuItems,
        'activateItems' => true,
        // 'activateParents' => false,
        // 'nonActiveCssClass' => 'collapsed', // Set non-active CSS class here
        'activeCssClass' => 'active',
        'options' => ['class' => 'sidebar-nav', 'id' => 'sidebar-nav',],
        'itemOptions' => ['class' => 'nav-item'],
        'linkTemplate' => '<a class="nav-link collapsed" href="{url}"> {label}</a>',
        'encodeLabels' => false,
        'submenuTemplate' => '<ul class="sidebar-nav" >{items}</ul>',
        'activateParents' => false,
        'firstItemCssClass' => 'first-menu'

    ]);
    ?>
    <ul class="nav nav-aside mg-b-0">
        <li class="nav-item"><a href="/admin/admin-account/edit-profile" class="nav-link"><i data-feather="edit"></i> <span>Edit Profile</span></a></li>
        <li class="nav-item"><a href="/admin/admin-account/change-password" class="nav-link"><i data-feather="key"></i> <span>Change Password</span></a></li>
        <li class="nav-item"><a href="/site/logout" data-method="POST" class="nav-link"><i data-feather="log-out"></i> <span>Sign Out</span></a></li>
    </ul>
</aside><!-- End Sidebar-->