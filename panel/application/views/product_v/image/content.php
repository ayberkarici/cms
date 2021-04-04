<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <h4 class="m-b-lg ">
            <span>Ürünün fotoğrafları..</span>
        </h4>
        <div class="widget p-lg">
            <form action="../api/dropzone" class="dropzone" data-plugin="dropzone" data-options="{ url: '../api/dropzone'}">
    			<div class="dz-message">
    				<h3 class="m-h-lg">Drop files here or click to upload.</h3>
    				<p class="m-b-lg text-muted">(This is just a demo dropzone. Selected files are not actually uploaded.)</p>
    			</div>
    	    </form>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <h4 class="m-b-lg ">
            <span>Ürünün fotoğrafları..</span>
        </h4>
        <div class="widget p-lg">
            <div class="widget-body">
                <table class="table table-bordered table-stripe table-hover">
                    <thead>
                        <th>#id</th>
                        <th>Görsel</th>
                        <th>Resim Adı</th>
                        <th>Durumu</th>
                        <th>İşlem</th>
                    </thead>

                    <tbody>
                        <tr>
                            <th>#1</th>
                            <th><img class="image-responsive" width="50" src="https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/macbook-air-space-gray-select-201810?wid=892&hei=820&&qlt=80&.v=1603332211000" alt="apple"></th>
                            <th>MacBook 13inç</th>
                            <th>
                                <input 
                                    data-url="<?php echo base_url("product/isActiveSetter"); ?>"
                                    type="checkbox" 
                                    class="btn-xs isActive" 
                                    data-switchery 
                                    data-color="#10c469" 
                                    <?php echo (true) ? "checked" : "" ?>
                                    data-size="small"
                                />
                            </th>
                            <th>                    
                                <button  
                                    type="button" 
                                    class="btn btn-xs btn-danger remove-btn" 
                                    data-url="<?php echo base_url("product/image_form") ?>"
                                    data-name="<?php echo "" ?>">
                                    <i class="fa fa-thash-o"></i> Sil
                                </button>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>