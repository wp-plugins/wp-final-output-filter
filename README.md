[WP Final Output Filter](http://wordpress.org/plugins/wp-final-output-filter/)
==============================================================================

This WordPress plugin adds a filter hook for the whole output of the entire page, which is not built in the WordPress Core. Made for developers or more advanced WP site owners.

Description
-----------

Adds the filter hook `final_output` for the whole output of the entire page, which is not built in WordPress. This plugin is made for developers or more advanced WP site owners.

What does it do?
----------------

You can use the filter `final_output` to change the whole output of the page (f.e. the html).
That way you could make modifications before the page is sent to the visitors' browser.

    add_filter('final_output', 'wp_replace_at_sign', 10, 1);

    function wp_replace_at_sign($content) {
        $content = str_replace('@', '[at]', $content);
        return $content;
    }

The plugin also provides the filter `widget_output` to filter all widgets.

    add_filter('widget_output', 'wp_replace_b_tags', 10, 1);

    function wp_replace_b_tags($content) {
        $content = str_replace('&lt;b&gt;', '&lt;strong&gt;', $content);
        $content = str_replace('&lt;/b&gt;', '&lt;/strong&gt;', $content);
        return $content;
    }

How does it work?
-----------------

You only have to install and activate the plugin to make it work. The filters are enabled by default.
When activated you can change the output of the entire page by using the `final_output` filter.
