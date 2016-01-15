<?php
/**
 * Homepage Template
 *
 * @package matthewroach
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


		<div class="image-reel">

		<?php

			$args = array(
					'numberposts' => 1,
					'post_type' => 'post',
					'post_status' => 'publish',
					'order' => 'DESC',
					'tax_query' => array(
						array(
							'taxonomy' => 'post_format',
							'field' => 'slug',
							'terms' => array('post-format-image'),
							'operator' => 'IN'
						)
					)
		  );


			// The Query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					// do something
					get_template_part( 'content', 'image-home' );
				}
			}

			// Restore original Post Data
			wp_reset_postdata();

			// var_dump( $recent );
		?>

		</div>



		<?php $args = array(
'posts_per_page' => 1,
						'post_type' => 'post',
						'post_status' => 'publish',
						'order' => 'DESC',
						'tax_query' => array(
							array(
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array('post-format-quote','post-format-audio','post-format-gallery','post-format-image','post-format-link','post-format-status'),
								'operator' => 'NOT IN'
							)
						)
				  );


			// The Query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					// do something
					get_template_part( 'content', get_post_format() );
				}
			}

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
