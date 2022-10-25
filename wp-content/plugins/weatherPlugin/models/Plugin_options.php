<?php 
/* register_activation_hook(realpath($_SERVER["DOCUMENT_ROOT"]) .'\weather\wp-content\plugins\weatherPlugin\weather.php', 'plugin_activated'); */
register_activation_hook("weatherPlugin/weather.php", 'plugin_activated');


function wpdocs_register_my_custom_menu_page() {
	add_menu_page(
		__( 'WeatherPluginAdmin', 'textdomain' ),
		'Weather',
		'manage_options',
		'weatherPlugin/weather.php',
		'',
		plugins_url(''),
		66
	);
}

add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );

function plugin_activated(){

	if ( ! current_user_can( 'activate_plugins' ) ) return;

	$page_slug = 'Weather'; // Slug of the Post
	$new_page = array(
	'post_type'     => 'page', 				// Post Type Slug eg: 'page', 'post'
	'post_title'    => 'Weather',	// Title of the Content
	'post_content'  => 'Test Page Content',	// Content
	'post_status'   => 'publish',			// Post Status
	'post_author'   => 1,					// Post Author ID
	'post_name'     => $page_slug			// Slug of the Post

	);

	if (!get_page_by_path( $page_slug, OBJECT, 'page')) { // Check If Page Not Exits
		$new_page_id = wp_insert_post($new_page);
	}

}

class PluginFunctions extends Database{

	public function plugin_deactivated(){
		$delete = $this->connect()->prepare("DELETE FROM wp_posts WHERE post_name = 'weather'");
		$delete->execute();
		
	}
}



function delete(){
	$postDelete = new PluginFunctions();
	$postDelete->plugin_deactivated();
}

register_deactivation_hook('weatherPlugin/weather.php', 'delete'); 


