<?php

// Creem l'array de errors
$error_messages = array(
    'usuari' => '',
    'password' => '',
);

try {
    require_once './comu/connexio.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuari = $_POST['usuari'];
        $contrasenya = $_POST['password'];

        if (empty($usuari)) {
            $error_messages['usuari'] = "Usuari no pot estar buit" . "<br>";
        }

        if (empty($contrasenya)) {
            $error_messages['password'] = "La contrasenya no pot estar buida" . "<br>";
        }

        if (!filter_var($usuari, FILTER_VALIDATE_EMAIL) && !empty($usuari)) {
            $error_messages['usuari'] = "Introdueix un format d'usuari valid" . "<br>";
        }

        if (empty(array_filter($error_messages))) {
            // Obtenim la id del usuari i contrasenya introduits al formulari
            $select = $connexio->prepare("SELECT id FROM usuaris WHERE usuari = :usuari AND password = :password");
            $select->execute(array( ':usuari' => $usuari, ':password' => hash('sha256',$contrasenya)));
            $idUsuari = $select->fetch(PDO::FETCH_COLUMN,0);

            // Redirigim a la pagina que pertoca dependent del usuari introduit
            if (!empty($idUsuari)) {
                if ($idUsuari == 1) {
                    header("Location: /admin");
                    exit;
                } elseif ($idUsuari == 2) {
                    header("Location: /conserge");
                    exit;
                }
            } else {
                $error_messages['usuari'] = "Usuari o contrasenya incorrectes" . "<br>";
            }
        }

        // Pasem la lista de errors per GET
        $error_messages_encoded = urlencode(json_encode($error_messages));
        header("Location: login.php?errors=$error_messages_encoded");
    }
} catch(PDOException $e) {
    echo "Error en el select: " . $e->getMessage();
}

