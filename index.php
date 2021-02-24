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
	<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LOLphp/head.php'); ?>