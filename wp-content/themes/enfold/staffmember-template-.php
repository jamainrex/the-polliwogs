
<?php
/**
 * Template Name: Staff member
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<?php
	if ( !defined('ABSPATH') ){ die(); }
	
	global $avia_config, $more;

	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */
	 get_header();
	
		
		$showheader = true;
		if(avia_get_option('frontpage') && $blogpage_id = avia_get_option('blogpage'))
		{
			if(get_post_meta($blogpage_id, 'header', true) == 'no') $showheader = false;
		}
		
	 	if($showheader)
	 	{
			echo avia_title(array('title' => avia_which_archive()));
		}
		
		do_action( 'ava_after_main_title' );
	?>

		<div class='container_wrap container_wrap_first main_color <?php avia_layout_class( 'main' ); ?>'>

			<div class='container template-blog '>
     

      <?php

        global $wpdb;
        $result = $wpdb->get_results( "SELECT * FROM pw_ab_services");
        foreach ( $result as $print )   { 
			  echo "services";
        echo "<pre>";
                  var_dump($print);
			      echo "</pre>";
			   $resultsea = $wpdb->get_results( "SELECT * FROM pw_ab_staff where id =$print->id");
			  echo "staff";
			    echo "<pre>";
                  var_dump($resultsea);
			      echo "</pre>";
			        
                  
              $resultsnumber = $wpdb->get_results( "SELECT * FROM pw_ab_customer_appointments where id =$print->id");
			 echo "person";
			    echo "<pre>";
                  var_dump( $resultsnumber);
			      echo "</pre>";
			
			  $resultsnumber = $wpdb->get_results( "SELECT * FROM pw_ab_payments where id =$print->id");
			 echo "Date";
			    echo "<pre>";
                  var_dump( $resultsnumber);
			      echo "</pre>";
                
               
             $results = $wpdb->get_results( "SELECT * FROM pw_ab_categories where id=$print->category_id");
			 // print_r("SELECT * FROM pw_ab_services where wp_user_id=$print->wp_user_id");
				foreach ( $results as $printes ) {
					echo "<category>";
					echo "<pre>";
					var_dump($printes);
					echo "</pre>";
					
					
			      
} 
			  
		}	 
            
 
      ?>

	
		
			</div><!--end container-->

		</div><!-- close default .container_wrap element -->




<?php get_footer(); ?>
