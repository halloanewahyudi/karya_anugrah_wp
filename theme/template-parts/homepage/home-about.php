 <section class="py-20">
      <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-10 items-center">
          <div class="mx-auto lg:px-10">
            <!-- sekilas about us -->
          <?php if ( get_field('title') ) : ?>
            
            <h2
              class="text-3xl lg:text-4xl leading-normal mb-5">
             <?php the_field('title'); ?>
            </h2>
               <?php endif; ?>

               <?php if ( get_field('description') ) : ?>
                <div class="leading-relaxed" >
                     <?php the_field('description'); ?>
                </div>
               <?php endif; ?>
               <?php if ( get_field('link') ) : ?>
                <a href="<?php echo get_field('link')['url']; ?>" class="btn inline-block mt-5">
                <?php echo get_field('link')['title']; ?>
                </a>
               <?php endif; ?>
         
          </div>
          <img src="<?php the_post_thumbnail_url(  ) ?>" alt="" class="rounded-lg" />
        </div>
      </div>
    </section>