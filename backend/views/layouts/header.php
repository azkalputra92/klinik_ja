<?php

use yii\bootstrap5\Breadcrumbs;

?>
<!--begin::Header-->
<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
    <!--begin::Header container-->
    <div class="app-container container-fluid d-flex flex-stack" id="kt_app_header_container">
        <!--begin::Header logo-->
        <div class="d-flex d-lg-none align-items-center me-lg-20 gap-1 gap-lg-2">
            <!--begin::Mobile toggle-->
            <div class="btn btn-icon btn-color-gray-500 btn-active-color-primary w-35px h-35px d-flex d-lg-none" id="kt_app_sidebar_toggle">
                <i class="ki-outline ki-abstract-14 lh-0 fs-1"></i>
            </div>
            <!--end::Mobile toggle-->
            <!--begin::Logo image-->
            
            <!--end::Logo image-->
        </div>
        <!--end::Header logo-->
        <!--begin::Header wrapper-->
        <div class="d-flex flex-stack flex-lg-row-fluid" id="kt_app_header_wrapper">
            <!--begin::Page title-->
            <div class="app-page-title d-flex flex-column gap-1 me-3 mb-5 mb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="{default: 'prepend', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_content_container', lg: '#kt_app_header_wrapper'}">
                <!--begin::Title-->
                <h1 class="fs-2 text-gray-900 fw-bold m-0"><?= $this->params['judulHalaman'] ?? ''; ?></h1>
                <!--end::Title-->
                <span class="color-text-8 fs-14"><?= $this->params['subJudul'] ?? ''; ?></span>
            </div>
            <!--end::Page title-->
            <!--begin::Navbar-->
            <div class="app-navbar flex-shrink-0 gap-2 gap-lg-4">
                <div class="app-navbar-item ms-lg-5" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="d-flex align-items-center" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <!--begin:Info-->
                        <div class="text-end d-none d-sm-flex flex-column justify-content-center me-3">
                            <a href="pages/user-profile/overview.html" class="fs-14 color-text-10">Admin</a>
                        </div>
                        <!--end:Info-->
                        <!--begin::User-->
                        <div class="symbol symbol- symbol-40px me-3">
                            <img class="" src="/admin/images/profile.png" alt="" />
                            <div class="position-absolute translate-middle bottom-0 mb-1 start-100 ms-n1 bg-success rounded-circle h-8px w-8px"></div>
                        </div>
                        <!--end::User-->
                    </div>
                    <!--begin::User account menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="/admin/images/profile.png" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">Admin</div>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->

                        <div class="menu-item px-5">
                            <!-- <a href="/site/logout" data-method="post" class="menu-link px-5">Sign Out</a> -->
                            <a href="/admin/site/logout" data-method="post" class="menu-link px-5">Sign Out</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::User account menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::User menu-->
                <!--begin::Sidebar menu toggle-->
                <div class="app-navbar-item d-flex align-items-center d-lg-none me-n2">
                    <a href="#" class="btn btn-icon btn-color-gray-500 btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_panel_toggle">
                        <i class="ki-outline ki-row-vertical fs-1"></i>
                    </a>
                </div>
                <!--end::Sidebar menu toggle-->
            </div>
            <!--end::Navbar-->
        </div>
        <!--end::Header wrapper-->
    </div>
    <!--end::Header container-->
</div>
<!--end::Header-->