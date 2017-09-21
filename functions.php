<?php // Functions





// HTML Classes
function applicator_kid_html_classes() {

    // Echo
    echo ' ' . 'applicator-kid';
}
add_action( 'applicator_hook_html_class', 'applicator_kid_html_classes');





// Styles
function applicator_kid_styles() {
    
    // Styles - Applicator 
    wp_enqueue_style( 'applicator-style', trailingslashit( get_template_directory_uri() ). 'style.css' );
    
    wp_enqueue_style( 'applicator-style--h5bp', trailingslashit( get_template_directory_uri() ). 'assets/css/h5bp.css' );
    
    wp_enqueue_style( 'applicator-style--default', trailingslashit( get_template_directory_uri() ). 'assets/css/default.css' );
    
    wp_enqueue_style( 'applicator-snapon--applicator-style', trailingslashit( get_template_directory_uri() ). 'snapons/applicator/assets/css/applicator.css' );
    
    
    // Styles - Applicator Kid
    wp_enqueue_style( 'applicator-kid-style', get_stylesheet_uri() );
    
    wp_enqueue_style( 'applicator-kid-style--default', trailingslashit( get_theme_file_uri() ). 'assets/css/default.css' );
}
add_action('wp_enqueue_scripts', 'applicator_kid_styles', 0);





// Snap-ons
// require_once trailingslashit( get_stylesheet_directory() ) . 'snapons/snapon-name/index.php';