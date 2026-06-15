<?php

function cptui_register_my_taxes() {

    /**
     * Taxonomy: Badges.
     */

    $labels = [
        "name" => esc_html__( "Badges", "custom-post-type-ui" ),
        "singular_name" => esc_html__( "Badge", "custom-post-type-ui" ),
    ];


    $args = [
        "label" => esc_html__( "Badges", "custom-post-type-ui" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [ 'slug' => 'badges', 'with_front' => true, ],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "badges",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => false,
        "sort" => false,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "badges", [ "product" ], $args );

    /**
     * Taxonomy: Benefits.
     */

    $labels = [
        "name" => esc_html__( "Benefits", "custom-post-type-ui" ),
        "singular_name" => esc_html__( "Benefit", "custom-post-type-ui" ),
    ];


    $args = [
        "label" => esc_html__( "Benefits", "custom-post-type-ui" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [ 'slug' => 'benefits', 'with_front' => true, ],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "benefits",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => false,
        "sort" => false,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "benefits", [ "extras" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );