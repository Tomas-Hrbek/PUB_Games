<?php



	function MemberUpdater(){
		$feedBack = true;
		$dbConn = new mysqli(DBSERVERNAME, DBUSERNAME, DBPASSWORD, DBNAME);

		if ($dbConn->connect_error) {
				$feedBack = false; // nastavení návratové hodnoty na false v případě chyby s připojením k DB serveru
		}

		$sql = "SET CHARACTER SET UTF8";
		$dbConn->query($sql);

		if (isset($_POST["save"])) {
			$sql = "UPDATE lidi SET Prijmeni='".$_POST['lastName']."',Jmeno='".$_POST['firstName']."',Pohlavi='".$_POST['sex']."',DatumNar='".$_POST['birthday']."',Bydliště='".$_POST['home']."' WHERE ID='".$_POST['ID']."'";
			$dbConn->query($sql);
		}

		$MemberArray = LoadListMebers();
		for ($i=0; $i < count($MemberArray) ; $i++) {
			UpdaterConsoleCreator($MemberArray[$i]["ID"],$MemberArray[$i]["Prijmeni"],$MemberArray[$i]["Jmeno"],$MemberArray[$i]["Pohlavi"],$MemberArray[$i]["DatumNar"],$MemberArray[$i]["Bydliště"]);
		}

		$dbConn->close();

	}

	function UpdaterConsoleCreator($id,$lastname,$firstname,$sex,$birthday,$home){
		echo "<form method='post' action='index.php?update=true'>";
			echo "<input name='ID' value='$id' type='number'>";
			echo "<input name='lastName' value='$lastname' type='text'>";
			echo "<input name='firstName' value='$firstname' type='text'>";
			echo "<input name='sex' value='$sex' type='text'>";
			echo "<input name='birthday' value='$birthday' type='date'>";
			echo "<input name='home' value='$home' type='text'>";
			echo "<input name='save' value='Update' type='submit'>";
		echo "</form>";

	}

	if (isset($_GET["update"]) && $_GET["update"] == true) {
		MemberUpdater();
	}


?>
