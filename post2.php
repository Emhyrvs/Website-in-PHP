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





<html>
    <head>
       
        <title>League of Legends</title>
         
	<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LOLphp/head.php'); ?>

    </head>
    <body>
        <div class="post">
        

<?php
 require_once "connect.php";
                                         $conn= new mysqli($host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$nr=$_GET["id"];
$sql = "SELECT  p.id ,p.tytul, k.nazwa, p.date, p.tresc FROM posty p, kategorie k WHERE p.idKategori = $nr && p.idKategori = k.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
    echo "<p>".$row["tytul"]."</p>".$row["nazwa"]." ".$row["date"]."<br>".$row["tresc"]."<br><br>";
    $nr2=$row["id"];
    $sql2 = "SELECT * FROM komentarze WHERE idPosta = $nr2";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    while($row2 = $result2->fetch_assoc()) {
    echo $row2["nick"]."<br>".$row2["tresc"]."<hr>";
    
    }
    
} else {
    echo "Brak komentarzy: " . $conn->error;
}
echo "<hr><hr><hr>";
    } 
} else {
    echo "Brak postów: " . $conn->error;
}
 
$conn->close();

?> 
            <a href="Forum.php">Powrot</a>
        </div>
    </body>
</html>