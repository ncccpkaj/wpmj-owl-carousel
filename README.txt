=== WPMJ Owl Carousel ===
Contributors: Nayeem Hasan
Tags: owl carousel, slider, jquery, javascript
Requires at least: 6.3
Tested up to: 6.6
Requires PHP: 7.4
Stable tag: 2.3.4
Beta tag: 2.3.4-beta1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin adds Owl Carousel integration to your WordPress site, providing a responsive and customizable slider experience.

== Description ==
WPMJ Owl Carousel is a WordPress plugin that integrates the Owl Carousel library, allowing users to create responsive and customizable sliders on their websites. With support for various settings, you can easily set up and manage sliders without needing to write custom code.

== Installation ==
1. Upload the plugin files to the `/wp-content/plugins/wpmj-owl-carousel/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Use the shortcode [owl_carousel_advanced] to add an Owl Carousel to your pages or posts.

== Frequently Asked Questions ==
= How do I use the Owl Carousel? =
After installing the plugin, you can add the carousel to your posts or pages using the provided shortcode. You can also add custom settings for the carousel.

== Changelog ==
= 2.3.4 =
* Updated Owl Carousel library to the latest version.
* Minor bug fixes and performance improvements.

= 2.3.3 =
* Initial release of the plugin.

== License ==
This plugin is licensed under the GPLv2 (or later).
You can view the full license text at http://www.gnu.org/licenses/gpl-2.0.html

== Usage ==

To use the Owl Carousel, simply add the following shortcode in your posts, pages, or Elementor widgets:


### Steps to Add a Carousel

1. **Add the Shortcode**: Insert the shortcode in the content editor or Elementor.
2. **Customize Settings**: Modify the JavaScript settings within the shortcode as needed to suit your carousel's requirements (e.g., items, autoplay, nav).
3. **Repeat**: You can add multiple carousels on the same page using the shortcode with different class names and settings.

### Example Usage

```html
[owl_carousel_advanced]
$('.hero-carousel').owlCarousel({
    loop: true,
    margin: 30,
    items: 3,
    autoplay: true,
    nav: true,
    dots: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
});
[/owl_carousel_advanced]
Another example
[owl_carousel_advanced]
    var $owl = $('.hero-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false, 
        items: 3
    });

    $('#hero-carousel-next-item').click(function() {
        $owl.trigger('next.owl.carousel');
    });

    $('#hero-carousel-prev-item').click(function() {
        $owl.trigger('prev.owl.carousel');
    });
[/owl_carousel_advanced]
