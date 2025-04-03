<?php
// controllers/FormController.php

require_once 'models/Translator.php';

class FormController {

    // Affiche le formulaire avec les champs dynamiques
    public function showForm() {
        // Définition du tableau de champs pour le formulaire
        $fields = [
            [
                'label'       => 'Mot :',
                'name'        => 'word',
                'type'        => 'text',
                'required'    => true
            ],
            [
                'label'       => 'Choisissez une option :',
                'name'        => 'direction',
                'type'        => 'select',
                'options'     => [
                    'entofr' => 'Anglais vers Français',
                    'frtoen' => 'Français vers Anglais'
                ],
                'required'    => true
            ]
        ];

        // Définition de l'action et de la méthode du formulaire
        $action = 'index.php';
        $method = 'post';

        // Inclusion du header, de la vue du formulaire
        require 'views/header.php';
        require 'views/form.php';
    }

    // Traitement de la soumission du formulaire
    public function handlePost() {
        $word  = isset($_POST['word']) ? trim($_POST['word']) : '';
        $direction = isset($_POST['direction']) ? trim($_POST['direction']) : '';

        if (empty($word)) {
            $error = "Le champ texte ne peut pas être vide.";
            // Redéfinition des champs pour réafficher le formulaire avec une erreur
            $fields = [
                [
                    'label'       => 'Mot :',
                    'name'        => 'word',
                    'type'        => 'text',
                    'required'    => true
                ],
                [
                    'label'       => 'Choisissez une option :',
                    'name'        => 'direction',
                    'type'        => 'select',
                    'options'     => [
                        'entofr' => 'Anglais vers Français',
                        'frtoen' => 'Français vers Anglais'
                    ],
                    'required'    => true
                ]
            ];

            $action = 'index.php';
            $method = 'post';

            require 'views/header.php';
            require 'views/form.php';
            return;
        }

        // Traitement avec le modèle
        $translator = new Translator();
        $result = $translator->translate($word);

        // Affichage du résultat (les vues utilisent $result et $choix)
        require 'views/header.php';
        require 'views/result.php';
    }
}
?>
