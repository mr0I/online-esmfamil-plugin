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

    global $wpdb;
    $tbl = $wpdb->prefix . EFPL_ESMFAMIL_TBL;
    $fetchAllQuery = $wpdb->prepare("SELECT * FROM $tbl");
    $results = $wpdb->get_results($fetchAllQuery);
    // foreach ($horoscopesIds as $id) {
    //     $horoscopesIdsArray[] = intval($id->id);
    // }
    // $randomId = array_rand($horoscopesIdsArray, 1);
    // $getOneHoroscopeQuery = $wpdb->prepare("SELECT * FROM $tbl WHERE id=%d", array($randomId));
    // $selectedHoroscope = $wpdb->get_row($getOneHoroscopeQuery);

    // if (!$selectedHoroscope) {
    //     wp_send_json(['data' => null], 400);
    //     exit();
    // }


    wp_send_json([
        'data' => $results
    ], 200);
    exit();
}
add_action('wp_ajax_fetchOesResults', 'fetchOesResults_callback');
add_action('wp_ajax_nopriv_fetchOesResults', 'fetchOesResults_callback');
