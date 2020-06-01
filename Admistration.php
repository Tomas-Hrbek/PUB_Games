<?php

	function AdminSets(){

		$feedBack = true;
	  $dbConn = new mysqli(DBSERVERNAME, DBUSERNAME, DBPASSWORD, DBNAME);

	  if ($dbConn->connect_error) {
	 		 $feedBack = false;
	  }

	  $sql = "SET CHARACTER SET UTF8";
	  $dbConn->query($sql);

		if (isset($_POST["Zadat"])) {
			$ID = $_POST["ID"];
			$Lastname = $_POST["Lastname"];
			$FirstName = $_POST["FirstName"];
			$Sex = $_POST["Sex"];
			$Date = $_POST["Date"];
			$Home = $_POST["Home"];


			$sql = "INSERT INTO lidi (ID, Prijmeni, Jmeno, Pohlavi, DatumNar, Bydliště) VALUES ('$ID', '$Lastname', '$FirstName', '$Sex', '$Date', '$Home')";
			echo $sql;
			$result = $dbConn->query($sql);
		}



	 	$dbConn->close();
	 }


AdminSets();

 ?>
