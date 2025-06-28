<?php
// Nonaktifkan Gutenberg dan kembalikan ke Classic Editor
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);

// Nonaktifkan CSS block editor di front-end
function disable_block_editor_assets() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style'); // Jika menggunakan WooCommerce
}
add_action('wp_enqueue_scripts', 'disable_block_editor_assets', 100);


// Sembunyikan Classic Editor textarea
add_action('admin_init', function () {
  //  remove_post_type_support('post', 'editor'); // hilangkan editor dari post
    remove_post_type_support('page', 'editor'); // hilangkan editor dari page
    // Tambahkan post type lain jika perlu
});