<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: Logowanie.php');
		exit();
	}
	
?>



<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LOLphp/menu.php'); ?>
	<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LOLphp/head.php'); ?>

    </head>

<?php
	
	$id=$_GET['id'];
        require_once "connect.php";
  $conn= new mysqli($host, $db_user, $db_password, $db_name);
	$query=mysqli_query($conn,"select * from `bohaterowie` where id='$id'");
	$row=mysqli_fetch_array($query);
?>

    <body>
        <div class="post">
        

	<h2>Edit</h2>
	<form  method="POST" action="update.php?id=<?php echo $id;?>" >
		<label>Nazwa:</label><input type="text" value="<?php echo $row['nazwa']; ?>" name="nazwa">
		<label>Klasa:</label><input type="text" value="<?php echo $row['klasa']; ?>" name="klasa">
                <label>Icona:</label><img src='<?php echo $row['icona'];?>'width="300" height="300" ><input type="file"  name="icona">
               
                  
		<input class="przycisk" value="Edit" type="submit" name="submit" >
		<a href="dgre.php">Back</a>
	</form>
        </div>
</body>
</html>