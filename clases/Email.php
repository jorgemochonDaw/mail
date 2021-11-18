<?php

namespace App;
use PHPMailer\PHPMailer\PHPMailer;

require './../vendor/autoload.php';

class Email
{
    function enviarEmail()
    {
        //Crear instancia de phpmailer
        $mail = new PHPMailer();

        //configuar smpt
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = 'a237b63de676fa';
        $mail->Password =  '078aacae220e9f';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 2525;

        //configurar el contenido del email
        $mail->setFrom('bernalmochonjorge@gmail.com');
        $mail->addAddress('jorgr@gmail.com', 'Jorge Mochon Bernal');
        $mail->Subject = 'Hola guapo';

        //habilitat html
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        //contenido
        $contenido = '<html> <p> Hola Jorge</p></html>';
        $mail->Body = $contenido;

        if ($mail->send()) {
            return 'Enviado exitosamente';
        } else {
            return 'Error';
        }
    }
}

//Load composer's autoloader


if (isset($_POST["enviarEmail"])) {
    $email1 = new Email();
  echo  $email1->enviarEmail();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>

<body>
    <header>
        <h1>Enviar email</h1>
    </header>
    <main>
        <section>
            <form action="Email.php" method="post">
                <input type="submit" name="enviarEmail">
            </form>
        </section>
    </main>
</body>

</html>