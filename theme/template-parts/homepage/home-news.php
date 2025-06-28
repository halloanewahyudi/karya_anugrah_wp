<?php
// query post type news
$news = new WP_Query(array(
  'post_type' => 'post',
  'posts_per_page' => 4
))
?>

<section class="py-20">
  <div class="container">
    <div class="text-center mb-10 ">
      <h4 class="anim text-4xl font-semibold ">Latest News</h4>
      <p>Excellence in Hardware and Software Solutions</p>
      <!--  <div class="w-12 h-1 bg-brand mx-auto mt-2"></div> -->
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 ">

      <?php
      $delay = 1;
      while ($news->have_posts()): $news->the_post(); ?>
        <div data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>00" class="group">
          <div class="rounded-lg overflow-hidden mb-4">
            <a href="<?php the_permalink() ?>">
              <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="rounded-lg h-60 w-full object-cover  group-hover:scale-105 duration-300">
            </a>
          </div>

          <div class="flex items-center gap-2 text-xs">
            <i class="bi bi-calendar-check"></i>
            <span> <?php echo get_the_date(); ?> </span>
          </div>

          <h4>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a>
          </h4>
        </div>
      <?php
        $delay++;
      endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </div>
    <div class="block text-center mt-10">
      <a href="<?php echo site_url('/news'); ?>" class="btn mx-auto inline-block text-center">Show More News</a>
    </div>
  </div>
</section>