   <?php 
   // query post type product
   $productData = new WP_Query(array(
       'post_type' => 'product',
       'posts_per_page' => 4
   ))
   ?>
   
   <section class="relative bg-neutral-100 py-20"> <!-- section product -->
    <div class="container">
      <div class="text-center mb-10 ">
        <h4 class=" text-4xl font-semibold ">Populer Products </h4>
        <p>Excellence in Hardware and Software Solutions</p>
        <!--  <div class="w-12 h-1 bg-brand mx-auto mt-2"></div> -->
      </div>

      <div  >
      <div  class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-center lg:gap-10 ">
        <?php 
        $delay = 1;
         while ($productData->have_posts()): $productData->the_post(); ?>
        <div data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>00" class="p-6 h-full bg-white rounded-lg  border border-gray-200 hover:border-none hover:shadow-2xl duration-300 text-center flex flex-col justify-between items-center" >
         <a href="<?php the_permalink(); ?>" >
          <img src="<?php the_post_thumbnail_url(); ?>" :alt="product.title" class="rounded-xl mb-3">
          <h4 class=" text-opacity-80">
            <?php the_title(); ?>
          </h4>
   </a>
        
      </div>
      <?php
      $delay++;
     endwhile; ?>
      <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </section> <!-- end section product -->