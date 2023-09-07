<?php
function find_all_students_grades(): array {
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
    $sql = "SELECT student.email, student.fullname, grade.name as grade_name FROM `student` INNER JOIN `grade` ON student.grade_id = grade.id";
    $select = $conn->prepare($sql);
    $select->execute();
    $students = $select->fetchAll(PDO::FETCH_ASSOC);
    return $students;
}

$students = find_all_students_grades();

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
    <title>jour02 job04</title>
</head>
<body>
<header>
    <H1>Jour02 -- job04</H1>
</header>

<main>
    <table>
        <thead>
        <tr>
            <th>email</th>
            <th>fullname</th>
            <th>grade_name</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $student['email'] ?></td>
                <td><?= $student['fullname'] ?></td>
                <td><?= $student['grade_name'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>

</body>
</html>
