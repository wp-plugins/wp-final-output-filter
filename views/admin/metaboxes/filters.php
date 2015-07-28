<fieldset class="options">
    <table class="form-table">
    <tr>
        <th><?php $plugin->_e('Final Output Filter') ?></th>
        <td><label><input type="checkbox" id="<?php echo $optionName ?>[finalOutputEnabled]" name="<?php echo $optionName ?>[finalOutputEnabled]" value="1" <?php checked('1', (int) $values['finalOutputEnabled']); ?> />
            <span><?php $plugin->_e('Enable the filter hook <code>final_output</code> for filtering the whole page') ?></span></label>
        </td>
    </tr>
    <tr>
        <th><?php $plugin->_e('Widget Output Filter') ?></th>
        <td><label><input type="checkbox" id="<?php echo $optionName ?>[widgetOutputEnabled]" name="<?php echo $optionName ?>[widgetOutputEnabled]" value="1" <?php checked('1', (int) $values['widgetOutputEnabled']); ?> />
                <span><?php $plugin->_e('Enable the filter hook <code>widget_output</code> for filtering all widgets') ?></span>
                <br><span class="description"><?php $plugin->_e('The WordPress filter hooks <code>widget_text</code> and <code>widget_title </code> only filters Text Widgets') ?></span>
            </label>
        </td>
    </tr>
    </table>
</fieldset>
<p class="submit">
    <input class="button-primary" type="submit" disabled="disabled" value="<?php _e('Save Changes' ) ?>" />
</p>
<br class="clear" />
