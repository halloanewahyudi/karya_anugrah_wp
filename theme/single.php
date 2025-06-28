<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package karya_anugrah
 */

get_header();
?>

<section id="primary">
	<main id="main">
		<div class="container pt-16">
			<div class="grid grid-cols-1 lg:grid-cols-4 gap-6 lg:gap-10">
				<div class="col-span-1 lg:col-span-3">
					<?php
					/* Start the Loop */
					while (have_posts()) :
						the_post();
						get_template_part('template-parts/content/content', 'single');

						if (is_singular('post')) {
							// Previous/next post navigation.
							the_post_navigation(
								array(
									'next_text' => '<span aria-hidden="true">' . __('Next Post', 'karya_anugrah') . '</span> ' .
										'<span class="sr-only">' . __('Next post:', 'karya_anugrah') . '</span> <br/>' .
										'<span>%title</span>',
									'prev_text' => '<span aria-hidden="true">' . __('Previous Post', 'karya_anugrah') . '</span> ' .
										'<span class="sr-only">' . __('Previous post:', 'karya_anugrah') . '</span> <br/>' .
										'<span>%title</span>',
								)
							);
						}

						// If comments are open, or we have at least one comment, load
						// the comment template.
					/* 	if (comments_open() || get_comments_number()) {
							comments_template();
						}
 */
					// End the loop.
					endwhile;
					?>
				</div>
				<div class="col-span-1">

					<?php // get_sidebar();
					// post query
					$post_query = new WP_Query(
						array(
							'posts_per_page' => 5,
							'orderby' => 'rand',
						)
					);
					if ($post_query->have_posts()) : ?>
						<div class="flex flex-col">
							<?php while ($post_query->have_posts()) :
								$post_query->the_post();
							?>
								<a href="<?php the_permalink(); ?>">
									<div class="flex gap-2 p-4 rounded-lg hover:bg-gray-100 duration-300">
										<div class="shrink-0">
											<?php the_post_thumbnail('thumbnail', array('class' => 'w-12 h-12 object-cover rounded-lg')); ?>
										</div>
										<div class="flex flex-col">
											<span class="flex gap-2 text-xs">
												<i class="bi bi-calendar-check"></i><?php the_date(); ?>
											</span>
											<span><?php the_title(); ?></span>
										</div>
									</div>
								</a>

							<?php
							endwhile;
							wp_reset_postdata(); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
