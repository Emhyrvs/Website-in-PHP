<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: Logowanie.php');
		exit();
	}

	require_once "connect.php";

        try
        {
	
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
	if ($polaczenie->connect_errno!=0)
	{
		throw new Exception(mysqli_connect_errno());
	}
        
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$sql="SELECT * FROM uzytkownicy WHERE user='$login' AND pass='$haslo'";
	
		if ($rezultat = $polaczenie->query($sql))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;
				
				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['id'] = $wiersz['id'];
				$_SESSION['user'] = $wiersz['user'];
				
				
				$_SESSION['email'] = $wiersz['email'];
				$_SESSION['avatar'] = $wiersz['avatar'];
				
				unset($_SESSION['blad']);
				$rezultat->free_result();
				header('Location: index.php');
				
			} else {
				
				
					$_SESSION['blad']="Błedne hasło lub login!";

				header('Location: Logowanie.php');
				
			}
                        $polaczenie->close();
                }
        }
        
        }
 catch (Exception $e)
 {
   echo '<span style="color:red;">Błąd serwera! </span>';
		echo $e;
 }
 
		
		
	
	
?>