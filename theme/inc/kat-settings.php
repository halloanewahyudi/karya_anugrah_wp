<?php
// Registrasi halaman settings "KAT Setting"
add_action('admin_menu', 'kat_register_settings_page');
function kat_register_settings_page() {
    add_options_page(
        'KAT Setting',        // Page title
        'KAT Setting',        // Menu title
        'manage_options',     // Capability
        'kat-setting',        // Menu slug
        'kat_settings_page_html' // Callback
    );
}

// Registrasi pengaturan dan field
add_action('admin_init', 'kat_register_settings');
function kat_register_settings() {
    register_setting('kat_settings_group', 'kat_alamat');
    register_setting('kat_settings_group', 'kat_telepon');
    register_setting('kat_settings_group', 'kat_email');
    register_setting('kat_settings_group', 'kat_instagram');
    register_setting('kat_settings_group', 'kat_linkedin');
    register_setting('kat_settings_group', 'kat_tokopedia');
}

// Tampilan HTML untuk halaman settings
function kat_settings_page_html() {
    ?>
    <div class="wrap">
        <h1>KAT Setting</h1>
        <form method="post" action="options.php">
            <?php settings_fields('kat_settings_group'); ?>
            <?php do_settings_sections('kat_settings_group'); ?>

            <table class="form-table">
                <tr>
                    <th scope="row"><label for="kat_alamat">Alamat</label></th>
                    <td><textarea name="kat_alamat" id="kat_alamat" class="regular-text" rows="3"><?php echo esc_textarea(get_option('kat_alamat')); ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row"><label for="kat_telepon">Telepon</label></th>
                    <td><input type="text" name="kat_telepon" id="kat_telepon" value="<?php echo esc_attr(get_option('kat_telepon')); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="kat_email">Email</label></th>
                    <td><input type="email" name="kat_email" id="kat_email" value="<?php echo esc_attr(get_option('kat_email')); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="kat_instagram">Instagram</label></th>
                    <td><input type="url" name="kat_instagram" id="kat_instagram" value="<?php echo esc_url(get_option('kat_instagram')); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="kat_linkedin">LinkedIn</label></th>
                    <td><input type="url" name="kat_linkedin" id="kat_linkedin" value="<?php echo esc_url(get_option('kat_linkedin')); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="kat_tokopedia">Tokopedia</label></th>
                    <td><input type="url" name="kat_tokopedia" id="kat_tokopedia" value="<?php echo esc_url(get_option('kat_tokopedia')); ?>" class="regular-text" /></td>
                </tr>
            </table>

            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
