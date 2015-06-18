<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "APBrouwland";
    $dbname = "brouwland";
    
    mysql_connect("localhost", "root", "APBrouwland") or die(mysql_error());
    mysql_select_db("brouwland") or die(mysql_error());
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <?php
            $id = 100;
            $teamId = $_SESSION['team'];
            
            $query = mysql_query("SELECT * FROM team WHERE id='$teamId'")  or die(mysql_error());
            $data = mysql_fetch_array($query);
            
            print "<h1>Informatie team en bier</h1>";
            print "<b>Teamnaam: </b><b id = $id>" . $data['naam'] . "</b></br>";
            $id++;
            print "<b>Land: </b><b id = $id>" . $data['taal'] . "</b></br>";
            $id++;
            print "<b>Categorie: </b><b id = $id>" . $data['category'] . "</b></br>";
            
            $query = mysql_query("SELECT * FROM bier WHERE teamId='$teamId'")  or die(mysql_error());
            $data = mysql_fetch_array($query);
            $id++;
            print "<b>Biernaam: </b><b id = $id>" . $data['naam'] . "</b></br>";
            $id++;
            print "<b>Type bier: </b><b id = $id>" . $data['soort']. "</b></br>";
            
            print "</br><h3>Einde deelnemerspagina 2</h3>";
            print "</br>";
            
            //-----------------------------------------------------------------------------------------------
            $query = mysql_query("SELECT * FROM teamkapitein WHERE teamId='$teamId' AND hoofdkapitein=1")  or die(mysql_error());
            $data = mysql_fetch_array($query);
            
            print "<h1>Informatie hoofdkapitein</h1>";
            $id++;
            print "<b>Voornaam: </b><b id = $id>" . $data['voornaam'] . "</b></br>";
            $id++;
            print "<b>Achternaam: </b><b id = $id>" . $data['naam'] . "</b></br>";
            
            $adresId = $data['adresId'];
            $query = mysql_query("SELECT * FROM adres WHERE id='$adresId'")  or die(mysql_error());
            $data1 = mysql_fetch_array($query);
            
            $id++;
            print "<b>Straat: </b><b id = $id>" . $data1['straat'] . "</b></br>";
            $id++;
            print "<b>Huisnr: </b><b id = $id>" . $data1['huisnummer'] . "</b></br>";
            $id++;
            print "<b>Postcode: </b><b id = $id>" . $data1['postcode'] . "</b></br>";
            $id++;
            print "<b>Gemeente: </b><b id = $id>" . $data1['plaats'] . "</b></br>";
            $id++;
            print "<b>Land: </b><b id = $id>" . $data1['land'] . "</b></br>";
            
            $id++;
            print "<b>Telefoon: </b><b id = $id>" . $data['GSM'] . "</b></br>";
            $id++;
            print "<b>Geslacht: </b><b id = $id>" . $data['geslacht'] . "</b></br>";
            $id++;
            print "<b>E-mail: </b><b id = $id>" . $data['email'] . "</b></br>";
            $id++;
            print "<b>Paswoord: </b><b id = $id>" . $data['paswoord'] . "</b></br>";
            
            $query = mysql_query("SELECT * FROM teamkapitein WHERE teamId='$teamId' AND hoofdkapitein=0")  or die(mysql_error());
            $data = mysql_fetch_array($query);
            
            print "<h1>Informatie reservekapitein</h1>";
            $id++;
            print "<b>Voornaam: </b><b id = $id>" . $data['voornaam'] . "</b></br>";
            $id++;
            print "<b>Achternaam: </b><b id = $id>" . $data['naam'] . "</b></br>";
            
            $adresId = $data['adresId'];
            $query = mysql_query("SELECT * FROM adres WHERE id='$adresId'")  or die(mysql_error());
            $data1 = mysql_fetch_array($query);
            
            $id++;
            print "<b>Straat: </b><b id = $id>" . $data1['straat'] . "</b></br>";
            $id++;
            print "<b>Huisnr: </b><b id = $id>" . $data1['huisnummer'] . "</b></br>";
            $id++;
            print "<b>Postcode: </b><b id = $id>" . $data1['postcode'] . "</b></br>";
            $id++;
            print "<b>Gemeente: </b><b id = $id>" . $data1['plaats'] . "</b></br>";
            $id++;
            print "<b>Land: </b><b id = $id>" . $data1['land'] . "</b></br>";
            
            $id++;
            print "<b>Telefoon: </b><b id = $id>" . $data['GSM'] . "</b></br>";
            $id++;
            print "<b>Geslacht: </b><b id = $id>" . $data['geslacht'] . "</b></br>";
            $id++;
            print "<b>E-mail: </b><b id = $id>" . $data['email'] . "</b></br>";
            
            $query = mysql_query("SELECT * FROM teamlid WHERE teamId='$teamId' LIMIT 1")  or die(mysql_error());
            $data = mysql_fetch_array($query);
            
            print "<h1>Informatie teamlid 3</h1>";
            $id++;
            print "<b>Voornaam: </b><b id = $id>" . $data['voornaam'] . "</b></br>";
            $id++;
            print "<b>Achternaam: </b><b id = $id>" . $data['naam'] . "</b></br>";
            $id++;
            print "<b>Geslacht: </b><b id = $id>" . $data['geslacht'] . "</b></br>";
            $id++;
            print "<b>E-mail: </b><b id = $id>" . $data['email'] . "</b></br>";
            
            $query = mysql_query("SELECT * FROM teamlid WHERE teamId='$teamId' ORDER BY lidId DESC LIMIT 1")  or die(mysql_error());
            $data = mysql_fetch_array($query);
            
            print "<h1>Informatie nieuw toegevoegd teamlid</h1>";
            $id++;
            print "<b>Voornaam: </b><b id = $id>" . $data['voornaam'] . "</b></br>";
            $id++;
            print "<b>Achternaam: </b><b id = $id>" . $data['naam'] . "</b></br>";
            $id++;
            print "<b>Geslacht: </b><b id = $id>" . $data['geslacht'] . "</b></br>";
            $id++;
            print "<b>E-mail: </b><b id = $id>" . $data['email'] . "</b></br>";
            
            print "</br><h3>Einde deelnemerspagina 1</h3>";
            print "</br>";
        ?>
    </body>
</html>