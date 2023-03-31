<?php

/**
 * Plugin Name: Online Esm Famil
 * Plugin URI:  http://localhost
 * Description: Use [insert_esmfamil] to view horoscope shortcode on the page.
 * Version: 1.0.3
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
define('EFPL_SITE_JS', plugin_dir_url(__FILE__) . 'site/static/js/');
define('EFPL_SITE_CSS', plugin_dir_url(__FILE__) . 'site/static/css/');
define('EFPL_ESMFAMIL_TBL', 'esmfamil');

add_action('plugins_loaded', function () {
    load_plugin_textdomain('esm_famil', false, basename(plugin_dir_path(__FILE__)) . '/i10n/');
});

if (!function_exists('get_plugin_data'))
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');

add_action('wp_enqueue_scripts', function () {
    $pluginVersion = (get_plugin_data(__FILE__, false))['Version'];

    wp_enqueue_style('efpl-main-styles', EFPL_SITE_CSS . 'styles.css', array(), $pluginVersion);

    wp_enqueue_script('efpl-main-script', EFPL_SITE_JS . 'scripts.js', array('jquery'), $pluginVersion, true);
    wp_localize_script('efpl-main-script', 'EFPL_SITE_AJAX', array(
        'AJAXURL' => admin_url('admin-ajax.php'),
        'SECURITY' => wp_create_nonce('2VOgPHZNsyqOiGRA'),
        'REQUEST_TIMEOUT' => 30000,
        'SUBMIT_BTN_TXT' => __('Show Result!', 'esm_famil'),
        'MORE_RESULTS_TXT' => __('More Results!', 'esm_famil'),
        'BE_PATIENT' => __('Please Be Patient...', 'esm_famil'),
        'GIRL_NAME' => __('Girl Name', 'esm_famil'),
        'BOY_NAME' => __('Boy Name', 'esm_famil'),
        'Family' => __('Family', 'esm_famil'),
        'Fruist_And_Vegetables' => __('Fruist And Vegetables', 'esm_famil'),
        'Food' => __('Food', 'esm_famil'),
        'Color' => __('Color', 'esm_famil'),
        'Flower' => __('Flower', 'esm_famil'),
        'Items' => __('Items', 'esm_famil'),
        'City' => __('City', 'esm_famil'),
        'Country' => __('Country', 'esm_famil'),
        'Organ' => __('Organ', 'esm_famil'),
        'Animal' => __('Animal', 'esm_famil'),
        'Car' => __('Car', 'esm_famil'),
        'Dress' => __('Dress', 'esm_famil'),
        'Celebrity' => __('Celebrity', 'esm_famil'),
        'Job' => __('Job', 'esm_famil'),
        'Sport' => __('Sport', 'esm_famil'),
        'Movie' => __('Movie', 'esm_famil'),
        'Animation' => __('Animation', 'esm_famil'),
        'Book' => __('Book', 'esm_famil'),
    ));
});



/** Inits */
include(EFPL_ROOTDIR . 'base_functions.php');
register_activation_hook(__FILE__, 'EFPL_activate_function');
register_deactivation_hook(__FILE__, 'EFPL_deactivate_function');
include(EFPL_INC . 'shortcodes.php');
if (is_admin()) {
    include(EFPL_ADMIN . 'ajax_requests.php');
    include(EFPL_ADMIN . 'admin_process.php');
}
