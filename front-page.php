<?php
/**
 * The static front page template
 *
 * @package Gaurav_Pareek
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'components/features/hero-image/content', 'hero' );

			endwhile; // End of the loop.
			?>
		</main>
	</div>
<?php
get_sidebar();
get_footer();
