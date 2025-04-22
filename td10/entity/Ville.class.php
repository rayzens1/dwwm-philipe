<?php

require('../repository/VilleRepository.php');

class Ville extends VilleRepository 
{
    private $label;
    private $id;
    private $id_pays;

    public function __construct($label, $id_pays)
    {
        $this->label = $label;
        $this->id_pays = $id_pays;
    }

    public function getId()
    {
        return getIdByLabel($this->label);
    }

    public function getIdPays()
    {
        return $this->id_pays;
    }

    public function getLabel()
    {
        return $this->label;
    }

}

?>