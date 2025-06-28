<?php 
// product ================================
//=========================================

add_action('rest_api_init', function () {
    register_rest_route('custom-api/v1', '/products', array(
        'methods' => 'GET',
        'callback' => 'get_custom_products',
        'permission_callback' => '__return_true',
    ));
});

function get_custom_products($request) {
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
    );

    $query = new WP_Query($args);
    $products = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post(); // Pindah ke sini duluan
            $post_id = get_the_ID();

            $products[] = array(
                'id' => $post_id,
                'title' => get_the_title(),
                'slug' => get_post_field('post_name', $post_id),
                'acf' => function_exists('get_fields') ? get_fields($post_id) : [],
                'featured_image' => get_the_post_thumbnail_url($post_id, 'full'),
            );
        }
    }

    wp_reset_postdata();

    return rest_ensure_response($products);
}


// slideshow ================================
//=========================================

add_action('rest_api_init', function () {
    register_rest_route('custom-api/v1', '/slideshow', array(
        'methods' => 'GET',
        'callback' => 'get_slideshow',
        'permission_callback' => '__return_true',
    ));
});

function get_slideshow($request) {
    $args = array(
        'post_type' => 'slideshow',
        'posts_per_page' => -1,
    );

    $query = new WP_Query($args);
    $slideshows = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post(); // Pindah ke sini duluan
            $post_id = get_the_ID();

            $slideshows[] = array(
                'id' => $post_id,
                'title' => get_the_title(),
                'content' => get_the_content(),
             //   'slug' => get_post_field('post_name', $post_id),
               // 'acf' => function_exists('get_fields') ? get_fields($post_id) : [],
                'image' => get_the_post_thumbnail_url($post_id, 'full'),
            );
        }
    }

    wp_reset_postdata();

    return rest_ensure_response($slideshows);
}

// page by slug ================================
//=========================================
add_action('rest_api_init', function () {
    register_rest_route('custom-api/v1', '/page/(?P<slug>[a-zA-Z0-9-_]+)', array(
        'methods'  => 'GET',
        'callback' => 'get_custom_page_by_slug',
        'permission_callback' => '__return_true', // bisa pakai auth kalau perlu
    ));
});

function get_custom_page_by_slug($data) {
    $slug = sanitize_text_field($data['slug']);

    $page = get_page_by_path($slug, OBJECT, 'page');

    if (!$page) {
        return new WP_Error('not_found', 'Page not found', array('status' => 404));
    }

    $acf_fields_raw = function_exists('get_fields') ? get_fields($page->ID) : [];
    $acf_fields_cleaned = [];

    if (!empty($acf_fields_raw)) {
        foreach ($acf_fields_raw as $key => $value) {
            // Jika value adalah array dan punya "url" + "mime_type" → kemungkinan besar ini image
            if (is_array($value) && isset($value['url']) && isset($value['mime_type']) && strpos($value['mime_type'], 'image/') === 0) {
                $acf_fields_cleaned[$key] = $value['url']; // hanya ambil url
            } else {
                $acf_fields_cleaned[$key] = $value; // nilai biasa
            }
        }
    }

    return array(
        'title'   => get_the_title($page->ID),
       // 'content' => apply_filters('the_content', $page->post_content),
       'image'   => get_the_post_thumbnail_url($page->ID, 'full'),
        'acf'     => $acf_fields_cleaned,
    );
}


// Project ================================
//=========================================

add_action('rest_api_init', function () {
    register_rest_route('custom-api/v1', '/projects', array(
        'methods'             => 'GET',
        'callback'            => 'get_all_projects',
        'permission_callback' => '__return_true',
    ));
});

