<?php

echo $twig->render('register.html.twig', [
    'post' => $_POST,
    'session' => $_SESSION,
    'get' => $_GET]);
