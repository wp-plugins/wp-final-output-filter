<h4><img src="<?php echo $plugin->getGlobal('pluginUrl') . '/images/icon-wp-external-links.png' ?>" width="16" height="16" /> <?php $plugin->_e('WP External Links') ?>
    <?php if (is_plugin_active('wp-external-links/wp-external-links.php')): ?>
        <?php $plugin->_e('(ACTIVATED)') ?>
    <?php elseif(file_exists(WP_PLUGIN_DIR . '/wp-external-links/wp-external-links.php')): ?>
        <?php $plugin->_e('(INSTALLED)') ?>
    <?php else: ?>
        <a href="<?php echo get_bloginfo('url') ?>/wp-admin/plugin-install.php?tab=search&type=term&s=WP+External+Links+freelancephp&plugin-search-input=Search+Plugins"><?php $plugin->_e('(Get this plugin)') ?></a>
    <?php endif; ?>
</h4>
<p><?php $plugin->_e('Open external links in a new window or tab, adding "nofollow", set link icon, styling, SEO friendly options and more. Easy install and go.') ?>
    <br /><a href="http://wordpress.org/extend/plugins/wp-external-links/" target="_blank">WordPress.org</a> | <a href="http://www.freelancephp.net/wp-external-links-plugin/" target="_blank">FreelancePHP.net</a>
</p>

<h4><img src="<?php echo $plugin->getGlobal('pluginUrl') . '/images/icon-wp-mailto-links.png' ?>" width="16" height="16" /> <?php $plugin->_e('WP Mailto Links') ?>
    <?php if (is_plugin_active('wp-mailto-links/wp-mailto-links.php')): ?>
        <?php $plugin->_e('(ACTIVATED)') ?>
    <?php elseif(file_exists(WP_PLUGIN_DIR . '/wp-mailto-links/wp-mailto-links.php')): ?>
        <?php $plugin->_e('(INSTALLED)') ?>
    <?php else: ?>
        <p><a href="<?php echo get_bloginfo('url') ?>/wp-admin/plugin-install.php?tab=search&type=term&s=WP+Mailto+Links+freelancephp&plugin-search-input=Search+Plugins"><?php $plugin->_e('(Get this plugin)') ?></a></p>
    <?php endif; ?>
</h4>
<p><?php $plugin->_e('Protect email addresses and mailto links from spambots and being used for spamming. Easy to use without configuration.') ?>
    <br /><a href="http://wordpress.org/extend/plugins/wp-mailto-links/" target="_blank">WordPress.org</a> | <a href="http://www.freelancephp.net/wp-mailto-links-plugin/" target="_blank">FreelancePHP.net</a>
</p>

<h4><img src="<?php echo $plugin->getGlobal('pluginUrl') . '/images/icon-email-encoder-bundle.png' ?>" width="16" height="16" /> <?php $plugin->_e('Email Encoder Bundle') ?>
    <?php if (is_plugin_active('email-encoder-bundle/email-encoder-bundle.php')): ?>
        <?php $plugin->_e('(ACTIVATED)') ?>
    <?php elseif(file_exists(WP_PLUGIN_DIR . '/email-encoder-bundle/email-encoder-bundle.php')): ?>
        <?php $plugin->_e('(INSTALLED)') ?>
    <?php else: ?>
        <a href="<?php echo get_bloginfo('url') ?>/wp-admin/plugin-install.php?tab=search&type=term&s=WP+Mailto+Links+freelancephp&plugin-search-input=Search+Plugins"><?php $plugin->_e('(Get this plugin)') ?></a>
    <?php endif; ?>
</h4>
<p><?php $plugin->_e('Encode mailto links, email addresses, phone numbers and any text to hide them from (spam)bots. Mailto links will be protected automatically.') ?>
    <br /><a href="http://wordpress.org/extend/plugins/email-encoder-bundle/" target="_blank">WordPress.org</a> | <a href="http://www.freelancephp.net/wp-email-encoder-bundle-plugin-3/" target="_blank">FreelancePHP.net</a>
</p>
