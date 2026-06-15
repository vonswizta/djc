<?php

require_once(get_template_directory() . '/functions/blocks.php');
//require_once(get_template_directory() . '/functions/compression.php');
//require_once(get_template_directory() . '/functions/fields.php');
//require_once(get_template_directory() . '/functions/types.php');
//require_once(get_template_directory() . '/functions/taxonomies.php');

add_action('acf/init', function () {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page();
    }
});

add_action('admin_init', 'my_remove_admin_menus');
function my_remove_admin_menus()
{
    remove_menu_page('edit-comments.php');
}

add_action('init', 'my_add_excerpts_to_pages');
function my_add_excerpts_to_pages()
{
    add_post_type_support('page', 'excerpt');
}

function excerpt($limit)
{
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`', '', $excerpt);
    return $excerpt;
}

function custom_excerpt_length($length)
{
    return 25;
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);

function new_excerpt_more($more)
{
    return '...';
}

add_filter('excerpt_more', 'new_excerpt_more');

add_theme_support('title-tag');

add_theme_support('post-thumbnails');

$thumbnail_huge = 2250;
$thumbnail_large = 1500;
$thumbnail_medium_large = 1200;
$thumbnail_medium = 992;
$thumbnail_thumbnail = 576;
$thumbnail_small = 335;

add_image_size('huge', $thumbnail_huge, $thumbnail_huge);
add_image_size('large', $thumbnail_large, $thumbnail_large);
add_image_size('medium_large', $thumbnail_medium_large, $thumbnail_medium_large);
add_image_size('medium', $thumbnail_medium, $thumbnail_medium);
add_image_size('thumbnail', $thumbnail_thumbnail, $thumbnail_thumbnail);
add_image_size('small', $thumbnail_small, $thumbnail_small);

update_option('large_size_w', $thumbnail_large);
update_option('large_size_h', $thumbnail_large);
update_option('medium_large_size_w', $thumbnail_medium_large);
update_option('medium_large_size_h', $thumbnail_medium_large);
update_option('medium_size_w', $thumbnail_medium);
update_option('medium_size_h', $thumbnail_medium);
update_option('thumbnail_size_w', $thumbnail_thumbnail);
update_option('thumbnail_size_h', $thumbnail_thumbnail);
update_option('thumbnail_crop', 0);

add_filter('show_admin_bar', '__return_false');

add_action('wp_print_styles', 'wps_deregister_styles', 100);

function wps_deregister_styles()
{

    wp_dequeue_style('wp-block-library');

}

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

function enqueue_scripts()
{
    wp_deregister_script('jquery');
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();

    wp_enqueue_script(
        'theme',
        $theme_uri . '/dist/js/app.js',
        [],
        filemtime($theme_dir . '/dist/js/app.js'),
        true
    );
}

add_action('wp_enqueue_scripts', 'enqueue_scripts');

function menu_header()
{

    wp_nav_menu(
        array(
            'theme_location' => 'menu-header',
            'container' => 'nav'
        )
    );

}

function menu_footer()
{

    wp_nav_menu(
        array(
            'theme_location' => 'menu-footer',
            'container' => 'nav'
        )
    );

}

function register_menu()
{

    register_nav_menus(array(
        'menu-header' => 'Header',
        'menu-footer' => 'Footer'
    ));

}

add_action('init', 'register_menu');

add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $fname = get_the_author_meta('first_name');
        $lname = get_the_author_meta('last_name');
        $author = get_the_author();
        if ($fname && $lname) {
            $author_name = "{$fname} {$lname}";
        } else {
            $author_name = $author;
        }
        $title = $author_name;
    } elseif (is_tax()) {
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
});