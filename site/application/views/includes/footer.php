<?php $settings = get_settings(); ?>


<!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
<!-- ================ -->
<footer id="footer" class="clearfix dark">

<!-- .footer start -->
<!-- ================ -->
<div class="footer">
    <div class="container">
    <div class="footer-inner">
        <div class="row">
        <div class="col-lg-6">
            <div class="footer-content">
            <div class="logo-footer"><img id="logo-footer" src="<?php echo base_url("assets/images/"); ?>logo_blue.png" alt=""></div>
            <p><?php echo strip_tags($settings->mission) ?></p>
            <ul class="list-inline mb-20">
                <li class="list-inline-item"><a href="<?php echo base_url("hakkimizda"); ?>"><i class="text-default fa fa-map-marker pr-1"></i></a> <?php echo character_limiter(strip_tags($settings->address),20); ?></li>
                <li class="list-inline-item"><i class="text-default fa fa-phone pl-10 pr-1"></i> <?php echo $settings->phone_1; ?></li>
                <li class="list-inline-item"><a href="mailto:<?php echo $settings->email; ?>" class="link-dark"><i class="text-default fa fa-envelope-o pl-10 pr-1"></i> <?php echo $settings->email; ?></a></li>
            </ul>
            <div class="separator-2"></div>
            <ul class="social-links circle margin-clear animated-effect-1">
                <?php if(isset($settings->facebook) && $settings->facebook != ""){ ?>
                    <li class="facebook"><a target="_blank" href="<?php echo $settings->facebook ?>"><i class="fa fa-facebook"></i></a></li>
                <?php } ?>
                <?php if(isset($settings->twitter) && $settings->twitter != ""){ ?>
                <li class="twitter"><a target="_blank" href="<?php echo $settings->twitter ?>"><i class="fa fa-twitter"></i></a></li>
                <?php } ?>
                <?php if(isset($settings->googleplus) && $settings->googleplus != ""){ ?>
                <li class="googleplus"><a target="_blank" href="<?php echo $settings->googleplus ?>"><i class="fa fa-google-plus"></i></a></li>
                <?php } ?>
                <?php if(!empty($settings->linkedin) && $settings->linkedin != ""){ ?>
                <li class="linkedin"><a target="_blank" href="<?php echo $settings->linkedin ?>"><i class="fa fa-linkedin"></i></a></li>
                <?php } ?>
                <?php if(isset($settings->youtube) && $settings->youtube != ""){ ?>
                <li class="youtube"><a target="_blank" href="<?php echo $settings->youtube ?>"><i class="fa fa-youtube"></i></a></li>
                <?php } ?>
                <?php if(isset($settings->instagram) && $settings->instagram != ""){ ?>
                <li class="instagram"><a target="_blank" href="<?php echo $settings->instagram ?>"><i class="fa fa-instagram"></i></a></li>
                <?php } ?>
            </ul>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="footer-content">
            <h2 class="title">Contact Us</h2>
            <div class="alert alert-success hidden-xs-up" id="MessageSent2">
                Mesajınızı aldık! Yakında sizinle bağlantıya geçeceğiz!
            </div>
            <div class="alert alert-danger hidden-xs-up" id="MessageNotSent2">
                Oops! Bir şeyler ters gitti 😕 Lütfen sayfayı yenileyin ve tekrar deneyin. 
            </div>
            <form  class="margin-clear" action="<?php echo base_url("mesaj-gonder"); ?>" role="form" method="post">
                <div class="form-group has-feedback mb-10">
                <label class="sr-only" for="name">İsim*</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="İsim">
                <i class="fa fa-user form-control-feedback"></i>
                </div>
                <div class="form-group has-feedback mb-10">
                <label class="sr-only" for="email">E-posta*</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="E-posta">
                <i class="fa fa-envelope form-control-feedback"></i>
                </div>
                <div class="form-group has-feedback mb-10">
                <label class="sr-only" for="subject">Konu*</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Konu">
                <i class="fa fa-navicon form-control-feedback"></i>
                </div>
                <div class="form-group has-feedback mb-10" >
                <label class="sr-only" for="message">Mesaj*</label>
                <textarea class="form-control" rows="6" id="message" name="message" placeholder="Mesajınız"></textarea>
                <i class="fa fa-pencil form-control-feedback"></i>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group has-feedback">
                            <label for="captcha">Doğrulama Kodu*</label>
                            <input type="text" class="form-control " id="captcha" name="captcha">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <?php //  echo $captcha["image"]?>
                    </div>
                </div>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="submit" value="Send" class="margin-clear submit-button btn btn-default">
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<!-- .footer end -->

<!-- .subfooter start -->
<!-- ================ -->
<div class="subfooter">
    <div class="container">
        <div class="subfooter-inner">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">Tüm hakları saklıdır © <?php echo date("Y") . " " . $settings->company_name; ?> | <a target="_blank" href="http://www.ayberkarici.com">Ayberk Arici</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .subfooter end -->

</footer>
<!-- footer end -->