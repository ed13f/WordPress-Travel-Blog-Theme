<!DOCTYPE html>
<html style="margin-top:0 !important;" <?php language_attributes(); echo $html_classes; ?>>
	<head>
		<title><?php wp_title(' | ', true, 'right'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="mask-icon" href="<?=get_template_directory_uri() ?>/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
		<link rel="shortcut icon" href="<?=get_template_directory_uri() ?>/images/favicons/favicon.ico">
		<link rel="stylesheet" href="<?=get_template_directory_uri() ?>/css/style.css">
		<meta name="msapplication-TileColor" content="#2f4543">
		<meta name="msapplication-config" content="<?=get_template_directory_uri() ?>/images/favicons/browserconfig.xml">
		<meta name="theme-color" content="#2f4543">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
		<script src="<?=get_template_directory_uri() ?>/js/scripts.js"></script>


		<script src="//code.jquery.com/jquery.min.js"></script>
		<!-- <script src="//code.jquery.com/jquery.hoverIntent.js"></script> -->


		<?php wp_head(); 

		?>
	</head>
	<body <?php body_class() ?><?= is_singular() ? ' data-id="'.get_the_ID().'"' : '' ?>>
		<?php do_action('body'); 
		?>
