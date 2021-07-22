<?php

echo $twig->render('login.html.twig', [
    'post' => $_POST,
    'session' => $_SESSION,
    'get' => $_GET]);
