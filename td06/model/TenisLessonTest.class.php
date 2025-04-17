<?php

require_once 'TenisLesson.class.php';

class TenisLessonTest
{
    private $age;
    private $numberOfLessons;
    private $cost;

    public function __construct($age, $numberOfLessons) {
        $this->age = $age;
        $this->numberOfLessons = $numberOfLessons;

        $tenisLesson = new TenisLesson($age, $numberOfLessons);
        $this->cost = $tenisLesson->getCost();
    }

    public function getAge() {
        return $this->age;
    }

    public function getNumberOfLessons() {
        return $this->numberOfLessons;
    }

    public function getCost() {
        return $this->cost;
    }
}

$test = new TenisLessonTest(12, 5);

echo "[Age: " . $test->getAge() . " LessonsNb: " . $test->getNumberOfLessons() . " -> Cost: " . $test->getCost() . "]<br>";

$test = new TenisLessonTest(8, 2);

echo "[Age: " . $test->getAge() . " LessonsNb: " . $test->getNumberOfLessons() . " -> Cost: " . $test->getCost() . "]<br>";

$test = new TenisLessonTest(8, 4);

echo "[Age: " . $test->getAge() . " LessonsNb: " . $test->getNumberOfLessons() . " -> Cost: " . $test->getCost() . "]<br>";

$test = new TenisLessonTest(22, 10);

echo "[Age: " . $test->getAge() . " LessonsNb: " . $test->getNumberOfLessons() . " -> Cost: " . $test->getCost() . "]<br>";

$test = new TenisLessonTest(17, 3);

echo "[Age: " . $test->getAge() . " LessonsNb: " . $test->getNumberOfLessons() . " -> Cost: " . $test->getCost() . "]<br>";

$test = new TenisLessonTest(50, 4);

echo "[Age: " . $test->getAge() . " LessonsNb: " . $test->getNumberOfLessons() . " -> Cost: " . $test->getCost() . "]<br>";

$test = new TenisLessonTest(106, 4);

echo "[Age: " . $test->getAge() . " LessonsNb: " . $test->getNumberOfLessons() . " -> Cost: " . $test->getCost() . "]<br>";

$test = new TenisLessonTest(5, 4);

echo "[Age: " . $test->getAge() . " LessonsNb: " . $test->getNumberOfLessons() . " -> Cost: " . $test->getCost() . "]<br>";

?>