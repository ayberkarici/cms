
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
                        <img src="<?php echo base_url("assets/images") ?>/portfolio-1.jpg" alt="">
                        <div class="overlay-to-top">
                        <p class="small margin-clear"><em><?php echo $portfolio->client ?> <br> Lorem ipsum dolor sit</em></p>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6 col-lg-8 col-xl-9">
                    <div class="body">
                        <h3 class="title"><a href="portfolio-item.html"><?php echo $portfolio->title ?></a></h3>
                        <p class="small mb-10"><i class="icon-calendar"></i> <?php echo getReadableDate($portfolio->finishedAt) ?> <i class="pl-10 icon-tag-1"></i> <?php echo get_category($portfolio->category_id)?></p>
                        <div class="separator-2"></div>
                        <p class="mb-10"><?php echo $portfolio->description ?> </p>
                        <a href="#" class="btn btn-animated btn-default">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- pagination start -->
        <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <i aria-hidden="true" class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <i aria-hidden="true" class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>
            </li>
        </ul>
        </nav>
        <!-- pagination end -->

    </div>
    <!-- main end -->

    </div>
</div>
</section>
<!-- main-container end -->