<section class="relative mb-20">
        <div
          class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 items-center min-h-screen"
        >
          <div
            class="bg-brand text-brand-50 p-6 lg:p-10 h-full flex flex-col justify-center items-center lg:col-span-2"
          >
            <div>
              <h1 class="text-4xl lg:text-6xl font-bold text-white">
                <?php the_title(); ?>
              </h1>
              <div >
                <?php if(get_field('description')) { echo get_field('description'); } ?>
              </div>
            </div>
          </div>
          <?php if ( get_field('image') ) : ?>
            <img src="<?php echo get_field('image')['url']; ?>" alt="" class="h-full object-cover object-center lg:col-span-3" />
          <?php endif; ?>
          
         
        </div>
      </section>