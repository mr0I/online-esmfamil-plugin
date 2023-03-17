<?php defined('ABSPATH') or die('No script kiddies please!');

function EFPL_activate_function()
{
    require(EFPL_ROOTDIR . 'helpers/db.php');
    sleep(1);
    require(EFPL_ROOTDIR . 'helpers/db_seed.php');

    register_uninstall_hook(__FILE__, 'EsmFamilUninstall');
    flush_rewrite_rules();
}

function EFPL_deactivate_function()
{
    flush_rewrite_rules();
}

function EsmFamilUninstall()
{
    if (get_option('should_delete_efpl_db')) {
        global $wpdb;
        $table = $wpdb->prefix . EFPL_ESMFAMIL_TBL;
        $wpdb->query("DROP TABLE IF EXISTS ${table}");
    }
}
