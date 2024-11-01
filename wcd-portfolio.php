<?php

/**
 * Plugin Name: WCD Portfolio
 * Plugin URI: https://westcoastdigital.com.au/wcd-portfolio
 * Description: Add a lightbox portfolio to your site.
 * Version: 1.0
 * Author: West Coast Digital Pty Ltd
 * Author URI: https://westcoastdigital.com.au
 */


define( 'WCD_PORTFOLIO_DIR', plugin_dir_path( __FILE__ ) );
define( 'WCD_PORTFOLIO_URL', plugins_url( '/', __FILE__ ) );

if (!function_exists('wcd_portfolio_cpt')) {
    require_once dirname( __FILE__ ) . '/wcd-portfolio-cpt.php';
}

require_once dirname( __FILE__ ) . '/assets/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'wcd_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 */
function wcd_register_required_plugins() {
	$plugins = array(
		array(
			'name'               => 'Meta Box',
            'slug'               => 'meta-box',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
		),
	);

	$config = array(
		'id'           => 'wcdportfolio',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'plugins.php', 
		'capability'   => 'manage_options',
		'has_notices'  => true,
		'dismissable'  => false,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',
		'strings'      => array(
			'notice_can_install_required'     => _n_noop(
					'WCD Portfolio requires the following plugin: %1$s.',
					'WCD Portfolio requires the following plugins: %1$s.',
					'tgmpa'
				),
		)
	);

	tgmpa( $plugins, $config );
}

if (!function_exists('wcd_portfolio_metafields')) {
    require_once dirname( __FILE__ ) . '/wcd-portfolio-metaboxes.php';
}

add_filter( 'single_template', 'wcd_portfolio_template' );

function wcd_portfolio_template( $single_template ){
     global $post;

     if ($post->post_type == 'portfolio') {
          $single_template = dirname( __FILE__ ) . '/single-portfolio.php';
     }
     return $single_template;
}

function wcd_portfolio_style() {
	wp_register_style( 'wcd-portfolio-style', plugins_url( 'wcd-portfolio.css', __FILE__ ) );
	wp_enqueue_style( 'wcd-portfolio-style' );
}
add_action( 'wp_enqueue_scripts', 'wcd_portfolio_style' );

function wcd_portfolio_beaver_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'assets/wcd-portfolio-grid/wcd-portfolio-grid.php';
    }
}
add_action( 'init', 'wcd_portfolio_beaver_module' );