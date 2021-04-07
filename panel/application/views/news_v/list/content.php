<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <h4 class="m-b-lg ">
        <span>Haber Listesi</span>
        <a href="<?php echo base_url('news/new_form'); ?>" class=" btn btn-primary btn-outline btn-info btn-xs pull-right"><i class="fa fa-plus"></i> Yeni Ekle</a>
    </h4>
    <div class="widget p-lg">

        <?php if(empty($items)) { ?>
            <div class="alert alert-info text-center" role="alert">
                <span>Burada herhangi bir kayıt bulunamadı. Eklemek için </span>
                <a href="<?php echo base_url('news/new_form'); ?>">tıklayınız</a>
            </div>        

        <?php } else {  ?>

        <table class="table table-bordered table-striped table-hover content-container">

        <thead>
            <th class="order"><i class="fa fa-reorder"></i></th>
            <th class="order">#id</th>
            <th>Başlık</th>
            <th class="w134">Url</th>
            <!--<th>Açıklama</th>-->
            <th>Haber Türü</th>
            <th>Görsel</th>
            <th class="order-status">Durumu</th>
            <th>İşlem</th>
        </thead>
        <tbody class="sortable" data-url="<?php echo base_url("news/rankSetter"); ?>">
            <?php foreach ($items as $item):?>
            <tr id="ord-<?php echo $item->id; ?>">
                <td class="order"><i class="fa fa-reorder"></i></td>
                <td class="order center">#<?php echo $item->id; ?></td>
                <td><?php echo $item->title; ?></td>
                <td><?php echo $item->url; ?></td>
                <!--<td><?php echo $item->description; ?></td>-->
                <td><?php echo $item->news_type; ?></td>
                <td>
                    <?php if($item->news_type == "image") { ?>
                        <img 
                            width="100"
                            src="<?php echo base_url("uploads/$viewFolder/$item->img_url"); ?>" 
                            alt="" 
                            srcset=""
                        >

                    <?php } else if ($item->news_type == "video") { ?>
                        <iframe 
                            width="150"
                            height="100" 
                            src="<?php echo $item->video_url; ?>" 
                            title="YouTube video player" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen></iframe>

                    <?php } ?>

                
                </td>
                <td class="order-status">							
						<input 
                            data-url="<?php echo base_url("news/isActiveSetter/$item->id"); ?>"
                            data-id="<?php echo $item->id; ?>"
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
                        class="btn btn-xs btn-warning " 
                        href="<?php echo base_url("news/update_form/". $item->id) ?>">
                        <i class="fa fa-pencil-square-o"></i> Düzenle
                    </a>
                    <button  
                        type="button" 
                        class="btn btn-xs btn-danger remove-btn" 
                        data-url="<?php echo base_url("news/delete/$item->id") ?>"
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