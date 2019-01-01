<?php
/**
* Books Category Template
*/
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="" role="main">

		<?php
		$prev_year = null;
		// Check if there are any posts to display
		if ( have_posts() ) :

		// The Loop
		while ( have_posts() ) : the_post();
		$this_year = get_the_date('Y');
		if ($prev_year != $this_year) {
			if ( $prev_year != null ) {
				echo '</div>';
			}
			echo '<h2>' . $this_year . '</h2><div class="bookshelf">';
		}
		$prev_year = $this_year;
		?>
		<article class="bookshelf__book">
			<img src="<?php echo post_custom( 'book-image' ) ; ?>" alt="Book Cover for <?php the_title() ?>" />
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="bookshelf__book-link"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header>
		</article>

		<?php endwhile;
			else: ?>
				<p>Sorry, no posts matched your criteria.</p>
			<?php endif;
		?>
	</main>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
