<?php
    session_start();
    include "db_config.php";
    // De verbinding met de database
    mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
    // Het selecteren van de database
    mysql_select_db ($mysql["db"]);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $query = "SELECT COUNT(*) FROM cursusDagen";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $count = $data['COUNT(*)'];
        for ($x = 1; $x <= $count; $x++){
            $datum = $_POST['datum'.$x];
            if(!$datum == ''){
                $query = "CALL update_cursusdata('$datum', '$x')";
                mysql_query($query) or die ('Error updating' . mysql_error());
            }
        }
        $newDatum = $_POST['newDatum'];
        if(!$newDatum == ''){
            $query = "CALL insert_cursusdata('$newDatum')";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
    }
?>