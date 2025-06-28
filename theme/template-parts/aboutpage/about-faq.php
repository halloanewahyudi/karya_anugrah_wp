<div class="container mb-20">
    <div class="text-center mb-5">
        <h2 class=" text-4xl font-bold ">F.A.Q </h2>
        <p>Frequently Asked Questions</p>
    </div>
    <?php
    // query post type faq
    $faq = new WP_Query(array(
        'post_type' => 'faq',
        'posts_per_page' => -1
    ))
    ?>

    <div class="hs-accordion-group flex flex-col gap-5">
        <?php while ($faq->have_posts()): $faq->the_post(); ?>

            <!-- collapse -->
            <div class="hs-accordion   p-6  bg-brand-50 rounded-lg duration-300">
                <button type="button" class="hs-collapse-toggle flex gap-2 text-lg" id="hs-basic-collapse" aria-expanded="false" aria-controls="hs-basic-collapse-heading-<?php the_ID(); ?>" data-hs-collapse="#hs-basic-collapse-heading-<?php the_ID(); ?>">

                    <i class="bi bi-plus-lg hs-accordion-active:hidden hs-accordion-active:text-brand hs-accordion-active:group-hover:text-brand block size-4 text-gray-600 group-hover:text-gray-500 dark:text-neutral-400"></i>
                    <?php the_title(); ?>
                </button>
                <div id="hs-basic-collapse-heading-<?php the_ID(); ?>" class="hs-collapse hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-collapse">
                    <div class="mt-5">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <!--end collapse -->
        <?php endwhile;
        wp_reset_postdata(); ?>

    </div>

</div>