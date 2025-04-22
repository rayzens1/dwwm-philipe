<?php

abstract class Artiste {
    protected $oeuvre;
    protected $nationalite;
    protected $nom;

    public function __construct($nom, $oeuvre, $nationalite) {
        $this->nom = $nom;
        $this->oeuvre = $oeuvre;
        $this->nationalite = $nationalite;
    }
    
    abstract public function creerOeuvre();
    public function intro() : string {
        return "{$this->nom}, {$this->nationalite} a créé: {$this->oeuvre} ";
    }
}

class Peintre extends Artiste {

    protected $style;
    
    public function __construct($nom, $oeuvre, $nationalite, $style) {
        parent::__construct($nom, $oeuvre, $nationalite);
        $this->style = $style;
    }

    public function creerOeuvre() {
        return "($this->style)";
    }
}

class Musicien extends Artiste {

    protected $instrument;

    public function __construct($nom, $oeuvre, $nationalite, $instrument) {
        parent::__construct($nom, $oeuvre, $nationalite);
        $this->instrument = $instrument;
    }

    public function creerOeuvre() {
        return "($this->instrument)";
    }
    
}



// Affichage de la liste des artistes
$artistes = [
    $VanGogh = new Peintre("VanGogh", "la nuit étoilée", "Hollande", "impressionnisme"),
    $Chopin = new Musicien("Brel", "Nocturne en Do majeur", "Pologne", "piano"),
];

foreach ($artistes as $artiste) {
    echo $artiste->intro() . $artiste->creerOeuvre() . "<br><br>";
}

?>