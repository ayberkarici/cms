<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg ">
            <span>Yeni Ürün Ekle</span>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">

                <form action="<?php echo base_url("galleries/save"); ?>" method="post">
                    <div class="form-group" >
                        <label>Başlık giriniz</label>
                        <input class="form-control" placeholder="Galerinin adını giriniz" name="title" value="<?php echo (isset($form_error)) ? set_value("title") : "" ;  ?>">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("title") ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
						<label for="control-demo-6" class="">Galeri Türü</label>
						<div id="control-demo-6" class="" >
							<select class="form-control " name="gallery_type">
								<option <?php echo (isset($gallery_type) && $gallery_type == "image") ? "selected" : "";  ?> value="image">Resim</option>
								<option <?php echo (isset($gallery_type) && $gallery_type == "video") ? "selected" : "";  ?> value="video">Video</option>
								<option <?php echo (isset($gallery_type) && $gallery_type == "file") ? "selected" : "";  ?> value="file">Dosya</option>
							</select>
						</div>
					</div><!-- .form-group -->
                    <button type="submit" class="btn btn-primary btn-outline btn-md"><i class="fa fa-rocket"></i> Kaydet</button>
                    <a href="<?php echo base_url("galleries"); ?>" class="btn btn-danger btn-outline btn-md"><i class="fa fa-remove "></i> İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- END row -->
