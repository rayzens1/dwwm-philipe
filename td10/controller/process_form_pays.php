<?php
require_once '../entity/Pays.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $label = isset($_POST['label']) ? trim($_POST['label']) : '';
    $population = isset($_POST['population']) ? trim($_POST['population']) : '';

    if (!empty($label) && !empty($population)) {
        $pays = new Pays($label, $population);
        $pays->insert($pays);
        echo "Pays ajouté avec succès !<br>";
        echo "Pays : " . htmlspecialchars($pays->getLabel()) . "<br>";
        echo "Population : " . htmlspecialchars($pays->getPopulation()) . "<br>";
        echo "<a href='../view/forms_ville.php'>Ajouter une ville</a><br>";
        echo "<a href='../view/forms_pays.php'>Ajouter un pays</a>";
    } else {
        echo "Veuillez remplir tous les champs.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>