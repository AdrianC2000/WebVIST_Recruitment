<?php

$url = 'https://api.punkapi.com/v2/beers';
$json = file_get_contents($url);
$jsonBeers = json_decode($json);
$beersCount = count($jsonBeers);
$subpagesCounter = intval($beersCount / 5);

$jsonBeersByPage = array_chunk($jsonBeers, $subpagesCounter);
/*var_dump($jsonBeersByPage[0]);*/

$id = 1;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

echo $twig->render('beers.html.twig', [
    'post' => $_POST,
    'session' => $_SESSION,
    'get' => $_GET,
    'json' => $json,
    'count' => $beersCount,
    'subpagesCounter' => $subpagesCounter,
    'id' => $id,
    'beers' => $jsonBeersByPage]);
