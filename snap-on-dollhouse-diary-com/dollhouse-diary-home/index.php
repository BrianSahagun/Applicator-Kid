<?php // Index


get_template_part( 'template-parts/main-content', 'header' );

?>

<div class="ct main-content---ct">
    <div class="ct_cr main-content---ct_cr">
        
        <?php
        
        while ( have_posts() ) {
                
            the_post();

            // Page Content
            ob_start();
            applicator_entry_content();            
            $entry_content = ob_get_clean();
        }
        
        
        // Variables
        $press_releases_cat_id = get_cat_ID( 'Press Releases' );
        
        
        // ------------------------------------ Query 1: Slider Content
        ob_start();

        $args = array(
            'posts_per_page'        => 3,
            'ignore_sticky_posts'   => true,
            'category__not_in'      => $press_releases_cat_id,

        );            
        $the_query = new WP_Query( $args );

        if ( $the_query->have_posts() )
        {
        ?>        

            <div class="flexslider">
                <ul class="slides">

                <?php
                while ( $the_query->have_posts() )
                {
                    $the_query->the_post();
                    ?>
                    <li>
                    <?php
                    get_template_part( 'snap-on-dollhouse-diary-com/dollhouse-diary-home/content' );
                    ?>
                    </li>
                <?php
                }
                ?>  

                </ul>
            </div>

        <?php
        }
        wp_reset_postdata();

        $slider_content = ob_get_clean();
        
        
        // ------------------------------------ Query 2: Main Posts Content
        ob_start();

        $args = array(
            'offset'                => 3,
            'posts_per_page'        => 2,
            'ignore_sticky_posts'   => true,
            'category__not_in'      => $press_releases_cat_id,

        );            
        $the_query = new WP_Query( $args );

        if ( $the_query->have_posts() )
        {
            while ( $the_query->have_posts() )
            {
                $the_query->the_post();
                get_template_part( 'snap-on-dollhouse-diary-com/dollhouse-diary-home/content' );

            }
        }
        wp_reset_postdata();

        $main_posts_content = ob_get_clean();
        
        
        // ------------------------------------ Query 3: Main Posts Content - Press Releases
        ob_start();        
        
        $args = array(
            'posts_per_page'    => 1,
            'category_name'     => 'press-releases',

        );            
        $the_query = new WP_Query( $args );

        if ( $the_query->have_posts() )
        {
            while ( $the_query->have_posts() )
            {
                $the_query->the_post();
                get_template_part( 'snap-on-dollhouse-diary-com/dollhouse-diary-home/content' );

            }
        }
        wp_reset_postdata();
        
        $pr_content = ob_get_clean();
        
        
        
        // ------------------------------------ Query 4: Previous Posts
        ob_start();

        $args = array(
            'offset'                => 5,
            'posts_per_page'        => 3,
            'ignore_sticky_posts'   => true,
            'category__not_in'      => $press_releases_cat_id,

        );            
        $the_query = new WP_Query( $args );

        if ( $the_query->have_posts() )
        {
            while ( $the_query->have_posts() )
            {
                $the_query->the_post();
                get_template_part( 'snap-on-dollhouse-diary-com/dollhouse-diary-home/content' );

            }
        }
        wp_reset_postdata();

        $previous_posts_content = ob_get_clean();
        
        
        
        
        
        // ------------------------------------ Markup
        $previous_posts_cp = applicator_htmlok( array(
            'name'      => 'Previous Posts',
            'structure' => array(
                'type'      => 'component',
            ),
            'content'   => array(
                'component'     => array(
                    $previous_posts_content,
                ),
            ),
        ) );
        
        
        $main_posts_cp = applicator_htmlok( array(
            'name'      => 'Main Posts After Slider',
            'structure' => array(
                'type'      => 'component',
            ),
            'content'   => array(
                'component'     => array(
                    $main_posts_content,
                    $pr_content,
                ),
            ),
        ) );
        
        
        $slider_cp = applicator_htmlok( array(
            'name'      => 'Slider',
            'structure' => array(
                'type'      => 'component',
            ),
            'content'   => array(
                'component'     => array(
                    $slider_content,
                ),
            ),
        ) );


        $entry_entries_cp = applicator_htmlok( array(
            'name'      => 'Entry',
            'structure' => array(
                'type'      => 'component',
            ),
            'content'   => array(
                'component'     => array(
                    $entry_content,
                    $slider_cp,
                    $main_posts_cp,
                    $previous_posts_cp,
                    applicator_dollhouse_diary_home_aside(),
                ),
            ),
        ) );
        
        
        $entry_module_cp = applicator_htmlok( array(
            'name'      => 'Entry',
            'structure' => array(
                'type'      => 'component',
                'subtype'   => 'module',
            ),
            'content'   => array(
                'component'     => $entry_entries_cp,
            ),
        ) );
        
        
        $primary_content = applicator_htmlok( array(
            'name'      => 'Primary Content',
            'structure' => array(
                'type'      => 'constructor',
                'elem'      => 'main',
            ),
            'id'        => 'main',
            'css'       => 'pri-content',
            'root_css'  => 'site-main',
            'content'   => array(
                'constructor'   => $entry_module_cp,
            ),
            'echo'      => true,
        ) );
        
        
        get_sidebar();
        
        ?>

    </div>
</div>

<?php

get_template_part( 'template-parts/main-content', 'footer' );