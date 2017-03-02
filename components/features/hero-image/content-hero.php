<?php
/**
 * The template used for displaying hero content
 *
 * @package Gaurav_Pareek
 */
?>

<?php //if ( has_post_thumbnail( $recent['ID'] ) ) : ?>
<?php $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );

if  ( ! empty( $featured_image_url ) ) : ?>
	<div class="grvrocks2017-hero">
		<?php the_post_thumbnail( 'grvrocks2017-hero' ); ?>
		<?php the_content(); ?>
	</div>
<?php endif; ?>
