<?php
/*

	Добавление Taxonomy

*/

add_action( 'init', 'at_add_activities', 1 );

function at_add_activities() {

   $labels = array(
        'name'                       => _x( 'Activities', 'Taxonomy General Name', 'at-portfolio' ),
        'singular_name'              => _x( 'Activity', 'Taxonomy Singular Name', 'at-portfolio' ),
        'menu_name'                  => __( 'Activities', 'at-portfolio' ),
        'all_items'                  => __( 'All Activities', 'at-portfolio' ),
        'parent_item'                => __( 'Parent Activity', 'at-portfolio' ),
        'parent_item_colon'          => __( 'Parent Activity:', 'at-portfolio' ),
        'new_item_name'              => __( 'New Activity Name', 'at-portfolio' ),
        'add_new_item'               => __( 'Add New Activity', 'at-portfolio' ),
        'edit_item'                  => __( 'Edit Activity', 'at-portfolio' ),
        'update_item'                => __( 'Update Activity', 'at-portfolio' ),
        'view_item'                  => __( 'View Activity', 'at-portfolio' ),
        'separate_items_with_commas' => __( 'Separate Activities with commas', 'at-portfolio' ),
        'add_or_remove_items'        => __( 'Add or remove Activities', 'at-portfolio' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'at-portfolio' ),
        'popular_items'              => __( 'Popular Activities', 'at-portfolio' ),
        'search_items'               => __( 'Search Activities', 'at-portfolio' ),
        'not_found'                  => __( 'Not Found', 'at-portfolio' ),
        'no_terms'                   => __( 'No Activities', 'at-portfolio' ),
        'items_list'                 => __( 'Activities list', 'at-portfolio' ),
        'items_list_navigation'      => __( 'Activities list navigation', 'at-portfolio' ),
    );

   $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => false,
    );

   register_taxonomy( 'at_activity', array( 'at_portfolio' ), $args );
}
?>