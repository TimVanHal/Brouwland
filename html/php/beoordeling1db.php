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
            $query = "INSERT INTO presentatie(fles, vulhoogte, uiterlijk) VALUES ('$presentatieFles', '$presentatieVulhoogte', '$presentatieUiterlijk')";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "SELECT id FROM presentatie ORDER BY id DESC LIMIT 1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $presentatie = $data['id'];
            
            $geen = 0; $weinig = 0; $correct= 0; $overschuimend= 0; $spuitend= 0;
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
            $query = "INSERT INTO koolzuur(geen, weinig, correct, overschuimend, spuitend) VALUES ('$geen', '$weinig', '$correct', '$overschuimend', '$spuitend')";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "SELECT id FROM koolzuur ORDER BY id DESC LIMIT 1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $koolzuur = $data['id'];
            
            echo "<script>console.log($koolzuur)</script>";
            
            $helderheidExtra = $briljant . $helder . $tweeschijn . $mistig . $melk . $troebel;
            $query = "INSERT INTO helderheid(correct, extra) VALUES ('$helderheid', '$helderheidExtra')";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "SELECT id FROM helderheid ORDER BY id DESC LIMIT 1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $helderheid = $data['id'];
            
            $stabiel = 0; $inzakkend= 0; $neerslaand= 0; $cola= 0; $geen= 0;
            if ($schuimkraag == "stabiel")
                $stabiel = 1;
            elseif ($schuimkraag == "inzakkend")
                $inzakkend = 1;
            elseif ($schuimkraag == "neerslaand")
                $neerslaand = 1;
            elseif ($schuimkraag == "cola")
                $cola = 1;
            elseif ($schuimkraag == "geen")
                $geen = 1;
            $schuimkraagExtra = $ongelijkmatig . $mousse . $romig . $glasplakkend;
            $query = "INSERT INTO schuimkraag(stabiel, inzakkend, neerslaand, cola, geen, extra) VALUES ('$stabiel', '$inzakkend', '$neerslaand', '$cola', '$geen', '$schuimkraagExtra')";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "SELECT id FROM schuimkraag ORDER BY id DESC LIMIT 1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $schuimkraag = $data['id'];
            
            $voorproever = $_SESSION["voorproever"];
            $bierId = $_SESSION["bierId"];
            
            $query = "UPDATE beoordeling SET schuimkraagId = $schuimkraag, helderheidId = $helderheid, presentatieId = $presentatie , koolzuurId = $koolzuur
                WHERE voorproeverId = '$voorproever' AND bierId = '$bierId'";
            mysql_query($query) or die ('Error updating' . mysql_error());
            
            if ($_SESSION['lang'] == "NL")
        	    header("location: beoordeling2.php");
            elseif ($_SESSION['lang'] == "FR")
                header("location: evaluer2.php");
            else
                header("location: evaluation2.php");
        }
        //Alles wat je nodig hebt steekt in $_POST
        //Bijvoorbeeld $_POST["name"] om de 'name' op te vragen die ergens op de pagina stond
        //$query = "UPDATE blabla SET blabla WHERE blabla";
    	//mysql_query($query) or die ('Error updating' . mysql_error());
    }
?>