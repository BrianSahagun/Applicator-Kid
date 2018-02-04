<?php // Aside





function applicator_dollhouse_diary_home_aside_init() {
    
    // Widget HTML Markup
    $widget_start_mu = '<div id="%1$s" class="cp widget %2$s" data-name="Widget">';
        $widget_start_mu .= '<div class="cr widget---cr">';
            $widget_start_mu .= '<div class="hr widget---hr">';
                $widget_start_mu .= '<div class="hr_cr widget---hr_cr">';
                    $widget_start_mu .= '<div class="h widget---h">';
                        $widget_start_mu .= '<span class="h_l widget---h_l">';
                            $widget_start_mu .= '<span class="l widget---l">';
                                $widget_start_mu .= esc_html__( 'Widget', 'applicator' );
                            $widget_start_mu .= '</span>';
                        $widget_start_mu .= '</span>';
                    $widget_start_mu .= '</div>';
                $widget_start_mu .= '</div>';
            $widget_start_mu .= '</div>';
            $widget_start_mu .= '<div class="ct widget---ct">';
                $widget_start_mu .= '<div class="ct_cr widget---ct_cr">';
                    $widget_start_mu .= '<div class="cp widget-content" data-name="Widget Content CP">';
                        $widget_start_mu .= '<div class="cr widget-content---cr">';
                            $widget_start_mu .= '<div class="hr widget-content---hr">';
                                $widget_start_mu .= '<div class="hr_cr widget-content---hr_cr">';
                                    $widget_start_mu .= '<div class="h widget-content---h">';
                                        $widget_start_mu .= '<span class="h_l widget-content---h_l">';
                                            $widget_start_mu .= '<span class="l widget-content---l">';
                                                $widget_start_mu .= esc_html__( 'Widget Content', 'applicator' );
                                            $widget_start_mu .= '</span>';
                                        $widget_start_mu .= '</span>';
                                    $widget_start_mu .= '</div>';
                                $widget_start_mu .= '</div>';
                            $widget_start_mu .= '</div>';
                            $widget_start_mu .= '<div class="ct widget-content---ct">';
                                $widget_start_mu .= '<div class="ct_cr widget-content---ct_cr">';

                                $widget_end_mu = '</div>';
                            $widget_end_mu .= '</div>';
                        $widget_end_mu .= '</div>';
                    $widget_end_mu .= '</div>';
                $widget_end_mu .= '</div>';
            $widget_end_mu .= '</div>';
        $widget_end_mu .= '</div>';
    $widget_end_mu .= '</div>';
    
    $widget_h_start_mu = '<div class="obj widget-heading" data-name="Widget Heading OBJ">';
        $widget_h_start_mu .= '<h4 class="h widget-heading---h">';
            $widget_h_start_mu .= '<span class="h_l widget-heading---h_l">';
                $widget_h_start_mu .= '<span class="l widget-heading---l">';

                $widget_h_end_mu = '</span>';
            $widget_h_end_mu = '</span>';
        $widget_h_end_mu .= '</h4>';
    $widget_h_end_mu .= '</div>';
    
    register_sidebar( array(
		'name'          => __( 'Dollhouse Diary Home', 'applicator' ),
		'id'            => 'dollhouse-diary-home-aside',
		'description'   => __( 'Aside located after Previously...', 'applicator' ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $widget_h_start_mu,
		'after_title'   => $widget_h_end_mu,
	) );
}
add_action( 'widgets_init', 'applicator_dollhouse_diary_home_aside_init' );





function applicator_dollhouse_diary_home_aside()
{
    $aside_name = 'dollhouse-diary-home-aside';

    if ( is_active_sidebar( $aside_name )  )
    {

        ob_start();
        dynamic_sidebar( $aside_name );
        $aside = ob_get_clean();

        $aside_cn = applicator_htmlok( array(
            'name'      => 'Dollhouse Diary Home',
            'structure' => array(
                'type'          => 'constructor',
                'subtype'       => 'aside',
                'elem'          => 'aside',
                'hr_structure'  => true,
                'h_elem'        => 'h2',
                'attr'          => array(
                    'elem'          => array(
                        'role'          => 'complementary',
                    ),
                ),
            ),
            'id'        => $aside_name,
            'content'   => array(
                'constructor'   => $aside,
            ),
        ) );

        return $aside_cn;
    }
}