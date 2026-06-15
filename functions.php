<?php

require_once(get_template_directory() . '/functions/blocks.php');
require_once( get_template_directory() . '/functions/compression.php' );
require_once(get_template_directory() . '/functions/shop.php');

require_once( get_template_directory() . '/functions/fields.php' );
require_once( get_template_directory() . '/functions/types.php' );
require_once( get_template_directory() . '/functions/taxonomies.php' );

add_action('acf/init', function() {
    if( function_exists('acf_add_options_page') ) {
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

function wp_corenavi()
{
    global $wp_query, $wp_rewrite;
    $pages = '';
    $max = $wp_query->max_num_pages;
    if (!$current = get_query_var('paged')) $current = 1;
    $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
    $a['total'] = $max;
    $a['current'] = $current;

    $total = 1; //1 - display the text "Page N of N", 0 - not display
    $a['mid_size'] = 5; //how many links to show on the left and right of the current
    $a['end_size'] = 1; //how many links to show in the beginning and end
    $a['prev_text'] = 'Previous'; //text of the "Previous page" link
    $a['next_text'] = 'Next'; //text of the "Next page" link

    if ($max > 1) echo '<aside class="pagination"><div class="inner">';
    if ($total == 1 && $max > 1) $pages = '<span class="pages">Page ' . $current . ' of ' . $max . '</span>' . "\r\n";
    echo $pages . paginate_links($a);
    if ($max > 1) echo '</div></aside>';
}

function share_buttons()
{
    $url = urlencode(get_the_permalink());
    $title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
    include(locate_template('/parts/blog-share.php', false, false));
}

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
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), null, true);
    wp_enqueue_script('custom', get_template_directory_uri() . '/build/js/global.js', array('jquery'), time(), true);
}

add_action('wp_enqueue_scripts', 'enqueue_scripts');

function menu_header_primary()
{

    wp_nav_menu(
        array(
            'theme_location' => 'menu-header-primary',
            'container' => 'nav',
            'walker' => new Child_Wrap
        )
    );

}

function menu_header_secondary()
{

    wp_nav_menu(
        array(
            'theme_location' => 'menu-header-secondary',
            'container' => 'nav',
            'walker' => new Child_Wrap
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

function menu_quicklinks()
{

    wp_nav_menu(
        array(
            'theme_location' => 'menu-quicklinks',
            'container' => 'nav'
        )
    );

}

function register_menu()
{

    register_nav_menus(array(
        'menu-header-primary' => 'Header primary',
        'menu-header-secondary' => 'Header secondary',
        'menu-footer' => 'Footer',
        'menu-quicklinks' => 'Quick links'
    ));

}

add_action('init', 'register_menu');

function shapeSpace_filter_search($query)
{
    if (!$query->is_admin && $query->is_search) {
        $query->set('post_type', array('post', 'page', 'events'));
    }
    return $query;
}

add_filter('pre_get_posts', 'shapeSpace_filter_search');

function wp3456789_wp_nav_menu_objects($items, $args)
{
    foreach ($items as &$item) {
        $icon = get_field('icon', $item);
        $image = get_field('image', $item);
        $sidebar = get_field('sidebar', $item);
        $size = 'medium';
        $description = get_field('description', $item);
        $title = '<span class="title">' . $item->title . '</span>';
        $iconItem = '';
        $imageItem = '';
        $descriptionItem = '';
        $sidebarItem = '';
        if ($icon) {
            $iconItem = '<div class="icon">' . wp_get_attachment_image($icon, $size, false, array('loading' => 'lazy')) . '</div>';
        }
        if ($image) {
            $imageItem = '<div class="image">' . wp_get_attachment_image($image, $size, false, array('loading' => 'lazy')) . '</div>';
        }
        if ($description) {
            $descriptionItem = '<span class="description">' . $description . '</span>';
        }
        if ($sidebar) {
            $sidebarItem = 'menu-sidebar-item';
        }
        $item->title = '<div class="content">' . $iconItem . $imageItem . '<div class="text">' . $title . $descriptionItem . '</div></div>';
        $item->classes[] = $sidebarItem;
    }
    return $items;
}

add_filter('wp_nav_menu_objects', 'wp3456789_wp_nav_menu_objects', 10, 2);

function wpforms_recaptcha_add_async($tag, $handle)
{
    if (strpos($tag, 'recaptcha/api.js?onload=wpformsRecaptchaLoad') !== false) {
        $tag = str_replace(' src', ' defer async="async" src', $tag);
    }
    return $tag;
}

add_filter('script_loader_tag', 'wpforms_recaptcha_add_async', 99, 2);

add_action('pre_get_posts', function ($query) {

    if (!is_admin()) {

        if (is_post_type_archive('events') && $query->is_main_query()) {

            $today = date('Ymd');

            $meta_query[] = array(
                'key' => 'date',
                'value' => $today,
                'compare' => '>=',
                'type' => 'DATE',
            );

            $query->set('orderby', 'meta_value');
            $query->set('order', 'ASC');
            $query->set('meta_query', $meta_query);

        }

        if (is_post_type_archive('downloads') && $query->is_main_query()) {

            $query->set('orderby', 'meta_value');
            $query->set('order', 'ASC');
            $query->set('meta_key', 'date');

        }

    }

});

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

class Child_Wrap extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"custom-sub\"><div class=\"sub-inner\"><div class=\"sub-content\"><ul class=\"sub-menu\">\n";
    }

    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div></div></div>\n";
    }
}