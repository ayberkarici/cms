<!-- main-container start -->
<!-- ================ -->
<section class="main-container padding-ver-clear">
    <div class="container pv-40">
        <br>
        <br>
        <br>
        <div class="row">
        <div class="main col-lg-6">
            <div class="col-md-12  ">
                <!-- slideshow start -->
                <!-- ================ -->
                <div class="slideshow">
                    <!-- slider revolution start -->
                    <!-- ================ -->
                    <div class="slider-revolution-5-container">
                        <div id="slider-banner-boxedwidth" class="slider-banner-boxedwidth rev_slider" data-version="5.0">
                            <ul class="slides">
                            
                                <li class="text-center" data-transition="slidehorizontal" data-slotamount="default" data-masterspeed="default" data-title="">
                                    <!-- main image -->
                                    <img src="<?php echo base_url("uploads/$viewFolder/".get_product_cover_image($product->id)); ?>" alt="placeholder_img" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover" class="rev-slidebg">
                                </li>
                                <?php 
                                $product_images = get_sub_images($product->id);
                                foreach($product_images as $subImage){ ?>

                                    <li class="text-center " data-transition="slidehorizontal" data-slotamount="default" data-masterspeed="default" data-title="">
                                        <!-- main image -->
                                        <img src="<?php echo base_url("uploads/$viewFolder/$subImage->img_url"); ?>" alt="placeholder_img" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover" class="rev-slidebg ">
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
        </div>




        <!-- main start -->
        <!-- ================ -->
        <div class="main col-lg-6">
            <h1 class="title"><?php echo $product->title ?></h1>
            <div class="separator-2"></div>
            <?php echo $product->description ?>
        </div>
        <!-- main end -->


        </div>
    </div>
</section>
<!-- main-container end -->

<!-- section start -->
<!-- ================ -->
<section class="section  pv-40 clearfix">
    <div class="container">
        <h3 class="mt-3">Diğer <strong>Ürünler</strong></h3>
        <div class="row grid-space-10">

            <?php foreach($products as $product) { ?>
            <div class="col-sm-4">
                <div class="image-box style-2 mb-20 bordered light-gray-bg">
                    <div class="overlay-container overlay-visible">
                        <?php 
                            $image = get_product_cover_image($product->id);
                            $image = ($image != "") ? "http://localhost/cms/site/uploads/product_v/".get_product_cover_image($product->id) : base_url("assets/images/page-about-1.jpg") ; 
                        ?>

                        <img src='<?php echo $image; ?>' alt='<?php echo $product->url; ?>'>
                                
                        <div class="overlay-bottom text-left">
                            <p class="lead margin-clear"><?php echo $product->title; ?></p>
                        </div>
                    </div>
                    <div class="body">
                        <p><?php echo character_limiter(strip_tags($product->description), 40);?></p>
                        <a href="<?php echo base_url("home/product_detail/$product->url"); ?>" class="btn btn-default btn-sm btn-hvr hvr-sweep-to-right margin-clear">Görüntüle<i class="fa fa-arrow-right pl-10"></i></a>
                    </div>
                </div>
            </div>
            <?php }; ?>
        
        </div>
    </div>
</section>
<!-- section end -->


