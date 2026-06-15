<?php

function cptui_register_my_cpts() {

    /**
     * Post Type: Testimonials.
     */

    $labels = [
        "name" => esc_html__( "Testimonials", "custom-post-type-ui" ),
        "singular_name" => esc_html__( "Testimonial", "custom-post-type-ui" ),
    ];

    $args = [
        "label" => esc_html__( "Testimonials", "custom-post-type-ui" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => [ "slug" => "testimonials", "with_front" => true ],
        "query_var" => true,
        "menu_icon" => "dashicons-format-quote",
        "supports" => [ "title", "editor", "thumbnail", "author" ],
        "show_in_graphql" => false,
    ];

    register_post_type( "testimonials", $args );

    /**
     * Post Type: Guides.
     */

    $labels = [
        "name" => esc_html__( "Guides", "custom-post-type-ui" ),
        "singular_name" => esc_html__( "Guide", "custom-post-type-ui" ),
    ];

    $args = [
        "label" => esc_html__( "Guides", "custom-post-type-ui" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => [ "slug" => "guides", "with_front" => true ],
        "query_var" => true,
        "menu_icon" => "dashicons-admin-site",
        "supports" => [ "title", "editor", "thumbnail" ],
        "show_in_graphql" => false,
    ];

    register_post_type( "guides", $args );

    /**
     * Post Type: Extras.
     */

    $labels = [
        "name" => esc_html__( "Extras", "custom-post-type-ui" ),
        "singular_name" => esc_html__( "Extra", "custom-post-type-ui" ),
    ];

    $args = [
        "label" => esc_html__( "Extras", "custom-post-type-ui" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => [ "slug" => "extras", "with_front" => true ],
        "query_var" => true,
        "menu_icon" => "dashicons-plus-alt",
        "supports" => [ "title", "editor", "thumbnail" ],
        "taxonomies" => [ "benefits" ],
        "show_in_graphql" => false,
    ];

    register_post_type( "extras", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
