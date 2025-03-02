<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div id="kt_app_sidebar" class="app-sidebar" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_toggle">
	<!--begin::Header-->
	<div class="d-none d-lg-flex flex-center px-6 pt-10 pb-10" id="kt_app_sidebar_header">
		<a href="#">
			<img alt="Logo" src="/admin/images/logo.jpg" style="width: 40px;">
		</a>
		<h1 class="color-text-1 fs-16" style="padding-left: 12px;">JA Medical Skincare</h1>
	</div>

	<!--end::Header-->
	<div class="flex-grow-1">
		<div id="kt_app_sidebar_menu_wrapper" class="hover-scroll-y" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_header, #kt_app_sidebar_footer" data-kt-scroll-offset="20px" style="height: 247px;">
			<div class="app-sidebar-navs-default px-5 mb-10">
				<div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false" class="menu menu-column menu-rounded menu-sub-indention">
					<!-- <div class="menu-item pb-10 pt-0">
						<?=
						Html::a(
							'<i class="icon" style="margin-left: 4px;">qr_code</i>Kode Pendaftaraan',
							['#'],
							['class' => 'btn btn btn-def-primary  fw-600', 'style' => 'font-size:14px; width: 100%; height:40px']
						)
						?>
					</div> -->
					<div class="menu-item pb-0 pt-0">
						<div class="menu-content">
							<span class="menu-heading">MENU UTAMA</span>
						</div>
					</div>
					<div class="separator mb-4 mx-4"></div>
					<!--begin:Menu item-->
					<div class="menu-item">
						<a class="menu-link" href="/admin/penanganan/index">

							<span class="menu-title">Penanganan</span>
						</a>
					</div>
					<div class="menu-item">
						<a class="menu-link" href="/admin/pasien/index">
							<span class="menu-title">Pasien</span>
						</a>
					</div>
					<div class="menu-item pb-0 pt-10">
						<div class="menu-content">
							<span class="menu-heading">PENGATURAN</span>
						</div>
					</div>
					<div class="separator mb-4 mx-4"></div>
					<div class="menu-item">
						<a class="menu-link" href="/admin/obat/index">
							<span class="menu-title">List Obat</span>
						</a>
					</div>
					<div class="menu-item">
						<a class="menu-link" href="/admin/treatment/index">
							<span class="menu-title">List  Treatment</span>
						</a>
					</div>
					<div class="menu-item">
						<a class="menu-link" href="/admin/user/index">
							<span class="menu-title">User</span>
						</a>
					</div>
				</div>
			</div>

		</div>
	</div>

</div>