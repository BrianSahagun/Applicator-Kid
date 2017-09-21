<?php
/*
Snap-on Name: [Snap-on Name]
Description: Snap-on for blog.briansahagun.com
Author: Brian Dys Sahagun
Version: 0.0.0
Author URI: http://applicator.dysinelab.com
*/





// HTML Class
function applicator_kid_snapon_snapon_name_html_classes() {
		
    $snapon_name = 'applicator-kid-snapon--snapon-name';

    echo ' ' . $snapon_name;

}
add_action( 'applicator_hook_html_class', 'applicator_kid_snapon_snapon_name_html_classes');





// Styles
function applicator_kid_snapon_snapon_name_styles() {
    
    wp_enqueue_style( 'applicator-kid-snapon--snapon-name-style', get_theme_file_uri(). '/snapons/snapon-name/assets/css/snapon-name.css' );

}
add_action('wp_enqueue_scripts', 'applicator_kid_snapon_snapon_name_styles', 0);