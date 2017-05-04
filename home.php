<?php
/**
 * Homepage Template
 *
 * @package matthewroach
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php $args = array(
						'posts_per_page' => 4,
						'post_type' => 'post',
						'post_status' => 'publish',
						'order' => 'DESC',
						'tax_query' => array(
							array(
							'taxonomy' => 'category',
							'field' => 'slug',
							'terms' => array( 'instagram' ),
							'operator' => 'NOT IN'
						 )
						)
				  );

			$query = new WP_Query( $args );

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					get_template_part( 'content', get_post_format() );
				}
			}

		?>


		<!--
			Instagram Feed
		-->
		<div class="image-reel">

		<?php

			$args = array(
					'posts_per_page' => 4,
					'post_type' => 'post',
					'post_status' => 'publish',
					'order' => 'DESC',
					'tax_query' => array(
						array(
							'taxonomy' => 'category',
							'field' => 'slug',
							'terms' => 'instagram',
							'operator' => 'IN'
						)
					)
		  );

			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					get_template_part( 'content', 'image-home' );
				}
			}

			wp_reset_postdata();
		?>

		</div>


		<!--
			Next 5 Articles
		-->
		<?php $args = array(
						'posts_per_page' => 5,
						'offset' => 4,
						'post_type' => 'post',
						'post_status' => 'publish',
						'order' => 'DESC',
						'tax_query' => array(
							array(
							'taxonomy' => 'category',
							'field' => 'slug',
							'terms' => array( 'instagram' ),
							'operator' => 'NOT IN'
						 )
						)
				  );

			$query = new WP_Query( $args );

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					get_template_part( 'content', get_post_format() );
				}
			}

		?>


		<!--
			Next 10 Recent Articles in sequence after the ones above
		-->
		<div class="post-listing">

		<?php $args = array(
						'posts_per_page' => 10,
						'offset' => 9,
						'post_type' => 'post',
						'post_status' => 'publish',
						'order' => 'DESC',
						'tax_query' => array(
							array(
							'taxonomy' => 'category',
							'field' => 'slug',
							'terms' => array( 'instagram', 'status' ),
							'operator' => 'NOT IN'
						 )
						)
				  );

			$query = new WP_Query( $args );

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					get_template_part( 'content', 'home-listing' );
				}
			}

		?>

		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
