                        
<div role="tabpanel" class="tab-pane fade" id="tab-6">

<div class="row">
    <div class="form-group col-md-8">
        <label>E-posta Adresi</label>
        <input class="form-control" placeholder="┼×irketinizin e-posta adresi" name="email" value="<?php echo (isset($form_error)) ? set_value("email") : $item->email ;  ?>">
        <?php if(isset($form_error)): ?>
            <small class="input-form-error"><?php echo form_error("email") ?></small>
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        <label>Facebook</label>
        <input class="form-control" placeholder="Facebook adresiniz" name="facebook" value="<?php echo (isset($form_error)) ? set_value("facebook") : $item->facebook ;  ?>">
    </div>
    <div class="form-group col-md-4">
        <label>Twitter</label>
        <input class="form-control" placeholder="Twitter adresiniz" name="twitter" value="<?php echo (isset($form_error)) ? set_value("twitter") : $item->twitter ;  ?>">

    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        <label>─░nstagram</label>
        <input class="form-control" placeholder="─░nstagram adresiniz" name="instagram" value="<?php echo (isset($form_error)) ? set_value("instagram") : $item->instagram ;  ?>">

    </div>
    <div class="form-group col-md-4">
        <label>Linkedin</label>
        <input class="form-control" placeholder="Linkedin adresiniz" name="linkedin" value="<?php echo (isset($form_error)) ? set_value("linkedin") : $item->linkedin ;  ?>">

    </div>
</div>

</div><!-- .tab-pane  -->