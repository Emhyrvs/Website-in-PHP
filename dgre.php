<?php

session_start();

?>



</





<html>
    <head>
        <meta charset="UTF-8">
        <title>League of Legends</title>
         <?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LOLphp/maenu2.php'); ?>
	<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LOLphp/head.php'); ?>

    </head>
    <body>
        <div id="dgre">
        
	
	
	
		<table border="1" id="tabela">
			<thead>
				<th>Nazwa</th>
				<th>Klasa</th>
                                <th>Icona</th>
				
                                <th>Przycisk</th>
                                
			</thead>
			<tbody>
				<?php
					require_once "connect.php";
                                         $conn= new mysqli($host, $db_user, $db_password, $db_name);
                                         $id=$_SESSION['id'];
                             
$sql = "SELECT * FROM bohaterowie";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
        
   
    // output data of each row
    
    
    
    

  
                            
            
    



   

    
   
}
else {
    echo 'Nie masz ulubnych bohaterów  ';
}
  				while($row = $result->fetch_assoc()) {
         $tabela='id'.$row['nazwa'];
    $sqlq = "SELECT * FROM uzytkownicy u,bohaterowie b WHERE b.id=u.$tabela && u.id=$id";
$resultq = $conn->query($sqlq);
if ($resultq->num_rows > 0) {
   
 ?>

        
    
						<tr>
                                                  
							<tr>
                                                  
							
                                                       <td><?php echo $row['nazwa']; ?></td>
							<td><?php echo $row['klasa']; ?></td>
                                                        <td id="obrazki"><?php echo  "<img  id='obraz' src=".$row['icona'].">" ?></td>
                                                       
                                                        
							<td>
								<a href="edit.php?id=<?php echo $row['id']; ?>"><img src="edit.png"></a>
								<a href="Delete.php?id=<?php echo  $row['id']; ?>"><img src="delete.png"></a>
                                                        <td></td>
							</td>
						</tr>
                                                
                                                       
						</tr>
                                                
                                 <?php
                                 
                                
    
     }  
}
    

 

				?>
                                                <tr>
                                                    <form method="POST" action="add.php"   >
                                                <td><label>Nazwa:</label><input type="text" name="nazwa"></td>
							<td><label>klasa:</label><input type="text" name="klasa"></td>
                                                        <td ><label>Icona:</label><input type="file" name="icona"></td>
                                                        
                                                        <td><input id="przy" value="Dodaj" type="submit" name="add"></td>
                                                        
                                                      

                                                       



</td>

                                                </tr>
                                                
			</tbody>
		</table>
	</div>
    </div>
</body>
</html>
