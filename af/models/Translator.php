<?php
// models/Translator.php

require_once 'data/Dictionary.php';

class Translator {
    protected $dictionary;

    public function __construct() {
        // Chargement du dictionnaire via la couche d'accès aux données
        $this->dictionary = getDictionary();
    }

    // Traduction mot à mot en utilisant le dictionnaire
    public function translate($text) {
        $words = explode(' ', $text);
        $translatedWords = [];
        foreach ($words as $word) {
            $lowerWord = strtolower($word);
            // Si le mot est présent dans le dictionnaire, on le traduit
            if (isset($this->dictionary[$lowerWord])) {
                $translatedWords[] = $this->dictionary[$lowerWord];
            } else {
                // Sinon, on conserve le mot original
                $translatedWords[] = $word;
            }
        }
        return implode(' ', $translatedWords);
    }
}
?>
