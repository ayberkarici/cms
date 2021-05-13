
<!-- main-container start -->
<!-- ================ -->
<section class="main-container">

<div class="container">
    <div class="row">

    <!-- main start -->
    <!-- ================ -->
    <div class="main col-12">

        <!-- page-title start -->
        <!-- ================ -->
        <h1 class="page-title">Portfolyo Listesi</h1>
        <div class="separator-2"></div>
        <!-- page-title end -->
        <p class="lead">Aşağıda sizin için seçtiğimiz bazı işlerimizi görebilirsiniz.</p>
        <?php foreach($portfolios as $portfolio){ ?>
            <div class="image-box style-3-b">
                <div class="row">
                    <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="overlay-container">
                        <?php 
                            $image = get_portfolio_cover_image($portfolio->id);
                            $image = ($image != "") ? "http://localhost/cms/site/uploads/portfolio_v/".get_portfolio_cover_image($portfolio->id) : base_url("assets/images/page-about-1.jpg") ; 
                        ?>

                        <img src='<?php echo $image; ?>' alt='<?php echo $portfolio->url; ?>'>
                        <div class="overlay-to-top">
                        <p class="small margin-clear"><em><?php echo $portfolio->client ?></em></p>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6 col-lg-8 col-xl-9">
                    <div class="body">
                        <h3 class="title"><a href="<?php echo base_url("portfolyo-detay/$portfolio->url"); ?>"><?php echo $portfolio->title ?></a></h3>
                        <p class="small mb-10"><i class="icon-calendar"></i> <?php echo getReadableDate($portfolio->finishedAt) ?> <i class="pl-10 icon-tag-1">
                        <?php
                            $category = get_category($portfolio->category_id); 
                            if($category):?>
                        </i> <?php echo $category?>
                        <?php endif; ?>
                        </p>
                        <div class="separator-2"></div>
                        <p class="mb-10"><?php echo strip_tags($portfolio->description) ?> </p>
                        <a href="<?php echo base_url("portfolyo-detay/$portfolio->url"); ?>" class="btn btn-animated btn-default">Görüntüle <i class="fa fa-arrow-right"></i></a>
                    </div>
                    </div>
                </div>
            </div>
        <?php } ?>

 
    </div>
    <!-- main end -->

    </div>
</div>
</section>
<!-- main-container end -->