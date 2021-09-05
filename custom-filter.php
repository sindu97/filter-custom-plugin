<?php
/**
* Plugin Name: Custom Filter
* Plugin URI: 
* Description: Custom Filter pLugin
* Version: 1.0
* Author: 
* Author URI: 
**/

add_action( 'wp_enqueue_scripts', 'password_protected_page_style' );

function password_protected_page_style() {
 wp_enqueue_style( 'filter_style', plugins_url( '/assets/css/filter_style.css', __FILE__ ) );
 wp_enqueue_script( 'jquery', plugins_url( '/assets/js/jquery.min.js', __FILE__ ) );
 wp_enqueue_script( 'ajax-script', plugin_dir_url( __FILE__ ) . 'assets/js/my-ajax-script.js', array('jquery') );
 wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}
add_shortcode( 'custom_filter', 'ht_custom_filter_tender' );

function admin_style() {
  wp_enqueue_style('admin-styles', plugins_url( '/assets/css/admin.css', __FILE__ ));
}

add_action('admin_enqueue_scripts', 'admin_style');

// The custom function to register a custom post type
function ht_custom_filter_tender() {

	global $wpdb;
	$table = "{$wpdb->prefix}tenders";
	$all_tender = $wpdb->prepare( "SELECT * FROM $table" );
    $result = $wpdb->get_results($all_tender);

	require plugin_dir_path( __FILE__ ) . 'template/all-custom-data.php';



}



/* After Submit Redirect */

add_action('wp_footer', 'wpshout_action_example'); 

function wpshout_action_example() { 
	?>

 <script>	
	jQuery(document).ready(function() {		
	
	});
	</script>
<?php }
