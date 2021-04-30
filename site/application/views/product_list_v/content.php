<div class="main-container">
    <div class="container">
        <h1 class="page-title">Ürünler</h1>
        <p>İşte karşınızda ürünlerimiz</p>
        <div class="separator-2"></div>
        <div class="row">
            <?php foreach($products as $product): ?>
            <div class="col-sm-4">
                <div class="image-box style-2 mb-20 bordered light-gray-bg">
                    <div class="overlay-container overlay-visible">
                        <img src="<?php echo base_url("assets"); ?>/images/portfolio-3.jpg" alt="">
                        <div class="overlay-bottom text-left">
                            <p class="lead margin-clear"><?php echo $product->title; ?></p>
                        </div>
                    </div>
                    <div class="body">
                        <p class="small mb-10 text-muted"><i class="icon-calendar"></i> Dec, 2017 <i class="pl-10 icon-tag-1"></i> Web Design</p>
                        <p><?php echo $product->description;  ?></p>
                        <a href="#" class="btn btn-default btn-sm btn-hvr hvr-sweep-to-right margin-clear">Read More<i class="fa fa-arrow-right pl-10"></i></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>