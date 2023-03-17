<?php defined('ABSPATH') or die('No script kiddies please!');

function EFPL_activate_function()
{
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    global $wpdb;
    $esmfamil_tbl = $wpdb->prefix . EFPL_ESMFAMIL_TBL;
    $createEsmfamilTable =
        "
		CREATE TABLE IF NOT EXISTS `${createEsmfamilTable}` (
            `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `girl_name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
            `boy_name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
            `family` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
            `fruit` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
            `food` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
            `color` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
            `flower` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
            `items` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
            `city` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
            `country` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
            `organ` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
            `animal` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
            `car` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
            `dress` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
            `celebrities` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
            `job` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
            `sport` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
            `movie` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
            `anime` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
            `book` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB AUTO_INCREMENT=605 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		";
    dbDelta($createEsmfamilTable);

    flush_rewrite_rules();
}

function EFPL_deactivate_function()
{
    flush_rewrite_rules();
}
