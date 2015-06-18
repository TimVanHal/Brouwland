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
            $query = "UPDATE beoordeling SET presentatieId=null WHERE bierId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "UPDATE beoordeling SET helderheidId=null WHERE bierId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "UPDATE beoordeling SET schuimkraagId=null WHERE bierId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "UPDATE beoordeling SET geurId=null WHERE bierId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "UPDATE beoordeling SET smaakId=null WHERE bierId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "UPDATE beoordeling SET basissmaakId=null WHERE bierId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "UPDATE beoordeling SET mondgevoelId=null WHERE bierId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "UPDATE beoordeling SET nasmaakId=null WHERE bierId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "UPDATE beoordeling SET koolzuurId=null WHERE bierId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                $presentatie = $row['presentatieId'];
                $query = "DELETE FROM presentatie WHERE id='$presentatie'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                
                $helderheid = $row['helderheidId'];
                $query = "DELETE FROM helderheid WHERE id='$helderheid'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                
                $schuimkraag = $row['schuimkraagId'];
                $query = "DELETE FROM schuimkraag WHERE id='$schuimkraag'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                
                $geur = $row['geurId'];
                $query = "SELECT * FROM geur WHERE id='$geur'";
                $result = mysql_query($query) or die ('Error updating' . mysql_error());
                $data = mysql_fetch_assoc($result);
                $neutraal = $data['neutraalId'];
                $afwijk = $data['afwijkingenId'];
                $query = "DELETE FROM geur WHERE id='$geur'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                $query = "DELETE FROM geurafwijkingen WHERE id='$afwijk'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                $query = "DELETE FROM geurneutraal WHERE id='$neutraal'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                
                $smaak = $row['smaakId'];
                $query = "SELECT * FROM smaak WHERE id='$smaak'";
                $result = mysql_query($query) or die ('Error updating' . mysql_error());
                $data = mysql_fetch_assoc($result);
                $neutraal = $data['neutraalId'];
                $afwijk = $data['afwijkingenId'];
                $query = "DELETE FROM smaak WHERE id='$smaak'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                $query = "DELETE FROM smaakafwijkingen WHERE id='$afwijk'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                $query = "DELETE FROM smaakneutraal WHERE id='$neutraal'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                
                $basissmaak = $row['basissmaakId'];
                $query = "DELETE FROM basissmaak WHERE id='$basissmaak'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                
                $mondgevoel = $row['mondgevoelId'];
                $query = "DELETE FROM mondgevoel WHERE id='$mondgevoel'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                
                $nasmaak = $row['nasmaakId'];
                $query = "DELETE FROM nasmaak WHERE id='$nasmaak'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                
                $koolzuur = $row['koolzuurId'];
                $query = "DELETE FROM koolzuur WHERE id='$koolzuur'";
                mysql_query($query) or die ('Error updating' . mysql_error());
            }
            
            $query = "DELETE FROM beoordeling WHERE bierId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "DELETE FROM bier WHERE teamId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "DELETE FROM teamkapitein WHERE teamId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "DELETE FROM adres WHERE id='$adres'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "DELETE FROM adres WHERE id='$adres2'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "DELETE FROM teamlid WHERE teamId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "DELETE FROM team WHERE id='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "DELETE FROM users WHERE email='$email'";
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
            $query = "UPDATE beoordeling SET presentatieId=null WHERE bierId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "UPDATE beoordeling SET helderheidId=null WHERE bierId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "UPDATE beoordeling SET schuimkraagId=null WHERE bierId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "UPDATE beoordeling SET geurId=null WHERE bierId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "UPDATE beoordeling SET smaakId=null WHERE bierId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "UPDATE beoordeling SET basissmaakId=null WHERE bierId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "UPDATE beoordeling SET mondgevoelId=null WHERE bierId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "UPDATE beoordeling SET nasmaakId=null WHERE bierId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "UPDATE beoordeling SET koolzuurId=null WHERE bierId='$deelnemer'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                $presentatie = $row['presentatieId'];
                $query = "DELETE FROM presentatie WHERE id='$presentatie'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                
                $helderheid = $row['helderheidId'];
                $query = "DELETE FROM helderheid WHERE id='$helderheid'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                
                $schuimkraag = $row['schuimkraagId'];
                $query = "DELETE FROM schuimkraag WHERE id='$schuimkraag'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                
                $geur = $row['geurId'];
                $query = "SELECT * FROM geur WHERE id='$geur'";
                $result = mysql_query($query) or die ('Error updating' . mysql_error());
                $data = mysql_fetch_assoc($result);
                $neutraal = $data['neutraalId'];
                $afwijk = $data['afwijkingenId'];
                $query = "UPDATE geur SET neutraalId=null WHERE id='$geur'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                $query = "UPDATE geur SET afwijkingenId=null WHERE id='$geur'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                $query = "DELETE FROM geurafwijkingen WHERE id='$afwijk'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                $query = "DELETE FROM geurneutraal WHERE id='$neutraal'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                $query = "DELETE FROM geur WHERE id='$geur'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                
                $smaak = $row['smaakId'];
                $query = "SELECT * FROM smaak WHERE id='$smaak'";
                $result = mysql_query($query) or die ('Error updating' . mysql_error());
                $data = mysql_fetch_assoc($result);
                $neutraal = $data['neutraalId'];
                $afwijk = $data['afwijkingenId'];
                $query = "UPDATE smaak SET neutraalId=null WHERE id='$smaak'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                $query = "UPDATE smaak SET afwijkingenId=null WHERE id='$smaak'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                $query = "DELETE FROM smaakafwijkingen WHERE id='$afwijk'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                $query = "DELETE FROM smaakneutraal WHERE id='$neutraal'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                $query = "DELETE FROM smaak WHERE id='$smaak'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                
                $basissmaak = $row['basissmaakId'];
                $query = "DELETE FROM basissmaak WHERE id='$basissmaak'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                
                $mondgevoel = $row['mondgevoelId'];
                $query = "DELETE FROM mondgevoel WHERE id='$mondgevoel'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                
                $nasmaak = $row['nasmaakId'];
                $query = "DELETE FROM nasmaak WHERE id='$nasmaak'";
                mysql_query($query) or die ('Error updating' . mysql_error());
                
                $koolzuur = $row['koolzuurId'];
                $query = "DELETE FROM koolzuur WHERE id='$koolzuur'";
                mysql_query($query) or die ('Error updating' . mysql_error());
            }
            
            $query = "DELETE FROM voorproever WHERE id='$keurder'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "DELETE FROM adres WHERE id='$adres'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "DELETE FROM users WHERE userId='$user'";
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