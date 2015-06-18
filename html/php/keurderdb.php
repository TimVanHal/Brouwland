<?php
    session_start();
    include "db_config.php";
    // De verbinding met de database
    mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
    // Het selecteren van de database
    mysql_select_db ($mysql["db"]);
    
    $keurder = $_SESSION['voorproever'];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $voornaam = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $straat = $_POST['straat'];
        $huisnr = $_POST['huisnr'];
        $postcode = $_POST['postcode'];
        $gemeente = $_POST['gemeente'];
        $land = $_POST['land'];
        
        if(!$voornaam == ''){
            $query = "UPDATE voorproever SET voornaam='$voornaam' WHERE id='$keurder'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$achternaam == ''){
            $query = "UPDATE voorproever SET naam='$achternaam' WHERE id='$keurder'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$straat == ''){
            $query = "SELECT * FROM voorproever WHERE id='$keurder'";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $adres = $data['adresId'];
            $query = "UPDATE adres SET straat='$straat' WHERE id='$adres'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$huisnr == ''){
            $query = "SELECT * FROM voorproever WHERE id='$keurder'";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $adres = $data['adresId'];
            $query = "UPDATE adres SET huisnummer='$huisnr' WHERE id='$adres'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$postcode == ''){
            $query = "SELECT * FROM voorproever WHERE id='$keurder'";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $adres = $data['adresId'];
            $query = "UPDATE adres SET postcode='$postcode' WHERE id='$adres'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$gemeente == ''){
            $query = "SELECT * FROM voorproever WHERE id='$keurder'";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $adres = $data['adresId'];
            $query = "UPDATE adres SET plaats='$gemeente' WHERE id='$adres'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$land == ''){
            $query = "SELECT * FROM voorproever WHERE id='$keurder'";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $adres = $data['adresId'];
            $query = "UPDATE adres SET land='$land' WHERE id='$adres'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
    }
?>