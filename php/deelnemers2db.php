<?php
    session_start();
    include "db_config.php";
    // De verbinding met de database
    mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
    // Het selecteren van de database
    mysql_select_db ($mysql["db"]);
    
    $team = $_SESSION['team'];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $teamNaam = $_POST['teamNaam'];
        $taal = $_POST['taal'];
        $categorie = $_POST['category'];
        $bierNaam = $_POST['bierNaam'];
        $typeBier = $_POST['type'];
        
        if(!$teamNaam == ''){
            $query = "UPDATE team SET naam='$teamNaam' WHERE id='$team'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$taal == ''){
            $query = "UPDATE team SET taal='$taal' WHERE id='$team'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$categorie == ''){
            $query = "UPDATE team SET category='$categorie' WHERE id='$team'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$bierNaam == ''){
            $query = "UPDATE bier SET naam='$bierNaam' WHERE teamId='$team'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
        if(!$typeBier == ''){
            $query = "UPDATE bier SET soort='$typeBier' WHERE teamId='$team'";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
    }
?>