<?php $settings = get_settings(); ?>

<meta charset="utf-8">
<title><?php echo $settings->company_name ." | ". $settings->slogan; ?></title>
<meta name="description" content="Description, Description, Description">
<meta name="author" content="Ayberk Arıcı">

<!-- Mobile Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
<?php $this->load->view("includes/include_style") ?>