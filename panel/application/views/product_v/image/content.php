<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <h4 class="m-b-lg ">
            <span>Ürün Fotoğrafları</span>
        </h4>
        <div class="widget p-lg">
            <form action="<?php echo base_url("product/image_upload/$item->id") ?>" class="dropzone" data-plugin="dropzone" data-options="{ url: '<?php echo base_url("product/image_upload/$item->id") ?>'}">
    			<div class="dz-message">
    				<h3 class="m-h-lg">Yüklemek istediğiniz resmi buraya sürükleyin.</h3>
    				<p class="m-b-lg text-muted">(Sadece buraya tıklayarak da resim yükleyebilirsiniz.)</p>
    			</div>
    	    </form>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <h4 class="m-b-lg ">
            <span><b><?php echo $item->title ?></b> ürününe ait fotoğraflar</span>
        </h4>
        <div class="widget p-lg">
            <div class="widget-body">
                <?php if(empty($item_images)) { ?>
                    <div class="alert alert-info text-center" role="alert">
                        <span>Burada herhangi bir kayıt bulunamadı.</span>
                    </div>        

                <?php } else {  ?>
                    <table class="table table-bordered table-stripe table-hover pictures-list">
                        <thead>
                            <th class="w100 text-center">#id</th>
                            <th class="w100">Görsel</th>
                            <th>Resim Adı</th>
                            <th class="w100">Durumu</th>
                            <th class="w100">İşlem</th>
                        </thead>

                        <tbody>
                            <?php foreach ($item_images as $image):?>
                            <tr>
                                <td class="text-center">#<?php echo $image->id ;?></td>
                                <td class="text-center">
                                    <img 
                                        class="image-responsive" 
                                        width="30" 
                                        src="<?php echo base_url("uploads/{$viewFolder}/$image->img_url"); ?>" 
                                        alt="<?php echo $image->img_url; ?>">
                                </td>
                                <td class=""><?php echo $image->img_url; ?></td>
                                <td class="text-center">
                                    <input 
                                        data-url="<?php echo base_url("product/isActiveSetter"); ?>"
                                        type="checkbox" 
                                        class="btn-xs isActive" 
                                        data-switchery 
                                        data-color="#10c469" 
                                        <?php echo ($image->isActive) ? "checked" : "" ?> 
                                        data-size="small"
                                    />
                                </td>
                                <td class="text-center">                    
                                    <button  
                                        type="button" 
                                        class="btn btn-xs btn-danger remove-btn btn-block" 
                                        data-url="<?php echo base_url("product/image_form") ?>"
                                        data-name="<?php echo "" ?>">
                                        <i class="fa fa-thash-o"></i> Sil
                                    </button>
                                </td>
                            </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php }; ?>
            </div>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>