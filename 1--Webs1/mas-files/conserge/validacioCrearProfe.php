<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../extensions/PHPMailer/PHPMailer.php';
require '../extensions/PHPMailer/Exception.php';
require '../extensions/PHPMailer/SMTP.php';

$mail = new PHPMailer(true); // Crear l'objecte de PHPMailer

try {
    require_once '../comu/connexio.php';

    // Comprovem que tots el camps segueixin les expressions regulars
    if (preg_match("/^[A-Z][a-záéíóúñü]{0,39}$/",$_POST['nom']) &&
        preg_match("/^[A-Z][a-záéíóúñü]{0,39}$/",$_POST['cog1']) &&
        preg_match("/^[A-Z][a-záéíóúñü]{0,39}$/",$_POST['cog2']) &&
        preg_match("/^[\w.-]+@([\w-]+\.)+[\w-]+$/",$_POST['email']) &&
        preg_match("/^[0-9]{9}$/",$_POST['tel'])) {

        // Insertem el profesor a la taula pertinent
        $insert = $connexio->prepare("INSERT INTO professors (nom,cognom1,cognom2,email,telefon) VALUES (:nom,:cog1,:cog2,:mail,:tel)");
        $insert->execute(array(
            'nom' => $_POST['nom'],
            'cog1' => $_POST['cog1'],
            'cog2' => $_POST['cog2'],
            'mail' => $_POST['email'],
            'tel' => $_POST['tel'],
        ));
    } else {
        throw new Exception("Datos erroneos");
    }

    // Obtenim el codi de validacio autogenerat
    $select = $connexio->prepare("SELECT codi_validacio FROM professors WHERE email = :email");
    $select->execute(array(':email' => $_POST['email']));
    $codiValidacio = $select->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    header("Location: /errorRepetit");
    exit;
} catch (Exception $e) {
    header("Location: /errorDades");
    exit;
} finally {
    // Si hi ha codi de validacio, envia el correu al profe
    if (!empty($codiValidacio)) {
        $mail->isSMTP();
        $mail->Host         = 'smtp.gmail.com';
        $mail->SMTPAuth     = true;
        $mail->Username     = 'asix2-m14-mas@sapalomera.cat';
        $mail->Password     = ",t-nXRu2h~}MMc6";
        $mail->Port         = 587;
        $mail->setFrom('asix2-m14-mas@sapalomera.cat','MAS');
        $mail->addAddress($_POST['email']);
        $mail->Subject      = 'Process d\'alta';
        $mail->msgHTML( "<p>Bones " . $_POST['nom'] . ' ' . $_POST['cog1'] . " " . $_POST['cog2'] . ". Aquest és un correu generat automaticament per continuar amb el procès d'alta.</p>
                        <p>Introdueix el codi de validacio (" . $codiValidacio['codi_validacio'] . ") al següent <a href='https://maspr.sapalomera.cat/profe'>formulari</a></p>");
        $mail->send();
    }
    header("Location: /conserge/dadesCorrectes");
}
