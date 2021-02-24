z<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>League of Legends</title>
         <?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LOLphp/menu.php'); ?>
	<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LOLphp/head.php'); ?>

    </head>
    <body>
        <div class="post">
        




<?php
 require_once "connect.php";
                                         $conn= new mysqli($host, $db_user, $db_password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$idK=$_POST['sel'];
$tytul=$_POST['tytul'];
$tresc=$_POST['tresc'];
$sql = "INSERT INTO posty (idKategori,tytul,tresc) VALUES ('$idK','$tytul','$tresc')";
       

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: Forum.php');

?>
</div>
</body>
        </html>