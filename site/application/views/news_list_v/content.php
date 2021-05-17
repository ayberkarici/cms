<?php $settings = get_settings(); ?>
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
                <h1 class="page-title">Blog</h1>
                <div class="separator-2"></div>
                <!-- page-title end -->

                <!-- timeline grid start -->
                <!-- ================ -->
                <div class="timeline clearfix">

                <?php 
                $counter = 0;
                foreach($news_list as $news) { 
                    if($news->news_type == "image"){
                ?>
                <!-- timeline grid item start -->
                <div class="timeline-item <?php echo ($counter % 2 == 0)? "pull-left" : "pull-right" ; ?>">
                    <!-- blogpost start -->
                    <article class="blogpost shadow-2 light-gray-bg bordered object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
                    <div class="overlay-container">
                        <img src="<?php echo base_url("uploads/news_v/$news->img_url"); ?>" alt="<?php echo $news->title ?>">
                        <a class="overlay-link" href="<?php echo base_url("haber/$news->url") ?>"><i class="fa fa-link"></i></a>
                    </div>
                    <header>
                        <h2><a href="<?php echo base_url("haber/$news->url") ?>"><?php echo $news->title ?></a></h2>
                        <div class="post-info">
                        <span class="post-date">
                            <i class="icon-calendar"></i>
                            
                            <span class="month"><?php echo getReadableDate($news->changedAt) ;?></span>

                        </span>
                        <span class="submitted"><i class=" icon-eye"></i>  <a ><?php echo $news->view_count ?></a> görüntülenme</span>
                        <span class="submitted"><i class="icon-user-1"></i>  <a href="<?php echo base_url("hakkimizda") ?>"><?php echo strip_tags($settings->company_name) ?></a></span>
                        </div>
                    </header>
                    <div class="blogpost-content">
                        <p><?php echo character_limiter(strip_tags($news->description), 200);  ?></p>
                    </div>
                    <footer class="clearfix">
                        <!--<div class="tags pull-left"><i class="icon-tags"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>SEO -->
                        <div class="link pull-right"><i class="icon-link"></i><a href="<?php echo base_url("haber/$news->url") ?>">Haberi Gör</a></div>
                    </footer>
                    </article>
                    <!-- blogpost end -->
                </div>
                <!-- timeline grid item end -->
                    <?php } else { ?>

                <!-- timeline grid item start -->
                <div class="timeline-item <?php echo ($counter % 2 == 0)? "pull-left" : "pull-right" ; ?>">
                    <!-- blogpost start -->
                    <article class="blogpost shadow-2 light-gray-bg bordered object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="<?php echo $news->video_url; ?>"></iframe>
                    </div>
                    <header>
                        <h2><a href="<?php echo base_url("haber/$news->url") ?>"><?php echo $news->title ?></a></h2>
                        <div class="post-info">
                        <span class="post-date">
                            <i class="icon-calendar"></i>
                            <span class="month"><?php echo getReadableDate($news->changedAt) ;?></span>
                        </span>
                        <span class="submitted"><i class=" icon-eye"></i>  <a><?php echo $news->view_count ?></a> görüntülenme</span>
                        <span class="submitted"><i class="icon-user-1"></i>  <a href="<?php echo base_url("hakkimizda") ?>"><?php echo strip_tags($settings->company_name) ?></a></span>
                        </div>
                    </header>
                    <div class="blogpost-content">
                        <p><?php echo character_limiter(strip_tags($news->description), 200);  ?></p>
                    </div>
                    <footer class="clearfix">
                        <!--<div class="tags pull-left"><i class="icon-tags"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>SEO -->
                        <div class="link pull-right"><i class="icon-link"></i><a href="<?php echo base_url("haber/$news->url") ?>">Haberi Gör</a></div>
                    </footer>
                    </article>
                    <!-- blogpost end -->
                </div>
                <!-- timeline grid item end -->
                    <?php } ?>

                <?php $counter++ ;} ?>

              </div>
              <!-- timeline grid end -->

            </div>
            <!-- main end -->


    </div>
</div>
</section>
<!-- main-container end -->