<div class="wrap-style">
            <h2>Theme Settings</h2>
            <form method="post" action="options.php">
            <?php settings_fields('theme-settings-group'); ?>
            <?php do_settings_sections('theme-settings-group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Notifi</th>
                    <td>
                        <input type="text" name="notification_shortcode"
                            value="<?php echo esc_attr(get_option('notification_shortcode')); ?>" />
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>

        <form method="post" action="options.php">
            <?php settings_fields('theme-settings-group'); ?>
            <?php do_settings_sections('theme-settings-group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Shortcode</th>
                    <td>
                        <input type="text" name="notification_shortcode"
                            value="<?php echo esc_attr(get_option('notification_shortcode')); ?>" />
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
        </div>;