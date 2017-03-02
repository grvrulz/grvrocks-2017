<?php
/**
 * The template used for displaying hero content
 *
 * @package Gaurav_Pareek
 */
?>

<?php if ( has_post_thumbnail() || true ) : ?>
	<div class="hero-container">
		<?php the_post_thumbnail( 'grvrocks2017-hero' ); ?>
		<div class="hero-content">
			<?php the_content(); ?>
		</div>
	</div>
<?php endif; ?>
