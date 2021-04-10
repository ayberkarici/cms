<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg ">
            <span>Yeni Eğitim Ekle</span>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">

                <form action="<?php echo base_url("courses/save"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group <?php echo (isset($form_error)) ? "has-error" : ""; ?>">
                        <label>Başlık giriniz</label>
                        <input class="form-control" placeholder="Başlık" name="title">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("title") ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="datetimepicker1">Eğitim Tarihi</label>
							<input type="hidden" name="event_date" id="datetimepicker1" data-plugin="datetimepicker" data-options="{ inline: true, viewMode: 'days', format:'YYYY-MM-DD HH:mm:ss' }">
                        </div>
                        <div class="form-group image_upload_container col-md-8">
                            <label>Görsel seçiniz</label>
                            <input type="file" class="form-control" name="img_url">
                        </div>

                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-outline btn-md"><i class="fa fa-rocket"></i> Kaydet</button>
                    <a href="<?php echo base_url("courses"); ?>" class="btn btn-danger btn-outline btn-md"><i class="fa fa-remove "></i> İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- END row -->