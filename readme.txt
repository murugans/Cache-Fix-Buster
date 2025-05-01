=== Cache Fix Buster ===
Contributors: Murugan S
Tags: cache, cache busting, css versioning, javascript versioning, browser cache, service worker, responsive fix  
Requires at least: 5.0  
Tested up to: 6.8  
Requires PHP: 7.2  
Stable tag: 1.0.0  
License: GPLv2 or later  
License URI: https://www.gnu.org/licenses/gpl-2.0.html  

Fix layout issues caused by persistent browser caching by automatically adding version strings to CSS/JS files and detecting broken views.

== Description ==

**Cache Fix Buster** helps prevent layout and styling issues caused by aggressive browser caching. It's designed to address cases where users (or clients) see broken pages due to cached styles or scripts — even after updates are made.

This lightweight plugin adds a version number to your theme’s main CSS and JS files, ensuring that browsers re-download the updated files. It also includes a smart JavaScript-based fallback that detects if the page is broken (via missing elements) and forces a single reload to fix it — no cache clearing needed.

Optionally, it can unregister service workers if Progressive Web App features are caching content too aggressively.

=== Features ===
* Automatically adds version query strings to enqueue CSS/JS.
* Fixes display issues caused by old cached files.
* Optional smart reload if layout appears broken.
* Optionally unregisters service workers (PWA-related fix).
* Compatible with most cache plugins (e.g., WP Rocket, W3 Total Cache).

== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory or install directly via the WordPress admin.
2. Activate the plugin through the 'Plugins' menu.
3. Optional: Edit the plugin file to change the version number when you need to bust the cache again.

== Frequently Asked Questions ==

= Does this conflict with WP Rocket or other caching plugins? =  
No, it’s fully compatible. This plugin simply appends version numbers to your theme’s assets, which many cache plugins also support.

= How does the smart reload feature work? =  
It checks for the presence of a key layout element (e.g., `.site-header`). If it’s missing, the page reloads once with a cache-bypass query string.

= Can I unregister service workers? =  
Yes. Uncomment the relevant section in the plugin file to unregister service workers from the user’s browser.

== Screenshots ==

1. Example: Missing layout triggers one-time reload.
2. Versioned asset links added to HTML source.

== Changelog ==

= 1.0.0 =
* Initial release with asset versioning and optional auto-reload feature.

== Upgrade Notice ==

= 1.0.0 =
First version. Safely improves cache behavior without affecting performance.
