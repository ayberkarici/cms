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
				<input id="reset-password-email" type="email" class="form-control" name="email" placeholder="E-posta Adresi">
			</div>
			<button class="btn btn-primary ">Şifremi sıfırla</button>
		</form>
	</div><!-- #reset-password-form -->
</div><!-- .simple-page-wrap -->