<?php

function find_all_students(): array {
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
    $sql = "SELECT * FROM `student`";
    $select = $conn->prepare($sql);
    $select->execute();
    $students = $select->fetchAll(PDO::FETCH_ASSOC);
    return $students;

}

$students = find_all_students();




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

        thead th,
        tbody td:nth-child(1) {
            background-color: #00BFFF;
        }
    </style>
    <title>Jour02 Job01</title>
</head>
<body>
<header>
    <H1>Jour02 -- job01</H1>
</header>

<main>
    <table>
        <thead>
        <!-- boucle pour afficher les entêtes de colonnes -->
        <?php foreach ($students[0] as $key => $value): ?>
            <th><?= $key ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
        <!-- boucle pour afficher les données -->
        <?php foreach ($students as $student): ?>
            <tr>
                <?php foreach ($student as $key => $value): ?>
                    <td><?= $value ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>

</body>
</html>
