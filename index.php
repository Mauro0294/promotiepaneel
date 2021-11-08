<html>
<head>
     <link rel='stylesheet' href='css/style.css'>
</head>
<body>
</body>
</html>

<?php
session_start();

include "connection.php";

if (empty($_SESSION["userID"])) {
     header('Location: login.php');
}

$datapdo = "SELECT * FROM admins WHERE id =" . $_SESSION['userID'] . "";
$stmtpdo = $pdo->prepare($datapdo);
$stmtpdo->execute();
$rowpdo = $stmtpdo->fetch(PDO::FETCH_ASSOC);
echo "<h2 id='username'>" . $rowpdo['gebruikersnaam'] . "</h2>";

echo "
     <a href='logout.php' id='uitloggen'>Uitloggen</a>
     <h1>Promotiepaneel | Functie beheer</h1>
     <table>
     <tr>
     <h2>Voeg een werknemer toe</h2>
     <form method='POST'>
     <th>Werknemer</th>
     <td><input type='text' name='username1' required></td>
     </tr>
     </table>
     <input type='submit' value='Toevoegen' id='submit1' name='create'>
     </form>

     <table id='table2'>
     <h2 id='h2'>Update een werknemer</h2>
     <tr>
     <th>Werknemer</th>
     <form method='POST'>
     <td><input type='text' name='username2' required></td>
     </tr>
     <tr>
     <th>Nieuwe functie</th>
     <td><input type='text' name='functie' required></td>
     </tr>
     </table>
     <input type='submit' value='Updaten' id='submit2' name='update'>
     </form>

     <table id='table3'>
     <tr>
     <h2 id='h2-2'>Zoek een werknemer</h2>
     <th>Werknemer</th>
     <form method='POST'>
     <td><input type='text' name='username3' required></td>
     </tr>
     </table>
     <input type='submit' value='Zoeken' id='submit3' name='search'>
     </form>

     <table id='table5'>
     <tr>
     <h2 id='h2-3'>Verwijder een werknemer</h2>
     <th>Username</th>
     <form method='POST'>
     <td><input type='text' name='username4' required></td>
     </tr>
     </table>
     <input type='submit' value='Verwijderen' id='submit4' name='delete'>
     </form>
";

if (isset($_POST['create'])) {
     $sql2 = "SELECT COUNT(naam) AS num FROM werknemers WHERE naam = :username1";
     $stmt = $pdo->prepare($sql2);
     $username1 = $_POST['username1'];
     $stmt->bindValue(':username1', $username1);
     $stmt->execute();
     $row = $stmt->fetch(PDO::FETCH_ASSOC);

     if($row['num'] > 0) {
          echo "<script type='text/javascript'>alert('Werknemer staat al in de database!')</script>";
     } else {
          $sql = "INSERT INTO werknemers (naam, functie) 
          VALUES ('$username1', 'Werknemer')";
          $pdo->exec($sql);
          echo "<script type='text/javascript'>alert('Je hebt de gebruiker toegevoegd!')</script>";
     }
};

if (isset($_POST['update'])) {
     $username2 = $_POST['username2'];
     $functie = $_POST['functie'];

     $pdoQuery = "UPDATE werknemers SET functie=:functie WHERE naam=:username2";
     $pdoQuery_run = $pdo->prepare($pdoQuery);
     $pdoQuery_exec = $pdoQuery_run->execute(array(":functie" => $functie, "username2" => $username2));
};

if (isset($_POST['search'])) {
     $data = $pdo->query("SELECT * FROM werknemers WHERE naam='" . $_POST['username3'] . "'");
     foreach ($data as $row) {
          echo "
          <table id='table4' width='20%'>
          <tr>
          <th>Naam</th>
          <td>" . $row['naam'] . "</td>
          </tr>
          <tr>
          <th>Functie</th>
          <td>" . $row['functie'] . "</td>
          </tr>
          </table>
          ";
     }
}

if (isset($_POST['delete'])) {
     $pdo->query("DELETE FROM werknemers WHERE naam='" . $_POST['username4'] . "'");
}
?>