<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg ">
            <span><?php echo "<b>$item->title</b> kaydını düzenle"  ?></span>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">

                <form action="<?php echo base_url("slides/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Başlık</label>
                        <input class="form-control" placeholder="Başlık" name="title" value="<?php echo $item->title; ?>">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("title") ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label >Açıklama</label>
                        <textarea class="m-0" name="description" data-plugin="summernote" data-options="{height: 250}">
                            <?php echo $item->description;?> 
                        </textarea>
                    </div>
                    <div class="row image_upload_container">
                        <div class="col-md-3 text-center" style="padding:1rem !important;">
                            <img src="<?php echo get_picture($viewFolder, $item->img_url, "1920x650"); ?>"  width="330" class="img-responsive img-thumbnail ">
                            <br>
                            <small class=" text-purple text-lowercase ">(Mevcut mükemmel görseliniz)</small>
                        </div>
                        <div class="form-group col-md-9">
                            <label>Görsel seçiniz</label>
                            <input type="file" class="form-control" name="img_url" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Buton Kullanımı</label><br>
                        <input
                                class="form-control button_usage_btn"
                                type="checkbox"
                                <?php echo ($item->allowButton) ? "checked" : "" ; ?>
                                data-switchery
                                name="allowButton"
                                data-color="#10c469"/>
                    </div>

                    <div class="button-information-container" style="display: <?php echo ($item->allowButton) ? "block" : "none" ; ?> ; ">
                        <div class="form-group">
                            <label>Buton Başlık</label>
                            <input class="form-control" placeholder="Butonun üzerindeki yazı" name="button_caption" value="<?php echo $item->button_caption; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("button_caption"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label>URL Bilgisi</label>
                            <input class="form-control" placeholder="Butona basıldığında gidilecek olan URL Bilgisi" name="button_url" value="<?php echo $item->button_url; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("button_url"); ?></small>
                            <?php } ?>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-outline btn-md"><i class="fa fa-rocket"></i> Güncelle</button>
                    <a href="<?php echo base_url("slides"); ?>" class="btn btn-danger btn-outline btn-md"><i class="fa fa-remove "></i> İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- END row -->
