<?php 
use yii\helpers\Url;
?>
<div class="header_product">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="index.html"
            ><img src="/images/logo.png"
          /></a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="collapse navbar-collapse"
            style="justify-content: flex-end"
            id="navbarSupportedContent"
          >
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="<?= Url::toRoute(['index'])?>">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= Url::toRoute(['treatment'])?>">Treatment</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= Url::toRoute(['product'])?>">Products</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- banner section start -->
      <div class="banner_section">
        <div class="container">
          <div id="carouselExampleIndicators" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-sm-6 mt-5">
                    <div>
                      <span
                        style="
                          color: #606161;
                          font-size: 76px;
                          font-family: Montserrat;
                          font-weight: 500;
                          line-height: 89px;
                          word-wrap: break-word;
                        "
                        >Our Products</span
                      >
                    </div>
                    <p class="banner_text">
                      All our treatments are performed with medical-grade
                      equipment and advanced technology, also performed by our
                      experienced doctors, registered nurses, and trained
                      therapists.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- banner section end -->
    </div>
    <!-- header section end -->
    <!-- services section start -->
    <div class="card-main pb-5">
      <div class="container">
        <div class="services_section_2">
          <div class="row">
            <?php foreach ($model as $key => $value) { ?>
            <div class="col-md-6 mb-3 ">
              <div class="services_box row h-100">
                <div class="col-6">
                  <img src="<?= Url::to(['/file','id'=>$value->gambar])?>" />
                </div>
                <div class="col-6">
                  <div class="title_treatment"><?= $value->nama ?></div>
                  <span> Rp <?= number_format($value->harga) ?> </span>
                  <div class="buy_shopee ">
                    <a href="<?= $value->url ?>" target='_blank'>
                      <img src="/images/shopee.svg" />Buy Now!</a
                    >
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
           
          </div>
        </div>
      </div>
    </div>
    <!-- services section end -->