<?php
    session_start();
    
    include "db_config.php";
    mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
    // Het selecteren van de database
    mysql_select_db ($mysql["db"]);
    
    $bier = $_SESSION['bier'];
    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $acetaldehydeGeur = $_POST['acetaldehydeGeur'];
        $azijnzuurGeur = $_POST['azijnzuurGeur'];
        $boterGeur = $_POST['boterGeur'];
        $brandigGeur = $_POST['brandigGeur'];
        $chloorGeur = $_POST['chloorGeur'];
        $dmsGeur = $_POST['dmsGeur'];
        $fenolenGeur = $_POST['fenolenGeur'];
        $geoxideerdGeur = $_POST['geoxideerdGeur'];
        $grasachtigGeur = $_POST['grasachtigGeur'];
        $lichtsmaakGeur = $_POST['lichtsmaakGeur'];
        $metaalachtigGeur = $_POST['metaalachtigGeur'];
        $oplosmiddelGeur = $_POST['oplosmiddelGeur'];
        $schimmelachtigGeur = $_POST['schimmelachtigGeur'];
        $wortGeur = $_POST['wortGeur'];
        $zwaveligGeur = $_POST['zwaveligGeur'];
        $afwijkingenAndereGeur = $_POST['afwijkingenAndereGeur'];
        $acetaldehydeSmaak = $_POST['acetaldehydeSmaak'];
        $azijnzuurSmaak = $_POST['azijnzuurSmaak'];
        $boterSmaak = $_POST['boterSmaak'];
        $brandigSmaak = $_POST['brandigSmaak'];
        $chloorSmaak = $_POST['chloorSmaak'];
        $dmsSmaak = $_POST['dmsSmaak'];
        $fenolenSmaak = $_POST['fenolenSmaak'];
        $geoxideerdSmaak = $_POST['geoxideerdSmaak'];
        $grasachtigSmaak = $_POST['grasachtigSmaak'];
        $lichtsmaakSmaak = $_POST['lichtsmaakSmaak'];
        $metaalachtigSmaak = $_POST['metaalachtigSmaak'];
        $oplosmiddelSmaak = $_POST['oplosmiddelSmaak'];
        $schimmelachtigSmaak = $_POST['schimmelachtigSmaak'];
        $wortSmaak = $_POST['wortSmaak'];
        $zwaveligSmaak = $_POST['zwaveligSmaak'];
        $afwijkingenAndereSmaak = $_POST['afwijkingenAndereSmaak'];
        $afwijkingenAndere = $_POST['afwijkingenAndere'];
        $puntenGeur = $_POST['puntenGeur'];
        $puntenSmaak = $_POST['puntenSmaak'];
        if ($acetaldehydeGeur == '' || $acetaldehydeSmaak == '' || $azijnzuurGeur == '' || $azijnzuurSmaak == '' || $boterGeur == '' ||
            $boterSmaak == '' || $brandigGeur == '' || $brandigSmaak == '' || $chloorGeur == '' || $chloorSmaak == '' ||
            $dmsGeur == '' || $dmsSmaak == '' || $fenolenGeur == '' || $fenolenSmaak == '' || $geoxideerdGeur == '' ||
            $geoxideerdSmaak == '' || $grasachtigGeur == '' || $grasachtigSmaak == '' || $lichtsmaakGeur == '' || $lichtsmaakSmaak == '' ||
            $metaalachtigGeur == '' || $metaalachtigSmaak == '' || $oplosmiddelGeur == '' || $oplosmiddelSmaak == '' || $schimmelachtigGeur == '' ||
            $schimmelachtigSmaak == '' || $wortGeur == '' || $wortSmaak == '' || $zwaveligGeur == '' || $zwaveligSmaak == '')
        {
            echo '<script>
                toastr.options = {
                  "closeButton": false,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-center",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
                toastr["error"]("Gelieve het formulier volledig in te vullen!")
                </script>';
        }
        else {
            $query = "CALL beoordeling3('$acetaldehydeSmaak', '$azijnzuurSmaak', '$boterSmaak', '$brandigSmaak', '$chloorSmaak', '$dmsSmaak', '$fenolenSmaak', 
                '$geoxideerdSmaak', '$grasachtigSmaak', '$lichtsmaakSmaak', '$metaalachtigSmaak', '$oplosmiddelSmaak', '$schimmelachtigSmaak', '$wortSmaak', 
                '$zwaveligSmaak', '$afwijkingenAndereSmaak', '$afwijkingenAndere', '$acetaldehydeGeur', '$azijnzuurGeur', '$boterGeur', '$brandigGeur', 
                '$chloorGeur', '$dmsGeur', '$fenolenGeur', '$geoxideerdGeur', '$grasachtigGeur', '$lichtsmaakGeur', '$metaalachtigGeur', 
                '$oplosmiddelGeur', '$schimmelachtigGeur', '$wortGeur', '$zwaveligGeur', '$afwijkingenAndereGeur')";
            mysql_query($query) or die ('Error updating' . mysql_error());
            
            $geurId = $_SESSION['geurId'];
            $query = "SELECT id FROM geurafwijkingen ORDER BY id DESC LIMIT 1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $afwijkingGeur = $data['id'];
            $smaakId = $_SESSION['smaakId'];
            $query = "SELECT id FROM smaakafwijkingen ORDER BY id DESC LIMIT 1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $afwijkingSmaak = $data['id'];
            $query = "CALL beoordeling3_punten('$puntenSmaak', '$smaakId', '$afwijkingSmaak', '$puntenGeur', '$geurId', '$afwijkingGeur')";
            mysql_query($query) or die ('Error updating' . mysql_error());
            
            
            $query = "SELECT id FROM geur ORDER BY id DESC LIMIT 1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $geur = $data['id'];
            $query = "SELECT id FROM smaak ORDER BY id DESC LIMIT 1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $smaak = $data['id'];
            $voorproever = $_SESSION["voorproever"];
            $bierId = $_SESSION['bierId'];
            
            $query = "CALL update_beoordeling3('$geur', '$smaak', '$voorproever', '$bierId')";
            mysql_query($query) or die ('Error updating' . mysql_error());
            
            if ($_SESSION['lang'] == "NL")
        	    header("location: beoordeling4.php");
            elseif ($_SESSION['lang'] == "FR")
                header("location: evaluer4.php");
            else
                header("location: evaluation4.php");
        }
    }
?>