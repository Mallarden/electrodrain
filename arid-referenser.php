<?php
/*
Template name: Referenser
*/


if(flatsome_option('pages_layout') != 'default') {
	
	// Get default template from theme options.
	echo get_template_part('page', flatsome_option('pages_layout'));
	return;

} else {

get_header();
do_action( 'flatsome_before_page' ); ?>
<div id="content" class="content-area page-wrapper" role="main">
	<div class="row row-main referenser-row">

				<?php while ( have_posts() ) : the_post(); ?>
				<?php do_action( 'flatsome_before_page_content' ); ?>
				
					<?php the_content(); ?>

				<?php do_action( 'flatsome_after_page_content' ); ?>
				<?php endwhile; // end of the loop. ?>



				<?php

				// WP_Query arguments
				$args = array(
					'post_type'              => array( 'referenser' ),
					'post_status'            => array( 'publish' ),
					'order'                  => 'DESC',
					'orderby'                => 'date',
					'posts_per_page'		 => -1,
				);

				// The Query
				$query = new WP_Query( $args );

				// The Loop
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						// do something

						echo '<div class="col medium-3 small-6 large-3 referenser-box">';
							echo '<div class="col-inner">';

								echo '<a href="'.get_the_permalink().'">';
									echo get_the_post_thumbnail( $post_id, 'original', array( 'class' => 'alignleft' ) );
								echo '</a>';

								echo '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
								
								echo '<p>';
									echo excerpt(25);
								echo '</p>';

								echo '<a class="button" href="'.get_the_permalink().'">Läs mer</a>';


							echo '</div>';
						echo '</div>';
					}
				} else {
					// no posts found
				}

				// Restore original Post Data
				wp_reset_postdata();

				?>


	</div><!-- .row -->
</div>

<style>
.referenser-row img {
	height: 150px;
	margin-bottom:10px;
}

.referenser-row .button {
	font-size: 12px;
    border-radius: 20px;
}

.referenser-box {
	    padding: 10px;
}
.referenser-box .col-inner {
	    padding: 10px;
    border: 1px solid #eaeaea;
}
</style>

<?php
do_action( 'flatsome_after_page' );
get_footer();

}

?>