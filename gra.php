<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>League of Legends <title>
        <?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LOLphp/head.php'); ?>
         <?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LOLphp/maenu2.php'); ?>
</head>

<body>
    <div id="tło">
    	
<?php

   

	
	
	
	
		echo "<p id='Powitaj'>Witaj ".$_SESSION['user'].'!   <a href="logout.php">Wyloguj się!</a> </p>';
               echo '<li ><a><img   src='.$_SESSION['avatar'].'>'.'</a>'
                       . '<ul id="lista">
						<li><a href="dgre.php"> Ulubione postacie </a></li>
						
						
						
					</ul>
</li>';
	
	
	
        ?>
     
    </div>
</body>
</html>