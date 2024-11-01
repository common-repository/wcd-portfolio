<?php

// Register Custom Post Type
function wcd_portfolio_cpt() {

	$labels = array(
		'name'                  => _x( 'Portfolio Items', 'Post Type General Name', 'wcdportfolio' ),
		'singular_name'         => _x( 'Portfolio Item', 'Post Type Singular Name', 'wcdportfolio' ),
		'menu_name'             => __( 'Portfolio', 'wcdportfolio' ),
		'name_admin_bar'        => __( 'Portfolio', 'wcdportfolio' ),
		'archives'              => __( 'Portfolio Items', 'wcdportfolio' ),
		'parent_item_colon'     => __( 'Portfolio Item:', 'wcdportfolio' ),
		'all_items'             => __( 'All Portfolio Items', 'wcdportfolio' ),
		'add_new_item'          => __( 'Add New Portfolio Item', 'wcdportfolio' ),
		'add_new'               => __( 'Add New', 'wcdportfolio' ),
		'new_item'              => __( 'New Item', 'wcdportfolio' ),
		'edit_item'             => __( 'Edit Item', 'wcdportfolio' ),
		'update_item'           => __( 'Update Item', 'wcdportfolio' ),
		'view_item'             => __( 'View Item', 'wcdportfolio' ),
		'search_items'          => __( 'Search Portfolio', 'wcdportfolio' ),
		'not_found'             => __( 'Not found', 'wcdportfolio' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'wcdportfolio' ),
		'featured_image'        => __( 'Portfolio Image', 'wcdportfolio' ),
		'set_featured_image'    => __( 'Set featured portfolio image', 'wcdportfolio' ),
		'remove_featured_image' => __( 'Remove portfolio image', 'wcdportfolio' ),
		'use_featured_image'    => __( 'Use as portfolio image', 'wcdportfolio' ),
		'insert_into_item'      => __( 'Insert into portfolio item', 'wcdportfolio' ),
		'uploaded_to_this_item' => __( 'Uploaded to this portfolio item', 'wcdportfolio' ),
		'items_list'            => __( 'Portfolio Items', 'wcdportfolio' ),
		'items_list_navigation' => __( 'Portfolio Items navigation', 'wcdportfolio' ),
		'filter_items_list'     => __( 'Filter portfolio items', 'wcdportfolio' ),
	);
	$args = array(
		'label'                 => __( 'Portfolio Item', 'wcdportfolio' ),
		'description'           => __( 'Add a lightbox portfolio to your site', 'wcdportfolio' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-id-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'wcd_portfolio_cpt', 0 );