



<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: gra.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
 
	<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LOLphp/head.php'); ?>

	<title>LOL-League of Legends</title>
</head>

<body>
    <div id="log">
	
	<br /> Ból, ekstaza, spokój, każda śmierć jest piękna na swój sposób-Karthus<br />
	
	<form action="zaloguj.php" method="post">
            <div id="login">
	<label for="username">Login:</label>
        <input id="Login"type="text" name="login" /> <br/>
                   <label for="username">Hasło:</label>
                <input id="Haslo" type="password" name="haslo" /> <br/> 
		<input type="submit" value="Zaloguj się" />
            </div>
	
	</form>
	
<?php
	if (isset($_SESSION['blad']))
			{
				echo '<div class="enror">'.$_SESSION['blad'].'</div>';
				unset($_SESSION['blad']);
			}
?>
    </div>
</body>
</html>




















