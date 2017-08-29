<?php
/**
 * This file loads the content when called.
 *
 * @version 1.0.0
 */

if ( have_posts() ) :

	// Load content before the loop.
	do_action( 'alnp_load_before_loop' );

	// Check that there are posts to load.
	while (have_posts()) : the_post();
	?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php
			// Load content before the post content.
			do_action( 'alnp_load_before_content' );
			?>

			<div class="post-wrap">

				<?php do_action( 'csco_post_main_before' ); ?>

				<div class="post-main">

					<?php do_action( 'csco_post_content_before' ); ?>

					<div class="content entry-content">

						<?php the_content(); ?>

					</div>

					<?php do_action( 'csco_post_content_after' ); ?>

				</div><!-- .post-main -->

				<?php do_action( 'csco_post_main_after' ); ?>

			</div><!-- .post-wrap -->

			<?php do_action( 'csco_post_end' ); ?>

			<?php
			// Load content after the post content.
			do_action( 'alnp_load_after_content' );
			?>

		</article>

		<?php
	// End the loop.
	endwhile;

		// Load content after the loop.
		do_action( 'alnp_load_after_loop' );

else :

	// Load content if there are no more posts.
	do_action( 'alnp_no_more_posts' );

endif; // END if have_posts()
