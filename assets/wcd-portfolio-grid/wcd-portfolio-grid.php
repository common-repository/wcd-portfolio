<?php

/**
 * @class FLWCDPortfolioModule
 */
class FLWCDPortfolioModule extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Portfolio', 'fl-builder'),
			'description'   	=> __('Display a grid of your Portfolio posts.', 'fl-builder'),
			'category'      	=> __('Custom Modules', 'fl-builder'),
            'dir'               => WCD_PORTFOLIO_DIR . '/assets/wcd-portfolio-grid/',
            'url'               => WCD_PORTFOLIO_URL . '/assets/wcd-portfolio-grid/',
			'editor_export' 	=> false,
			'partial_refresh'	=> true
		));
        
        $this->add_js( 'featherlight', $this->url . 'assets/featherlight/featherlight.js', array(), '', true ); 
        $this->add_css( 'featherlight', $this->url . 'assets/featherlight/featherlight.css' );
        
	}
    
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('FLWCDPortfolioModule', array(
	'layout'        => array(
		'title'         => __('Layout', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'posts_per_page' => array(
						'type'          => 'text',
						'label'         => __('Posts Per Page', 'fl-builder'),
						'default'       => '10',
						'size'          => '4'
					),
					'no_results_message' => array(
						'type' 				=> 'text',
						'label'				=> __('No Results Message', 'fl-builder'),
						'default'			=> __('No Posts Found.', 'fl-builder')
					),
                    'image_size' => array(
                        'type'          => 'select',
                        'label'         => __( 'Image Size', 'fl-builder' ),
                        'default'       => 'medium',
                        'options'       => array(
                            'thumbnail'     => __( 'Thumbnail', 'fl-builder' ),
                            'medium'        => __( 'Medium', 'fl-builder' ),
                            'large'         => __( 'Large', 'fl-builder' ),
                            'full'          => __( 'Full Size', 'fl-builder' ),
                        ),
                    ),
                    'portfolio_link' => array(
                        'type'          => 'select',
                        'label'         => __( 'Link Type', 'fl-builder' ),
                        'default'       => 'lightbox',
                        'options'       => array(
                            'lightbox'     => __( 'Lightbox', 'fl-builder' ),
                            'post'          => __( 'Post URL', 'fl-builder' ),
                        ),
                    ),
				)
			),
		)
	),

));