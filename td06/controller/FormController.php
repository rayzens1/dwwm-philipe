<?php

// FormController.php : Contrôleur pour gérer le formulaire de réservation de leçons de tennis
require_once 'model/TenisLesson.class.php';

class FormController {
    
    public function showForm() {
        $fields = [
            [
                'label'       => 'Age :',
                'name'        => 'age',
                'type'        => 'number',
                'required'    => true
            ],
            [
                'label'       => 'Number of lessons :',
                'name'        => 'numberoflessons',
                'type'        => 'number',
                'required'    => true
            ]
        ];

        // Définition de l'action et de la méthode du formulaire
        $action = 'index.php';
        $method = 'post';

        // Inclusion du header, de la vue du formulaire
        require 'view/form.php';
    }

    public function handlePost() {
        $age  = isset($_POST['age']) ? trim($_POST['age']) : '';
        $numberoflessons = isset($_POST['numberoflessons']) ? trim($_POST['numberoflessons']) : '';

        // Traitement avec le modèle
        $tenisLesson = new TenisLesson($age, $numberoflessons);
        $cost = $tenisLesson->getCost();
        $costPerHour = $tenisLesson->calculateCostPerHour();

        // Affichage du résultat (les vues utilisent $result)
        require 'view/result.php';
    }
}