<?php
	
        require_once "connect.php";
  $conn= new mysqli($host, $db_user, $db_password, $db_name);
	$id=$_GET['id'];
       
	$nazwa=$_POST['nazwa'];
	$klasa=$_POST['klasa'];

 $sqlq = "SELECT * FROM bohaterowie WHERE id='$id'";


$resultq = $conn->query($sqlq);
$rowq = $resultq->fetch_assoc();
$Image;

$tabela='id'.$nazwa;
$tabela2='id'.$rowq['nazwa'];
echo "$tabela";
echo "$tabela2";

if($_POST['icona']!="")
{
        
    
    $Image=$_POST['icona'];
    
}
 else {
  $Image=$rowq['icona'];
}

 mysqli_query($conn,"update bohaterowie set nazwa='$nazwa', klasa='$klasa',icona='$Image' where id='$id'");

$sql="alter table uzytkownicy change $tabela2 $tabela  int "; 
 


     if ($conn->query($sql) === TRUE) {
         header("Location:dgre.php");
  
    	
  

} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  
}

?>