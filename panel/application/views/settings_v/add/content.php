<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg ">
            <span>Site Ayarı Ekle</span>
        </h4>
    </div>

    <div class="col-md-12 m-b-md">
        <form action="<?php echo base_url("settings/save"); ?>" method="post" enctype="multipart/form-data">

            <div class="widget">
                <div class="m-b-lg nav-tabs-horizontal">
                    <!-- tabs list -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#tab-1" aria-controls="tab-1" role="tab" data-toggle="tab">Site Bilgileri</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab-2" aria-controls="tab-2" role="tab" data-toggle="tab">Adres Bilgisi</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab-3"  aria-controls="tab-3" role="tab" data-toggle="tab">Hakkımızda</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab-4"  aria-controls="tab-4" role="tab" data-toggle="tab">Misyon</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab-5"  aria-controls="tab-5" role="tab" data-toggle="tab">Vizyon</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab-6"  aria-controls="tab-6" role="tab" data-toggle="tab">Sosyal Medya</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab-7"  aria-controls="tab-7" role="tab" data-toggle="tab">Logo</a>
                        </li>
                    </ul><!-- .nav-tabs -->

                    <!-- Tab panes -->
                    <div class="tab-content p-md">

                        <div role="tabpanel" class="tab-pane in active fade" id="tab-1">

                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label>Şirket Adı</label>
                                    <input class="form-control" placeholder="Şirketin ya da Sitenizin adı" name="company_name" value="<?php echo (isset($form_error)) ? set_value("company_name") : "" ;  ?>">
                                    <?php if(isset($form_error)): ?>
                                        <small class="input-form-error"><?php echo form_error("company_name") ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Telefon 1</label>
                                    <input class="form-control" placeholder="Telefon numaranız" name="phone_1" value="<?php echo (isset($form_error)) ? set_value("phone_1") : "" ;  ?>">
                                    <?php if(isset($form_error)): ?>
                                        <small class="input-form-error"><?php echo form_error("phone_1") ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Telefon 2</label>
                                    <input class="form-control" placeholder="Telefon numaranız (opsiyonel)" name="phone_2">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Fax 1</label>
                                    <input class="form-control" placeholder="Fax numaranız" name="fax_1">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Fax 2</label>
                                    <input class="form-control" placeholder="Fax numaranız (opsiyonel)" name="fax_2">
                                </div>
                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-2">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label >Adres Bilgisi</label>
                                    <textarea class="m-0" name="address" data-plugin="summernote" data-options="{height: 250}"></textarea>
                                </div>
                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-3">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label >Hakkımızda</label>
                                    <textarea class="m-0" name="about_us" data-plugin="summernote" data-options="{height: 250}"></textarea>
                                </div>
                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-4">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label >Misyonumuz</label>
                                    <textarea class="m-0" name="mission" data-plugin="summernote" data-options="{height: 250}"></textarea>
                                </div>
                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-5">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label >Vizyonumuz</label>
                                    <textarea class="m-0" name="vision" data-plugin="summernote" data-options="{height: 250}"></textarea>
                                </div>
                            </div>
                        </div><!-- .tab-pane  -->
                        
                        <div role="tabpanel" class="tab-pane fade" id="tab-6">

                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label>E-posta Adresi</label>
                                    <input class="form-control" placeholder="Şirketinizin e-posta adresi" name="email" value="<?php echo (isset($form_error)) ? set_value("email") : "" ;  ?>">
                                    <?php if(isset($form_error)): ?>
                                        <small class="input-form-error"><?php echo form_error("email") ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Facebook</label>
                                    <input class="form-control" placeholder="Facebook adresiniz" name="facebook" value="<?php echo (isset($form_error)) ? set_value("facebook") : "" ;  ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Twitter</label>
                                    <input class="form-control" placeholder="Twitter adresiniz" name="twitter" value="<?php echo (isset($form_error)) ? set_value("twitter") : "" ;  ?>">

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>İnstagram</label>
                                    <input class="form-control" placeholder="İnstagram adresiniz" name="instagram" value="<?php echo (isset($form_error)) ? set_value("instagram") : "" ;  ?>">

                                </div>
                                <div class="form-group col-md-4">
                                    <label>Linkedin</label>
                                    <input class="form-control" placeholder="Linkedin adresiniz" name="linkedin" value="<?php echo (isset($form_error)) ? set_value("linkedin") : "" ;  ?>">

                                </div>
                            </div>

                        </div><!-- .tab-pane  -->
                        <div role="tabpanel" class="tab-pane fade" id="tab-7">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="form-group image_upload_container col-md-6" >
                                        <label>Görsel seçiniz</label>
                                        <input type="file" class="form-control" name="logo">
                                    </div>
                                </div>
                            </div>
                        </div><!-- .tab-pane  -->
                        

                    </div><!-- .tab-content  -->
                </div><!-- .nav-tabs-horizontal -->
            </div><!-- .widget -->
            <button type="submit" class="btn btn-primary  btn-md"><i class="fa fa-rocket"></i> Kaydet</button>
            <a href="<?php echo base_url("settings"); ?>" class="btn btn-danger  btn-md"><i class="fa fa-remove "></i> İptal</a>
        </form>
    </div><!-- END column -->
