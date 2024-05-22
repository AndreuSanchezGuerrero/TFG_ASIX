<?php
try {
    // Iniciem la connexio a la BD
    $connexio = new PDO("mysql:host=localhost;dbname=webs", "mas", 'F#GHjfb3%c3B&39i$PMJ3');
}
catch (PDOException $e){
    echo $e->getMessage();
    exit;
}
finally {
    $DBH = null;
}