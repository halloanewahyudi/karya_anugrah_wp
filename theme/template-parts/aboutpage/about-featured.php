<section class="relative mb-20">
    <div class="container">
        <h2 class="text-center mb-5 text-4xl font-bold ">OUR LATEST WORK </h2>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-10 items-center ">
            <?php
            $featured = get_field('featured');

            foreach ($featured as $index => $ab): ?>
                <div
                    class="h-[340px] relative rounded-lg overflow-hidden group flex flex-col justify-center items-center">
                    <div
                        class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-brand-50/10 to-black/70 z-10 group-hover:bg-black/80 duration-300"></div>
                    <img
                        src="<?php echo esc_url($ab['image']); ?>"
                        alt=""
                        class="group-hover:scale-110 duration-300 w-full h-full object-cover rounded-lg absolute top-0 left-0" />
                    <div
                        class="absolute text-white bottom-0 left-0 p-4 w-[calc(100%-2rem)] z-20">
                        <h4 class="text-xl font-bold text-white"><?php echo esc_html($ab['title']); ?> </h4>
                    </div>
                    <button
                        type="button"
                        aria-haspopup="dialog"
                        aria-expanded="false"
                        aria-controls="hs-offcanvas-example"
                        data-hs-overlay="#hs-offcanvas-example"
                        data-title="<?php echo esc_attr($ab['title']); ?>"
                        data-image="<?php echo esc_url($ab['image']); ?>"
                        data-description="<?php echo esc_attr(strip_tags($ab['description'])); ?>"
                        onclick="populateOffcanvas(this)">
                        <i class="bi bi-arrows-angle-expand text-3xl text-white relative z-20 opacity-0 group-hover:opacity-100 duration-300"></i>
                    </button>
                </div>
            <?php endforeach; ?>

        </div>

    </div>
</section>

<div id="hs-offcanvas-example" class="hs-overlay hs-overlay-open:translate-x-0 hidden translate-x-full fixed top-0 end-0 transition-all duration-300 transform h-full max-w-lg w-full z-80 bg-white border-s border-gray-200 dark:bg-neutral-800 dark:border-neutral-700" role="dialog" tabindex="-1" aria-labelledby="hs-offcanvas-right-label">
    <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
        <h3 id="offcanvas-title" class="font-bold text-gray-800 dark:text-white"></h3>

        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-offcanvas-example">
            <span class="sr-only">Close</span>
            <i class="bi bi-x-lg"></i>
        </button>
    </div>
    <div class="p-4">
        <img id="offcanvas-image" src="" alt="" class="mb-4 rounded-lg w-full h-[300px] object-cover">
        <div id="offcanvas-description" class="text-gray-700 dark:text-gray-300"></div>
    </div>
</div>

<script>
    function populateOffcanvas(button) {
        const title = button.getAttribute('data-title');
        const image = button.getAttribute('data-image');
        const description = button.getAttribute('data-description');

        // Update the content in the offcanvas
        document.getElementById('offcanvas-title').textContent = title;
        document.getElementById('offcanvas-image').src = image;
        document.getElementById('offcanvas-description').textContent = description;
    }
</script>