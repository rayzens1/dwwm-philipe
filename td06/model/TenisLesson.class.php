    <?php

    class TenisLesson
    {
        private $numberOfLessons;
        private $hours;
        private $studentAge;
        private $cost;
        private $costPerHour;

        public function __construct($studentAge, $numberOfLessons) {
            $this->numberOfLessons = $numberOfLessons;
            $this->hours = $numberOfLessons * 1;
            $this->studentAge = $studentAge;
            $this->cost = $this->calculateCost();
            $this->costPerHour = $this->calculateCostPerHour();

            if($studentAge > 100) {
                trigger_error("Warning: Student age ".$studentAge." cannot exceed 100.", E_USER_WARNING);
            } elseif($studentAge < 7) {
                trigger_error("Warning: Student age ".$studentAge." cannot be less than 7.", E_USER_WARNING);
            }
        }

        public function getHours() {
            return $this->hours;
        }

        public function setHours($hours) {
            $this->hours = $hours;
        }

        public function getCost() {
            return $this->cost;
        }

        public function getStudentAge() {
            return $this->studentAge;
        }

        public function calculateCost() {
            if ($this->studentAge < 16) {
                $this->cost = $this->hours * 33;
            } else {
                $this->cost = $this->hours * 36;
            }

            if($this->hours > 5) {
                $this->cost = $this->cost * 0.85;
            } elseif($this->hours > 3) {
                $this->cost = $this->cost * 0.9;
            }

            return $this->cost;
        }

        public function calculateCostPerHour() {
            if ($this->studentAge < 16) {
                $this->costPerHour = 33;
            } else {
                $this->costPerHour = 36;
            }

            if($this->hours <= 5) {
                $this->costPerHour = $this->costPerHour * 0.85;
            } elseif($this->hours <= 3) {
                $this->costPerHour = $this->costPerHour * 0.9;
            }
            return $this->costPerHour;
        }
        
    }

    ?>