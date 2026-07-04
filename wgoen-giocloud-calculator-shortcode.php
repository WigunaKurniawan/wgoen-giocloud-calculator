<?php
/**
 * Plugin Name: WGOEN GioCloud Calculator Shortcode
 * Description: Renders the WGOEN GioCloud calculator iframe.
 */

if (!defined('ABSPATH')) {
    exit;
}

add_shortcode('wgoen_giocloud_calculator', function () {
    $src = esc_url('https://wgoen.com/wp-content/uploads/wgoen-tools/giocloud-calculator/index.html');

    return sprintf(
        '<div class="wgoen-giocloud-calculator-embed" style="width:100%%;margin:0 auto 24px;"><iframe src="%s" title="Kalkulator Estimasi GioCloud WGOEN" style="display:block;width:100%%;min-height:1120px;border:0;border-radius:16px;overflow:hidden;background:#ffffff;" loading="lazy"></iframe></div>',
        $src
    );
});
