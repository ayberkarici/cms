<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <h4 class="m-b-lg ">
        <span>Eposta Listesi</span>
        <a href="<?php echo base_url('emailsettings/new_form'); ?>" class=" btn btn-primary btn-outline btn-info btn-sm pull-right"><i class="fa fa-plus"></i> Yeni Ekle</a>
    </h4>
    <div class="widget p-lg">

        <?php if(empty($items)) { ?>
            <div class="alert alert-info text-center" role="alert">
                <span>Burada herhangi bir kayıt bulunamadı. Eklemek için </span>
                <a href="<?php echo base_url('emailsettigns/new_form'); ?>">tıklayınız</a>
            </div>        

        <?php } else {  ?>

        <table class="table table-bordered table-striped table-hover content-container">

        <thead>
            <th>#id</th>
            <th>E-posta Başlık</th>
            <th>Sunucu Adı</th>
            <th>Protokol</th>
            <th>Port</th>
            <th>E-posta</th>
            <th>Kimden</th>
            <th>Kime</th>
            <th>Durumu</th>
            <th>İşlem</th>
        </thead>
        <tbody>
            <?php foreach ($items as $item):?>
            <tr>
                <td class="order center"><?php echo $item->id; ?></td>
                <td class="text-center"><?php echo $item->user_name; ?></td>
                <td class="text-center"><?php echo $item->host; ?></td>
                <td class="text-center"><?php echo $item->protocol; ?></td>
                <td class="text-center"><?php echo $item->port; ?></td>
                <td class="text-center"><?php echo $item->user; ?></td>
                <td class="text-center"><?php echo $item->from; ?></td>
                <td class="text-center"><?php echo $item->to; ?></td>
                <td class="order-status">							
						<input 
                            data-url="<?php echo base_url("emailsettings/isActiveSetter/$item->id"); ?>"
                            data-id="<?php echo $item->id; ?>"
                            type="checkbox" 
                            class="btn-xs isActive" 
                            data-switchery 
                            data-color="#10c469" 
                            <?php echo ($item->isActive) ? "checked" : "" ?>
                            data-size="small"
                        />
                </td>
                <td class="order-progress ">
                    <a 
                        type="button" 
                        class="btn btn-xs btn-warning " 
                        href="<?php echo base_url("emailsettings/update_form/$item->id") ?>">
                        <i class="fa fa-pencil-square-o"></i> Düzenle
                    </a>
                    <button  
                        type="button" 
                        class="btn btn-xs btn-danger remove-btn" 
                        data-url="<?php echo base_url("emailsettings/delete/$item->id") ?>"
                        data-name="<?php echo $item->user_name ?>">
                        <i class="fa fa-trash-o"></i> Sil
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>


        </table>

        <?php }; ?>
    </div><!-- .widget -->
</div><!-- END column -->
</div>