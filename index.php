<?php

require __DIR__ . '/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('html');
$twig = new \Twig\Environment($loader);

$allowed_pages = ['register'];

if( isset($_GET['page']) && in_array($_GET['page'], $allowed_pages) ) {
    $page = $_GET['page'];
    if (file_exists($page . '.php')) {
        include($page . '.php');
    } else {
        print 'Dany plik nie istnieje!';
    }
}

echo $twig->render('index.html.twig', ['the' => 'variables', 'go' => 'here']);