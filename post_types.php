<?php
/*

	Добавление Post type

*/

add_action( 'init', 'at_add_portfolio', 0 );

function at_add_portfolio() {

    $labels = array(
        'name'                  => _x( 'Portfolio', 'Post Type General Name', 'at-portfolio' ),
        'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'at-portfolio' ),
        'menu_name'             => __( 'Portfolio', 'at-portfolio' ),
        'name_admin_bar'        => __( 'Portfolio', 'at-portfolio' ),
        'archives'              => __( 'Portfolio Archives', 'at-portfolio' ),
        'attributes'            => __( 'Portfolio Attributes', 'at-portfolio' ),
        'parent_item_colon'     => __( 'Parent Portfolio:', 'at-portfolio' ),
        'all_items'             => __( 'All Portfolio', 'at-portfolio' ),
        'add_new_item'          => __( 'Add New Portfolio', 'at-portfolio' ),
        'add_new'               => __( 'Add Portfolio', 'at-portfolio' ),
        'new_item'              => __( 'New Portfolio', 'at-portfolio' ),
        'edit_item'             => __( 'Edit Portfolio', 'at-portfolio' ),
        'update_item'           => __( 'Update Portfolio', 'at-portfolio' ),
        'view_item'             => __( 'View Portfolio', 'at-portfolio' ),
        'view_items'            => __( 'View Portfolio', 'at-portfolio' ),
        'search_items'          => __( 'Search Portfolio', 'at-portfolio' ),
        'not_found'             => __( 'Not found', 'at-portfolio' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'at-portfolio' ),
        'featured_image'        => __( 'Cover', 'at-portfolio' ),
        'set_featured_image'    => __( 'Set cover', 'at-portfolio' ),
        'remove_featured_image' => __( 'Remove cover', 'at-portfolio' ),
        'use_featured_image'    => __( 'Use as cover', 'at-portfolio' ),
        'insert_into_item'      => __( 'Insert into Portfolio', 'at-portfolio' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Portfolio', 'at-portfolio' ),
        'items_list'            => __( 'Portfolios list', 'at-portfolio' ),
        'items_list_navigation' => __( 'Portfolios list navigation', 'at-portfolio' ),
        'filter_items_list'     => __( 'Filter Portfolio list', 'at-portfolio' ),
    );

    $args = array(
        'label'                 => __( 'Portfolio', 'at-portfolio' ),
        'description'           => __( 'Post Type Description', 'at-portfolio' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields'),
        'taxonomies'            => array( 'category' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-smiley',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => false,
        
        // 'register_meta_box_cb'  => 'at_portfolio_metabox',
    );

    register_post_type( 'at_portfolio', $args );
}

?>