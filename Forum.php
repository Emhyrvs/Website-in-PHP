<?php

	session_start();
	
	
	
	if (!isset($_SESSION['zalogowany']))
	{
	 require_once ($_SERVER['DOCUMENT_ROOT'] . '/LOLphp/menu.php'); 	 
	}
        else 
        {
       
        require_once ($_SERVER['DOCUMENT_ROOT'] . '/LOLphp/maenu2.php'); 
        }
	

?>



<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>League of Legends</title>
         
	<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LOLphp/head.php'); ?>

    </head>
    <body>
        <div class="forumm">
        <a href="insertPostFrom.php">Dodaj nowy post</a><br>
        <?php
 require_once "connect.php";
                                         $conn= new mysqli($host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM kategorie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href=post2.php?id=".$row["id"].">".$row["nazwa"]."</a> - ";
    }
} else {
    echo "0 results";
}

$sql = "SELECT p.id, p.tytul, k.nazwa, p.date FROM posty p, kategorie k WHERE p.idKategori = k.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo '<table>';
    while($row = $result->fetch_assoc()) {
    echo "<tr><td><a href=post.php?id=".$row["id"].">".$row["tytul"]."</a></td><td>".$row["nazwa"]."</td><td>".$row["date"]."</td><td>".'<a href=deletePost.php?id='
        . $row["id"] 
        . '><img src="delete.png"> </a>'."</td><td>".'<a href=editPostForm.php?id='
        . $row["id"]
        . '><img src="edit.png"> </a>'."</td></tr>";
    }
    echo '</table>';
} else {
    echo "0 results";
}

$conn->close();
?> 
        </div>>
    </body>
</html>