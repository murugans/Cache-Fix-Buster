<?php
/**
 * Plugin Name: Cache Fix Buster
 * Plugin URI: https://github.com/murugans/Cache-Fix-Buster
 * Description: Forces browser cache refresh for users by adding version strings to scripts/styles and optionally reloads if broken layout detected.
 * Version: 1.0.0
 * Author: Murugan S
 * Author URI: https://asirweb.com
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Requires at least: 5.0
 * Tested up to: 6.8
 * Requires PHP: 7.2
 */

// 1. Version busting for theme CSS/JS
add_action('wp_enqueue_scripts', function () {
    $version = '1.0.5'; // Change this to force cache refresh

    // Replace with your theme's main CSS & JS handles if needed
    wp_enqueue_style('theme-style', get_stylesheet_uri(), [], $version);
    
    // Example: replace with your actual JS file
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/script.js', [], $version, true);
});

// 2. Auto-reload page once if key element is missing (e.g., broken layout)
add_action('wp_footer', function () {
    ?>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        var keyElement = document.querySelector(".site-header"); // Replace with a class that MUST exist
        if (!keyElement && !location.search.includes("refresh=1")) {
            location.href = location.href + (location.search ? '&' : '?') + 'refresh=1';
        }

        // OPTIONAL: Unregister service workers if used
        /*
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.getRegistrations().then(function(registrations) {
                for (let registration of registrations) {
                    registration.unregister();
                }
            });
        }
        */
    });
    </script>
    <?php
});
