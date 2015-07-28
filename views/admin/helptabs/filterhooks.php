<h3>Filter Hooks</h3>

<h4>final_output</h4>
<pre><code><&#63;php
add_filter('final_output', 'wp_replace_at_sign', 10, 1);

function wp_replace_at_sign($content) {
    $content = str_replace('@', '[at]', $content);
    return $content;
}
&#63;></code></pre>

<h4>widget_output</h4>
<pre><code><&#63;php
add_filter('widget_output', 'wp_replace_b_tags', 10, 1);

function wp_replace_b_tags($content) {
    $content = str_replace('&lt;b&gt;', '&lt;strong&gt;', $content);
    $content = str_replace('&lt;/b&gt;', '&lt;/strong&gt;', $content);
    return $content;
}
&#63;></code></pre>
