<div class="row">
<div class="col-md-12">
    <h4 class="m-b-lg ">
        <span>Ürün Listesi</span>
        <a href="<?php echo base_url('product/new_form'); ?>" class=" btn btn-primary btn-outline btn-info btn-xs pull-right"><i class="fa fa-plus"></i> Yeni Ekle</a>
    </h4>
    <div class="widget p-lg">

        <?php if(empty($items)) { ?>
            <div class="alert alert-info text-center" role="alert">
                <span>Burada herhangi bir kayıt bulunamadı. Eklemek için </span>
                <a href="<?php echo base_url('product/new_form'); ?>">tıklayınız</a>
            </div>        

        <?php } else {  ?>

        <table class="table table-striped table-hover">

        <thead>
            <th>#id</th>
            <th>url</th>
            <th>Başlık</th>
            <th>Açıklama</th>
            <th>Durumu</th>
            <th>İşlem</th>
        </thead>

        <tbody>
            <?php foreach ($items as $item):?>
            <tr>
                <td>#<?php echo $item->id; ?></td>
                <td><?php echo $item->url; ?></td>
                <td><?php echo $item->title; ?></td>
                <td><?php echo $item->description; ?></td>
                <td>							
						<input 
                            type="checkbox" 
                            class="btn-xs" 
                            data-switchery 
                            data-color="#10c469" 
                            <?php echo ($item->isActive) ? "checked" : "" ?>
                        />
                </td>
                <td>
                    <button type="button" class="btn btn-xs btn-danger">
                        <i class="fa fa-trash-o"></i> Sil
                    </button>
                    <button type="button" class="btn btn-xs btn-warning">
                        <i class="fa fa-pencil-square-o"></i> Düzenle
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