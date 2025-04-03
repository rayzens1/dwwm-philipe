<?php
class Vehicle {
    private $position = 0;
    private $brand;

    public function __construct (int $position, string $brand) {
        $this->position = $position;
        $this->brand = $brand;  
    }

    public function __toString() : string {
        return "Vehicle: ".$this->brand." is now at position: ".$this->position;
    }

    public function display() : string {
        print_r("Vehicle: ".$this->brand." is now at position: ".$this->position);
    }

    public function move () : string {
        for($i = 0; $i < 10; $i++) {
            private $travelDistance = rand(-100, 100);
            $this->position += $travelDistance;
            $this->distance += $travelDistance;
        }
        return($this->brand." move from: ".$travelDistance."...");
    }
    
}

?>