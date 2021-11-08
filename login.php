<html>
    <head>
        <title>Oefenwebsite</title>
        <link rel='stylesheet' href='css/style.css'>
    </head>
    <body>
        <form method="POST" action="login.php">
            <h1 id='promopaneel'>Promotiepaneel | Admin Login</h1>
            <h3 id='label1'>Gebruikersnaam</h3>
            <input type="text" name="gebruikersnaam" minlength="3" placeholder='Gebruikersnaam' id='inputuser' required>
            <h3 id='label2'>Wachtwoord</h3>
            <input type="password" minlength="8" name="wachtwoord" placeholder='Wachtwoord' id='inputpass' required>
            <br><br>
            <input type="submit" name="login" id='login' value="Inloggen">
        </form>
    </body>
</html>

<?php
session_start();

include "connection.php";

if (isset($_POST['login'])) {
    $gebruikersnaam = trim($_POST['gebruikersnaam']);
    $wachtwoord = trim($_POST['wachtwoord']);
    if ($gebruikersnaam != "" && $wachtwoord != "") {
        $query = "SELECT * FROM `admins` WHERE `gebruikersnaam`=:gebruikersnaam AND `wachtwoord`=:wachtwoord";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam('gebruikersnaam', $gebruikersnaam, PDO::PARAM_STR);
        $stmt->bindParam('wachtwoord', $wachtwoord, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($count == 1 && !empty($row)) {
            echo "<script type='text/javascript'>alert('Je bent succesvol ingelogd!');</script>";
            $id = $row['id'];
            $_SESSION['userID'] = $id;
            header('Location: index.php');
        } else {
            echo "<p id='verkeerd'>Verkeerd gebruikersnaam of wachtwoord!<p>";
        }
    }
}
?>