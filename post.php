
    <!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    
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
$sql = "SELECT  p.tytul, k.nazwa, p.date, p.tresc FROM posty p, kategorie k WHERE p.id=$nr && p.idKategori = k.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<p>".$row["tytul"]."</p>".$row["nazwa"]." ".$row["date"]."<br>".$row["tresc"]."<br><br>";
    echo '
<form method="post" action="insertComment.php">
    Dodawanie Komentarza
    <input type="hidden" name="id" value='.$nr.'><br>
    Nick:<input type="text" name="nick"><br>
    Tresc:<br>
    <textarea name="tresc"></textarea><br>
    <input class="przycisk" value="Dodaj" type="submit">
</form> ';

    $sql = "SELECT * FROM komentarze WHERE idPosta = $nr";
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    echo '<a href=deleteComment.php?id='
        . $row["id"]."&id2=".$nr 
        . '><img src="delete.png"> </a>'
        .$row["nick"]."<br>".$row["tresc"]."<hr>"; 
    }
    
} else {
    echo "Brak komentarzy " . $conn->error;
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