
<div role="tabpanel" class="tab-pane fade" id="tab-4">
    <div class="row">
        <div class="form-group col-md-12">
            <label >Misyonumuz</label>
            <textarea class="m-0" name="mission" data-plugin="summernote" data-options="{height: 250}"><?php echo (isset($form_error)) ? set_value("mission") : $item->mission ;  ?></textarea>
        </div>
    </div>
</div><!-- .tab-pane  -->