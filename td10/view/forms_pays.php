<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Pays</title>
</head>
<body>
    <form action="../controller/process_form_pays.php" method="post">
        <label for="label">Nom du pays :</label>
        <input type="text" id="label" name="label" required>
        <br><br>
        <label for="population">Population du pays :</label>
        <input type="number" id="population" name="population" required>
        <br><br>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>