<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg ">
            <span><?php echo "<b>$item->title</b> kaydını düzenle"  ?></span>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">

                <form action="<?php echo base_url("slides/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Başlık</label>
                        <input class="form-control" placeholder="Başlık" name="title" value="<?php echo $item->title; ?>">
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("title") ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label >Açıklama</label>
                        <textarea class="m-0" name="description" data-plugin="summernote" data-options="{height: 250}">
                            <?php echo $item->description;?> 
                        </textarea>
                    </div>

                    
                    <div class="form-group">
                        <label>Animasyon Stili</label>
                        <select name="animation_type" class="form-control">
                            <option selected value ="<?php echo $item->animation_type ?>"><?php echo $item->animation_type ?></option>
                            <option value ="boxslide">boxslide</option>
                            <option value ="boxfade">boxfade</option>
                            <option value ="slotslide-horizontal">slotslide-horizontal</option>
                            <option value ="slotslide-vertical">slotslide-vertical</option>
                            <option value ="curtain-1">curtain-1</option>
                            <option value ="curtain-2">curtain-2</option>
                            <option value ="curtain-3">curtain-3</option>
                            <option value ="slotzoom-horizontal">slotzoom-horizontal</option>
                            <option value ="slotzoom-vertical">slotzoom-vertical</option>
                            <option value ="slotfade-horizontal">slotfade-horizontal</option>
                            <option value ="slotfade-vertical">slotfade-vertical</option>
                            <option value ="fade">fade</option>
                            <option value ="crossfade">crossfade</option>
                            <option value ="fadethroughdark">fadethroughdark</option>
                            <option value ="fadethroughlight">fadethroughlight</option>
                            <option value ="fadethroughtransparent">fadethroughtransparent</option>
                            <option value ="slideleft">slideleft</option>
                            <option value ="slideup">slideup</option>
                            <option value ="slidedown">slidedown</option>
                            <option value ="slideright">slideright</option>
                            <option value ="slideoverleft">slideoverleft</option>
                            <option value ="slideoverup">slideoverup</option>
                            <option value ="slideoverdown">slideoverdown</option>
                            <option value ="slideoverright">slideoverright</option>
                            <option value ="slideremoveleft">slideremoveleft</option>
                            <option value ="slideremoveup">slideremoveup</option>
                            <option value ="slideremovedown">slideremovedown</option>
                            <option value ="slideremoveright">slideremoveright</option>
                            <option value ="papercut">papercut</option>
                            <option value ="3dcurtain-horizontal">3dcurtain-horizontal</option>
                            <option value ="3dcurtain-vertical">3dcurtain-vertical</option>
                            <option value ="cubic">cubic</option>
                            <option value ="cube">cube</option>
                            <option value ="flyin">flyin</option>
                            <option value ="turnoff">turnoff</option>
                            <option value ="incube">incube</option>
                            <option value ="cubic-horizontal">cubic-horizontal</option>
                            <option value ="cube-horizontal">cube-horizontal</option>
                            <option value ="incube-horizontal">incube-horizontal</option>
                            <option value ="turnoff-vertical">turnoff-vertical</option>
                            <option value ="fadefromright">fadefromright</option>
                            <option value ="fadefromleft">fadefromleft</option>
                            <option value ="fadefromtop">fadefromtop</option>
                            <option value ="fadefrombottom">fadefrombottom</option>
                            <option value ="fadetoleftfadefromright">fadetoleftfadefromright</option>
                            <option value ="fadetorightfadefromleft">fadetorightfadefromleft</option>
                            <option value ="fadetobottomfadefromtop">fadetobottomfadefromtop</option>
                            <option value ="fadetotopfadefrombottom">fadetotopfadefrombottom</option>
                            <option value ="parallaxtoright">parallaxtoright</option>
                            <option value ="parallaxtoleft">parallaxtoleft</option>
                            <option value ="parallaxtotop">parallaxtotop</option>
                            <option value ="parallaxtobottom">parallaxtobottom</option>
                            <option value ="scaledownfromright">scaledownfromright</option>
                            <option value ="scaledownfromleft">scaledownfromleft</option>
                            <option value ="scaledownfromtop">scaledownfromtop</option>
                            <option value ="scaledownfrombottom">scaledownfrombottom</option>
                            <option value ="zoomout">zoomout</option>
                            <option value ="zoomin">zoomin</option>
                            <option value ="slidingoverlayup">slidingoverlayup</option>
                            <option value ="slidingoverlaydown">slidingoverlaydown</option>
                            <option value ="slidingoverlayright">slidingoverlayright</option>
                            <option value ="slidingoverlayleft">slidingoverlayleft</option>
                            <option value ="parallaxcirclesup">parallaxcirclesup</option>
                            <option value ="parallaxcirclesdown">parallaxcirclesdown</option>
                            <option value ="parallaxcirclesright">parallaxcirclesright</option>
                            <option value ="parallaxcirclesleft">parallaxcirclesleft</option>
                            <option value ="notransition">notransition</option>
                            <option value ="parallaxright">parallaxright</option>
                            <option value ="parallaxleft">parallaxleft</option>
                            <option value ="parallaxup">parallaxup</option>
                            <option value ="parallaxdown">parallaxdown</option>
                            <option value ="grayscale">grayscale</option>
                            <option value ="grayscalecross">grayscalecross</option>
                            <option value ="brightness">brightness</option>
                            <option value ="brightnesscross">brightnesscross</option>
                            <option value ="blurlight">blurlight</option>
                            <option value ="blurlightcross">blurlightcross</option>
                            <option value ="blurstrong">blurstrong</option>
                            <option value ="blurstrongcross">blurstrongcross</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Animasyon Süresi</label>
                        <select name="animation_time" class="form-control">
                            <option <?php echo (get_slider_velocity_name($item->animation_time) == "cok-hizli") ? "selected" : "" ;?> value="cok-hizli">Çok Hızlı</option>
                            <option <?php echo (get_slider_velocity_name($item->animation_time) == "hizli") ? "selected" : "" ;?> value="hizli">Hızlı</option>
                            <option <?php echo (get_slider_velocity_name($item->animation_time) == "orta") ? "selected" : "" ;?> value="orta">Orta</option>
                            <option <?php echo (get_slider_velocity_name($item->animation_time) == "yavas") ? "selected" : "" ;?> value="yavas">Yavaş</option>
                            <option <?php echo (get_slider_velocity_name($item->animation_time) == "cok-yavas") ? "selected" : "" ;?> value="cok-yavas">Çok Yavaş</option>
                        </select>
                    </div>

                    <div class="row image_upload_container">
                        <div class="col-md-3 text-center" style="padding:1rem !important;">
                            <img src="<?php echo get_picture($viewFolder, $item->img_url, "1920x650"); ?>"  width="330" class="img-responsive img-thumbnail ">
                            <br>
                            <small class=" text-purple text-lowercase ">(Mevcut mükemmel görseliniz)</small>
                        </div>
                        <div class="form-group col-md-9">
                            <label>Görsel seçiniz</label>
                            <input type="file" class="form-control" name="img_url" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Buton Kullanımı</label><br>
                        <input
                                class="form-control button_usage_btn"
                                type="checkbox"
                                <?php echo ($item->allowButton) ? "checked" : "" ; ?>
                                data-switchery
                                name="allowButton"
                                data-color="#10c469"/>
                    </div>

                    <div class="button-information-container" style="display: <?php echo ($item->allowButton) ? "block" : "none" ; ?> ; ">
                        <div class="form-group">
                            <label>Buton Başlık</label>
                            <input class="form-control" placeholder="Butonun üzerindeki yazı" name="button_caption" value="<?php echo $item->button_caption; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("button_caption"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label>URL Bilgisi</label>
                            <input class="form-control" placeholder="Butona basıldığında gidilecek olan URL Bilgisi" name="button_url" value="<?php echo $item->button_url; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("button_url"); ?></small>
                            <?php } ?>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-outline btn-md"><i class="fa fa-rocket"></i> Güncelle</button>
                    <a href="<?php echo base_url("slides"); ?>" class="btn btn-danger btn-outline btn-md"><i class="fa fa-remove "></i> İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- END row -->
