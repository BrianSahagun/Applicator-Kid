<?php

// Post Classes

// Variables
$on = '--enabled';
$off = '--disabled';
$post_thumbnail_term = 'post-thumbnail';
$post_excerpt_term = 'post-excerpt';

// Post Thumbnail Class
if ( '' !== get_the_post_thumbnail() ) {
    $post_thumbnail_class = ' '. $post_thumbnail_term. $on;
}
else {
    $post_thumbnail_class = ' '. $post_thumbnail_term. $off;
}


// Excerpt Class
if ( has_excerpt() ) {
    $excerpt_class = ' '. $post_excerpt_term. $on;
}
else {
    $excerpt_class = ' '. $post_excerpt_term. $off;
}


// Category
if ( has_category( '', $post->ID ) ) {
    $category_class = ' '. 'category--populated';
}
else {
    $category_class = ' '. 'category--empty';
}

// Post Classes Array
$post_classes = array(
    'cp',
    'article',
    'post',
    $post_thumbnail_class,
    $excerpt_class,
    $category_class,
);

// Array Implode
$post_classes = implode( ' ', $post_classes );
?>

<article <?php post_class( $post_classes ); ?> data-name="Post CP">
    <div class="cr post---cr">
        <header class="hr post---hr entry-header">
            <div class="hr_cr post---hr_cr">
                
                <?php
                
                // E: Post Title
                $post_title_obj = '';
                $post_title = get_the_title();
                
                if ( $post_title ) {
                    $post_title = get_the_title();
                    $post_title_attr = $post_title;
                }
                else {
                    $post_title = __( 'Post', 'applicator' ). ' '. get_the_ID();
                    $post_title_attr = $post_title;
                }
                
                
                // R: Post Title Object
                $post_title_obj = applicator_htmlok( array(
                    'name'      => 'Post Title',
                    'structure' => array(
                        'type'      => 'object',
                        'elem'      => 'h1',
                        'linked'    => true,
                        'attr'      => array(
                            'a'         => array(
                                'href'      => esc_url( get_permalink() ),
                                'rel'       => 'bookmark',
                                'title'     => esc_attr( $post_title_attr ),
                            ),
                        ),
                    ),
                    'content'   => array(
                        'object'        => esc_html( $post_title ),
                    ),
                ) );
                
                
                // Post Actions | inc > tags > post-actions.php
                applicator_post_actions();
                
                
                // E: Main Post Title
                $main_post_title = applicator_htmlok( array(
                    'name'      => 'Main Post Title',
                    'structure' => array(
                        'type'      => 'component'
                    ),
                    'content'   => array(
                        'component'     => array(
                            
                            $post_title_obj,
                            applicator_post_actions(),
                        ),
                    ),
                    'echo'      => true,
                ) );
                
                
                // After Main Post Title Hook | inc > hooks.php
                applicator_hook_after_main_post_title();
                
                
                // E: Post Meta
                $post_meta = applicator_htmlok( array(
                    'name'      => 'Post Meta',
                    'structure' => array(
                        'type'      => 'component'
                    ),
                    'content'   => array(
                        'component'     => array(
                            
                            // Date and Time Stamp
                            // inc > tags > post-published-modified.php
                            applicator_post_published_modified(),
                            
                            // Author
                            // inc > tags > post-author.php
                            applicator_post_author(),
                            
                            // Categories
                            // inc > tags > post-classification.php
                            applicator_post_categories(),
                        ),
                    ),
                ) );
                
                
                // E: Post Header Aside
                $post_header_aside = applicator_htmlok( array(
                    'name'      => 'Post Header',
                    'structure' => array(
                        'type'          => 'constructor',
                        'subtype'       => 'aside',
                        'hr_structure'  => true,
                    ),
                    'css'       => 'post-hr',
                    'content'   => array(
                        'constructor'   => array(
                            
                            // Post Meta
                            $post_meta,
                            
                            // Post Banner Visual | inc/tags/post-banner-visual.php
                            applicator_post_banner_visual(),
                            
                            // inc/tags/comments-actions-snippet-cp.php
                            applicator_comments_actions_snippet(),
                        ),
                    ),
                    'echo'      => true,
                ) );
                
                
                // After Post Header Aside Hook
                applicator_hook_after_post_header_aside();
                
                ?>

            </div>
        </header>
        <div class="ct post---ct entry-content">
            <div class="ct_cr post---ct_cr">
                
                <?php
                
                // OB: Excerpt
                ob_start();
                the_excerpt();
                $excerpt_ob_content = ob_get_clean();
                
                
                // R: Post Excerpt
                $post_excerpt = applicator_htmlok( array(
                    'name'      => 'Post Excerpt',
                    'structure' => array(
                        'type'      => 'component',
                    ),
                    'content'   => array(
                        'component'     => $excerpt_ob_content,
                    ),
                    'echo'      => true,
                ) );
                ?>

            </div>
        </div>
    </div>
</article>