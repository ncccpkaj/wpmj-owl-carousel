<?php
/**
 * Plugin Name: WPMJ Owl Carousel
 * Description: This plugin adds Owl Carousel integration to your WordPress site, providing a responsive and customizable slider experience.
 * Version: 2.3.4
 * Author: Nayeem Hasan
 * Author URI: https://www.linkedin.com/in/ncccpkaj/
 * License: GPL-2.0-or-later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Requires at least: 5.0
 * Tested up to: 6.6.2
 * Stable tag: 2.3.4
 */


defined('ABSPATH') || exit; // Exit if accessed directly

// Global array to store Owl Carousel initialization scripts
global $owl_carousel_scripts;
$owl_carousel_scripts = array();

// Shortcode to capture Owl Carousel initialization code
function wpmj_owl_carousel_shortcode($atts, $content = null) {
    global $owl_carousel_scripts;

    // Sanitize the content and add to the global array
    $script = wp_kses_post($content);
    if (!empty($script)) {
        $owl_carousel_scripts[] = $script;
    }

    return ''; // Shortcode returns nothing to keep it clean
}
add_shortcode('owl_carousel_advanced', 'wpmj_owl_carousel_shortcode');

// Function to check if the page contains the shortcode
function wpmj_check_for_owl_carousel_shortcode() {
    if (is_singular()) {
        global $post;
        if (has_shortcode($post->post_content, 'owl_carousel_advanced')) {
            return true;
        }
    }
    return false;
}

// Enqueue Owl Carousel CSS and JS only if the shortcode is used on the page
function wpmj_enqueue_owl_carousel_assets() {
    if (wpmj_check_for_owl_carousel_shortcode()) {
        // Define the version
        $version = '2.3.4'; // Update this as needed for new releases

        // Enqueue Owl Carousel CSS
        wp_enqueue_style('owl-carousel-css', plugin_dir_url(__FILE__) . 'assets/css/owl.carousel.min.css', array(), $version);

        // Enqueue Owl Carousel JS
        wp_enqueue_script('owl-carousel-js', plugin_dir_url(__FILE__) . 'assets/js/owl.carousel.min.js', array('jquery'), $version, true); // True to load in the footer
    }
}
add_action('wp_enqueue_scripts', 'wpmj_enqueue_owl_carousel_assets');

// Output stored Owl Carousel scripts at the footer, ensuring they run after the JS file is loaded
function wpmj_output_owl_carousel_scripts() {
    global $owl_carousel_scripts;

    if (!empty($owl_carousel_scripts)) {
        // Combine the stored scripts into one string
        $combined_script = implode('; ', $owl_carousel_scripts);
        
        // Minify the combined script by removing extra whitespace and line breaks
        $minified_script = preg_replace('/\s+/', ' ', $combined_script);

        // Allow only script-related tags and escape safely for inline output
        $allowed_html = array(
            'script' => array(
                'type' => true,
            ),
        );

        // Output the minified script in the footer
        echo wp_kses(
            '<script type="text/javascript">jQuery(document).ready(function($) { ' . $minified_script . ' });</script>',
            $allowed_html
        );
    }
}

add_action('wp_footer', 'wpmj_output_owl_carousel_scripts', 100);
