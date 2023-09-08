<?php
require_once "./class/Student.php";
require_once "./class/Grade.php";
require_once "./class/Room.php";
require_once "./class/Floor.php";

$student = new Student(1, 1, "email@email.com", "Jérémy Nowak", new DateTime("1990-01-18"), "male");
$student2 = new Student();
//$student2->setEmail("test@change.com");
//var_dump($student, $student2);

$grade = new Grade(1, 8, "Bachelor 1", new DateTime("2023-01-09"));
$grade2 = new Grade();
//var_dump($grade, $grade2);

$room = new Room(1, 1, "RDC Food and Drinks", 90);
$room2 = new Room();
//var_dump($room, $room2);

$floor = new Floor(1, "Rez-de-chaussée", 0);
$floor2 = new Floor();
//var_dump($floor, $floor2);
