<?php

add_filter( 'rwmb_meta_boxes', 'wcd_portfolio_metafields' );

function wcd_portfolio_metafields( $meta_boxes ) {
   
    $meta_boxes[] = array(
        'id'         => 'portfolio_item',
        'title'      => __( 'Portfolio Item Information', 'textdomain' ),
        'post_types' => array( 'portfolio' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
				'name'        => __( 'The Brief', 'wcdportfolio' ),
				'id'          => 'portfolio_brief',
				'desc'        => __( 'Enter the brief you recieved for the project', 'wcdportfolio' ),
				'type'        => 'textarea',
				'clone'       => false,
				'rows'        => 5,
				'cols'        => 5,
			),
            array(
				'name'        => __( 'The Approach', 'wcdportfolio' ),
				'id'          => 'portfolio_approach',
				'desc'        => __( 'Enter the approach you took for your project', 'wcdportfolio' ),
				'type'        => 'wysiwyg',
				'clone'       => false,
			),
            array(
				'name'        => __( 'The Result', 'wcdportfolio' ),
				'id'          => 'portfolio_result',
				'desc'        => __( 'Enter the result of the project', 'wcdportfolio' ),
				'type'        => 'wysiwyg',
				'clone'       => false,
			),
            array(
				'name'        => __( 'Project URL', 'wcdportfolio' ),
				'id'          => 'portfolio_url',
				'desc'        => __( 'Enter the URL for the project', 'wcdportfolio' ),
				'type'        => 'text',
				'clone'       => false,
				'size'        => 100,
			),
        )
    );

    return $meta_boxes;
}