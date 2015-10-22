<?php
/**
 * @package matthewroach
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<footer class="entry-footer">
		<a href="<?php echo get_permalink() ?>">&#35;</a> -
		<time></time>
		<?php echo get_the_date('F j, Y \a\t g:ia') ?>
	</footer>

</article>
