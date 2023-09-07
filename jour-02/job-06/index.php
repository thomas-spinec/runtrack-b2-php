<?php
function find_ordered_students(): array
{
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
    // requête permettant d'obtenir le nom des grades triés par taille d'étudiants
    $sql = "SELECT grade.name, COUNT(student.id) as nb_students FROM `student` INNER JOIN `grade` ON student.grade_id = grade.id GROUP BY grade.name ORDER BY nb_students DESC";
    $select = $conn->prepare($sql);
    $select->execute();
    $grades = $select->fetchAll(PDO::FETCH_ASSOC);

    // requête SQL permettant d'obtenir les informations des étudiants pour chaque grade pour les mettres dans un
    // tableau
    foreach ($grades as $grade) {
        $sql = "SELECT student.* FROM `student` INNER JOIN `grade` ON student.grade_id = grade.id WHERE grade.name = :grade_name";
        $select = $conn->prepare($sql);
        $select->execute([':grade_name' => $grade['name']]);
        $students = $select->fetchAll(PDO::FETCH_ASSOC);
        $result[$grade['name']] = $students;
    }

    return $result;



}

$students = find_ordered_students();
