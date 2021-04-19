<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg ">
            <span><?php echo "<b>$item->title</b> kaydını düzenle"  ?></span>
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("portfolios/update/$item->id"); ?>" method="post">
                <div class="row">
                    <div class="form-group col-md-6 ">
                        <label>Başlık giriniz</label>
                        <input class="form-control" 
                            placeholder="İşi anlatan başlık bilgisi" 
                            name="title" 
                            value="<?php echo (isset($form_error)) ? set_value("title") : $item->title ; ?>"
                        >
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("title") ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-md-6 ">
                        <label>Kategori</label>
                        <select name="category_id" class="form-control">
                            <?php foreach ($categories as $category): ?>
                                <option
                                <?php $category_id = (isset($form_error)) ? set_value("category_id") : $item->category_id; ?>
                                    <?php echo ($category->id === $category_id) ? "selected" : ""; ?>
                                    value="<?php echo $category->id ?>"><?php echo $category->title ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if(isset($form_error)): ?>
                            <small class="input-form-error"><?php echo form_error("category_id") ?></small>
                        <?php endif; ?>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="datetimepicker1">Bitirme Tarihi</label>
							<input type="hidden" 
                                name="finishedAt" 
                                id="datetimepicker1" 
                                data-plugin="datetimepicker" 
                                data-options="{ inline: true, viewMode: 'days', format:'YYYY-MM-DD HH:mm:ss' }"
                                value="<?php echo (isset($form_error)) ?set_value("finishedAt") : $item->finishedAt ; ?>"
                            >
                        </div>
                        <div class="col-md-8">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label>Müşteri</label>
                                        <input class="form-control" 
                                            placeholder="İşi yaptığınız müşteri" 
                                            name="client"
                                            value="<?php echo (isset($form_error)) ?set_value("client") : $item->client ; ?>"
                                        >
                                        <?php if(isset($form_error)): ?>
                                            <small class="input-form-error"><?php echo form_error("client") ?></small>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label>Yer/Mekan</label>
                                        <input class="form-control" 
                                            placeholder="İşi yaptığınız yer, mekan bilgisi" 
                                            name="place"
                                            value="<?php echo (isset($form_error)) ?set_value("place") : $item->place ; ?>"
                                        >
                                        <?php if(isset($form_error)): ?>
                                            <small class="input-form-error"><?php echo form_error("place") ?></small>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label>Yapılan işin Bağlantısı</label>
                                        <input class="form-control" 
                                            placeholder="Yapılan işin internet üzerindeki bağlantısı" 
                                            name="portfolio_url"
                                            value="<?php echo (isset($form_error)) ?set_value("portfolio_url") : $item->portfolio_url ; ?>"
                                        >
                                        <?php if(isset($form_error)): ?>
                                            <small class="input-form-error"></small>
                                        <?php endif; ?>
                                    </div>
                                </div>


                            </div>                                
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Açıklama</label>
                        <textarea class="m-0" name="description" data-plugin="summernote" data-options="{height: 250}">
                            <?php echo (isset($form_error)) ?set_value("description") : $item->description ; ?>
                        </textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-outline btn-md"><i class="fa fa-rocket"></i> Kaydet</button>
                    <a href="<?php echo base_url("portfolios"); ?>" class="btn btn-danger btn-outline btn-md"><i class="fa fa-remove "></i> İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- END row -->
