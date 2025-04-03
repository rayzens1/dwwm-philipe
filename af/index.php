<?php
// index.php : Point d'entrée de l'application

require_once 'controllers/FormController.php';

$controller = new FormController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->handlePost();
} else {
    $controller->showForm();
}
?>