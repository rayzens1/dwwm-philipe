<?php

require('../repository/PaysRepository.php');

class Pays extends PaysRepository 
{
    private $label;
    private $population;
    private $id;

    public function __construct($label, $population)
    {
        $this->label = $label;
        $this->population = $population;
    }

    public function getId()
    {
        return getIdByLabel($this->label);
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getPopulation()
    {
        return $this->population;
    }
}

?>