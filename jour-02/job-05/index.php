<?php

function find_full_rooms() {
    // connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $dbPassword = "";
    $dbname = "lp_official";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // requête SQL
    $sql = "SELECT room.name, COUNT(student.id) as nb_students FROM `room` INNER JOIN `student` ON room.id = student.room_id GROUP BY room.name HAVING nb_students >= 10";
}