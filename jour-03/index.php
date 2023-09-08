<?php
require "./class/Student.php";

$student = new Student();
$student2 = new Student(1, 1, "email@email.com", "Jérémy Nowak", new DateTime("1990-01-18"), "male");
var_dump($student, $student2);