<!DOCTYPE html>
<!--[if IE 9]> <html lang="tr" class="ie9"> <![endif]-->
<!--[if gt IE 9]> <html lang="tr" class="ie"> <![endif]-->
<!--[if !IE]><!-->
<html lang="tr">
	<!--<![endif]--> 
<head>
	<?php $this->load->view("includes/head"); ?>
</head>
<body class=" transparent-header front-page page-loader-5">

	<div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>

	<div class="page-wrapper">
		<?php $this->load->view("includes/header"); ?>
		<div class="breadcrumb-container">
        	<div class="container">
          		<ol class="breadcrumb">
            		<li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a href="index.html">Home</a></li>
            		<li class="breadcrumb-item active">breadcrumb</li>
          		</ol>
        	</div>
      	</div>
		<?php $this->load->view("{$viewFolder}/content"); ?>
	
		<?php $this->load->view("includes/footer"); ?>
		
	</div>
	
	
	<?php $this->load->view("includes/include_script"); ?>
	
</body>
</html>