<?php
    session_start();
    include "db_config.php";
    // De verbinding met de database
    mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
    // Het selecteren van de database
    mysql_select_db ($mysql["db"]);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $startIn = $_POST["startInschr"];
        $eindeIn = $_POST["endInschr"];
        $startBo = $_POST["startBo"];
        $eindeBo = $_POST["endBo"];
        $inleveren = $_POST["indienen"];
        
        if(!$startIn == ''){
            $query = "UPDATE deadlines SET datum='$startIn' WHERE voor='start inschrijving'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$eindeIn == ''){
            $query = "UPDATE deadlines SET datum='$eindeIn' WHERE voor='einde inschrijving'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$startBo == ''){
            $query = "UPDATE deadlines SET datum='$startBo' WHERE voor='start beoordeling'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$eindeBo == ''){
            $query = "UPDATE deadlines SET datum='$eindeBo' WHERE voor='einde beoordeling'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$inleveren == ''){
            $query = "UPDATE deadlines SET datum='$inleveren' WHERE voor='indienen bier'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
    }
?>