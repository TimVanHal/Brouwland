<?php
    session_start();
    include "db_config.php";
    // De verbinding met de database
    mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
    // Het selecteren van de database
    mysql_select_db ($mysql["db"]);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $gebruiker = $_POST['gebruiker'];
        if($gebruiker == 'deelnemer'){
            $deelnemer = $_POST['deelnemer'];
            $query = "SELECT * FROM teamkapitein WHERE teamId='$deelnemer' AND hoofdkapitein=1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $email = $data['email'];
            $adres = $data['adresId'];
            
            $query = "SELECT * FROM teamkapitein WHERE teamId='$deelnemer' AND hoofdkapitein=0";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $adres2 = $data['adresId'];
            
            $query = "SELECT * FROM beoordeling WHERE bierId='$deelnemer'";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "CALL clear_beoordeling_bier('$deelnemer')";
            mysql_query($query) or die ('Error updating' . mysql_error());
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                $presentatie = $row['presentatieId'];
                $helderheid = $row['helderheidId'];
                $schuimkraag = $row['schuimkraagId'];
                $geur = $row['geurId'];
                $query = "SELECT * FROM geur WHERE id='$geur'";
                $result = mysql_query($query) or die ('Error updating' . mysql_error());
                $data = mysql_fetch_assoc($result);
                $geurNeutraal = $data['neutraalId'];
                $geurAfwijk = $data['afwijkingenId'];
                $smaak = $row['smaakId'];
                $query = "SELECT * FROM smaak WHERE id='$smaak'";
                $result = mysql_query($query) or die ('Error updating' . mysql_error());
                $data = mysql_fetch_assoc($result);
                $smaakNeutraal = $data['neutraalId'];
                $smaakAfwijk = $data['afwijkingenId'];
                $basissmaak = $row['basissmaakId'];
                $mondgevoel = $row['mondgevoelId'];
                $nasmaak = $row['nasmaakId'];
                $koolzuur = $row['koolzuurId'];
                $query = "CALL delete_beoordeling_components('$presentatie', '$helderheid', '$schuimkraag', 
                    '$geur', '$geurAfwijk', '$geurNeutraal', '$smaak', '$smaakAfwijk', '$smaakNeutraal', 
                    '$basissmaak', '$mondgevoel', '$nasmaak', '$koolzuur');";
                mysql_query($query) or die ('Error updating' . mysql_error());
            }
            
            $query = "CALL delete_team('$deelnemer', '$adres', '$adres2', '$email')";
            mysql_query($query) or die ('Error updating' . mysql_error());
            
            if ($_SESSION['lang'] == "NL")
                echo "<script>alert('De deelnemer is succesvol verwijderd.');</script>";
            else if ($_SESSION['lang'] == "FR")
                echo "<script>alert('L'élimination du participant est réussi.');</script>";
            else
                echo "<script>alert('The contender is successfully deleted.');</script>";
        }
        else if($gebruiker == 'keurder'){
            $keurder = $_POST['keurder'];
            
            $query = "SELECT * FROM voorproever WHERE id='$keurder'";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $user = $data['userId'];
            $adres = $data['adresId'];
            
            $query = "SELECT * FROM beoordeling WHERE voorproeverId='$keurder'";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "CALL clear_beoordeling_bier('$keurder')";
            mysql_query($query) or die ('Error updating' . mysql_error());
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                $presentatie = $row['presentatieId'];
                $helderheid = $row['helderheidId'];
                $schuimkraag = $row['schuimkraagId'];
                $geur = $row['geurId'];
                $query = "SELECT * FROM geur WHERE id='$geur'";
                $result = mysql_query($query) or die ('Error updating' . mysql_error());
                $data = mysql_fetch_assoc($result);
                $geurNeutraal = $data['neutraalId'];
                $geurAfwijk = $data['afwijkingenId'];
                $smaak = $row['smaakId'];
                $query = "SELECT * FROM smaak WHERE id='$smaak'";
                $result = mysql_query($query) or die ('Error updating' . mysql_error());
                $data = mysql_fetch_assoc($result);
                $smaakNeutraal = $data['neutraalId'];
                $smaakAfwijk = $data['afwijkingenId'];
                $basissmaak = $row['basissmaakId'];
                $mondgevoel = $row['mondgevoelId'];
                $nasmaak = $row['nasmaakId'];
                $koolzuur = $row['koolzuurId'];
                $query = "CALL delete_beoordeling_components('$presentatie', '$helderheid', '$schuimkraag', 
                    '$geur', '$geurAfwijk', '$geurNeutraal', '$smaak', '$smaakAfwijk', '$smaakNeutraal', 
                    '$basissmaak', '$mondgevoel', '$nasmaak', '$koolzuur');";
                mysql_query($query) or die ('Error updating' . mysql_error());
            }
            
            $query = "CALL delete_keurder('$keurder', '$adres', '$user')";
            mysql_query($query) or die ('Error updating' . mysql_error());
            
            if ($_SESSION['lang'] == "NL")
                echo "<script>alert('Het jurylid is succesvol verwijderd.');</script>";
            else if ($_SESSION['lang'] == "FR")
                echo "<script>alert('L'élimination du juge est réussi.');</script>";
            else
                echo "<script>alert('The judge is successfully deleted.');</script>";
        }
    }
?>