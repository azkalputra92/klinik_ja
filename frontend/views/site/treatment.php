<div class="header_treatment">
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
             <div class="collapse navbar-collapse" style="justify-content: flex-end;" id="navbarSupportedContent">
               <ul class="navbar-nav ">
                 <li class="nav-item">
                   <a class="nav-link" href="index">Home</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="treatment">Treatment</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="product">Products</a>
                 </li>
               </ul>
             </div>
           </nav>
         </div>
         <!-- banner section start -->
         <div class="banner_section ">
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
                           >Our Treatments</span
                         >
                       </div>
                       <p class="banner_text">
                        All our treatments are performed with medical-grade equipment and advanced technology, also performed by our experienced doctors, registered nurses, and trained therapists.
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
                    <div class="col-md-6 mb-4">
                      <div class="services_box">
                          <div class="title_treatment"><?= $value->nama ?></div>
                          <span>
                            <?= $value->keterangan ?>
                            <br/>
                          </span>
                          <span class = 'title_desk_treatment'>
                            Prosedur : 
                          </span>
                          <span >
                            <?= $value->prosedur ?>
                            <br/>
                          </span>
                          <span class = 'title_desk_treatment'>
                            Durasi : 
                          </span>
                          <span >
                            <?= $value->durasi ?>
                            <br/>
                          </span>
                      </div>
                    </div>
                  <?php } ?>

                </div>
            </div>
         </div>
      </div>