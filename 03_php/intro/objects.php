<?php

class Person {
    var $first_name;
    var $last_name;

    public function __construct($first_name, $last_name) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    public function __toString() {
        return $this->last_name . ", " . $this->first_name;
    }
}

$person = new Person("John", "Doe");
echo($person);

class Student extends Person {
    var $major;

    public function setMajor($major) {
        $this->major = $major;
    }

    public function __toString()
    {
        return parent::__toString() . ". Studies: " . $this->major;
    }
}
echo("<br>");
$student = new Student("Jane", "Doe");
$student->setMajor("CS");
echo($student);