function get_all_projects($request) {
    $page     = isset($request['page']) ? (int) $request['page'] : 1;
    $per_page = 3;

    $args = array(
        'post_type'      => 'project', // Ganti ke 'project' kalau kamu pakai custom post type
        'posts_per_page' => $per_page,
        'paged'          => $page,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $query = new WP_Query($args);
    $projects = [];

    foreach ($query->posts as $post) {
        $acf_fields_raw = function_exists('get_fields') ? get_fields($post->ID) : [];
        $acf_fields_cleaned = [];

        if (!empty($acf_fields_raw)) {
            foreach ($acf_fields_raw as $key => $value) {
                if (is_array($value) && isset($value['url']) && isset($value['mime_type']) && strpos($value['mime_type'], 'image/') === 0) {
                    $acf_fields_cleaned[$key] = $value['url'];
                } else {
                    $acf_fields_cleaned[$key] = $value;
                }
            }
        }

        $projects[] = array(
            'id'      => $post->ID,
            'slug'    => $post->post_name,
            'title'   => get_the_title($post->ID),
            'content' => apply_filters('the_content', $post->post_content),
            'image'   => get_the_post_thumbnail_url($post->ID, 'full'),
            'acf'     => $acf_fields_cleaned,
        );
    }

    return array(
        'projects'     => $projects,
        'total'        => (int) $query->found_posts,
        'total_pages'  => (int) $query->max_num_pages,
        'current_page' => $page,
    );
}


// FAQ ==================================
//=========================================

add_action('rest_api_init', function () {
    register_rest_route('custom-api/v1', '/faqs', array(
        'methods'             => 'GET',
        'callback'            => 'get_all_faqs',
        'permission_callback' => '__return_true',
    ));
});

function get_all_faqs() {
    $args = array(
        'post_type'      => 'faq',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $query = new WP_Query($args);
    $faqs = [];

    foreach ($query->posts as $post) {
        $acf_fields_raw = function_exists('get_fields') ? get_fields($post->ID) : [];
        $acf_fields_cleaned = [];

        if (!empty($acf_fields_raw)) {
            foreach ($acf_fields_raw as $key => $value) {
                if (is_array($value) && isset($value['url']) && isset($value['mime_type']) && strpos($value['mime_type'], 'image/') === 0) {
                    $acf_fields_cleaned[$key] = $value['url'];
                } else {
                    $acf_fields_cleaned[$key] = $value;
                }
            }
        }

        $faqs[] = array(
            'id'      => $post->ID,
            'slug'    => $post->post_name,
            'title'   => get_the_title($post->ID),
            'content' => apply_filters('the_content', $post->post_content),
           // 'image'   => get_the_post_thumbnail_url($post->ID, 'full'),
            // 'acf'     => $acf_fields_cleaned,
        );
    }

    return $faqs;
}



// Soluiton Endpoint ================================
//===================================================

add_action('rest_api_init', function () {
    register_rest_route('custom-api/v1', '/solutions', array(
        'methods' => 'GET',
        'callback' => 'get_solutions',
        'permission_callback' => '__return_true',
    ));
});

function get_solutions($request) {
    $args = array(
        'post_type' => 'solution',
        'posts_per_page' => -1,
    );

    $query = new WP_Query($args);
    $solutions = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();

            // Ambil ACF jika tersedia
            $acf_fields = function_exists('get_fields') ? get_fields($post_id) : [];

            $solutions[] = array(
                'id' => $post_id,
                'title' => get_the_title(),
                'content' => apply_filters('the_content', get_the_content()),
                'acf' => $acf_fields,
                'image' => get_the_post_thumbnail_url($post_id, 'full'),
            );
        }
    }

    wp_reset_postdata();

    return rest_ensure_response($solutions);
}

// KAT ================================
//===================================================

// Register Custom REST API Endpoint untuk KAT Setting
add_action('rest_api_init', function () {
    register_rest_route('custom-api/v1', '/kat-settings', array(
        'methods'  => 'GET',
        'callback' => 'kat_get_settings_data',
        'permission_callback' => '__return_true', // Bebas diakses
    ));
});

// Callback untuk mengambil data dari settings
function kat_get_settings_data($request) {
    $data = array(
        'alamat'    => get_option('kat_alamat'),
        'telepon'   => get_option('kat_telepon'),
        'email'     => get_option('kat_email'),
        'instagram' => get_option('kat_instagram'),
        'linkedin'  => get_option('kat_linkedin'),
        'tokopedia' => get_option('kat_tokopedia'),
    );

    return rest_ensure_response($data);
}
