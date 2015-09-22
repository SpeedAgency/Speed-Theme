<?php
// Add RSS links to <head> section
function blank_enqueue_scripts() {
    // Load jQuery
    wp_enqueue_style('fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css');
    
    wp_register_script('extended', get_stylesheet_directory_uri().'/js/extended.js', array('jquery'));
    
    wp_enqueue_script('extended');
    
}
add_action('wp_enqueue_scripts', 'blank_enqueue_scripts');

// Clean up the <head>
function blank_remove_head_links() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'blank_remove_head_links');
remove_action('wp_head', 'wp_generator');

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Sidebar Widgets',
        'id'   => 'sidebar-widgets',
        'description'   => 'These are widgets for the sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
}
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');

/* CHANGE THIS */
if ( ! isset( $content_width ) ) {
    $content_width = 1280;
}
