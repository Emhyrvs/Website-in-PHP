<?php
session_start();


require_once "connect.php";
	 $conn= new mysqli($host, $db_user, $db_password, $db_name);
         $nazwa=$_GET['nazwa'];
         echo $nazwa;
$sqlq = "SELECT * FROM bohaterowie WHERE nazwa='$nazwa'";

$resultq = $conn->query($sqlq);
$rowq = $resultq->fetch_assoc();
$table='id'.$rowq['nazwa'];
$id=$rowq['id'];
$id2=$_SESSION['user'];
echo $id2;
$sql = "UPDATE uzytkownicy SET $table=$id WHERE user='$id2' ";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header('Location:dgre.php');
    
} else {
    echo "Error updating record: " . $conn->error;
     header('Location:dgre.php');
}

$conn->close();
?>
 
       
       
 