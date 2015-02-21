<?php
/**
 * @package matthewroach
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php matthewroach_posted_on(); ?>
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header>

	<div class="entry-content">
	<?php
		$content = get_the_content();
		$trimmed_content = wp_trim_words( $content, 40, '... <a href="'. get_permalink() .'">Read More</a>' );
		echo $trimmed_content;
	?>
	</div>

</article>
