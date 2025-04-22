<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Ville</title>
</head>
<body>
    <form action="../controller/process_form_ville.php" method="post">
        <label for="label">Nom de la ville :</label>
        <input type="text" id="label" name="label" required>
        <br><br>
        <label for="id_pays">Pays :</label>
        <select id="id_pays" name="id_pays" required>
            <option value="">-- Sélectionnez un pays --</option>
                <?php require_once '../repository/PaysRepository.php';
                $paysRepository = new PaysRepository();
                $pays = $paysRepository->findAll();
                
                foreach ($pays as $paysItem): ?>
                    <option value="<?= htmlspecialchars($paysItem['id']) ?>">
                        <?= htmlspecialchars($paysItem['label']) ?>
                    </option>
                <?php endforeach; ?>
        </select>
        <br><br>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>