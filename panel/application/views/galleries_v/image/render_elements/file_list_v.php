<?php if(empty($items)) { ?>

    <div class="alert alert-info text-center">
        <p>Burada herhangi bir resim bulunmamaktadır.</a></p>
    </div>

<?php } else { ?>

    <table class="table table-bordered table-striped table-hover pictures_list">
        <thead>
            <th class="order"><i class="fa fa-reorder"></i></th>
            <th class="order">#id</th>
            <th>Görsel</th>
            <th>Dosya Yolu/Adı</th>
            <th class="order-status">Durumu</th>
            <th class="order-status">İşlem</th>
        </thead>

        <tbody class="sortable" data-url="<?php echo base_url("galleries/fileRankSetter/$gallery_type"); ?>">
            <?php foreach($items as $item){ ?>

                <tr id="ord-<?php echo $item->id; ?>">
                    <td class="order"><i class="fa fa-reorder"></i></td>
                    <td class="w100 text-center order ">#<?php echo $item->id; ?></td>
                    <td class="w100 text-center">
                        <?php if($gallery_type == "image"){ ?>
                        <img width="30" src="<?php echo base_url("$item->url"); ?>" alt="<?php echo $item->url; ?>" class="img-responsive">
                        <?php } else if($gallery_type == "file") { ?>
                        <div class="fa fa-folder fa-2x"></div>
                        <?php } ?>
                    </td>
                    <td><?php echo $item->url; ?></td>
                    <td class="w100 text-center order-status">
                        <input
                            data-url="<?php echo base_url("galleries/fileIsActiveSetter/$item->id/$gallery_type"); ?>"
                            data-id="<?php echo $item->id ?>"
                            class="btn-xs isActive"
                            type="checkbox"
                            data-switchery
                            data-color="#10c469"
                            data-size="small"
                            <?php echo ($item->isActive) ? "checked" : ""; ?>
                        />
                    </td>
                    <td class="w100 text-center">
                        <button
                            data-url="<?php echo base_url("galleries/fileDelete/$item->id/$item->gallery_id/$gallery_type"); ?>"
                            class="btn btn-sm btn-danger btn-outline remove-btn btn-block">
                            <i class="fa fa-trash"></i> Sil
                        </button>
                    </td>
                </tr>

            <?php } ?>

        </tbody>

    </table>
<?php } ?>