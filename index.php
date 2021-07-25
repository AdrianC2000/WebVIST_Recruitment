<?php
require __DIR__ . '/vendor/autoload.php';
session_start();

$loader = new \Twig\Loader\FilesystemLoader('html');
$twig = new \Twig\Environment($loader);

include("config.inc.php");
if (isset($config) && is_array($config)) {
    try {
        $dbh = new PDO('mysql:host=' . $config['db_host'] . ';dbname=' . $config['db_name'] . ';charset=utf8mb4', $config['db_user'], $config['db_password']);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print "Nie mozna polaczyc sie z baza danych: " . $e->getMessage();
        exit();
    }

} else {
    exit("Nie znaleziono konfiguracji bazy danych.");
}

$allowed_pages = ['register', 'login', 'beers'];

if( isset($_GET['page']) && in_array($_GET['page'], $allowed_pages) ) {
    $page = $_GET['page'];
    if (file_exists($page . '.php')) {
        include($page . '.php');
    } else {
        print 'Dany plik nie istnieje!';
    }
} else {
    include('login.php');
}

if (isset($_POST['logoutSubmit'])) {
    unset($_SESSION['id']);
    unset($_SESSION['email']);
    unset($_SESSION['username']);
}

echo $twig->render('index.html.twig', [
    'post' => $_POST,
    'session' => $_SESSION,
    'get' => $_GET]);

