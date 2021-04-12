
<div class="simple-page-wrap">
	<div class="simple-page-logo animated swing">
		<a href="#">
			<span><i class="fa fa-gg"></i></span>
			<span>CMS</span>
		</a>
	</div><!-- logo -->
	<div class="simple-page-form animated flipInY" id="login-form">
	<h4 class="form-title m-b-xl text-center">Admin CMS hesabınızla giriş yapın</h4>
	<form action="<?php echo base_url("userop/do_login") ?>" method="post">
		<div class="form-group">
			<input id="sign-in-email" type="email" class="form-control" placeholder="Email" name="user_email">
			<?php if(isset($form_error)): ?>
                <small class="input-form-error"><?php echo form_error("user_email") ?></small>
            <?php endif; ?>
		</div>

		<div class="form-group">
			<input id="sign-in-password" type="password" class="form-control" placeholder="Password" name="user_password">
			<?php if(isset($form_error)): ?>
                <small class="input-form-error"><?php echo form_error("user_password") ?></small>
            <?php endif; ?>
		</div>

		<button type="submit" class="btn btn-primary">Giriş Yap</button>
	</form>
</div><!-- #login-form -->

