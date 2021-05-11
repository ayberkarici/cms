<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg ">
            <span>Yeni Haber Ekle</span>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
            <?php // echo (null !== set_value("title")) ? "" : "has-error" ;?>
                <form action="<?php echo base_url("news/save"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label>Başlık giriniz</label>
                        <input class="form-control" placeholder="Başlık" name="title" value="<?php echo (isset($form_error)) ? set_value("title") : "" ;  ?>">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("title") ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label >Açıklama</label>
                        <textarea class="m-0" name="description" data-plugin="summernote" data-options="{height: 250}">
                            <?php echo (isset($form_error)) ? set_value("description") : "" ;  ?>
                        </textarea>
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("description") ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
						<label for="control-demo-6" class="">Haberin Türü</label>
						<div id="control-demo-6" class="" >
							<select class="form-control news_type_select" name="news_type">
								<option <?php echo (isset($news_type) && $news_type == "image") ? "selected" : "";  ?> value="image">Resim</option>
								<option <?php echo (isset($news_type) && $news_type == "video") ? "selected" : "";  ?> value="video">Video</option>
							</select>
						</div>
					</div><!-- .form-group -->

                    <?php if(isset($form_error)) { ?>
                        <div class="form-group image_upload_container" style="display: <?php echo ($news_type == "image") ? "block" : "none";  ?>;">
                            <label>Görsel seçiniz</label>
                            <input type="file" class="form-control" name="img_url">
                            <?php if(isset($form_error)): ?>
                                <small class="input-form-error"><?php echo form_error("img_url") ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group  video_url_container" style="display: <?php echo ($news_type == "video") ? "block" : "none";  ?>;">
                            <label>Video URL</label>
                            <input class="form-control" placeholder="Video bağlantısını buraya yapıştırınız" name="video_url">
                            <?php if(isset($form_error)): ?>
                                <small class="input-form-error"><?php echo form_error("video_url") ?></small>
                            <?php endif; ?>
                        </div>
                    <?php } else {  ?>
                        <div class="form-group image_upload_container">
                            <label>Görsel seçiniz</label>
                            <input type="file" class="form-control" name="img_url">
                        </div>

                        <div class="form-group  video_url_container ">
                            <label>Video URL</label>
                            <input class="form-control" placeholder="Video bağlantısını buyara yapıştırınız" name="video_url">
                        </div>

                        
                    <?php }?>


                    <button type="submit" class="btn btn-primary btn-outline btn-md"><i class="fa fa-rocket"></i> Kaydet</button>
                    <a href="<?php echo base_url("news"); ?>" class="btn btn-danger btn-outline btn-md"><i class="fa fa-remove "></i> İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- END row -->
