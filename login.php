<?php

$info = '';

if (isset($_POST['loginSubmit'])){
    $stmt = $dbh->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute([':username' => $_POST['login']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        if (password_verify($_POST['password'], $user['password'])) {
            $_SESSION['id'] = $user['id'] - 1;
            $_SESSION['email'] = $user['email'];
            $_SESSION['username'] = $user['username'];
            $info = 'Poprawnie zalogowano!';
        } else {
            $info = 'Niepoprawne hasło!';
        }
    } else {
        $info = 'Konto o podanym loginie nie istnieje.';
    }
}

echo $twig->render('login.html.twig', [
    'post' => $_POST,
    'session' => $_SESSION,
    'get' => $_GET,
    'info' => $info]);
