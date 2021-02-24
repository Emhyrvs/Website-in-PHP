
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
        <title>League of Lgends</title>
      
	<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LOLphp/head.php'); ?>

    </head>
    <body>
        <div class="post">
        

 <form method="post" action="insertPost.php">
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
    echo 'Kategoria:<select name=sel>';
    while($row = $result->fetch_assoc()) {
        echo "<option value=".$row["id"].">".$row["nazwa"]."</option>";
    }
    echo "</select>";
} else {
    echo "0 results";
}
?>
            <br>Tytuł:
            <input type="text" name="tytul" required>
            <br>Treść:<br>
            <textarea name="tresc" required></textarea><br>
            <input class="przycisk"value="Dodaj" type="submit">
        </form>
        </div>
    </body>
</html>
