 <?php 
 // query post type project
 $work = new WP_Query(array(
    'post_type' => 'project',
    'posts_per_page' => 4
 ));
 if($work->have_posts()):
 ?>
 <section >

        <div class="container flex flex-col gap-6 mb-20">
           <h2 class="text-center mb-5 text-4xl font-bold ">OUR LATEST WORK </h2>
          <?php while ($work->have_posts()): $work->the_post(); ?>
          <div  class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-16 items-center" >
            <div class="p-6 flex flex-col gap-4">
              <h4 class="text-3xl lg:text-4xl"><?php the_title(); ?></h4>
              <div class="text-lg"><?php the_content(); ?></div>
            </div>
            <div class="h-full">
              <img
                src="<?php the_post_thumbnail_url(); ?>"
                alt=""
                class="w-full h-full object-cover rounded-lg"
              />
            </div>
          </div>
          <?php endwhile; 
          wp_reset_postdata();?>
          
        </div>
      </section>
      <?php endif; ?>