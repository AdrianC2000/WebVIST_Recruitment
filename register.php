<?php

echo $twig->render('register.html', [
    'post' => $_POST,
    'session' => $_SESSION,
    'get' => $_GET]);
