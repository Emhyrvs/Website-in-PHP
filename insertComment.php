

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
        
        
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Projekt";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=$_POST['id'];
$nick=$_POST['nick'];
$tresc=$_POST['tresc'];
$sql = "INSERT INTO komentarze (idPosta,nick,tresc)
        VALUES ('$id','$nick','$tresc')";
       

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: post.php?id='.$id);

?>
</div>>
    </body>
</html>