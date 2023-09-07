<?php
function insert_student(string $email, string $fullname, string $gender, DateTime $birthdate, int $grade_id): array {
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
    $sql = "INSERT INTO `student` (grade_id, email, fullname, birthdate, gender) VALUES (:grade, :email, :fullname, :birthdate, :gender)";
    $insert = $conn->prepare($sql);
    $insert->execute([
        ':grade' => $grade_id,
        ':email' => $email,
        ':fullname' => $fullname,
        ':birthdate' => $birthdate->format('Y-m-d'),
        ':gender' => $gender
    ]);

    // si la requête a réussi, on retourne un message de succès
    if ($insert->rowCount() > 0) {
        return ['success' => true, 'message' => 'L\'étudiant a bien été ajouté'];
    } else {
        return ['success' => false, 'message' => 'Une erreur est survenue lors de l\'ajout de l\'étudiant'];
    }
}

// on vérifie que le formulaire a été soumis
if(isset($_POST["submit"])) {
    $inputEmail = $_POST["input-email"];
    $inputFullname = $_POST["input-fullname"];
    $inputGender = $_POST["input-gender"];
    $inputBirthdate = $_POST["input-birthdate"];
    $inputGrade = $_POST["input-grade_id"];
    $birthdate = new DateTime($inputBirthdate);
    $result = insert_student($inputEmail, $inputFullname, $inputGender, $birthdate, $inputGrade);

    if ($result['success']) {
        // vider la superglobale $_POST
        $_POST = [];
    } else {
        $_POST = [];
    }
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jour02 job03</title>
</head>
<body>
<header>
    <h1>Jour02 job03</h1>
</header>

<main>
    <section id="form">
        <form action="index.php" method="post">
            <label for="input-email">Email:</label>
            <input type="email" name="input-email" id="email" required>
            <label for="input-fullname">Nom complet:</label>
            <input type="text" name="input-fullname" id="fullname" required>
            <label for="input-gender">Genre:</label>
            <select name="input-gender" id="gender">
                <option value="male">Homme</option>
                <option value="female">Femme</option>
            </select>
            <label for="input-birthdate">Date de naissance:</label>
            <input type="date" name="input-birthdate" id="birthdate" required>
            <label for="input-grade">Classe:</label>
            <input type="number" name="input-grade_id" id="grade" required>
            <input type="submit" name="submit" value="Envoyer">
        </form>
    </section>

    <section id="result">
        <?php
        if (isset($result)) {
            if ($result['success']) {
                echo '<p style="color: green">' . $result['message'] . '</p>';
            } else {
                echo '<p style="color: red">' . $result['message'] . '</p>';
            }
        }
        ?>
    </section>
</main>
</body>
</html>
