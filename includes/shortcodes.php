<?php defined('ABSPATH') or die('No script kiddies please!');

add_action('init', function () {
    add_shortcode('insert_esmfamil', 'insertEsmFamil');
});

function insertEsmFamil($atts, $content = null)
{
    ob_start();
    include(EFPL_ROOTDIR . 'site/templates/esmfamil_cmp.php');
    return do_shortcode(ob_get_clean());
}
