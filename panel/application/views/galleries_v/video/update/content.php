<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg ">
            <span><?php echo "<b>$item->id</b> numaralı kaydı düzenle"  ?></span>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">

                <form action="<?php echo base_url("galleries/gallery_video_update/$item->gallery_id/$item->id"); ?>" method="post">
                    <div class="form-group  <?php echo (isset($form_error)) ? (form_error("url")) ? "has-error" : "" : ""; ?>">
                            <label>Video URL</label>
                            <input class="form-control" placeholder="Video bağlantısını buraya yapıştırınız" name="url" value="<?php echo $item->url ?>">
                            <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("url") ?></small>
                            <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-outline btn-md"><i class="fa fa-rocket"></i> Güncelle</button>
                    <a href="<?php echo base_url("galleries/gallery_video_list/$item->gallery_id"); ?>" class="btn btn-danger btn-outline btn-md"><i class="fa fa-remove "></i> İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- END row -->
