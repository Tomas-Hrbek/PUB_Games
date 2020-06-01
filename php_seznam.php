<!DOCTYPE html>
<html lang='cs'>
  <head>
    <title>seznam</title>
    <meta charset='utf-8'>
    <meta name='description' content=''>
    <meta name='keywords' content=''>
    <meta name='author' content=''>
    <meta name='robots' content='all'>
    <!-- <meta http-equiv='X-UA-Compatible' content='IE=edge'> -->
    <link href='/favicon.png' rel='shortcut icon' type='image/png'>
   <style>
                table {
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                    width: 50%;
                }
                td, th {
                    border: 1px solid #2196F3;
                    text-align: left;
                    padding: 8px;
                }
            </style>
    </head>

<body>

    <?php
            $spojeni = MySQLi_Connect("localhost", "root", "", "seznam");
            MySQLi_Query($spojeni, "SET names UTF-8");
            $mesta = MySQLi_Query($spojeni, "SELECT * FROM mesta");
        ?>

        <form method="post">
            <p>Jméno: <input type="text" name="jmeno"></p>
            <p>Příjmení: <input type="text" name="prijmeni"></p>
            <p>Firma: <input type="text" name="firma"></p>
            <p>Bydliště:
            <select name="bydliste">
                <?php
                    foreach ($mesta as $mesto) {
                ?>
                <option value="<?php echo $mesto["id_m"];?>"><?php echo $mesto["nazev"]; ?></option>
                <?php
                    }
                ?>
            </select></p>

            <p><input type="submit" name="zapis" value="Odeslat">
              <input type="submit" name="vypis" value="Vypsat"></p>
        </form>
        <form method = "post">
          <p>příjmení pro změnu<input type = "text" name = "zmena"></p>
          <p>nový plat<input type = "number" name = "plat"></p>
          <p><input type = "submit" name = "update" value = "update">
          <input type = "submit" name = "delete" value = "delete">
          <input type="submit" name="serad" value="serad"></p>
        </form>

          <?php
            if (isset($_POST["update"])) {
              if (empty($_POST["zmena"]) || empty($_POST["plat"])) {
                echo "<p>Musíte vyplnit pole s příjmením a platem pro změnu</p>";
              }

              else {
                $spojeni = MySQLi_Connect("localhost", "root", "", "seznam");
                MySQLi_Query($spojeni, "SET names UTF-8");
                $plat = $_POST["plat"];
                $prijmeni_zmena = $_POST["zmena"];
                echo "string";
                $akce = "UPDATE osoby SET plat='$plat' WHERE prijmeni='$prijmeni_zmena'";
                MySQLi_Query($spojeni,$akce);
              }
            }



           ?>
           <?php
            if(isset($_POST["delete"])){
              if (empty($_POST["zmena"])) {
                echo "<p>Musíte vyplnit pole s příjmením</p>";
              }

              else {
                $prijmeni_zmena = $_POST["zmena"];
                echo "string";
                $akce= "DELETE FROM osoby WHERE prijmeni='$prijmeni_zmena'";
                MySQLi_Query($spojeni,$akce);
              }
            }

            ?>
            <?php
                if (isset($_POST["serad"])) {

                $data = MySQLi_Query($spojeni, "SELECT * FROM osoby ORDER BY firma");
                ?>
                <table>
                    <tr>
                        <th>Jméno</th>
                        <th>Příjmení</th>
                        <th>Firma</th>
                        <th>Bydliště</th>
                        <th>Plat</th>
                    </tr>
                    <?php
                       while($zaznam= MySQLi_Fetch_Array($data)){

                        echo "<tr><td>". $zaznam["jmeno"]."</td><td>".$zaznam["prijmeni"]."</td><td>".$zaznam["firma"]."</td><td>".$zaznam["bydliste"]."</td><td>".$zaznam["plat"]."</td></tr> " ;}
                     echo "</table>" ;
                     }

                
            ?>
        <?php
            if (isset($_POST["zapis"])) {
                if (empty($_POST["jmeno"]) || empty($_POST["prijmeni"]) || empty($_POST["firma"])) {
                    echo "<p>Musíte vyplnit všechna pole</p>";
                }
                  else { $akce=   "INSERT INTO osoby (jmeno, prijmeni, firma, bydliste)
                                    VALUES ('" . $_POST["jmeno"] . "', '" . $_POST["prijmeni"] . "', '" . $_POST["firma"] . "', " . $_POST["bydliste"] . ")";

                    MySQLi_Query($spojeni,$akce);
                }
            }
        ?>

        <?php
            if (isset($_POST["vypis"])) {

            $data = MySQLi_Query($spojeni, "SELECT * FROM osoby");
        ?>
            <table>
                <tr>
                    <th>Jméno</th>
                    <th>Příjmení</th>
                    <th>Firma</th>
                    <th>Bydliště</th>
                    <th>Plat</th>
                </tr>
                <?php
                   while($zaznam= MySQLi_Fetch_Array($data)){

                    echo "<tr><td>". $zaznam["jmeno"]."</td><td>".$zaznam["prijmeni"]."</td><td>".$zaznam["firma"]."</td><td>".$zaznam["bydliste"]."</td><td>".$zaznam["plat"]."</td></tr> " ;}
                 echo "</table>" ;
                 }
                 ?>




    </body>
</html>
