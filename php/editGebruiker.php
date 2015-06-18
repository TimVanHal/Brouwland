<?php
    session_start();
    include "db_config.php";
    // De verbinding met de database
    mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
    // Het selecteren van de database
    mysql_select_db ($mysql["db"]);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $gebruiker = $_POST['gebruiker'];
        $email = $_POST['email'];
        if($gebruiker != ''){
            if($gebruiker == 'deelnemer'){
                $deelnemer = $_POST['deelnemer'];
                if(!$deelnemer == ''){
                    $_SESSION['team'] = $deelnemer;
                    if ($_SESSION['lang'] == "NL")
                	    header("location: aanpassenDeelnemer.php");
                    else if ($_SESSION['lang'] == "FR")
                        header("location: ajusterParticipant.php");
                    else
                        header("location: editContender.php");
                }
            }
            else if($gebruiker == 'keurder'){
                $keurder = $_POST['keurder'];
                if(!$keurder == ''){
                    $_SESSION['voorproever'] = $keurder;
                    if ($_SESSION['lang'] == "NL")
                	    header("location: aanpassenKeurder.php");
                    else if ($_SESSION['lang'] == "FR")
                        header("location: ajusterJure.php");
                    else
                        header("location: editJudge.php");
                }
            }
        }
    }
?>