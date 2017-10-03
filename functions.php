<?php // Functions





/* ------------------------ Styles and Scripts ------------------------ */
function applicator_kid_default_styles_scripts() {
        
        
    /* ------------ Applicator Styles (do not modify) ------------ */
    wp_enqueue_style( 'applicator-style', get_template_directory_uri(). '/style.css' );
    wp_enqueue_style( 'applicator-style--h5bp', get_template_directory_uri(). '/assets/css/h5bp.css' );
    wp_enqueue_style( 'applicator-style--default', get_template_directory_uri(). '/assets/css/default.css' );
    wp_enqueue_style( 'applicator-style--enhancements', get_template_directory_uri(). '/assets/css/enhancements.css' );
    wp_enqueue_style( 'applicator-snapon--style', get_template_directory_uri(). '/snap-on/assets/css/applicator.css' );
        
    
    /* ------------ Applicator Kid Styles ------------ */
    wp_enqueue_style( 'applicator-kid-style', get_stylesheet_uri(), array( 'applicator-snapon--style' ) );
    wp_enqueue_style( 'applicator-kid-style--default', get_theme_file_uri(). '/assets/css/default.css', array( 'applicator-kid-style' ) );

}
add_action( 'wp_enqueue_scripts', 'applicator_kid_default_styles_scripts', 0 );





/* ------------------------ CSS Class Names ------------------------ */
function applicator_kid_css_class_names() {
    
    
    // Variables
    $applicator_theme_term = 'applicator--theme';

    
    // Array
    $r = array(

        // Themes
        'main-header',
    );
    

    // Echo
    echo ' ' . 'applicator-kid';
    
    foreach ( ( array ) $r as $css_class_name ) {
        echo ' '. $applicator_theme_term. '--'. $css_class_name;
    }
}
add_action( 'applicator_hook_html_class', 'applicator_kid_css_class_names');