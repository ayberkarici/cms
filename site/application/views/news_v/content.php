<?php $settings = get_settings(); ?>
"
<!-- main-container start -->
<!-- ================ -->
<section class="main-container">

<div class="container">
    <div class="row">

    <!-- main start -->
    <!-- ================ -->
    <div class="main col-lg-8">

        <!-- page-title start -->
        <!-- ================ -->
        <h1 class="page-title"><?php echo $news->title ?></h1>
        <!-- page-title end -->

        <!-- blogpost start -->
        <!-- ================ -->
        <article class="blogpost full">
        <header>
            <div class="post-info mb-4">
            <span class="post-date">
                <i class="icon-calendar"></i>
                
                <span class="month"><?php echo getReadableDate($news->changedAt);  ?></span>

            </span>
            <span class="submitted"><i class="icon-user-1"></i> <a href="#"><?php echo strip_tags($settings->company_name) ?></a></span>
            <span class="comments"><i class="icon-eye"></i> <a href=""><?php echo $news->view_count ?></a> görüntülenme</span>
            </div>
        </header>
        <div class="blogpost-content">


            <!-- Wrapper for slides -->
                
                <?php if($news->img_url != "#") { ?>

                    <div class="overlay-container">
                        <img src="<?php echo base_url("uploads/news_v/$news->img_url"); ?>" alt="<?php echo $news->url ?>">
                        <a class="overlay-link popup-img" href="<?php echo base_url("uploads/news_v/$news->img_url"); ?>"><i class="fa fa-search-plus"></i></a>
                    </div>
                
                <?php } else { ?>

                    <div class="overlay-container embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="<?php echo $news->video_url; ?>"></iframe>
                    </div>

                <?php } ?>

            <br>
                <?php echo $news->description; ?>
            <br>
        </div>
        <footer class="clearfix">
            <!--
            <div class="tags pull-left"><i class="icon-tags"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>
            -->
            <div class="link pull-right">
            <ul class="social-links circle small colored clearfix margin-clear text-right animated-effect-1">
                <li class="twitter"><a target="_blank" href="<?php echo $settings->twitter ?>"><i class="fa fa-twitter"></i></a></li>
                <li class="instagram"><a target="_blank" href="<?php echo $settings->instagram ?>"><i class="fa fa-instagram"></i></a></li>
                <li class="facebook"><a target="_blank" href="<?php echo $settings->facebook ?>"><i class="fa fa-facebook"></i></a></li>
            </ul>
            </div>
        </footer>
        </article>
    <!-- blogpost end -->
    <!-- comments start -->
    <!-- ================ --><!--

        ************Yorumlar************

        <div id="comments" class="comments">
        <h2 class="title">There are 3 comments</h2>
                -->
        <!-- comment start --><!--
        <div class="comment clearfix">
            <div class="comment-avatar">
                <img class="rounded-circle" src="<?php echo base_url("assets/images"); ?>/avatar.jpg" alt="avatar">
            </div>
                <header>
                <h3>Comment title</h3>
                <div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
            </header>
            <div class="comment-content">
                <div class="comment-body clearfix">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
                    <a href="blog-post.html" class="btn-sm-link link-dark pull-right"><i class="fa fa-reply"></i> Reply</a>
                </div>
            </div>
                -->
            <!-- comment start -->
            <!--
            <div class="comment clearfix">
                <div class="comment-avatar">
                    <img class="rounded-circle" src="<?php echo base_url("assets/images"); ?>/avatar.jpg" alt="avatar">
                </div>
                <header>
                    <h3>Comment title</h3>
                    <div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
                </header>
                <div class="comment-content">
                    <div class="comment-body clearfix">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
                    <a href="blog-post.html" class="btn-sm-link link-dark pull-right"><i class="fa fa-reply"></i> Reply</a>
                    </div>
                </div>
            </div>-->
            <!-- comment end -->
        <!--
        </div>
                -->
        <!-- comment end -->

        <!-- comment start -->
        <!--
        <div class="comment clearfix">
            <div class="comment-avatar">
            <img class="rounded-circle" src="<?php echo base_url("assets/images"); ?>/avatar.jpg" alt="avatar">
            </div>
            <header>
            <h3>Comment title</h3>
            <div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
            </header>
            <div class="comment-content">
            <div class="comment-body clearfix">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
                <a href="blog-post.html" class="btn-sm-link link-dark pull-right"><i class="fa fa-reply"></i> Reply</a>
            </div>
            </div>

            
        </div>
                -->
        <!-- comment end -->
        <!--
        </div>-->
        <!-- comments end -->

        <!-- comments form start -->
        <!-- ================ -->
        <!--
        <div class="comments-form">
        <h2 class="title">Add your comment</h2>
        <form id="comment-form">
            <div class="form-group has-feedback">
            <label for="name4">Name</label>
            <input type="text" class="form-control" id="name4" placeholder="" name="name4" required>
            <i class="fa fa-user form-control-feedback"></i>
            </div>
            <div class="form-group has-feedback">
            <label for="subject4">Subject</label>
            <input type="text" class="form-control" id="subject4" placeholder="" name="subject4" required>
            <i class="fa fa-pencil form-control-feedback"></i>
            </div>
            <div class="form-group has-feedback">
            <label for="message4">Message</label>
            <textarea class="form-control" rows="8" id="message4" placeholder="" name="message4" required></textarea>
            <i class="fa fa-envelope-o form-control-feedback"></i>
            </div>
            <input type="submit" value="Submit" class="btn btn-default">
        </form>
    </div>
    -->
        <!-- comments form end -->

    </div>
    <!-- main end -->

    <?php $this->load->view("news_v/sidebar"); ?>

    </div>
</div>
</section>
<!-- main-container end -->"