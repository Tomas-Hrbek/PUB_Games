<?php
 function LoadListMebers(){
	$feedBack = true; // počáteční nastavení návratové hodnoty
	$dbConn = new mysqli(DBSERVERNAME, DBUSERNAME, DBPASSWORD, DBNAME); // vytvoření objektu mysqli - paramerty převzaty z config.php

	if ($dbConn->connect_error) {
			$feedBack = false; // nastavení návratové hodnoty na false v případě chyby s připojením k DB serveru
	}

	$sql = "SET CHARACTER SET UTF8"; // SQL dotaz nastavující kódovou stránku pro komunikaci s DB serverem
	$dbConn->query($sql); // odeslání SQL dotazu na DB server

	$sql = "SELECT * FROM lidi"; // SQL dotaz pro výběr článku dle id z tabulky articles

	$result = $dbConn->query($sql); // odeslání SQL dotazu na DB server - $result obsahuje výsledek dotazu
	if ($result->num_rows > 0) { // kontrola zdali SQL dotaz SELECT vrátil článek
			 while($row = $result->fetch_assoc()) { // postupné procházení řádek výsledku - fetch_assoc() vrací pole hodnot jednoho řádku
				 $ContentArray []= $row;
			 }
	 }
	 else {
		 $feedBack = false; // v případě, že DB server nevrátí žádný záznam - výstupní hodnota False
	 }
	 $dbConn->close();
	 print_r ($ContentArray);
}

function LoadListCompetition($year){
 $feedBack = true; // počáteční nastavení návratové hodnoty
 $dbConn = new mysqli(DBSERVERNAME, DBUSERNAME, DBPASSWORD, DBNAME); // vytvoření objektu mysqli - paramerty převzaty z config.php

 if ($dbConn->connect_error) {
		 $feedBack = false; // nastavení návratové hodnoty na false v případě chyby s připojením k DB serveru
 }

 $sql = "SET CHARACTER SET UTF8"; // SQL dotaz nastavující kódovou stránku pro komunikaci s DB serverem
 $dbConn->query($sql); // odeslání SQL dotazu na DB server

 $sql = "SELECT * FROM ročník$year"; // SQL dotaz pro výběr článku dle id z tabulky articles

 $result = $dbConn->query($sql); // odeslání SQL dotazu na DB server - $result obsahuje výsledek dotazu
 if ($result->num_rows > 0) { // kontrola zdali SQL dotaz SELECT vrátil článek
			while($row = $result->fetch_assoc()) { // postupné procházení řádek výsledku - fetch_assoc() vrací pole hodnot jednoho řádku
				$ContentArray[] = $row;
			}
	}
	else {
		$feedBack = false; // v případě, že DB server nevrátí žádný záznam - výstupní hodnota False
	}
	$dbConn->close();
	print_r ($ContentArray);
}




LoadListCompetition(2014);
 ?>
