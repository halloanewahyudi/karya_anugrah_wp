<div class="group">
    <div class="rounded-lg overflow-hidden mb-4 h-[220px]">
        <a href="<?php the_permalink() ?>">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="" class=" rounded-lg object-cover w-full h-[220px] group-hover:scale-105 duration-300" />
        </a>
    </div>
    <div class="flex items-center gap-2 text-xs">
        <i class="bi bi-calendar-check"></i>
        <span><?php echo get_the_date(); ?> </span>
    </div>
    <h4>
        <a href="<?php the_permalink() ?>" class="hover:text-brand"><?php the_title(); ?></a>
    </h4>
</div>