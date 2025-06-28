<?php
// wp query slideshow
$slideshow = new WP_Query(array(
    'post_type' => 'slideshow',
    'posts_per_page' => 5,
    'order' => 'ASC'
));

?>

<!-- Slider -->

<div data-hs-carousel='{
    "loadingClasses": "opacity-0",
    "dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500",
    "isAutoPlay": true,
    "isDraggable": true
    
  }' class="relative">
    <div class="hs-carousel relative overflow-hidden w-full min-h-[546px] bg-[#BFD5E3]">
        <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-1000 opacity-0">
            <?php while ($slideshow->have_posts()): $slideshow->the_post(); ?>

                <div class="hs-carousel-slide">
                    <div class="container" class="">
                        <div class="grid grid-cols-1 lg:grid-cols-2 items-center min-h-[546px]">
                            <div>
                                <h1 class="text-4xl lg:text-8xl"> <?php the_title(); ?> </h1>
                                <div class="mt-2 text-xl"><?php the_content(); ?> </div>
                            </div>
                            <img src="<?php the_post_thumbnail_url(); ?>" :alt="<?php the_title(); ?>" class="" />
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>

 <!--  BUtton arrow  -->
   <div class="flex items-center justify-between gap-4 absolute bottom-0 right-0 bg-brand text-white z-40">

        <button type="button"   class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none p-4"><!--  button previous -->
            <span class="text-2xl" aria-hidden="true">
            <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m15 18-6-6 6-6"></path>
            </svg>
        </span>
        <span class="sr-only">Previous</span>
        </button>

        <button type="button"  class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none p-4"><!--  button next  -->
             <span class="sr-only">Next</span>
        <span class="text-2xl" aria-hidden="true">
            <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </span>
        </button>
   </div>
  <!--  end button arrow -->
</div>
<!-- End Slider -->