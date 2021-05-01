<!-- main-container start -->
<!-- ================ -->
<section class="main-container padding-ver-clear">
    <div class="container pv-40">
        <div class="row">
        <div class="main col-lg-6">
            <!-- Tab panes -->
            <div class="tab-content space-bottom">
                <div class="tab-pane active" id="pill-1">
                    <?php 
                        $image = get_product_cover_image($product->id);
                        $image = ($image != "") ? "http://localhost/cms/site/uploads/product_v/".get_product_cover_image($product->id) : base_url("assets/images/page-about-1.jpg") ; 
                    ?>

                    <div class="shadow bordered">
                        <div class="overlay-container">
                            <img src='<?php echo $image; ?>' alt='<?php echo $product->url; ?>'>
                            <a href='<?php echo $image; ?>' class="overlay-link popup-img" title='<?php echo $product->url; ?>'>
                            <i class="fa fa-search"></i>
                            </a>
                        </div>
                    </div>

                    <div class="space-bottom"></div>

                    <div class="row grid-space-20">
                        <?php 
                        $subImages = get_sub_images($product->id);

                        if($subImages != "") { 
                            foreach ($subImages as $subImage) {
                                
                        ?>

                        <div class="col-3">
                            <div class="overlay-container">
                                <img src="<?php echo base_url("uploads/$viewFolder/$subImage->img_url"); ?>" alt="">
                                <a href="<?php echo base_url("uploads/$viewFolder/$subImage->img_url"); ?>" class="overlay-link small popup-img" title="<?php echo $subImage->img_url ?> ">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div>
                        </div>
                        <?php }} ?> 

                    </div>

                </div>
            </div>
                <!-- pills end -->
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


