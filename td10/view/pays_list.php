<?php
// Inclure les fichiers nécessaires
require_once '../repository/PaysRepository.php';
require_once '../repository/VilleRepository.php';

// Instancier les repositories
$paysRepository = new PaysRepository();
$villeRepository = new VilleRepository();

// Récupérer tous les pays
$paysList = $paysRepository->findAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Pays</title>
</head>
<body>
    <h1>Liste des Pays</h1>
    <ul>
        <?php foreach ($paysList as $pays): 

            // Récupérer les villes associées à chaque pays
            $villes = $villeRepository->findByIdPays($pays['id']); ?>
            
            <li>
                <strong><?php echo $pays['label']; ?></strong>
                <ul>
                    <?php foreach ($villes as $ville): ?>
                        <li>Ville: <?php echo $ville['label']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </li>

        <?php endforeach; ?>
    </ul>
</body>
</html>