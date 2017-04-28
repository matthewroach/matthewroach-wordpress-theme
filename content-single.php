<?php
/**
 * @package matthewroach
 */

$format = get_post_format( $post_id );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header <?php if ( $format == 'status' ) { ?>hide<?php } ?>">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" class="u-url" rel="bookmark">', esc_url( matthewroach_get_link_url() ) ), '</a></h1>' ); ?>
		<a rel="author" class="p-author h-card hide" href="http://matthewroach.me/">Matthew Roach</a>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'matthewroach' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<footer class="entry-footer">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ' ', 'matthewroach' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'matthewroach' ) );

			if ( ! matthewroach_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'matthewroach' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'matthewroach' );
				}
			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'matthewroach' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'matthewroach' );
				}
			} // end check for categories on this blog

		?>
			<p class="cat-links">
				<?php matthewroach_posted_on(); ?>
				<?php printf( __( '%1$s', 'matthewroach' ), $category_list ); ?>
			</p>

		<?php edit_post_link( __( 'Edit', 'matthewroach' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
</article>
