<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg ">
            <span><?php echo "<b>$item->title</b> kaydını düzenle"  ?></span>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">

                <form action="<?php echo base_url("galleries/update/$item->id/$item->gallery_type/$item->folder_name"); ?>" method="post">
                    <div class="form-group <?php echo (isset($form_error)) ? "has-error" : ""; ?>">
                        <label>Başlık giriniz</label>
                        <input class="form-control" placeholder="Galerinin adını giriniz" name="title" value="<?php echo $item->title; ?>">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("title") ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
						<label for="control-demo-6" class="">Galeri Türü</label>
						<div id="control-demo-6" class="" >
							<select class="form-control" disabled>
								<option <?php echo (isset($gallery_type) && $gallery_type == "image") ? "selected" : "";  ?> value="image">Resim</option>
								<option <?php echo (isset($gallery_type) && $gallery_type == "video") ? "selected" : "";  ?> value="video">Video</option>
								<option <?php echo (isset($gallery_type) && $gallery_type == "file") ? "selected" : "";  ?> value="file">Dosya</option>
							</select>
						</div>
					</div><!-- .form-group -->

                    <button type="submit" class="btn btn-primary btn-outline btn-md"><i class="fa fa-rocket"></i> Güncelle</button>
                    <a href="<?php echo base_url("galleries"); ?>" class="btn btn-danger btn-outline btn-md"><i class="fa fa-remove "></i> İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- END row -->
