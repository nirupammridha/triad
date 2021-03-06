<?php

ob_start();
/*
*------------------------
*Framework initialization
*-------------------------
*/
if(!defined('THEME_DIR')) {
   define('THEME_DIR', get_template_directory(). DIRECTORY_SEPARATOR);
}

if(!defined('THEME_URL')) {
   define('THEME_URL', get_template_directory_uri().'');
}
if(!defined('THEMEWORK_PATH')) {
   define('THEMEWORK_PATH', THEME_DIR . 'themework'.DIRECTORY_SEPARATOR);
}

//echo THEMEWORK_PATH;exit();
include_once(THEMEWORK_PATH . 'themework-init.php');

/*
*------------------------
*Call init method
*-------------------------
*/
ThemeworkInit::init();

function custom_theme_setup() {

    // Add <title> tag support
    add_theme_support( 'title-tag' );  

    // Add custom-logo support
    add_theme_support( 'custom-logo' );

}
add_action( 'after_setup_theme', 'custom_theme_setup');


/*
Check if category has a sub category.
*/

function category_has_children( $term_id = 0, $taxonomy = 'category' ) {
    $children = get_categories( array( 
        'child_of'      => $term_id,
        'taxonomy'      => $taxonomy,
        'hide_empty'    => false,
        'fields'        => 'ids',
    ) );
    return ( $children );
}

remove_filter('the_content','wpautop');

// Determine the top-most parent of a term
function get_term_top_most_parent( $term, $taxonomy ) {
    // Start from the current term
    $parent  = get_term( $term, $taxonomy );
    // Climb up the hierarchy until we reach a term with parent = '0'
    while ( $parent->parent != '0' ) {
        $term_id = $parent->parent;
        $parent  = get_term( $term_id, $taxonomy);
    }
    return $parent;
}