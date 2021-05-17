
    <!-- sidebar start -->
    <!-- ================ -->
    <aside class="col-lg-4 col-xl-3 ml-xl-auto">
        <div class="sidebar">
        <div class="block clearfix">
            <h2>Tabela</h2>
            <div class="separator-2"></div>
            <nav>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>">Anasayfa</a></li>
                <li class="nav-item"><a class="nav-link active" href="<?php echo base_url("portfolyo"); ?>">Portfolyo</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url("urunler"); ?>">Ürünler</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url("hakkimizda"); ?>">Hakkımızda</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url("iletisim"); ?>">İletişim</a></li>
            </ul>
            </nav>
        </div>
               


        <div class="block clearfix">
            <h3 class="title">Son Haberler</h3>
            <div class="separator-2"></div>
            <?php if(!empty($recent_news)) { 
                foreach($recent_news as $side_news) {?>

                <div class="media margin-clear">
                    <div class="col-md-3 pr-2">
                        <div class="overlay-container">
                            <?php if($side_news->news_type == "image") { ?>
                                <img class="media-object" src="<?php echo base_url("uploads/news_v/$side_news->img_url"); ?>" alt="<?php echo $side_news->img_url ?>">
                                <a href="<?php echo base_url("haber/$side_news->url"); ?>" class="overlay-link small"><i class="fa fa-link"></i></a>
                            <?php } else { ?>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="<?php echo $side_news->video_url; ?>"></iframe>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="media-body">
                        <h6 class="media-heading"><a href="<?php echo base_url("haber/$side_news->url"); ?>"><?php echo character_limiter(strip_tags($side_news->title), 40) ?></a></h6>
                        <p class="small margin-clear"><i class="fa fa-calendar pr-10"></i> <?php echo getReadableDate($side_news->changedAt) ?></p>
                    </div>
                </div>

                <hr>
            
            <?php }}; ?>

            <div class="text-right space-top">
            <a href="<?php echo base_url("haberler"); ?>" class="link-dark"><i class="fa fa-plus-circle pl-1 pr-1"></i>  Hepsine Gözat</a> 
            </div>
        </div>
<!-- Tag Modülü gelicek
        <div class="block clearfix">
            <h3 class="title">Popular Tags</h3>
            <div class="separator-2"></div>
            <div class="tags-cloud">
            <div class="tag">
                <a href="#">energy</a>
            </div>
            <div class="tag">
                <a href="#">business</a>
            </div>
            <div class="tag">
                <a href="#">food</a>
            </div>
            <div class="tag">
                <a href="#">fashion</a>
            </div>
            <div class="tag">
                <a href="#">finance</a>
            </div>
            <div class="tag">
                <a href="#">culture</a>
            </div>
            <div class="tag">
                <a href="#">health</a>
            </div>
            <div class="tag">
                <a href="#">sports</a>
            </div>
            <div class="tag">
                <a href="#">life style</a>
            </div>
            <div class="tag">
                <a href="#">books</a>
            </div>
            <div class="tag">
                <a href="#">lorem</a>
            </div>
            <div class="tag">
                <a href="#">ipsum</a>
            </div>
            <div class="tag">
                <a href="#">responsive</a>
            </div>
            <div class="tag">
                <a href="#">style</a>
            </div>
            <div class="tag">
                <a href="#">finance</a>
            </div>
            <div class="tag">
                <a href="#">sports</a>
            </div>
            <div class="tag">
                <a href="#">technology</a>
            </div>
            <div class="tag">
                <a href="#">support</a>
            </div>
            <div class="tag">
                <a href="#">life style</a>
            </div>
            <div class="tag">
                <a href="#">books</a>
            </div>
            </div>
        </div>
-->
        </div>
    </aside>
    <!-- sidebar end -->