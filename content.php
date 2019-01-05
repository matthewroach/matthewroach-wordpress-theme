<?php
/**
 * @package matthewroach
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header>

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'matthewroach' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'matthewroach' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<footer class="entry-footer">
		<?php
			if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search

				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ' ', 'matthewroach' ) );
				if ( $categories_list && matthewroach_categorized_blog() ) :

				endif; // End if categories

				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'matthewroach' ) );
				if ( $tags_list ) :

			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'matthewroach' ), $tags_list ); ?>
			</span>
		<?php
				endif; // End if $tags_list
			endif; // End if 'post' == get_post_type()

		if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<!-- <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'matthewroach' ), __( '1 Comment', 'matthewroach' ), __( '% Comments', 'matthewroach' ) ); ?></span>-->
		<?php endif; ?>

		<?php matthewroach_posted_on(); ?>

		<?php edit_post_link( __( 'Edit', 'matthewroach' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
</article>
