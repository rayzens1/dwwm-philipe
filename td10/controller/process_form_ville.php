<?php
require_once '../entity/Ville.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $label = isset($_POST['label']) ? trim($_POST['label']) : '';
    $id_pays = isset($_POST['id_pays']) ? trim($_POST['id_pays']) : '';

    if (!empty($label) && !empty($id_pays)) {
        $ville = new Ville($label, $id_pays);
        $ville->insert($ville);
        echo "Ville ajouté avec succès !<br>";
        echo "Ville : " . htmlspecialchars($ville->getLabel()) . "<br>";
        echo "ID Pays : " . htmlspecialchars($ville->getIdPays()) . "<br>";
        echo "<a href='../view/forms_ville.php'>Ajouter une ville</a><br>";
        echo "<a href='../view/forms_pays.php'>Ajouter un pays</a>";
    } else {
        echo "Veuillez remplir tous les champs.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>