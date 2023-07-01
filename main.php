<?php

/**
 * Plugin Name: Online Esm Famil
 * Plugin URI:  http://localhost
 * Description: Use [insert_esmfamil] to view horoscope shortcode on the page.
 * Version: 1.1.0
 * Author: ZeroOne
 * Author URI: https://github.com/tuderiewsc
 * Text Domain: esm_famil
 * Domain Path: /i10n
 */
defined('ABSPATH') or die('No script kiddies please!');
define('EFPL_ROOTDIR', plugin_dir_path(__FILE__));
define('EFPL_INC', EFPL_ROOTDIR . 'includes/');
define('EFPL_ADMIN', EFPL_ROOTDIR . 'admin/');
define('EFPL_ADMIN_PAGES', EFPL_ROOTDIR . 'admin/pages/');
define('EFPL_ADMIN_CSS', plugin_dir_url(__FILE__) . 'admin/static/css/');
define('EFPL_SITE_JS', plugin_dir_url(__FILE__) . 'site/static/js/');
define('EFPL_SITE_CSS', plugin_dir_url(__FILE__) . 'site/static/css/');
define('EFPL_ESMFAMIL_TBL', 'esmfamil');

add_action('plugins_loaded', function () {
    load_plugin_textdomain('esm_famil', false, basename(plugin_dir_path(__FILE__)) . '/i10n/');
});

if (!function_exists('get_plugin_data'))
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');


add_action('admin_enqueue_scripts', function () {
    $pluginVersion = (get_plugin_data(__FILE__, false))['Version'];

    wp_enqueue_style('efpl-admin-styles', EFPL_ADMIN_CSS . 'admin-styles.css', array(), $pluginVersion);
});

/** Inits */
include(EFPL_ROOTDIR . 'base_functions.php');
register_activation_hook(__FILE__, 'EFPL_activate_function');
register_deactivation_hook(__FILE__, 'EFPL_deactivate_function');
include(EFPL_INC . 'shortcodes.php');
if (is_admin()) {
    include(EFPL_ADMIN . 'ajax_requests.php');
    include(EFPL_ADMIN . 'admin_process.php');

    /** Add settings link to plugin-title  */
    add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'efpl_settings_link');
    function efpl_settings_link(array $links)
    {
        $url = get_admin_url() . "admin.php?page=efpl";
        $settingsLink = '<a href="' . $url . '">' . __('Settings', 'esm_famil') . '</a>';
        $links[] = $settingsLink;
        return $links;
    }
}
