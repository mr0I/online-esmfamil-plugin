<?php defined('ABSPATH') or die('No script kiddies please!');


add_action('admin_menu', function () {
    global $efplPageHook;

    $efplPageHook = add_menu_page(
        __('Esm Famil Settings', 'esm_famil'),
        __('Esm Famil Settings', 'esm_famil'),
        'administrator',
        'efpl',
        function () {
            include(EFPL_ADMIN_PAGES . 'settings.php');
        },
        'dashicons-text-page'
    );
});
