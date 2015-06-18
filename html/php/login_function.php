<?php
    session_start();
    include "../php/db_config.php"; // Alle database gegevens
    mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
    // Het selecteren van de database
    mysql_select_db ($mysql["db"]);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST["userEmail"];
        $paswoord = $_POST["paswoord"];
        
        $query = "SELECT COUNT(email) AS total FROM users WHERE email = '$email'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        if ($data['total']==1){
            $query = "SELECT paswoord FROM users WHERE email = '$email'";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $hash = $data['paswoord'];
            if(crypt($paswoord, $hash) != $hash)
                echo "INCORRECT PASWOORD";
            else{
                $query = "SELECT jury FROM users WHERE email='$email'";
                $result = mysql_query($query) or die ('Error updating' . mysql_error());
                $data = mysql_fetch_assoc($result);
                $jury = $data['jury'];
                $query = "SELECT gebruiker FROM users WHERE email='$email'";
                $result = mysql_query($query) or die ('Error updating' . mysql_error());
                $data = mysql_fetch_assoc($result);
                $gebruiker = $data['gebruiker'];
                $query = "SELECT admin FROM users WHERE email='$email'";
                $result = mysql_query($query) or die ('Error updating' . mysql_error());
                $data = mysql_fetch_assoc($result);
                $admin = $data['admin'];
                
                $_SESSION['user'] = $email;
                if ($gebruiker == 1) {
                    $_SESSION['auth'] = "TEAMLIDOK";
                    $query = "SELECT teamId FROM teamkapitein WHERE email='$email'";
                    $result = mysql_query($query) or die ('Error updating' . mysql_error());
                    $data = mysql_fetch_assoc($result);
                    $_SESSION['team'] = $data['teamId'];
                    if ($_SESSION['lang'] == "NL")
                	    header("location: deelnemer/deelnemersIndex.php");
                    else if ($_SESSION['lang'] == "FR")
                        header("location: partipant/participantIndex.php");
                    else
                        header("location: contender/contenderIndex.php");
                }
                elseif ($jury == 1) {
                    $_SESSION['auth'] = "JURYLIDOK";
                    $query = "SELECT userId FROM users WHERE email = '$email'";
                    $result = mysql_query($query) or die ('Error updating' . mysql_error());
                    $data = mysql_fetch_assoc($result);
                    $userId = $data['userId'];
                    $query = "SELECT id FROM voorproever WHERE userId = '$userId'";
                    $result = mysql_query($query) or die ('Error updating' . mysql_error());
                    $data = mysql_fetch_assoc($result);
                    $_SESSION['voorproever'] = $data['id'];
                    if ($_SESSION['lang'] == "NL")
                	    header("location: keurder/keurderIndex.php");
                    else if ($_SESSION['lang'] == "FR")
                        header("location: jure/jureIndex.php");
                    else
                        header("location: judge/judgeIndex.php");
                }
                elseif ($admin == 1) {
                    $_SESSION['auth'] = "ADMINOKBROUWLAND";
                    if ($_SESSION['lang'] == "NL")
                	    header("location: admin/adminIndex.php");
                    else if ($_SESSION['lang'] == "FR")
                        header("location: admin/adminIndex.php");
                    else
                        header("location: admin/adminIndex.php");
                }
            }
        }
        else
            echo "INVALID USER";
    }
?>