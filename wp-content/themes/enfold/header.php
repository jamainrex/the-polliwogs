<?php
	if ( !defined('ABSPATH') ){ die(); }
	
	global $avia_config;

	$style 				= $avia_config['box_class'];
	$responsive			= avia_get_option('responsive_active') != "disabled" ? "responsive" : "fixed_layout";
	$blank 				= isset($avia_config['template']) ? $avia_config['template'] : "";	
	$av_lightbox		= avia_get_option('lightbox_active') != "disabled" ? 'av-default-lightbox' : 'av-custom-lightbox';
	$preloader			= avia_get_option('preloader') == "preloader" ? 'av-preloader-active av-preloader-enabled' : 'av-preloader-disabled';
	$sidebar_styling 	= avia_get_option('sidebar_styling');
	$filterable_classes = avia_header_class_filter( avia_header_class_string() );

	
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php echo "html_{$style} ".$responsive." ".$preloader." ".$av_lightbox." ".$filterable_classes ?> ">
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KS9BVWT');</script>
<!-- End Google Tag Manager -->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/enfold/css/bootstrap.min.css">
<?php
/*
 * outputs a rel=follow or nofollow tag to circumvent google duplicate content for archives
 * located in framework/php/function-set-avia-frontend.php
 */
 if (function_exists('avia_set_follow')) { echo avia_set_follow(); }

?>


<!-- mobile setting -->
<?php

if( strpos($responsive, 'responsive') !== false ) echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">';
?>


<!-- Scripts/CSS and wp_head hook -->
<?php
/* Always have wp_head() just before the closing </head>
 * tag of your theme, or you will break many plugins, which
 * generally use this hook to add elements to <head> such
 * as styles, scripts, and meta tags.
 */

if( get_post_type()=="rsvp" ): 
?> 
   <style type="text/css">
	.main_color{
		  background: url(<?php echo site_url();?>/wp-content/uploads/2016/12/rsvp_form_bgonly.jpg) top center no-repeat!important;
	}
	</style>
<?php 
endif; 

$url = site_url()."/index.php/event-booking/";
if( get_the_permalink() == $url ): 
?> 
   <style type="text/css">
	.main_color{
		  background: url(<?php echo site_url();?>/wp-content/uploads/2016/12/event_bg.jpg) top center no-repeat!important;
		  border:none !important ;
	}
	.container_wrap.container_wrap_first.main_color.fullsize {
		min-height: 750px;
	}
	.main_color div{
		 border:none !important ;
	}
	.party  , .party_booking{
		display: none;
	}
	.event {
		display: block !important;
	}
	.event_ticket{
		display:block !important ;
		color: #f38a00 !important;
	}
	.entrance_ticket{
		display:none !important ;
	}
	.entrance_ticket_head , .party_head{
		display: none !important ;
	}
	</style>
<?php 
endif; 

$ticket_url = site_url()."/index.php/buy-ticket/";
if( get_the_permalink() == $ticket_url ): 
?> 
   <style type="text/css">
	.main_color{
		background-image: url(http://polaris.dev.inginim.com:40080/polliwogs_uat/wp-content/uploads/2016/12/ticket_bg.jpg) !important;
		border: none !important;
		background-size: cover;
	}
	.container_wrap.container_wrap_first.main_color.fullsize {
		min-height: 750px;
	}
	.main_color div{
		 border:none !important ;
	}
	.party , .party_booking{
		display: none;
	}
	.ticket , .entrance_ticket {
		display: block !important;
	}
	.event_ticket_head , .party_head{
		display: none;
	}
	.event {
		display: none !important;
	}
	</style>
	
<?php 
endif;
$party_url = site_url()."/index.php/book-a-party/";
if( get_the_permalink() == $party_url ): 
?> 
   <style type="text/css">
	.event_ticket_head , .entrance_ticket_head{
		display: none !important;
	}
	
	</style>
	
<?php 
endif;

wp_head();

?>

<!-- <html>
	<head>
		<meta name="msvalidate.01" content="D4845D7E8729199E916826C260B9057D" />
		<title>Your SEO optimized title</title>
	</head>
	<body>
		page contents
	</body>
</html> -->

</head>




<body id="top" <?php body_class($style." ".$avia_config['font_stack']." ".$blank." ".$sidebar_styling); avia_markup_helper(array('context' => 'body')); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KS9BVWT"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<?php 
		
	if("av-preloader-active av-preloader-enabled" === $preloader)
	{
		echo avia_preload_screen(); 
	}
		
	?>

	<div id='wrap_all'>

	<?php 
	if(!$blank) //blank templates dont display header nor footer
	{ 
		 //fetch the template file that holds the main menu, located in includes/helper-menu-main.php
         get_template_part( 'includes/helper', 'main-menu' );

	} ?>
		
	<div id='main' class='all_colors' data-scroll-offset='<?php echo avia_header_setting('header_scroll_offset'); ?>'>

	<?php 
		
		if(isset($avia_config['temp_logo_container'])) echo $avia_config['temp_logo_container'];
		do_action('ava_after_main_container'); 
		
	?>
