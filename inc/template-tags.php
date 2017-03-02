<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Gaurav_Pareek
 */

if ( ! function_exists( 'grvrocks2017_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function grvrocks2017_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'grvrocks2017' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'grvrocks2017_posted_by' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function grvrocks2017_posted_by() {

	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'grvrocks2017' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'grvrocks2017_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function grvrocks2017_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'grvrocks2017' ) );
		if ( $categories_list && grvrocks2017_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'grvrocks2017' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'grvrocks2017' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'grvrocks2017' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'grvrocks2017' ), esc_html__( '1 Comment', 'grvrocks2017' ), esc_html__( '% Comments', 'grvrocks2017' ) );
		echo '</span>';
	}

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function grvrocks2017_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'grvrocks2017_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'grvrocks2017_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so grvrocks2017_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so grvrocks2017_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in grvrocks2017_categorized_blog.
 */
function grvrocks2017_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'grvrocks2017_categories' );
}
add_action( 'edit_category', 'grvrocks2017_category_transient_flusher' );
add_action( 'save_post',     'grvrocks2017_category_transient_flusher' );



/* Functions picked from Hybrid framework
 * © Justin Tadlock
 * https://github.com/justintadlock/hybrid-core/blob/d3a35215a601474d16c6f65ff1ada12b2dbc2217/inc/template-post.php
 *
 */

 /**
 * Outputs a link to the post format archive.
 *
 * @since  2.0.0
 * @access public
 * @return void
 */
function hybrid_post_format_link() {
	echo hybrid_get_post_format_link();
}
/**
 * Generates a link to the current post format's archive.  If the post doesn't have a post format, the link
 * will go to the post permalink.
 *
 * @since  2.0.0
 * @access public
 * @return string
 */
function hybrid_get_post_format_link() {
	$format = get_post_format();
	$url    = $format ? get_post_format_link( $format ) : get_permalink();
	return sprintf( '<a href="%s" class="post-format-link">%s</a>', esc_url( $url ), get_post_format_string( $format ) );
}
