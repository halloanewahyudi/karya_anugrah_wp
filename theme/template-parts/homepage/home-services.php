<?php
// query post type solutions
$solutions = new WP_Query(array(
    'post_type' => 'solution',
    'posts_per_page' => 4
))
?>
<div>
   
   
        <section id="section-two" class="py-20 bg-neutral-50">
            <div class="container">
                <div class="text-center mb-10">
                    <h4 class="text-4xl font-semibold">Product & Service</h4>
                    <p>What can we provide to you today?</p>
                    <!--  <div class="w-12 h-1 bg-brand mx-auto mt-2"></div> -->
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- soluiton -->
                     <?php if ($solutions->have_posts()): 
                       $numb = 1;
                        while ($solutions->have_posts()): $solutions->the_post(); ?>

                        <div data-aos="fade-up" data-aos-delay="<?php echo $numb; ?>00"
                            class="rounded-lg bg-white lg:min-h-[480px] h-full flex flex-col p-6 text-white items-start justify-end bg-no-repeat bg-cover bg-center group"
                            style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
                            <div class="group-hover:translate-y-2 duration-300">
                                <h4 class="text-white text-2xl mb-0 "><?php the_title(); ?> </h4>
                                <div class="text-white"> <?php the_content(); ?> </div>
                            </div>
                            <?php if (get_field('link')): ?>
                                <a href="<?php the_field('link'); ?>"
                                    class="btn  translate-y-10 opacity-0  group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 delay-75 mt-5">
                                    Show More</a>
                            <?php endif; ?> 
                     
                        </div>
                  <?php
                  $numb++;
                   endwhile;
             
                 endif; 
                 wp_reset_postdata(); ?>
                    <!-- end soluiton -->

                </div>
            </div>
        </section>
    
</div>