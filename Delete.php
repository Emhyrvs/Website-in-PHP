
<?php

	session_start();
	
	
	
	

?>



<?php
	$id=$_GET['id'];
	require_once "connect.php";
  $conn= new mysqli($host, $db_user, $db_password, $db_name);
  $sqlq = "SELECT * FROM bohaterowie WHERE id=$id";

$resultq = $conn->query($sqlq);
$rowq = $resultq->fetch_assoc();
$table='id'.$rowq['nazwa'];
$id=$rowq['id'];
$id2=$_SESSION['id'];
$sql="UPDATE uzytkownicy SET $table='' WHERE id='$id2' ";


if ($conn->query($sql) === TRUE) {
    
    header('Location: dgre.php');
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
     header('Location: dgre.php');
}

$conn->close();


	
?>