<?php
require __DIR__ . '/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('html');
$twig = new \Twig\Environment($loader);

include("config.inc.php");
if (isset($config) && is_array($config)) {
    try {
        $dbh = new PDO('mysql:host=' . $config['db_host'] . ';dbname=' . $config['db_name'] . ';charset=utf8mb4', $config['db_user'], $config['db_password']);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        print "Gituwa, połączono z bazą";
    } catch (PDOException $e) {
        print "Nie mozna polaczyc sie z baza danych: " . $e->getMessage();
        exit();
    }

} else {
    exit("Nie znaleziono konfiguracji bazy danych.");
}

$allowed_pages = ['register', 'login'];

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


echo $twig->render('index.html.twig', ['the' => 'variables', 'go' => 'here']);