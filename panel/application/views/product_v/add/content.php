<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg ">
            <span>Yeni Ürün Ekle</span>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">

                <form action="<?php echo base_url("product/save"); ?>" method="post">
                    <div class="form-group">
                        <label>Başlık giriniz</label>
                        <input class="form-control" placeholder="Başlık" name="title">
                    </div>
                    <div class="form-group">
                        <label >Açıklama</label>
                        <div class="m-0" name="description" data-plugin="summernote" data-options="{height: 250}">Hello Summernote</div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-outline btn-md"><i class="fa fa-rocket"></i> Kaydet</button>
                    <a href="<?php echo base_url("product"); ?>" class="btn btn-danger btn-outline btn-md"><i class="fa fa-remove "></i> İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- END column -->
