<!DOCTYPE html>
<html lang="" dir="ltr">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- <meta http-equiv="refresh" content="5" /> -->


		<title>| PUB Game Tables</title>
		<link rel="stylesheet" href="css/index.css" />
		<link rel="stylesheet" type="text/css" href="css/table.css" />
		<link rel="stylesheet" href="css/menu.css" />

	</head>
	<body>
		<?php include('config.php'); ?>
		<?php include ('Admistration.php'); ?>
		<div class="body-container">
			<div class="nav-container">
				<nav>
					<ul class="nav-menu nav-vertical">
						<li><a href="#">Nav Link</a></li>
						<li><a href="#" class="nav-active">Turneje</a>
							<ul>
								<li><a href="index.php?year=2020">2020</a></li>
								<li><a href="index.php?year=2018">2018</a></li>
								<li><a href="index.php?year=2016">2016</a></li>
								<li><a href="index.php?year=2014">2014</a></li>
							</ul>
						</li>
						<li><a href="index.php?update=true">Admistrace</a></li>
					</ul>
				</nav>
				<div class="settings-container">
					<h3>Nový člen</h3>
					<form class="" action="index.php" method="post">
						<label for="ID">ID</label>
						<input type="number" name="ID" value="">
						<label for="ID">Přijmení</label>
						<input type="text" name="Lastname" value="">
						<label for="ID">Jméno</label>
						<input type="text" name="FirstName" value="">
						<label for="ID">Pohlaví</label>
						<input type="text" name="Sex" value="">
						<label for="ID">Datum Narození</label>
						<input type="date" name="Date" value="">
						<label for="ID">Bydliště</label>
						<input type="text" name="Home" value="">
						<input type="submit" name="Zadat" value="Zadat">
					</form>
				</div>
			</div>
			<div class="container-table">
				<?php
					include('back.php');
					include('PHP/Updater.php');
				?>
			</div>
		</div>
	</body>

</html>
