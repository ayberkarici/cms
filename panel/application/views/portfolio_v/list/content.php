<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <h4 class="m-b-lg ">
            <span>Portfolyo Listesi</span>
            <a href="<?php echo base_url('portfolios/new_form'); ?>" class=" btn btn-primary btn-outline btn-info btn-sm pull-right"><i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>
                <div class="alert alert-info text-center" role="alert">
                    <span>Burada herhangi bir kayıt bulunamadı. Eklemek için </span>
                    <a href="<?php echo base_url('portfolios/new_form'); ?>">tıklayınız</a>
                </div>        
            <?php } else {  ?>

            <table class="table table-bordered table-striped table-hover content-container">

            <thead>
                <th class="order"><i class="fa fa-reorder"></i></th>
                <th class="order">#id</th>
                <th>Başlık</th>
                <th class="w134">Url</th>
                <th>Kategori</th>
                <th>Müşteri</th>
                <th>Tamamlanma Tarihi</th>
                <th class="order-status">Durumu</th>
                <th>İşlem</th>
            </thead>
            <tbody class="sortable" data-url="<?php echo base_url("portfolios/rankSetter"); ?>">
                <?php foreach ($items as $item):?>
                <tr id="ord-<?php echo $item->id; ?>">
                    <td class="order"><i class="fa fa-reorder"></i></td>
                    <td class="order center">#<?php echo $item->id; ?></td>
                    <td class="text-center"><?php echo $item->title; ?></td>
                    <td class="text-center"><?php echo $item->url; ?></td>
                    <td class="text-center"><?php echo get_category_title($item->category_id); ?></td>
                    <td class="text-center"><?php echo $item->client; ?></td>
                    <td class="text-center"><?php echo getReadableDate($item->finishedAt); ?></td>
                    <td class="order-status">							
                            <input 
                                data-url="<?php echo base_url("portfolios/isActiveSetter/$item->id"); ?>"
                                data-id="<?php echo $item->id ?>"
                                type="checkbox" 
                                class="btn-xs isActive" 
                                data-switchery 
                                data-color="#10c469" 
                                <?php echo ($item->isActive) ? "checked" : "" ?>
                                data-size="small"
                            />
                    </td>
                    <td class="order-progress">
                        <a 
                            type="button" 
                            class="btn btn-xs btn-dark" 
                            href="<?php echo base_url("portfolios/image_form/". $item->id) ?>">
                            <i class="fa fa-image"></i> Resimler
                        </a>
                        <a 
                            type="button" 
                            class="btn btn-xs btn-warning " 
                            href="<?php echo base_url("portfolios/update_form/". $item->id) ?>">
                            <i class="fa fa-pencil-square-o"></i> Düzenle
                        </a>
                        <button  
                            type="button" 
                            class="btn btn-xs btn-danger remove-btn" 
                            data-url="<?php echo base_url("portfolios/delete/$item->id") ?>"
                            data-name="<?php echo $item->title ?>">
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