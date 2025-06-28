<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package karya_anugrah
 */

get_header();
?>

	<section id="primary">
		<main id="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header border-b border-gray-300  mb-20 ">
				  <div class="container py-2 text-center">
				<?php the_archive_title( '<h1 class="page-title text-4xl font-semibold uppercase mb-0 ">', '</h1>' ); ?>
				  </div>
			</header><!-- .page-header -->
			 <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', get_post_type() );

				// End the loop.
			endwhile;
			?>
			</div>
			<?php

			// Previous/next page navigation.
			karya_anugrah_the_posts_navigation();

		else :

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
