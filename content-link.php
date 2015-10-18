<?php
/**
 * @package matthewroach
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s">', esc_url( matthewroach_get_link_url() ) ), '</a></h1>' ); ?>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

</article>
