<?php

	session_start();
	?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LOLphp/menu.php'); ?>
	<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LOLphp/head.php'); ?>

    </head>
    <body>
        <div class="post">
        

<form method="post" action="editPost.php">
    <?php
    
$id=$_GET["id"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Projekt";
echo '<input type="hidden" name="id" value='.$id.'>Edycja Postu<br>';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqlq = "SELECT * FROM kategorie k,posty p Where p.id=$id && k.id=p.idKategori";

$resultq = $conn->query($sqlq);
$rowq = $resultq->fetch_assoc();
$sql = "SELECT * FROM kategorie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo 'Kategoria:<select name=sel>';
    while($row = $result->fetch_assoc()) {
        if($rowq["nazwa"]!=$row["nazwa"])
        {
        echo "<option value=".$row["id"].">".$row["nazwa"]."</option>";
    }
    }
    echo '<option value="audi" selected>'.$rowq["nazwa"].'</option>';
    echo "</select>";
} else {
    echo "0 results";
}
$sql = "SELECT tytul,tresc FROM posty WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {

          echo'  <br>Tytuł:<br>
            <textarea name="tytul" required>'.$row["tytul"].'</textarea>
            <br>Treść:<br>
            <textarea name="tresc" required>'.$row['tresc'].'</textarea><br>
                    
                    <input type="submit">
</form>';}}
                          ?>
    </div>  
     </div>    
</body>
</html>