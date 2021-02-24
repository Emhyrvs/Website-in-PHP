
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
<?php
 require_once "connect.php";
                                         $conn= new mysqli($host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=$_POST['id'];
$tytul=$_POST['tytul'];
$tresc=$_POST['tresc'];
$sel=$_POST['sel'];
$sql = "UPDATE posty SET idKategori='$sel',tytul='$tytul',tresc='$tresc'
        WHERE id='$id'";
       

if ($conn->query($sql) === TRUE) {
    echo "Record Edit successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: Forum.php');

?>