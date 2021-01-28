<?php

get_header();

?>

<div id="content" class="blog-wrapper blog-single page-wrapper">

		<?php 
			do_action('flatsome_before_blog');
		?>

		<?php if(!is_single() && flatsome_option('blog_featured') == 'top'){ get_template_part('template-parts/posts/featured-posts'); } ?>

		<div class="row row-large <?php if(flatsome_option('blog_layout_divider')) echo 'row-divided ';?>">
			
			<div class="large-9 col">
			<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>

			<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1><?php the_title(); ?></h1>
				<div class="article-inner <?php flatsome_blog_article_classes(); ?>">
					<?php

						echo get_the_post_thumbnail( $post_id, 'original', array( 'class' => 'alignleft' ) );

					?>
					
					<div class="entry-content single-page" style="padding-top:0px;">

					<?php the_content(); ?>

					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'flatsome' ),
							'after'  => '</div>',
						) );
					?>

					<?php if(flatsome_option('blog_share')) {
						// SHARE ICONS
						echo '<div class="blog-share text-center">';
						echo '<div class="is-divider medium"></div>';
						echo do_shortcode('[share]');
						echo '</div>';
					} ?>
					</div><!-- .entry-content2 -->

					<footer class="entry-meta text-<?php echo flatsome_option('blog_posts_title_align');?>">
					<?php
						/* translators: used between list items, there is a space after the comma */
						$category_list = get_the_category_list( __( ', ', 'flatsome' ) );

						/* translators: used between list items, there is a space after the comma */
						$tag_list = get_the_tag_list( '', __( ', ', 'flatsome' ) );


						// But this blog has loads of categories so we should probably display them here
						if ( '' != $tag_list ) {
							$meta_text = __( 'This entry was posted in %1$s and tagged %2$s.', 'flatsome' );
						} else {
							$meta_text = __( 'Detta inlägg är en referens. Vill du se samtliga referenser klickar du <a href="http://arid.nu/referenser">här.</a>', 'flatsome' );
						}
						
						printf(
							$meta_text,
							$category_list,
							$tag_list,
							get_permalink(),
							the_title_attribute( 'echo=0' )
						);
					?>
					</footer><!-- .entry-meta -->






				</div><!-- .article-inner -->
			</article><!-- #-<?php the_ID(); ?> -->

			<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'index' ); ?>

			<?php endif; ?>
			</div> <!-- .large-9 -->

			<div class="post-sidebar large-3 col">
				<?php //get_sidebar(); ?>

				<?php

				// WP_Query arguments
				$args = array(
					'post_type'              => array( 'referenser' ),
					'post_status'            => array( 'publish' ),
					'order'                  => 'DESC',
					'orderby'                => 'rand',
					'posts_per_page'		 => 3,
				);

				// The Query
				$query = new WP_Query( $args );

				// The Loop
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						// do something

						echo '<div class="referenser-box">';
							echo '<div class="col-inner">';

								echo '<a href="'.get_the_permalink().'">';
									echo get_the_post_thumbnail( $post_id, 'original', array( 'class' => 'alignleft' ) );
								echo '</a>';
								echo '<br>';
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
			</div><!-- .post-sidebar -->

		</div><!-- .row -->

		<?php 
			do_action('flatsome_after_blog');
		?>


</div><!-- #content .page-wrapper -->

<style>
.referenser-box img {
	height: 150px;
	margin-bottom:10px;
	width:215px;
}
</style>

<?php get_footer(); ?>
