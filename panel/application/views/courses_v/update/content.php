<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg ">
            <span><?php echo "<b>$item->title</b> kaydını düzenle"  ?></span>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">

                <form action="<?php echo base_url("courses/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
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
                    <div class="row image_upload_container">
                        <div class="col-md-4">
                            <label for="datetimepicker1">Eğitim Tarihi</label>
                            <input type="hidden" name="event_date" id="datetimepicker1" data-plugin="datetimepicker" data-options="{ inline: true, viewMode: 'days', format:'YYYY-MM-DD HH:mm:ss' }">
                        </div>
                        <div class="form-group col-md-8">
                            <label>Görsel seçiniz</label>
                            <input type="file" class="form-control" name="img_url" >
                            <br>
                            <div class="col-md-4 text-center">
                                <img src="<?php echo get_picture($viewFolder, $item->img_url, "555x343"); ?>"  width="330" class="img-responsive img-thumbnail ">
                                <br>
                                <small class=" text-purple text-lowercase ">(Mevcut mükemmel görseliniz)</small>
                            </div>
                        </div>
                        
                        
                    </div>
                    <button type="submit" class="btn btn-primary btn-outline btn-md"><i class="fa fa-rocket"></i> Güncelle</button>
                    <a href="<?php echo base_url("courses"); ?>" class="btn btn-danger btn-outline btn-md"><i class="fa fa-remove "></i> İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- END row -->
