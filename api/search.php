<?php
// Get the query from URL
$query = isset($_GET['query']) ? strtolower($_GET['query']) : '';

// Load your data files
$movies = json_decode(file_get_contents('path_to_movies.json'), true);
$series = json_decode(file_get_contents('path_to_series.json'), true);

// Combine and filter results
$results = array_filter(array_merge($movies, $series), function($item) use ($query) {
    return strpos(strtolower($item['title']), $query) !== false;
});

// Output the results as JSON
header('Content-Type: application/json');
echo json_encode(array_values($results));
