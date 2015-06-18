<?php
 session_start();
    include "db_config.php"; // Alle database gegevens
    
    // De verbinding met de database
    mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
    // Het selecteren van de database
    mysql_select_db ($mysql["db"]);
    
    
    $bier = $_SESSION['bier'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $presentatieFles = $_POST['presentatieFles'];
        $presentatieVulhoogte = $_POST['presentatieVulhoogte'];
        $presentatieUiterlijk = $_POST['presentatieUiterlijk'];
        $koolzuur = $_POST['koolzuur'];
        $helderheid = $_POST['helderheid'];
        $briljant = $_POST['helderheidBriljant'];
        $helder = $_POST['helderheidHelder'];
        $tweeschijn = $_POST['helderheidTweeschijn'];
        $mistig = $_POST['helderheidMistig'];
        $melk = $_POST['helderheidMelk'];
        $troebel = $_POST['helderheidTroebel'];
        $schuimkraag = $_POST['schuimkraag'];
        $ongelijkmatig = $_POST['schuimkraagOngelijkmatig'];
        $mousse = $_POST['schuimkraagMousse'];
        $romig = $_POST['schuimkraagRomig'];
        $glasplakkend = $_POST['schuimkraagGlasplakkend'];
        
        if ($koolzuur == '' || $helderheid == '' || $schuimkraag == '') {
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
            $geen = 0; $weinig = 0; $correct = 0; $overschuimend = 0; $spuitend = 0;
            if ($koolzuur == "geen")
                $geen = 1;
            elseif ($koolzuur == "weinig")
                $weinig = 1;
            elseif ($koolzuur == "correct")
                $correct = 1;
            elseif ($koolzuur == "overschuimend")
                $overschuimend = 1;
            elseif ($koolzuur == "spuitend")
                $spuitend = 1;

            $helderheidExtra = $briljant . $helder . $tweeschijn . $mistig . $melk . $troebel;

            $stabiel = 0; $inzakkend = 0; $neerslaand = 0; $cola = 0; $geen2 = 0;
            if ($schuimkraag == "stabiel")
                $stabiel = 1;
            elseif ($schuimkraag == "inzakkend")
                $inzakkend = 1;
            elseif ($schuimkraag == "neerslaand")
                $neerslaand = 1;
            elseif ($schuimkraag == "cola")
                $cola = 1;
            elseif ($schuimkraag == "geen")
                $geen2 = 1;
            $schuimkraagExtra = $ongelijkmatig . $mousse . $romig . $glasplakkend;

            $voorproever = $_SESSION["voorproever"];
            $bierId = $_SESSION["bierId"];
            
            
            $query = "CALL beoordeling1('$presentatieFles', '$presentatieVulhoogte', '$presentatieUiterlijk', '$geen', '$weinig', '$correct',
                '$overschuimend', '$spuitend', '$helderheid', '$helderheidExtra', '$stabiel', '$inzakkend', '$neerslaand', '$cola', '$geen2',
                '$schuimkraagExtra')";
            mysql_query($query) or die ('Error updating' . mysql_error());
            
            $query = "SELECT id FROM presentatie ORDER BY id DESC LIMIT 1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $p = $data['id'];
            $query = "SELECT id FROM koolzuur ORDER BY id DESC LIMIT 1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $k = $data['id'];
            $query = "SELECT id FROM helderheid ORDER BY id DESC LIMIT 1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $h = $data['id'];
            $query = "SELECT id FROM schuimkraag ORDER BY id DESC LIMIT 1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $s = $data['id'];
            
            $query = "CALL update_beoordeling1('$p', '$k', '$h', '$s', '$voorproever', '$bierId')";
            mysql_query($query) or die ('Error updating' . mysql_error());
            
            if ($_SESSION['lang'] == "NL")
        	    header("location: beoordeling2.php");
            elseif ($_SESSION['lang'] == "FR")
                header("location: evaluer2.php");
            else
                header("location: evaluation2.php");
        }
    }
?>