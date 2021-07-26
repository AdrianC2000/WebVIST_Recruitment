<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

$info = '';

$url = 'https://api.punkapi.com/v2/beers';
$json = file_get_contents($url);
$jsonBeers = json_decode($json);

$idUser = $_SESSION['id'];
$stmt = $dbh->prepare("SELECT ID_beer FROM favorite_beers WHERE ID_user = :idUser");
$stmt->execute([':idUser' => $idUser]);

$allFavourites = array();
while ($singleFavourite = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id = $singleFavourite['ID_beer'];
    array_push($allFavourites, array('id' => $singleFavourite['ID_beer'], 'name' => $jsonBeers[$id]->name));
}
array_multisort(array_column($allFavourites, 'id'), SORT_ASC, $allFavourites);

$finalMessages = array();
for ($i = 0; $i < count($allFavourites); $i++) {
    $actualMessage = $allFavourites[$i]['id'] . ': ' . $allFavourites[$i]['name'];
    array_push($finalMessages, $actualMessage);
}

$finalMessage = '';
foreach ($finalMessages as $value) {
    $finalMessage = $finalMessage . ' ' . $value . "\r\n";
};

if (isset($_POST['registerSubmit'])) {
//Create an instance; passing `true` enables exceptions
    $userMail = $_POST['email'];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = false;                                   //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'hellotherephp@gmail.com';              //SMTP username
        $mail->Password   = 'QwertyPass123';                        //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('favourite@beers.com', 'Twoje ulubione piwa');
        $mail->addAddress($userMail);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Ulubione piwa';

        $html = '<b> Oto twoje ulubione piwka: </b> <br> ';
        foreach($finalMessages as $key) {
            $html .= $key . '<br>';
        }
        $html .= 'Pozdrawiamy!';

        $mail->Body    = $html;

        $mail->AltBody = 'Oto twoje ulubione piwka';

        $mail->send();
        $info = 'Wiadomość została wysłana!';
    } catch (Exception $e) {
        $info = "Wiadomość nie została wysłana. Mailer Error: {$mail->ErrorInfo}";
    }
}

echo $twig->render('favourites.html.twig', [
    'post' => $_POST,
    'session' => $_SESSION,
    'get' => $_GET,
    'favourites' => $finalMessages,
    'info' => $info]);
