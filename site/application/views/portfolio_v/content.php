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
            <div class="col-lg-7 col-xl-3 ml-xl-auto pv-40">
                <div class="sidebar">
                    <div class="block clearfix">
                        <h3 class="title"><?php echo $portfolio_item->title ?></h3>
                        <div class="separator-2"></div>
                        <ul class="list margin-clear">
                            <li><strong>Müşteri: </strong> <span class="text-right"><?php echo $portfolio_item->client ?></span></li>
                            <li><strong>Tarih: </strong> <span class="text-right"><?php echo getReadableDate($portfolio_item->finishedAt) ?></span></li>
                            <li><strong>Kategori: </strong> <span class="text-right"><?php echo get_category($portfolio_item->category_id) ?></span></li>
                            <li><strong>Yer: </strong> <span class="text-right"><?php echo $portfolio_item->place ?></span></li>
                            <li><strong>URL: </strong> <span class="text-right"><a href="<?php echo $portfolio_item->portfolio_url ?>"><?php echo $portfolio_item->portfolio_url ?></a></span></li>
                        </ul>
                    </div>
                    <div class="block clearfix">



                    </div>
                </div>
            </div>
            <!-- sidebar end -->

            <div class="row">
                <div class="col-md-12">
                    <h3 class="title">Diğer bir <b>iyi iş</b></h3>
                    <div class="separator-2"></div>
                    <div class="image-box style-3-b">

                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="overlay-container">
                                    <?php if($portfolio_aside_image == null) { ?>
                                        <img src="<?php echo base_url("assets/images/portfolio-1.jpg") ?>" alt="placeholder_img">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url("uploads/portfolio_v/$portfolio_aside_image->img_url"); ?>" alt="<?php echo $rand_diff_item->title ?>">
                                    <?php }  ?>
                                    <div class="overlay-to-top">
                                        <p class="small margin-clear"><em><?php echo $rand_diff_item->title ?></em></p>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-6 col-lg-6">
                                <div class="body">
                                    <h3 class="title"><?php echo $rand_diff_item->title ?></h3>
                                    <p class="small mb-10"><i class="icon-calendar"></i> <?php echo getReadableDate($rand_diff_item->finishedAt); ?> <i class="pl-10 icon-tag-1"></i> <?php get_category($rand_diff_item->category_id); ?></p>
                                    <div class="separator-2"></div>
                                    <p class="mb-10"><?php echo $rand_diff_item->description ?></p>
                                    <a href="<?php echo base_url("portfolyo-detay/$rand_diff_item->url"); ?>" class="btn btn-default btn-sm btn-hvr hvr-shutter-out-horizontal margin-clear">Görüntüle<i class="fa fa-arrow-right pl-10"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                </div>
            </div>
 
        </div>
    </div>
</section>
<!-- main-container end -->


