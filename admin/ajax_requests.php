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
    $foods = [];
    $colors = [];
    $flowers = [];
    $items = [];
    $cities = [];
    $countries = [];
    $organs = [];
    $animals = [];
    $cars = [];
    $dresses = [];
    $celebrities = [];
    $jobs = [];
    $sports = [];
    $movies = [];
    $animes = [];
    $books = [];
    foreach ($results as $result) {
        if (str_starts_with($result->girl_name, $selectedChar)) $girlNames[] = $result->girl_name;
        if (str_starts_with($result->boy_name, $selectedChar)) $boyNames[] = $result->boy_name;
        if (str_starts_with($result->family, $selectedChar)) $families[] = $result->family;
        if (str_starts_with($result->fruit, $selectedChar)) $fruits[] = $result->fruit;
        if (str_starts_with($result->food, $selectedChar)) $foods[] = $result->food;
        if (str_starts_with($result->color, $selectedChar)) $colors[] = $result->color;
        if (str_starts_with($result->flower, $selectedChar)) $flowers[] = $result->flower;
        if (str_starts_with($result->items, $selectedChar)) $items[] = $result->items;
        if (str_starts_with($result->city, $selectedChar)) $cities[] = $result->city;
        if (str_starts_with($result->country, $selectedChar)) $countries[] = $result->country;
        if (str_starts_with($result->organ, $selectedChar)) $organs[] = $result->organ;
        if (str_starts_with($result->animal, $selectedChar)) $animals[] = $result->animal;
        if (str_starts_with($result->car, $selectedChar)) $cars[] = $result->car;
        if (str_starts_with($result->dress, $selectedChar)) $dresses[] = $result->dress;
        if (str_starts_with($result->celebrities, $selectedChar)) $celebrities[] = $result->celebrities;
        if (str_starts_with($result->job, $selectedChar)) $jobs[] = $result->job;
        if (str_starts_with($result->sport, $selectedChar)) $sports[] = $result->sport;
        if (str_starts_with($result->movie, $selectedChar)) $movies[] = $result->movie;
        if (str_starts_with($result->anime, $selectedChar)) $animes[] = $result->anime;
        if (str_starts_with($result->book, $selectedChar)) $books[] = $result->book;
    }
    $randomGirlName = $girlNames[array_rand($girlNames, 1)];
    $randomBoyName = $boyNames[array_rand($boyNames, 1)];
    $randomFamily = $families[array_rand($families, 1)];
    $randomFruit = $fruits[array_rand($fruits, 1)];
    $randomFood = $foods[array_rand($foods, 1)];
    $randomColor = $colors[array_rand($colors, 1)];
    $randomFlower = $flowers[array_rand($flowers, 1)];
    $randomItem = $items[array_rand($items, 1)];
    $randomCity = $cities[array_rand($cities, 1)];
    $randomCountry = $countries[array_rand($countries, 1)];
    $randomOrgan = $organs[array_rand($organs, 1)];
    $randomAnimal = $animals[array_rand($animals, 1)];
    $randomCar = $cars[array_rand($cars, 1)];
    $randomDress = $dresses[array_rand($dresses, 1)];
    $randomCelebrity = $celebrities[array_rand($celebrities, 1)];
    $randomJob = $jobs[array_rand($jobs, 1)];
    $randomSport = $sports[array_rand($sports, 1)];
    $randomMovie = $movies[array_rand($movies, 1)];
    $randomAnime = $animes[array_rand($animes, 1)];
    $randomBook = $books[array_rand($books, 1)];

    $data = array(
        'girl_name' => $randomGirlName,
        'boy_name' => $randomBoyName,
        'family' => $randomFamily,
        'fruit' => $randomFruit,
        'food' => $randomFood,
        'color' => $randomColor,
        'flower' => $randomFlower,
        'item' => $randomItem,
        'city' => $randomCity,
        'country' => $randomCountry,
        'organ' => $randomOrgan,
        'animal' => $randomAnimal,
        'car' => $randomCar,
        'dress' => $randomDress,
        'celebrity' => $randomCelebrity,
        'job' => $randomJob,
        'sport' => $randomSport,
        'movie' => $randomMovie,
        'anime' => $randomAnime,
        'book' => $randomBook,
    );

    wp_send_json([
        'data' => $data
    ], 200);
    exit();
}
add_action('wp_ajax_fetchOesResults', 'fetchOesResults_callback');
add_action('wp_ajax_nopriv_fetchOesResults', 'fetchOesResults_callback');
