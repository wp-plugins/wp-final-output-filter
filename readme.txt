=== WP Final Output Filter ===
Contributors: freelancephp
Tags: filter, whole output, entire page, final output, complete page, hook, filter content, filter page, html, dev, development
Requires at least: 3.6.0
Tested up to: 4.2.2
Stable tag: 1.0.0

A filter hook for the whole output of the entire page, which is not built in the WordPress Core. For developers or more advanced WP site owners.

== Description ==

Adds the filter hook `wp_final_output` for the whole output of the entire page. The WordPress Core doesn't contain such a filter. For developers or more advanced WP site owners.

= What does it do? =

You can use the filter `wp_final_output` to change the whole output of the page (f.e. the html).
That way you could make modifications before the page is sent to the visitors' browser.

`add_filter('wp_final_output', 'wp_replace_b_tags', 10, 1);

function wp_replace_b_tags($content) {
    $content = str_replace('<b>', '<strong>', $content);
    $content = str_replace('</b>', '</strong>', $content);
    return $content;
}`

= How does it work? =

You only have to install and activate the plugin to make it work (the plugin doesn't have an admin page).
When activated you can change the output of the entire page by using the `wp_final_output` filter.

= Sources =
* [FAQ](http://wordpress.org/extend/plugins/wp-final-output-filter/faq/)
* [Github](https://github.com/freelancephp/WP-Final-Output-Filter)

== Installation ==

You only have to install and activate the plugin to make it work. The plugin doesn't have an admin page.

== Changelog ==

= 1.0.0 =
* Created filter hook `wp_final_output`
