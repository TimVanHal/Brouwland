<?php
    session_start();
    include "db_config.php";
    // De verbinding met de database
    mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
    // Het selecteren van de database
    mysql_select_db ($mysql["db"]);
    
    $team = $_SESSION['team'];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //teamkapitein
        $voornaam1 = $_POST["voornaam1"];
        $achternaam1 = $_POST["achternaam1"];
        $straat1 = $_POST["straat1"];
        $huisnr1 = $_POST["huisnr1"];
        $postcode1 = $_POST["postcode1"];
        $gemeente1 = $_POST["gemeente1"];
        $land1 = $_POST["land1"];
        $telefoon1 = $_POST["telefoon1"];
        $geslacht1 = $_POST["geslacht1"];
        $email1 = $_POST["email1"];
        //reservekapitein
        $voornaam2 = $_POST["voornaam2"];
        $achternaam2 = $_POST["achternaam2"];
        $straat2 = $_POST["straat2"];
        $huisnr2 = $_POST["huisnr2"];
        $postcode2 = $_POST["postcode2"];
        $gemeente2 = $_POST["gemeente2"];
        $land2 = $_POST["land2"];
        $telefoon2 = $_POST["telefoon2"];
        $geslacht2 = $_POST["geslacht2"];
        $email2 = $_POST["email2"];
        //teamlid 3
        $voornaam3 = $_POST["voornaam3"];
        $achternaam3 = $_POST["achternaam3"];
        $email3 = $_POST["email3"];
        $geslacht3 = $_POST["geslacht3"];
        //teamlid 4
        $voornaam4 = $_POST["voornaam4"];
        $achternaam4 = $_POST["achternaam4"];
        $email4 = $_POST["email4"];
        $geslacht4 = $_POST["geslacht4"];
        //teamlid 5
        $voornaam5 = $_POST["voornaam5"];
        $achternaam5 = $_POST["achternaam5"];
        $email5 = $_POST["email5"];
        $geslacht5 = $_POST["geslacht5"];
        //teamlid 6
        $voornaam6 = $_POST["voornaam6"];
        $achternaam6 = $_POST["achternaam6"];
        $email6 = $_POST["email6"];
        $geslacht6 = $_POST["geslacht6"];
        //teamlid 7
        $voornaam7 = $_POST["voornaam7"];
        $achternaam7 = $_POST["achternaam7"];
        $email7 = $_POST["email7"];
        $geslacht7 = $_POST["geslacht7"];
        //teamlid 8
        $voornaam8 = $_POST["voornaam8"];
        $achternaam8 = $_POST["achternaam8"];
        $email8 = $_POST["email8"];
        $geslacht8 = $_POST["geslacht8"];
        
        if(!$voornaam1 == ''){
            $query = "UPDATE teamkapitein SET voornaam='$voornaam1' WHERE teamId='$team' AND hoofdkapitein=1";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$achternaam1 == ''){
            $query = "UPDATE teamkapitein SET achternaam='$achternaam1' WHERE teamId='$team' AND hoofdkapitein=1";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$straat1 == ''){
            $query = "SELECT * FROM teamkapitein WHERE teamId='$team' AND hoofdkapitein=1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $adres = $data['adresId'];
            $query = "UPDATE adres SET straat='$straat1' WHERE id='$adres'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$huisnr1 == ''){
            $query = "SELECT * FROM teamkapitein WHERE teamId='$team' AND hoofdkapitein=1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $adres = $data['adresId'];
            $query = "UPDATE adres SET huisnummer='$huisnr1' WHERE id='$adres'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$postcode1 == ''){
            $query = "SELECT * FROM teamkapitein WHERE teamId='$team' AND hoofdkapitein=1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $adres = $data['adresId'];
            $query = "UPDATE adres SET postcode='$postcode1' WHERE id='$adres'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$gemeente1 == ''){
            $query = "SELECT * FROM teamkapitein WHERE teamId='$team' AND hoofdkapitein=1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $adres = $data['adresId'];
            $query = "UPDATE adres SET plaats='$gemeente1' WHERE id='$adres'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$land1 == ''){
            $query = "SELECT * FROM teamkapitein WHERE teamId='$team' AND hoofdkapitein=1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $adres = $data['adresId'];
            $query = "UPDATE adres SET land='$land1' WHERE id='$adres'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$telefoon1 == ''){
            $query = "UPDATE teamkapitein SET GSM='$telefoon1' WHERE teamId='$team' AND hoofdkapitein=1";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$geslacht1 == ''){
            $query = "UPDATE teamkapitein SET geslacht='$geslacht1' WHERE teamId='$team' AND hoofdkapitein=1";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$email1 == ''){
            $query = "UPDATE teamkapitein SET email='$email1' WHERE teamId='$team' AND hoofdkapitein=1";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$voornaam2 == ''){
            $query = "UPDATE teamkapitein SET voornaam='$voornaam2' WHERE teamId='$team' AND hoofdkapitein=0";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$achternaam2 == ''){
            $query = "UPDATE teamkapitein SET achternaam='$achternaam2' WHERE teamId='$team' AND hoofdkapitein=0";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$straat2 == ''){
            $query = "SELECT * FROM teamkapitein WHERE teamId='$team' AND hoofdkapitein=0";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $adres = $data['adresId'];
            $query = "UPDATE adres SET straat='$straat2' WHERE id='$adres'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$huisnr2 == ''){
            $query = "SELECT * FROM teamkapitein WHERE teamId='$team' AND hoofdkapitein=0";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $adres = $data['adresId'];
            $query = "UPDATE adres SET huisnummer='$huisnr2' WHERE id='$adres'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$postcode2 == ''){
            $query = "SELECT * FROM teamkapitein WHERE teamId='$team' AND hoofdkapitein=0";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $adres = $data['adresId'];
            $query = "UPDATE adres SET postcode='$postcode2' WHERE id='$adres'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$gemeente2 == ''){
            $query = "SELECT * FROM teamkapitein WHERE teamId='$team' AND hoofdkapitein=0";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $adres = $data['adresId'];
            $query = "UPDATE adres SET plaats='$gemeente2' WHERE id='$adres'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$land2 == ''){
            $query = "SELECT * FROM teamkapitein WHERE teamId='$team' AND hoofdkapitein=0";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $adres = $data['adresId'];
            $query = "UPDATE adres SET land='$land2' WHERE id='$adres'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$telefoon2 == ''){
            $query = "UPDATE teamkapitein SET GSM='$telefoon2' WHERE teamId='$team' AND hoofdkapitein=0";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$geslacht2 == ''){
            $query = "UPDATE teamkapitein SET geslacht='$geslacht2' WHERE teamId='$team' AND hoofdkapitein=0";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$email2 == ''){
            $query = "UPDATE teamkapitein SET email='$email2' WHERE teamId='$team' AND hoofdkapitein=0";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$voornaam3 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET voornaam='$voornaam3' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$achternaam3 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET naam='$achternaam3' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$email3 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET email='$email3' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$geslacht3 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET geslacht='$geslacht3' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$voornaam4 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1,1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET voornaam='$voornaam4' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$achternaam4 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1,1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET naam='$achternaam4' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$email4 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1,1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET email='$email4' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$geslacht4 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1,1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET geslacht='$geslacht4' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$voornaam5 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1,2";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET voornaam='$voornaam5' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$achternaam5 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1,2";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET naam='$achternaam5' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$email5 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1,2";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET email='$email5' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$geslacht5 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1,2";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET geslacht='$geslacht5' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$voornaam6 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1,3";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET voornaam='$voornaam6' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$achternaam6 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1,3";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET naam='$achternaam6' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$email6 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1,3";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET email='$email6' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$geslacht6 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1,3";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET geslacht='$geslacht6' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$voornaam7 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1,4";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET voornaam='$voornaam7' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$achternaam7 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1,4";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET naam='$achternaam7' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$email7 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1,4";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET email='$email7' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$geslacht7 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1,4";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET geslacht='$geslacht7' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$voornaam8 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1,5";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET voornaam='$voornaam8' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$achternaam8 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1,5";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET naam='$achternaam8' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$email8 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1,5";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET email='$email8' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$geslacht8 == ''){
            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1,5";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $lidId = $data['lidId'];
            $query = "UPDATE teamlid SET geslacht='$geslacht8' WHERE lidId=$lidId";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
    }
?>