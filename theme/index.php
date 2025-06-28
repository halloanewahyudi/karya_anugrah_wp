<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no `home.php` file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package karya_anugrah
 */

get_header();
?>

<section id="primary">
	<main id="main">

		<?php
		if (have_posts()) {

			if (is_home() && ! is_front_page()) :
		?>

				<header class="entry-header border-b border-gray-300 mb-20">
					<div class="container py-2 text-center">
						<h1 class="entry-title text-4xl font-semibold uppercase mb-0"><?php single_post_title(); ?></h1>
					</div>
				</header><!-- .entry-header -->
			<?php
			endif; ?>
			<div class="container mb-20">
				<div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
					<?php

					// Load posts loop.
					while (have_posts()) {
						the_post();
						get_template_part('template-parts/content/content', 'thumbnail');
					}
					?>
				</div>
			</div>
		<?php
			// Previous/next page navigation.
			karya_anugrah_the_posts_navigation();

		} else {

			// If no content, include the "No posts found" template.
			get_template_part('template-parts/content/content', 'none');
		}
		?>

	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
