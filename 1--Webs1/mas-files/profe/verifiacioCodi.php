<?php
try {
    require_once '../comu/connexio.php';

    // Obtenim el codi de validacio i el dni del profe
    $select = $connexio->prepare("SELECT codi_validacio,dni FROM professors WHERE codi_validacio = :codiValidacio");
    $select->execute(array(':codiValidacio' => $_POST['codi_validacio']));
    $results = $select->fetch(PDO::FETCH_ASSOC);
    $codiValidacio = $results['codi_validacio'];

    // Depenent dels resultats redirigeix a la pagina adient
    if (empty($results)) {
        header("Location: /errorCodi");
    } elseif (!empty($results['dni'])) {
        header("Location: /errorRegistrat");
    } else {
        header("Location: /profe/dadesAcademiques.php?codi_validacio=$codiValidacio");
    }
    exit;
} catch(PDOException $e) {
    echo "Error en el select: " . $e->getMessage();
}
