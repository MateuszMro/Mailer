<?php

session_start();

use PHPMailer\src\Exception;
use PHPMailer\src\PHPMailer;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if (isset($_POST['email'])) {

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if (empty($email)) {

        $_SESSION['given_email'] = $_POST['email'];
        header('Location: ../Pages/HomePage.php');

    } else {

        try{
            $mail = new PHPMailer();

            $mail->isSMTP();

            $mail->Host = 'mail.gmx.com';
            $mail->Port = '587';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth = true;

            $mail->Username = 'apsl-dev@gmx.com';
            $mail->Password = 'apslDEV2023';
            $mail->setFrom('no-reply@domena.pl','Zmiana hasła');
            $mail->addReplyTo('abc@gmail.com','Pomoc techniczna');
            $mail->CharSet = 'UTF-8';
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Reset hasła';

            $mail->Body = '
            <html>
            <head>
            </head>
            <body>
            <h2>Kliknij w poniższy link aby ustawić nowe hasło</h2>
            <h3>http://localhost/Password/New-Password.html.php</h3>
            </body>
            </html>
            ';

            $mail->send();

        } catch(Exception $error) {
            echo "Błąd wysyłania maila: {$mail->ErrorInfo}";
        }

    }

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send</title>
</head>
<body>

<div class="container">

    <header>
        <h1>Wysłano e-mail</h1>
    </header>

    <main>
        <article>
            <p class="content">Na podany adres e-mail został wysłany link do zmiany hasła</p>
            <a href="../Pages/BasePage.html.php">Powrót do strony głównej</a>
        </article>
    </main>

</div>

</body>

</html>