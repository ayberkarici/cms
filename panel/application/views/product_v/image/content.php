<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <h4 class="m-b-lg ">
            <span>Ürünün fotoğrafları..</span>
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
            <span><?php echo $item->title ?> ürününe ait fotoğraflar</span>
        </h4>
        <div class="widget p-lg">
            <div class="widget-body">
                <table class="table table-bordered table-stripe table-hover pictures-list">
                    <thead>
                        <th class="w100">#id</th>
                        <th class="w100">Görsel</th>
                        <th>Resim Adı</th>
                        <th class="w100">Durumu</th>
                        <th class="w100">İşlem</th>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="text-center">#1</td>
                            <td class="text-center"><img class="image-responsive" width="30" src="https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/macbook-air-space-gray-select-201810?wid=892&hei=820&&qlt=80&.v=1603332211000" alt="apple"></td>
                            <td class="">MacBook 13inç</td>
                            <td class="text-center">
                                <input 
                                    data-url="<?php echo base_url("product/isActiveSetter"); ?>"
                                    type="checkbox" 
                                    class="btn-xs isActive" 
                                    data-switchery 
                                    data-color="#10c469" 
                                    <?php echo (true) ? "checked" : "" ?>
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
                    </tbody>
                </table>
            </div>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>