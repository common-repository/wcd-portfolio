<div class="wcd-portfolio-gallery">


<?php 

$portfolio_link = $settings->portfolio_link;
$portfolio_img = $settings->image_size;
$portfolio_qty = $settings->posts_per_page;
$portfolio_msg = $settings->no_results_message;
if ($settings->show_date != 0) {
$portfolio_date = $settings->date_format;
} else {
$portfolio_date = null;
}

// WP_Query arguments
$args = array (
	'post_type'              => array( 'portfolio' ),
	'posts_per_page'         => $portfolio_qty,
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();

?>
		
    
<div class="wcd-portfolio-gallery-item">
    <div class="hovereffect">
        <img class="img-responsive" src="<?php the_post_thumbnail_url( $portfolio_img ); ?>" alt="<?php the_title(); ?>">
        <div class="overlay">
           <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
            <?php if ($portfolio_link == 'lightbox') { ?>
           <a class="info" href="#"data-featherlight='<div class="col-lg-8 col-lg-offset-2">
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'modal-body' ); ?>>
                    <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            
                    <div class="entry-meta">
                        By <?php the_author_link(); ?> | <?php the_date( 'F j, Y'); ?>
                    </div><!-- .entry-meta -->
                </header><!-- .entry-header -->
                
                <?php if ( has_post_thumbnail() ) {
                    the_post_thumbnail();
                } ?>
                
                <h2 class="entry-subtitle">The Brief</h2>
                <?php echo rwmb_meta( 'portfolio_brief' ); ?>
                
                <h2 class="entry-subtitle">Our Approach</h2>
                <?php echo rwmb_meta( 'portfolio_approach' ); ?>
                
                <h2 class="entry-subtitle">The Result</h2>
                <?php echo rwmb_meta( 'portfolio_result' ); ?>
                
                <p>Check out <a href="<?php echo rwmb_meta( 'portfolio_url' ); ?>"><?php the_title(); ?></a></p>
                    <button class="btn btn-lg btn-primary featherlight-close">Close</button>                           
                </article>'>Read more</a>
        <?php } else { ?>
            <a class="info" href="<?php the_permalink(); ?>">Read more</a>
        <?php } ?>
        </div>
    </div>
</div>    
<?php		
		
	}
} else {
	echo '<p>';
    echo $settings->no_results_message;
    echo '</p>';
}

// Restore original Post Data
wp_reset_postdata();

?>
    
</div>    