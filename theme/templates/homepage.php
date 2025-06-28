<?php 
/* Template Name: Homepage */
get_header();

get_template_part('template-parts/homepage/slideshow');

get_template_part('template-parts/homepage/home','services');

get_template_part('template-parts/homepage/home','about');

get_template_part('template-parts/homepage/home','product');

get_template_part('template-parts/homepage/home','news');

get_footer();