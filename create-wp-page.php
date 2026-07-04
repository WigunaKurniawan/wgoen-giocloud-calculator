<?php
require_once '/var/www/html/wp-load.php';

$slug = 'kalkulator-giocloud';
$title = 'Kalkulator Estimasi GioCloud';
$content = <<<HTML
<!-- wp:shortcode -->
[wgoen_giocloud_calculator]
<!-- /wp:shortcode -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Kalkulator ini adalah estimasi awal dari WGOEN. Harga, promo, pajak, dan ketersediaan layanan dapat berubah. Selalu cek halaman resmi Biznet Gio sebelum transaksi.</p>
<!-- /wp:paragraph -->
HTML;

$existing = get_page_by_path($slug, OBJECT, 'page');

$post_data = [
    'post_title' => $title,
    'post_name' => $slug,
    'post_content' => $content,
    'post_status' => 'publish',
    'post_type' => 'page',
    'meta_input' => [
        '_wgoen_generated_note' => 'GioCloud calculator v0 embedded from static upload.',
    ],
];

if ($existing) {
    $post_data['ID'] = $existing->ID;
    $post_id = wp_update_post($post_data, true);
} else {
    $post_id = wp_insert_post($post_data, true);
}

if (is_wp_error($post_id)) {
    fwrite(STDERR, $post_id->get_error_message() . PHP_EOL);
    exit(1);
}

echo get_permalink($post_id) . PHP_EOL;
