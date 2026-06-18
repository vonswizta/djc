<?php

function register_acf_block_types() {

    acf_register_block_type(array(
        'name'              => 'hero',
        'title'             => __('Hero'),
        'description'       => __('A custom hero block.'),
        'render_callback'	=> 'my_acf_block_render_callback',
        'category'          => 'custom-blocks',
        'icon'            => array(
            'foreground' => '#1A8A73',
            'src'        => 'format-aside',
        ),
        'keywords'          => array( 'image', 'text' ),
    ));

    acf_register_block_type(array(
        'name'              => 'statistics',
        'title'             => __('Statistics'),
        'description'       => __('A custom statistics block.'),
        'render_callback'	=> 'my_acf_block_render_callback',
        'category'          => 'custom-blocks',
        'icon'            => array(
            'foreground' => '#1A8A73',
            'src'        => 'format-aside',
        ),
        'keywords'          => array( 'image', 'text' ),
    ));

}

if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}

function my_acf_block_render_callback( $block ) {

    $slug = str_replace('acf/', '', $block['name']);

    if( file_exists( get_theme_file_path("/parts/block-{$slug}.php") ) ) {
        include( get_theme_file_path("/parts/block-{$slug}.php") );
    }
}

function custom_block_category( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'custom-blocks',
                'title' => __( 'Custom', 'custom-blocks' ),
            ),
        )
    );
}
add_filter( 'block_categories_all', 'custom_block_category', 10, 2);

function add_block_wrapper( $block_content, $block ) {

    if ( 'core/heading' === $block[ 'blockName' ] ){

        $block_content = '<div class="block-core heading">' . $block_content . "</div>";

    } else if ( 'core/paragraph' === $block[ 'blockName' ] ){

        $block_content = '<div class="block-core paragraph">' . $block_content . "</div>";

    } else if ( 'core/list' === $block[ 'blockName' ] ){

        $block_content = '<div class="block-core list">' . $block_content . "</div>";

    } else if ( 'core/image' === $block[ 'blockName' ] ){

        $block_content = '<div class="block-core image">' . $block_content . "</div>";

    } else if ( 'core/quote' === $block[ 'blockName' ] ){

        $block_content = '<div class="block-core quote">' . $block_content . "</div>";

    } else if ( 'core/table' === $block[ 'blockName' ] ){

        $block_content = '<div class="block-core table">' . $block_content . "</div>";

    }

    return $block_content;

}
add_filter( 'render_block', 'add_block_wrapper', 10, 2 );