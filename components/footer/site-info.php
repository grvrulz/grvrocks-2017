<div class="site-info">

	<?php grvrocks2017_social_menu(); ?>

	<nav class="footer-navigation" role="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'footer-menu' ) ); ?>
	</nav>

	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'grvrocks2017' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'grvrocks2017' ), 'WordPress' ); ?></a>
</div><!-- .site-info -->
