<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <h4 class="m-b-lg ">
        <span>Site Ayarları</span>
        <a href="<?php echo base_url('settings/new_form'); ?>" class=" btn btn-primary btn-outline btn-info btn-sm pull-right"><i class="fa fa-plus"></i> Yeni Ekle</a>
    </h4>
    <div class="widget p-lg">

        <?php if(empty($items)) { ?>
            <div class="alert alert-info text-center" role="alert">
                <span>Burada herhangi bir kayıt bulunamadı. Eklemek için </span>
                <a href="<?php echo base_url('settings/new_form'); ?>">tıklayınız</a>
            </div>        
        <?php } ?>

    </div><!-- .widget -->
</div><!-- END column -->
</div>