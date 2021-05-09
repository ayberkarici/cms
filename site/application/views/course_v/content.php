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
                    <li class="text-center" data-transition="slidehorizontal" data-slotamount="default" data-masterspeed="default" data-title="">
                        <img src="<?php echo base_url("uploads/courses_v/$course_item->img_url") ?>" alt="placeholder_img" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover" class="rev-slidebg">
                    </li>
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
        <h1 class="title"><?php echo $course_item->title ?></h1>
        <div class="separator-2"></div>
        <p><?php echo $course_item->description ?></p>
    </div>
    <!-- main end -->

    <!-- sidebar start -->
    <!-- ================ -->
    <aside class="col-lg-7 col-xl-3 ml-xl-auto pv-40">
        <div class="sidebar">
        <div class="block clearfix">
            <h3 class="title"><?php echo $course_item->title ?></h3>
            <div class="separator-2"></div>
            <ul class="list margin-clear">
            <li><strong>Adı: </strong> <span class="text-right"><?php echo $course_item->title ?></span></li>
            <li><strong>Tarih: </strong> <span class="text-right"><?php echo getReadableDate($course_item->event_date) ?></span></li>
            </ul>
        </div>
        <div class="block clearfix">
            <h3 class="title">Başka bir eğitime bakın</h3>
            <div class="separator-2"></div>
            <div id="carousel-portfolio-sidebar" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <!-- randon item image -->
                <li data-target="#carousel-portfolio-sidebar" class="active"></li>
                
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

                    <div class="carousel-item active">
                        <div class="image-box shadow text-center mb-20">
                            <div class="overlay-container">
                            <img src="<?php echo base_url("uploads/courses_v/$rand_diff_item->img_url") ?>" alt="<?php echo $rand_diff_item->img_url ?>">
                            <a href="<?php echo base_url("egitim-detay/$rand_diff_item->url"); ?>" class="overlay-link">
                                <i class="fa fa-link"></i>
                            </a>
                            </div>
                        </div>
                    </div>

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


