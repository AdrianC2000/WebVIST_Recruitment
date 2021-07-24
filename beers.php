<?php

$url = 'https://api.punkapi.com/v2/beers';
$jsonBeers = json_decode(file_get_contents($url));
$count = count($jsonBeers);
print $count;

echo $twig->render('beers.html.twig', [
    'post' => $_POST,
    'session' => $_SESSION,
    'get' => $_GET,
    'count' => $count,
    'beers' => $jsonBeers]);
