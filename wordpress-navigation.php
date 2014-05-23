<?php

/*
 * Add to your theme's functions.php
 */

/**
 * Display navigation to next/previous pages when applicable
 */
function nutritionist_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't output markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( !$next && !$previous )
			return;
	}

	// Don't output empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_category() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'navigation-post' : 'navigation-paging';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'mytheme' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div>%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'mytheme' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div>%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'mytheme' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_category() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav"></span>Older Posts', 'mytheme' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer Posts<span class="meta-nav"></span>', 'mytheme' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}

?>
