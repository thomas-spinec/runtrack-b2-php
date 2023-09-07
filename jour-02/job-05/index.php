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

    // On récupère le nom des salles, leur capacité, puis on récupère la promotion liée à cette salle, afin de compter le nombre d'étudiants dans cette promotion
    $sql = "SELECT room.name, room.capacity, IF(COUNT(student.id) >= room.capacity, 'Oui', 'Non') as is_full FROM `room` INNER JOIN `grade` ON grade.room_id = room.id INNER JOIN `student` ON grade.id = student.grade_id GROUP BY room.id";
    $select = $conn->prepare($sql);
    $select->execute();
    return $select->fetchAll(PDO::FETCH_ASSOC);
}

$rooms = find_full_rooms();

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>

            table {
                border-collapse: collapse;
            }

            th, td {
                border: 1px solid black;
                padding: 5px;
            }

            thead th {
                background-color: #00BFFF;
            }

    </style>
    <title>Jour02 job05</title>
</head>
<body>
<header>
    <H1>Jour02 -- job05</H1>
</header>

<main>
    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Capacité</th>
            <th>Complet</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rooms as $room): ?>
            <tr>
                <td><?= $room['name'] ?></td>
                <td><?= $room['capacity'] ?></td>
                <td><?= $room['is_full'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>

</body>
</html>
