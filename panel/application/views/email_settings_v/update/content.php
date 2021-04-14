<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg ">
            <span><?php echo "<b>$item->user_name</b> kullanıcısını düzenle"  ?></span>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">

                <form action="<?php echo base_url("emailsettings/update/$item->id"); ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group ">
                        <label>Protokol</label>
                        <input class="form-control" placeholder="Protokol" name="protocol" value="<?php echo (isset($form_error)) ? set_value("protocol") : $item->protocol ;  ?>">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("protocol") ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group ">
                        <label>E-posta Sunucu Bilgisi</label>
                        <input type="text" class="form-control" placeholder="Host adı" name="host" value="<?php echo (isset($form_error)) ? set_value("host") : $item->host ;  ?>">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("host") ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group ">
                        <label>Port Numarası</label>
                        <input type="text" class="form-control" placeholder="Port numarası" name="port" value="<?php echo (isset($form_error)) ? set_value("port") : $item->port ;  ?>">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("port") ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group ">
                        <label>E-posta Adresi (User)</label>
                        <input type="email" class="form-control" placeholder="E-posta adresi (User)" name="user" value="<?php echo (isset($form_error)) ? set_value("user") : $item->user ;  ?>">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("user") ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group ">
                        <label>E-posta Adresine Ait Şifre</label>
                        <input type="text" class="form-control" placeholder="E-posta Adresine Ait Şifre" name="password" value="<?php echo (isset($form_error)) ? set_value("password") : $item->password ;  ?>">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("password") ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group ">
                        <label>Kimden Gidecek</label>
                        <input type="email" class="form-control" placeholder="E-posta adresi (Gönderen)" name="from" value="<?php echo (isset($form_error)) ? set_value("from") : $item->from ;  ?>">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("from") ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group ">
                        <label>Kime Gidecek</label>
                        <input type="email" class="form-control" placeholder="E-posta adresi (Alan)" name="to" value="<?php echo (isset($form_error)) ? set_value("to") : $item->to ;  ?>">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("to") ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="form-group ">
                        <label>E-posta Başlık</label>
                        <input type="text" class="form-control" placeholder="E-posta Başlık" name="user_name" value="<?php echo (isset($form_error)) ? set_value("user_name") : $item->user_name ;  ?>">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("user_name") ?></small>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-outline btn-md"><i class="fa fa-rocket"></i> Güncelle</button>
                    <a href="<?php echo base_url("emailsettings"); ?>" class="btn btn-danger btn-outline btn-md"><i class="fa fa-remove "></i> İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- END row -->
