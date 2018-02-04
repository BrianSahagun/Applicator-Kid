<?php // Snap-On Index





// ------------------------ Theme Name
$GLOBALS['applicator_kid_snap_on_name'] = 'Applicator Kid';





// ------------------------ Snap-On Styles and Scripts
function applicator_kid_snap_on_styles_scripts() {
        
    wp_enqueue_style( 'applicator-kid-snap-on-style---default', get_theme_file_uri(). '/snap-on/assets/css/default.css', array( 'applicator-kid-style--default' ) );

}
add_action( 'wp_enqueue_scripts', 'applicator_kid_snap_on_styles_scripts', 0 );





// ------------------------ CSS Class Names
function applicator_kid_snap_on_css_class_names() {
    
    // Variables
    $applicator_kid_snap_on_name = sanitize_title( $GLOBALS['applicator_kid_snap_on_name'] );
    $applicator_kid_snap_on_term = sanitize_title( $GLOBALS['applicator_snap_on_term'] );
    
    
    // Array
    $r = array(
        $applicator_kid_snap_on_term,
        $applicator_kid_snap_on_name. '--'. $applicator_kid_snap_on_term,
    );

    
    // Echo
    foreach ( ( array ) $r as $css_class_name ) {
        echo ' '. $css_class_name;
    }

}
add_action( 'applicator_hook_html_class', 'applicator_kid_snap_on_css_class_names');