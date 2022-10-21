<?php 
register_activation_hook('../weather.php', 'pluginprefix_function_to_run');
register_deactivation_hook('../weather.php', 'pluginprefix_function_to_run');

function wpdocs_register_my_custom_menu_page() {
	add_menu_page(
		__( 'WeatherPluginAdmin', 'textdomain' ),
		'Weather',
		'manage_options',
		'weatherPlugin/weather-admin.php',
		'',
        plugins_url(''),
		6
	);
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );


/* add_action('wp_footer', function(){?>
        <script>
            alert('ok')
        </script>

<?php }, 9999); ?> */