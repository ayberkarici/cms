<?php if(empty($item_images)) { ?>

    <div class="alert alert-info text-center">
        <p>Burada herhangi bir resim bulunmamaktadır.</a></p>
    </div>

<?php } else { ?>

    <table class="table table-bordered table-striped table-hover pictures_list">
        <thead>
            <th class="order"><i class="fa fa-reorder"></i></th>
            <th class="order">#id</th>
            <th width = "184">Görsel</th>
            <th>Resim Adı</th>
            <th class="order-status">Durumu</th>
            <th class="order-status">Kapak</th>
            <th class="order-status">İşlem</th>
        </thead>

        <tbody class="sortable" data-url="<?php echo base_url("portfolios/imageRankSetter"); ?>">
            <?php foreach($item_images as $image){ ?>

                <tr id="ord-<?php echo $image->id; ?>">
                    <td class="order"><i class="fa fa-reorder"></i></td>
                    <td class="w100 text-center order ">#<?php echo $image->id; ?></td>
                    <td>
                        <img 
                            width="150"
                            class="img-responsive img-rounded"
                            src="<?php echo get_picture($viewFolder, $image->img_url, "255x157"); ?>" 
                            alt="" 
                            srcset="">
                    </td>
                    <td><?php echo $image->img_url; ?></td>
                    <td class="w100 text-center order-status">
                        <input
                            data-url="<?php echo base_url("portfolios/imageIsActiveSetter/$image->id"); ?>"
                            data-id="<?php echo $image->id ?>"
                            class="btn-xs isActive"
                            type="checkbox"
                            data-switchery
                            data-size="small"
                            data-color="#10c469"
                            <?php echo ($image->isActive) ? "checked" : ""; ?>
                        />
                    </td>
                    <td class="w100 text-center">
                        <input
                            data-url="<?php echo base_url("portfolios/isCoverSetter/$image->id/$image->portfolio_id"); ?>"
                            class="btn-xs isCover"
                            type="checkbox"
                            data-switchery
                            data-size="small"
                            data-color="#ff5b5b"
                            <?php echo ($image->isCover) ? "checked" : ""; ?>
                        />
                    </td>
                    <td class="w100 text-center">
                        <button
                            data-url="<?php echo base_url("portfolios/imageDelete/$image->id/$image->portfolio_id"); ?>"
                            class="btn btn-sm btn-danger btn-outline remove-btn btn-block">
                            <i class="fa fa-trash"></i> Sil
                        </button>
                    </td>
                </tr>

            <?php } ?>

        </tbody>

    </table>
<?php } ?>