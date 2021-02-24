<?php
session_start();
	require_once "connect.php";
  $conn= new mysqli($host, $db_user, $db_password, $db_name);
  
	$nazwa=$_POST['nazwa'];
        $klasa=$_POST['klasa'];
	$Icona=$_POST['icona'];
        if($nazwa!=NULL)
        {
        $table='id'.$nazwa;
        echo $table;
        $sql="ALTER TABLE uzytkownicy  ADD $table int";
        $rezultat = $conn->query($sql);
        
    
    
    
    mysqli_query($conn,"insert into `bohaterowie` (nazwa,klasa,icona) values ('$nazwa','$klasa','$Icona')");
header("Location:add2.php?nazwa=".$nazwa);
 


        }
 else {
     $id=$_POST['sel'];
        $sql = "SELECT * FROM bohaterowie Where id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    
  $row = $result->fetch_assoc(); 
        
       
      $nazwa2=$row['nazwa'];
      header("Location:add2.php?nazwa=".$nazwa2);
      
    
    }
    
    
 else {
    echo "0 results";
}

    
    
  
        
        
     
 }

 

        
	
 ?>