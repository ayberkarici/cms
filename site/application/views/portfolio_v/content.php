<!-- main-container start -->
<!-- ================ -->
<section class="main-container padding-bottom-clear">

<div class="container">
    <div class="row">
      <!-- banner start -->
      <!-- ================ -->
      <div class="col-12 pv-40 banner light-gray-bg">
          <!-- slideshow start -->
          <!-- ================ -->
        <div class="slideshow">
            <!-- slider revolution start -->
            <!-- ================ -->
            <div class="slider-revolution-5-container">
              <div id="slider-banner-boxedwidth" class="slider-banner-boxedwidth rev_slider" data-version="5.0">
                <ul class="slides">
                    <?php if(!empty($portfolio_item_image)){ ?>
                    <!-- ================ -->
                    <?php 
                    $i = 0;
                    foreach ($portfolio_item_image  as $portfolio_image) { ?>
                    <li class="text-center" data-transition="slidehorizontal" data-slotamount="default" data-masterspeed="default" data-title="">
                    <!-- main image -->
                        <img src="<?php echo base_url("uploads/portfolio_v/$portfolio_image->img_url") ?>" alt="<?php echo $portfolio_image->img_url ?>" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover" class="rev-slidebg">
                    </li>
                    <?php $i++; } ?>
                    <?php } else {; ?>
                        <li class="text-center" data-transition="slidehorizontal" data-slotamount="default" data-masterspeed="default" data-title="">
                            <!-- main image -->
                            <img src="<?php echo base_url("assets/images/portfolio-1.jpg") ?>" alt="placeholder_img" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover" class="rev-slidebg">
                        </li>
                    <?php } ?>
                </ul>
              </div>
            </div>
            <!-- slider revolution end -->
        </div>
         <!-- slideshow end -->
      </div>
      <!-- banner end -->

    <div class="clearfix"></div>

    <!-- main start -->
    <!-- ================ -->
    <div class="main col-lg-7 pv-40">
        <h1 class="title"><?php echo $portfolio_item->title ?></h1>
        <div class="separator-2"></div>
        <p><?php echo $portfolio_item->description ?></p>
    </div>
    <!-- main end -->

    <!-- sidebar start -->
    <!-- ================ -->
    <aside class="col-lg-7 col-xl-3 ml-xl-auto pv-40">
        <div class="sidebar">
        <div class="block clearfix">
            <h3 class="title"><?php echo $portfolio_item->title ?></h3>
            <div class="separator-2"></div>
            <ul class="list margin-clear">
            <li><strong>Müşter: </strong> <span class="text-right"><?php echo $portfolio_item->client ?></span></li>
            <li><strong>Tarih: </strong> <span class="text-right"><?php echo getReadableDate($portfolio_item->finishedAt) ?></span></li>
            <li><strong>Kategori: </strong> <span class="text-right"><?php echo get_category($portfolio_item->category_id) ?></span></li>
            <li><strong>Yer: </strong> <span class="text-right"><?php echo $portfolio_item->place ?></span></li>
            <li><strong>URL: </strong> <span class="text-right"><a href="<?php echo $portfolio_item->portfolio_url ?>"><?php echo $portfolio_item->portfolio_url ?></a></span></li>
            </ul>
        </div>
        <div class="block clearfix">
            <h3 class="title">Diğer bir <b>iyi iş</b></h3>
            <div class="separator-2"></div>
            <div id="carousel-portfolio-sidebar" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php 
                    $i = 0;
                    foreach ($portfolio_aside_images  as $aside_image) { ?>
                    <li data-target="#carousel-portfolio-sidebar" data-slide-to="<?php echo $i ?>" class="<?php echo ($i == 0) ? "active" : ""; ?>"></li>
                <?php $i++; } ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

                <?php if(!empty($portfolio_aside_images)){ ?>
                <!-- ================ -->
                <?php 
                $i = 0;
                foreach ($portfolio_aside_images  as $aside_image) { ?>
                    <div class="carousel-item <?php echo ($i == 0) ? "active" : "" ;  ?>">
                        <div class="image-box shadow text-center mb-20">
                            <div class="overlay-container">
                            <img src="<?php echo base_url("uploads/portfolio_v/$aside_image->img_url") ?>" alt="<?php echo $aside_image->img_url ?>">
                            <a href="<?php echo base_url("portfolyo-detay/$rand_diff_item->url"); ?>" class="overlay-link">
                                <i class="fa fa-link"></i>
                            </a>
                            </div>
                        </div>
                    </div>
                <?php $i++; } ?>
                <?php } else {; ?>
                    <div class="carousel-item <?php echo ($i == 0) ? "active" : "" ;  ?>">
                        <div class="image-box shadow text-center mb-20">
                            <div class="overlay-container">
                            <img src="<?php echo base_url("assets/images/portfolio-1.jpg") ?>" alt="placeholder_img">
                            <a href="<?php echo base_url("assets/images/portfolio-1.jpg") ?>" class="overlay-link">
                                <i class="fa fa-link"></i>
                            </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
        </div>
        </div>
    </aside>
    <!-- sidebar end -->
    </div>
</div>
</section>
<!-- main-container end -->


