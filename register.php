<?php

$info = '';

if (isset($_POST['registerSubmit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $usernameTaken = false;
    $emailTaken = false;
    try {
        $stmt = $dbh->prepare("INSERT INTO users (id, username, email, password)
                               VALUES (null, :username, :email, :password)");
        $stmt->execute([':username' => $username, ':email' => $email, ':password' => $password_hash]);
        $info = 'Poprawnie zarejestrowano!';
    } catch (PDOException $e) {
        try {
            $stmtUsername = $dbh->prepare("SELECT * FROM users WHERE username = :username");
            $stmtUsername->execute([':username' => $_POST['username']]);
            $userUsername = $stmtUsername->fetch(PDO::FETCH_ASSOC);
            if($userUsername != null)
                $usernameTaken = true;
        }
        catch (PDOException $e) {}
        try {
            $stmtEmail = $dbh->prepare("SELECT * FROM users WHERE email = :email");
            $stmtEmail->execute([':email' => $_POST['email']]);
            $userMail = $stmtEmail->fetch(PDO::FETCH_ASSOC);
            if($userMail != null)
                $emailTaken = true;
        }
        catch (PDOException $e) {}
        if($usernameTaken && $emailTaken)
            $info = 'Email i login są już zajęte.';
        else if($usernameTaken)
            $info = 'Login zajęty.';
        else if($emailTaken)
            $info = 'Email zajęty.';
    }
}

echo $twig->render('register.html.twig', [
    'post' => $_POST,
    'session' => $_SESSION,
    'get' => $_GET,
    'info' => $info]);
