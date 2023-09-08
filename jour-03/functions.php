<?php

function getConnect():PDO {
    //connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $dbPassword = "";
    $dbname = "lp_official";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;

}

function findOneStudent(int $id) : Student {
    require_once 'class/Student.php';
    //connexion à la base de données
    $conn = getConnect();

    // requête SQL
    $sql = "SELECT * FROM `student` where id = :id";
    $select = $conn->prepare($sql);
    $select->execute([':id' => $id]);
    $result = $select->fetch(PDO::FETCH_ASSOC);

    return(new Student($result["id"], $result["grade_id"], $result["email"], $result["fullname"],
        new DateTime($result["birthdate"]), $result["gender"]));
}


function findOneGrade(int $id): Grade {
    require_once 'class/Grade.php';
    //connexion à la base de données
    $conn = getConnect();

    // requête SQL
    $sql = "SELECT * FROM `grade` where id = :id";
    $select = $conn->prepare($sql);
    $select->execute([':id' => $id]);
    $result = $select->fetch(PDO::FETCH_ASSOC);

    return(new Grade($result["id"], $result["room_id"], $result["name"], new DateTime($result["year"])));
}

function findOneRoom(int $id): Room {
    require_once 'class/Room.php';
    //connexion à la base de données
    $conn = getConnect();

    // requête SQL
    $sql = "SELECT * FROM `room` where id = :id";
    $select = $conn->prepare($sql);
    $select->execute([':id' => $id]);
    $result = $select->fetch(PDO::FETCH_ASSOC);

    return(new Room($result["id"], $result["floor_id"], $result["name"], $result["capacity"]));
}

function findOneFloor(int $id): Floor {
    require_once 'class/Floor.php';
    //connexion à la base de données
    $conn = getConnect();

    // requête SQL
    $sql = "SELECT * FROM `floor` where id = :id";
    $select = $conn->prepare($sql);
    $select->execute([':id' => $id]);
    $result = $select->fetch(PDO::FETCH_ASSOC);

    return(new Floor($result["id"], $result["name"], $result["level"]));
}


$student = findOneStudent(18);
//var_dump($student);

$grade = findOneGrade(8);
//var_dump($grade);

$room = findOneRoom(1);
//var_dump($room);

$floor = findOneFloor(1);
//var_dump($floor);


