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

<!DOCTYPE HTML>
<html lang="pl">
<head>
 
	<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LOLphp/head.php'); ?>

	<title>LOL-League of Legends</title>
</head>

<body>
    
    
</body>
</html>




















