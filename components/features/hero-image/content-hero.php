<?php
/**
 * The template used for displaying hero content
 *
 * @package Gaurav_Pareek
 */
?>

<?php if ( has_post_thumbnail() ) : ?>
	<div class="grvrocks2017-hero">
		<?php the_post_thumbnail( 'grvrocks2017-hero' ); ?>
	</div>
<?php endif; ?>
