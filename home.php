<?php
/**
 * Homepage Template
 *
 * @package matthewroach
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<!--
			Status
		-->
		<div class="status">

		<?php

			$args = array(
						'posts_per_page' => 1,
						'post_type' => 'post',
						'post_status' => 'publish',
						'order' => 'DESC',
						'tax_query' => array(
							array(
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array('post-format-status','post-format-link'),
								'operator' => 'IN'
							)
						)
		  );

			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					get_template_part( 'content', get_post_format() );
				}
			}

			wp_reset_postdata();
		?>

		</div>


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
			Latest Article
		-->
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
							),
							array(
							'taxonomy' => 'category',
							'field' => 'slug',
							'terms' => array( 'links', 'status', 'instagram' ),
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
			Next 10 Recent Article after the one above
		-->
		<div class="post-listing">

		<?php $args = array(
						'posts_per_page' => 10,
						'offset' => 1,
						'post_type' => 'post',
						'post_status' => 'publish',
						'order' => 'DESC',
						'tax_query' => array(
							array(
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array('post-format-quote','post-format-audio','post-format-gallery','post-format-image','post-format-link','post-format-status'),
								'operator' => 'NOT IN'
							),
							array(
							'taxonomy' => 'category',
							'field' => 'slug',
							'terms' => array( 'links', 'status', 'instagram' ),
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
