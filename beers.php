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

if (isset($_POST['idBeerAdd'])) {
    $idBeer = $_POST['idBeerAdd'] - 1;
    $idUser = $_SESSION['id'];
    $stmt = $dbh->prepare("INSERT INTO favorite_beers (ID_user, ID_beer)
                           VALUES (:idUser, :idBeer)");
    $stmt->execute([':idUser' => $idUser, ':idBeer' => $idBeer]);
}

if (isset($_POST['idBeerRemove'])) {
    $idBeer = $_POST['idBeerRemove'] - 1;
    $idUser = $_SESSION['id'];
    $stmt = $dbh->prepare("DELETE FROM favorite_beers WHERE ID_user = :idUser and ID_beer = :idBeer");
    $stmt->execute([':idUser' => $idUser, ':idBeer' => $idBeer]);
}

if (isset($_POST['getFavourites'])) {
    $idPage = $_POST['getFavourites'];
    $idMax = $idPage * 5 - 1;
    $idMin = $idMax - 4;
    $idUser = $_SESSION['id'];
/*    echo($idUser);*/
    $stmt = $dbh->prepare("SELECT ID_beer FROM favorite_beers WHERE ID_user = :idUser AND ID_beer BETWEEN :idMin AND :idMax");
    $stmt->execute([':idUser' => $idUser, ':idMax' => $idMax, ':idMin' => $idMin]);
    $allFavouritesForThisPage = array();
    while ($singleFavouriteForThisPage = $stmt->fetch(PDO::FETCH_ASSOC)){
        array_push($allFavouritesForThisPage, $singleFavouriteForThisPage['ID_beer']);
    }
    echo JSON_encode($allFavouritesForThisPage);
    exit;
}

if (isset($_POST['isLoggedIn'])) {
    if (isset($_SESSION['id'])){
        echo('UserLoggedIn');
    }
    else {
        echo('UserNotLoggedIn');
    }
    exit;
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
