<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg ">
            <span>Yeni Kullanıcı Ekle</span>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">

                <form action="<?php echo base_url("users/save"); ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group ">
                        <label>Kullanıcı Adı</label>
                        <input class="form-control" placeholder="Kullanıcı adını giriniz" name="user_name" value="<?php echo (isset($form_error)) ? set_value("user_name") : "" ;  ?>">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("user_name") ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group ">
                        <label>Ad Soyad</label>
                        <input class="form-control" placeholder="Ad Soyad" name="full_name" value="<?php echo (isset($form_error)) ? set_value("full_name") : "" ;  ?>">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("full_name") ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group ">
                        <label>E-posta Adresi</label>
                        <input type="email" class="form-control" placeholder="E-posta Adresi" name="email" value="<?php echo (isset($form_error)) ? set_value("email") : "" ;  ?>">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("email") ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group ">
                        <label>Şifre</label>
                        <input type="password" class="form-control" placeholder="Şifre" name="password">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("password") ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group ">
                        <label>Şifre tekrar</label>
                        <input type="password" class="form-control" placeholder="Şifre tekrar" name="re_password">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("re_password") ?></small>
                        <?php endif; ?>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-outline btn-md"><i class="fa fa-rocket"></i> Kaydet</button>
                    <a href="<?php echo base_url("users"); ?>" class="btn btn-danger btn-outline btn-md"><i class="fa fa-remove "></i> İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- END row -->
