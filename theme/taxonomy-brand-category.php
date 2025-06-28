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
              <section class="border-b border-gray-300 mb-20">
      <div class="container py-2 text-center">
        <h4 class="text-4xl font-semibold uppercase"> <?php single_cat_title( ); ?></h4>
      </div>
    </section>

<?php
if (have_posts()):
?>
<div class="container">
<div class="grid grid-cols-2 lg:grid-cols-6 gap-6 justify-center items-center text-center mb-20">
        <?php while (have_posts()): the_post(); ?>
            <div class="group relative inline-block">
                <div class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2 whitespace-nowrap
               bg-brand text-white text-sm px-2 py-1 rounded opacity-0 group-hover:opacity-100
               transition-opacity duration-200">
                   <?php the_title(); ?>
                </div>

                <a @mouseenter="tooltip(brand.title)" href="<?php echo get_field('link') ?>" target="_blank"
                    class="w-24 h-24 bg-gray-100 p-4 flex items-center justify-center mx-auto hover:bg-white hover:shadow-2xl  duration-300">
                    <img src="<?php the_post_thumbnail_url(); ?>" :alt="brand.title" class="w-full h-auto" />
                </a>
            </div>
        <?php endwhile; ?>
    </div>
     <?php
    // Previous/next page navigation.
			karya_anugrah_the_posts_navigation();

        // If no content, include the "No posts found" template.
        else :
            get_template_part( 'template-parts/content/content', 'none' );
        ?>
</div>
    
<?php endif; ?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();