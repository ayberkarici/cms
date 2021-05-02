<div class="main-container">
    <div class="container">
        <h1 class="page-title">Ürünler</h1>
        <p>İşte karşınızda ürünlerimiz</p>
        <div class="separator-2"></div>
        <div class="row">
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
                        <a href="<?php echo base_url("urun-detay/$product->url"); ?>" class="btn btn-default btn-sm btn-hvr hvr-sweep-to-right margin-clear">Görüntüle<i class="fa fa-arrow-right pl-10"></i></a>
                    </div>
                </div>
            </div>
            <?php }; ?>
        </div>
    </div>
</div>