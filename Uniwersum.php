
<html>
<div id="strona">	
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
    

<body>
    
<div class="Slider" style="max-width:500px">
    <?php
 require_once "connect.php";
                                         $conn= new mysqli($host, $db_user, $db_password, $db_name);
                                         $id=$_SESSION['id'];
                             
$sql = "SELECT * FROM bohaterowie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       
    
 
  
   echo  "<img  class='mySlides' src=".$row['icona'].">"; 
}
}
$conn->close();
?>
  
</div>
<div id="ogrze">
     League of Legends jest grą typu MOBA (Multiplayer Online Battle Arena). Dwie drużyny po 5 lub 3 graczy stają do walki między sobą na wybranej mapie. Celem gry jest zniszczenie najważniejszego punktu w bazie przeciwnika - Nexusa. Osiągnięcie tego celu wcale nie jest takie proste, jakby mogło się wydawać. Gra łączy w sobie elementy sprawnościowe i taktyczne, a dróg do osiągnięcia wygranej jest wiele. W trakcie rozgrywki należy uważać na sporo czynników, jak np. przejrzystość mapy, aktualnie przebywającego na linii przeciwnika, jak i innych, którzy mogą nagle pojawić się w walce. Zdobywanie przewagi liczebnej jest często kluczem do sukcesu. LoL podzielony jest na trzy tryby rozgrywkowe: Klasyczny (Summoner's Rift), 3v3 (Twisted Treeline) oraz ARAM (Howling Abyss), które zostały szerzej opisane w kolejnym rozdziale. League of Legends oparte jest na mikropłatnościach. Pobranie i użytkowanie gry jest w pełni darmowe. Wszystkich dostępnych w grze bohaterów, runy, karty ksiąg runicznych można nabyć za punkty IP (Influence Points), które każdy z graczy otrzymuje za uczestnictwo w poszczególnych rozgrywkach. Za prawdziwą gotówkę można kupić RP (Riot Points) dzięki którym można nabyć dodatkowe skórki do postaci, które nie są dostępne za IP. Skórki mają jedynie wartość wizualną i nie wpływają w żaden sposób na statystyki postaci. Dodatkowym plusem posiadania RP jest możliwość szybszego zakupy interesujących nas championów. Jedynie runy są dostępne tylko i wyłącznie za IP i nie da się nabyć ich w inny sposób. Dzięki swojej atrakcyjności i mechanice LoL szybko stał się najpopularniejszym e-sportem na świecie i zrzesza miliony graczy na całym globie.
    </div>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 8000);    
}

</script>
</div>
</body>
</html>

