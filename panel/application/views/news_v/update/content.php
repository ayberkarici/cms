<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg ">
            <span><?php echo "<b>$item->title</b> kaydını düzenle"  ?></span>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">

                <form action="<?php echo base_url("news/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group <?php echo (isset($form_error)) ? "has-error" : ""; ?>">
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

                    <div class="form-group">
						<label for="control-demo-6" class="">Haberin Türü</label>
						<div id="control-demo-6" class="" >
                            <?php if(isset($form_error)) { ?>
                                <select class="form-control news_type_select" name="news_type">
								    <option <?php echo ($news_type == "image") ? "selected" : "";  ?> value="image">Resim</option>
								    <option <?php echo ($news_type == "video") ? "selected" : "";  ?> value="video">Video</option>
							    </select>
                            <?php } else { ?>
                                <select class="form-control news_type_select" name="news_type">
								    <option <?php echo ( $item->news_type == "image") ? "selected" : "";  ?> value="image">Resim</option>
								    <option <?php echo ( $item->news_type == "video") ? "selected" : "";  ?> value="video">Video</option>
							    </select>
                            <?php } ?>
						</div>
					</div><!-- .form-group -->

                    <?php if(isset($form_error)) { ?>
                        <div class="form-group image_upload_container <?php echo (form_error("img_url")) ? "has-error" : ""; ?>" style="display: <?php echo ($news_type == "image") ? "block" : "none";  ?>;">
                            <label>Görsel seçiniz</label>
                            <input type="file" class="form-control" name="img_url">
                        </div>
                        <div class="form-group  video_url_container <?php echo (form_error("video_url")) ? "has-error" : ""; ?>" style="display: <?php echo ($news_type == "video") ? "block" : "none";  ?>;">
                            <label>Video URL</label>
                            <input class="form-control" placeholder="Video bağlantısını buraya yapıştırınız" name="video_url">
                            <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("video_url") ?></small>
                            <?php endif; ?>
                        </div>
                    <?php } else {  ?>
                        <div class="row image_upload_container" style="display: <?php echo ($item->news_type == "image") ? "block" : "none";  ?>;">
                            <div class="col-md-3 " style="padding:1rem !important;display: <?php echo ($item->news_type == "image") ? "block" : "none";  ?>;">
                                <img src="<?php echo base_url("uploads/$viewFolder/$item->img_url") ?>"  width="230" class="img-responsive  ">
                            </div>
                            <div 
                                class="
                                    form-group 
                                    <?php echo ($item->news_type == "image") ? "col-md-9" : "col-md-12";  ?>
                                "
                            >
                                <label>Görsel seçiniz</label>
                                <input type="file" class="form-control" name="img_url" >
                            </div>
                        </div>

                        <div class="form-group video_url_container <?php echo (isset($form_error)) ? "has-error" : ""; ?>" style="display: <?php echo ($item->news_type == "video") ? "block" : "none";  ?>;">
                            <label>Video URL</label>
                            <input class="form-control" placeholder="Video bağlantısını buyara yapıştırınız" name="video_url" value="<?php echo $item->video_url; ?>">
                        </div>

                    <?php }?>


                    <button type="submit" class="btn btn-primary btn-outline btn-md"><i class="fa fa-rocket"></i> Güncelle</button>
                    <a href="<?php echo base_url("news"); ?>" class="btn btn-danger btn-outline btn-md"><i class="fa fa-remove "></i> İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- END row -->
