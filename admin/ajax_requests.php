<?php defined('ABSPATH') or die('No script kiddies please!');


function fetchOesResults_callback()
{
    if (
        !wp_verify_nonce($_POST['nonce'], 'oes-nonce')
        || !check_ajax_referer('2VOgPHZNsyqOiGRA', 'SECURITY')
    ) {
        wp_send_json_error('Forbidden', 403);
        exit();
    }

    $selectedChar = sanitize_text_field($_POST['selectedChar']);
    global $wpdb;
    $tbl = $wpdb->prefix . EFPL_ESMFAMIL_TBL;
    $fetchAllQuery = $wpdb->prepare("SELECT * FROM $tbl");
    $results = $wpdb->get_results($fetchAllQuery);

    $girlNames = [];
    $boyNames = [];
    $families = [];
    $fruits = [];
    foreach ($results as $result) {
        if (str_starts_with($result->girl_name, $selectedChar)) $girlNames[] = $result->girl_name;
        if (str_starts_with($result->boy_name, $selectedChar)) $boyNames[] = $result->boy_name;
        if (str_starts_with($result->family, $selectedChar)) $families[] = $result->family;
        if (str_starts_with($result->fruit, $selectedChar)) $fruits[] = $result->fruit;
    }
    $randomGirlName = $girlNames[array_rand($girlNames, 1)];
    $randomBoyName = $boyNames[array_rand($boyNames, 1)];
    $randomFamily = $families[array_rand($families, 1)];
    $randomFruit = $fruits[array_rand($fruits, 1)];

    // if (!$selectedHoroscope) {
    //     wp_send_json(['data' => null], 400);
    //     exit();
    // }

    wp_send_json([
        'data' => $girlNames,
        'girl' => $randomGirlName,
        'boy' => $randomBoyName,
        'family' => $randomFamily,
        'fruit' => $randomFruit,
    ], 200);
    exit();
}
add_action('wp_ajax_fetchOesResults', 'fetchOesResults_callback');
add_action('wp_ajax_nopriv_fetchOesResults', 'fetchOesResults_callback');
