<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg ">
            <span><?php echo "<b>$item->user_name</b> kullanıcısının şifresini düzenle"  ?></span>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("users/update_password/$item->id"); ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group ">
                        <label>Şifre</label>
                        <input type="" class="form-control" placeholder="Şifre" name="password">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("password") ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group ">
                        <label>Şifre tekrar</label>
                        <input type="" class="form-control" placeholder="Şifre tekrar" name="re_password">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("re_password") ?></small>
                        <?php endif; ?>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-outline btn-md"><i class="fa fa-rocket"></i> Güncelle</button>
                    <a href="<?php echo base_url("users"); ?>" class="btn btn-danger btn-outline btn-md"><i class="fa fa-remove "></i> İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- END row -->
