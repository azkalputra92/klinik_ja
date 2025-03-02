<?php 
use Yii;
use yii\helpers\Url;


?>
<div class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="../"
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
          <div class="collapse navbar-collapse" style="justify-content: flex-end;" id="navbarSupportedContent">
            <ul class="navbar-nav ">
               <li class="nav-item">
                  <a class="nav-link" href="../">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="<?= Url::toRoute(['treatment']); ?>">Treatment</a>
                  
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="<?= Url::toRoute(['product']); ?>">Products</a>
               </li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- banner section start -->
      <div class="banner_section layout_padding">
        <div class="container">
          <div id="carouselExampleIndicators" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-sm-6">
                    <div>
                      <span
                        style="
                          color: #606161;
                          font-size: 39px;
                          font-family: Montserrat;
                          font-style: italic;
                          font-weight: 300;
                          line-height: 58.5px;
                          word-wrap: break-word;
                        "
                        >Radiance Redefined: <br /></span
                      ><span
                        style="
                          color: #606161;
                          font-size: 76px;
                          font-family: Montserrat;
                          font-weight: 500;
                          line-height: 93.48px;
                          word-wrap: break-word;
                        "
                        >Where Beauty </span
                      ><span
                        style="
                          color: #606161;
                          font-size: 76px;
                          font-family: Montserrat;
                          font-weight: 500;
                          line-height: 89px;
                          word-wrap: break-word;
                        "
                        >Meets Perfection</span
                      >
                    </div>
                    <p class="banner_text">
                      JA Medical Skincare is a beauty clinic that provides laser treatment,
                      slimming, hair removal treatment and toning which give you
                      a feeling of pampered, relaxed and revitalized.
                      Using customized treatment plans and medical
                      experience will help you achieve and enhance your natural
                      beauty and improve your skin.
                    </p>
                    <div class="started_text"><a href="#">Contact Us Now!</a></div>
                  </div>
                  <div class="col-sm-6">
                    <div class="banner_img">
                      <img src="/images/gambar1.png" />
                    </div>
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
    <div class="row " style="padding-left:25%;">
      <div class="col-md-12 mt-5">
         <img src="/images/Vector.svg"/>
      </div>
    </div>
    <div class="header_section mt-5">
      <!-- banner section start -->
      <div class="banner_section layout_padding">
        <div class="container">
          <div id="carouselExampleIndicators" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-sm-6">
                     <div class="banner_img">
                       <img src="/images/dokjes.png" />
                     </div>
                   </div>
                  <div class="col-sm-6 text-center">
                    <div>
                      <span
                        style="
                          color: #606161;
                          font-size: 39px;
                          font-family: Montserrat;
                          font-style: italic;
                        "
                        >Hi! Let’s Meet <br /></span
                      ><span
                        style="
                          color: #606161;
                          font-size: 76px;
                          font-family: Montserrat;
                        "
                        >Our Doctor </span
                      >
                    </div>
                     She passionately works in aesthetic fields since 2016. Started from Singapore, hard work leads her to get the award of 3rd best doctor in Jakarta Utara. Several National health research magazines published her research in beauty.
                    </p>
                    <br>
                    <span
                        style="
                          color: #3771C8;
                          font-size: 24px;
                          
                        "
                        >dr. Jessica Angelina pplm. AAAM </span
                      >
                      <br>
                      <span style="
                      font-size: 16px;
                        ">
                        Head Doctor of JA Medical Skincare
                      </span>
                      
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- banner section end -->
    </div>
    <div class="header_section flex-container-center">
         <div class="row p-5 w-50">
            <div class = "col-md-12 text-center">
                  <span
                  style="
                     color: #606161;
                     font-size: 50px;
                     font-family: Montserrat;
                  ">
                  Visit and Contact Us
               </span>
            </div>
            <div class="col-md-6">
            <div class="started_text"><a href="#"> <img src="/images/map.svg"/> Our Location</a></div>
            </div>
            <div class="col-md-6">
               <div class="started_text"><a href="#"><img src="/images/whatsapp.svg"/> Contact Us Now!</a></div>
            </div>
         </div>
    </div>