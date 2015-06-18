<?php
    include "db_config.php";
    
    mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
    mysql_select_db ($mysql["db"]);

    function checkDeadline() {
        date_default_timezone_set('Europe/Brussels');
        
        $info = getdate();
        $day = $info['mday'];
        $month = $info['mon'];
        $year = $info['year'];
        
        
        $format = "Y-m-d";
        $query = "SELECT datum FROM deadlines WHERE voor='start inschrijving'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $datum = $data['datum'];
        $startIn  = DateTime::createFromFormat($format, $datum);
        $query = "SELECT datum FROM deadlines WHERE voor='einde inschrijving'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $datum = $data['datum'];
        $eindeIn  = DateTime::createFromFormat($format, $datum);
        $query = "SELECT datum FROM deadlines WHERE voor='start beoordeling'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $datum = $data['datum'];
        $startBo = DateTime::createFromFormat($format, $datum);
        $query = "SELECT datum FROM deadlines WHERE voor='einde beoordeling'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $datum = $data['datum'];
        $eindeBo = DateTime::createFromFormat($format, $datum);
        $today = DateTime::createFromFormat($format, $year.'-'.$month.'-'.$day);
        
        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        
        if(strpos($url, 'inschrijving') !== false || strpos($url, 'enregistrement') !== false || strpos($url, 'registration') !== false){
            if($startIn > $today || $eindeIn < $today){
                if ($_SESSION['lang'] == "NL")
                    header("location: inschrijvingAfgelopen.php");
                else if ($_SESSION['lang'] == "FR")
                    header("location: enregistrementFini.php");
                else
                    header("location: registrationExpired.php");
            }
        }
        else if(strpos($url, 'beoordeling') !== false || strpos($url, 'evaluer') !== false || strpos($url, 'evaluation') !== false){
            if($startBo > $today || $eindeBo < $today){
                if ($_SESSION['lang'] == "NL")
                    header("location: beoordelingAfgelopen.php");
                else if ($_SESSION['lang'] == "FR")
                    header("location: evaluationsFini.php");
                else
                    header("location: evaluationExpired.php");
            }
        }
    }
?>