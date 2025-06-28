<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package karya_anugrah
 */

get_header();
$description = get_field('description');
$specification = get_field('specification');
$market_place = get_field('market_place');
?>
<section id="primary">
    <main id="main">

        <?php while (have_posts()) : the_post(); ?>
            <div class="grid grid-cols-1 md:grid-cols-2 min-h-[60vh]"> <!-- main -->
                <div class="p-6 lg:p-10 flex fle-col justify-center items-center ">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                </div>
                <div class="bg-gray-50 h-full flex flex-col justify-between">
                    <div class=" p-6 lg:p-10 ">
                        <h1 class="text-4xl text-center mb-4"><?php the_title(); ?></h1>


                        <!--  mulai tab -->
                        <div>
                            <div class="border-b border-gray-200 dark:border-neutral-700">
                                <nav class="flex gap-x-1" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                                    <button type="button" class=" hs-tab-active:font-semibold hs-tab-active:border-brand hs-tab-active:text-brand py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent  whitespace-nowrap text-gray-500 hover:text-brand focus:outline-hidden focus:text-brand disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500 active" id="tabs-with-underline-item-1" aria-selected="true" data-hs-tab="#tabs-with-underline-1" aria-controls="tabs-with-underline-1" role="tab">
                                        Description
                                    </button>
                                    <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-brand hs-tab-active:text-brand py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent whitespace-nowrap text-gray-500 hover:text-brand focus:outline-hidden focus:text-brand disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500" id="tabs-with-underline-item-2" aria-selected="false" data-hs-tab="#tabs-with-underline-2" aria-controls="tabs-with-underline-2" role="tab">
                                        Specification
                                    </button>

                                </nav>
                            </div>

                            <div class="mt-3">
                                <div id="tabs-with-underline-1" role="tabpanel" aria-labelledby="tabs-with-underline-item-1">
                                    <div> <?php echo $description; ?></div>
                                </div>
                                <div id="tabs-with-underline-2" class="hidden" role="tabpanel" aria-labelledby="tabs-with-underline-item-2">
                                    <div> <?php echo $specification; ?></div>
                                </div>
                            </div>
                        </div>
                        <!-- end tabs -->

                    </div>
                    <div class="grid grid-cols-2 items-center "> <!-- lnk external -->
                        <a href="<?php echo $market_place; ?>" target="_blank"
                            class="group w-full h-full p-3 text-center cursor-pointer flex items-center justify-center gap-2 bg-tertiary text-gray-900 hover:bg-brand-200 hover:text-brand duration-300">
                            Check on
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 48 48"><!-- Icon from Arcticons by Donnnno - https://creativecommons.org/licenses/by-sa/4.0/ --><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M27.043 12.942c-3.43-2.897-16.85-2.247-16.85-2.247l-.473 32.65s17.855.134 23.353 0s9.341-4.508 9.4-7.878s0-24.18 0-24.18c-6.858-.829-11.942-.178-15.43 1.655"/><circle cx="19.531" cy="24.172" r="6.976" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M32.043 29.33a6.272 6.272 0 1 0-2.3-1.786m-19.55-16.849l-4.494 3.252L5.5 39.369l4.22 3.977m23.975-32.251a7.796 7.796 0 0 0-15.318-.299"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M34.396 19.662a2.36 2.36 0 0 1-3.878 2.59a4.194 4.194 0 1 0 3.878-2.59m-13.872.345a2.424 2.424 0 0 1-4.251 2.211a4.31 4.31 0 1 0 4.25-2.21m3.838 11.41c0-2.817 2.031-3.962 4.721-3.962c2.395 0 3.755 3.252 3.755 3.252a18.2 18.2 0 0 1-7.45 1.449a9.9 9.9 0 0 0 5.321 2.542s-.827.62-3.665.62c-2.306.001-2.682-2.453-2.682-3.902"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M30.317 31.569a10.4 10.4 0 0 1-.258 3.008"/></svg>
                        </a>
                        <a href="<?php site_url('/contact') ?>"
                            class="w-full h-full p-3 text-center cursor-pointer bg-tertiary text-gray-900 hover:bg-brand-200 hover:text-brand duration-300">
                            Contact
                        </a>
                    </div> <!-- end link external -->
                </div>
            </div>
        <?php endwhile; // End of the loop.  
        ?>
    </main>
</section>
<?php
get_footer();
