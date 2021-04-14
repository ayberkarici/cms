<div class="simple-page-wrap">
	<div class="simple-page-logo animated swing">
		<a href="#">
			<span><i class="fa fa-gg"></i></span>
			<span>CMS</span>
		</a>
	</div><!-- logo -->
	<div class="simple-page-form animated flipInY" id="reset-password-form">
		<h4 class="form-title m-b-xl text-center">Şifrenizi mi unuttunuz?</h4>

		<form action="<?php echo base_url("sifremi-yenile");?>" method="post">
			<div class="form-group">
				<input type="email" 
				class="form-control" 
				name="email" 
				placeholder="E-posta Adresi" 
				value="<?php echo isset($form_error) ? set_value("email") : "" ; ?>">
				<?php if(isset($form_error)): ?>
                	<small class="input-form-error"><?php echo form_error("email") ?></small>
            	<?php endif; ?>
			</div>
			
			<button class="btn btn-primary ">Şifremi sıfırla</button>
		</form>
	</div><!-- #reset-password-form -->
</div><!-- .simple-page-wrap -->