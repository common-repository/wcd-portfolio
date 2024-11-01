<?php get_header(); ?>
<div class="container">
	<div id="primary" class="content-area col-md-8">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
                
            </article>
            
			<?php the_post_navigation();

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

    <div class="col-md-4">
    <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>