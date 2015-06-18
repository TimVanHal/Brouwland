<?php
 session_start();
    include "db_config.php"; // Alle database gegevens
    
    // De verbinding met de database
    mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
    // Het selecteren van de database
    mysql_select_db ($mysql["db"]);
    
    
    $bier = $_SESSION['bier'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $aardbeiGeur = $_POST['aardbeiGeur'];
        $aardbeiSmaak = $_POST['aardbeiSmaak'];
        $ananasGeur = $_POST['ananasGeur'];
        $ananasSmaak = $_POST['ananasSmaak'];
        $appelGeur = $_POST['appelGeur'];
        $appelSmaak = $_POST['appelSmaak'];
        $bosGeur = $_POST['bosGeur'];
        $bosSmaak = $_POST['bosSmaak'];
        $caramelGeur = $_POST['caramelGeur'];
        $caramelSmaak = $_POST['caramelSmaak'];
        $fruitigSmaak = $_POST['fruitigSmaak'];
        $fruitigGeur = $_POST['fruitigGeur'];
        $gebrandGeur = $_POST['gebrandGeur'];
        $gebrandSmaak = $_POST['gebrandSmaak'];
        $gemberGeur = $_POST['gemberGeur'];
        $gemberSmaak = $_POST['gemberSmaak'];
        $gistachtigGeur = $_POST['gistachtigGeur'];
        $gistachtigSmaak = $_POST['gistachtigSmaak'];
        $hogereAlcoholenGeur = $_POST['hogereAlcoholenGeur'];
        $hogereAlcoholenSmaak = $_POST['hogereAlcoholenSmaak'];
        $hoppigGeur = $_POST['hoppigGeur'];
        $hoppigSmaak = $_POST['hoppigSmaak'];
        $korianderGeur = $_POST['korianderGeur'];
        $korianderSmaak  = $_POST['korianderSmaak'];
        $kruidigSmaak = $_POST['kruidigSmaak'];
        $kruidigGeur = $_POST['kruidigGeur'];
        $kummelGeur = $_POST['kummelGeur'];
        $kummelSmaak = $_POST['kummelSmaak'];
        $melkzuurGeur = $_POST['melkzuurGeur'];
        $melkzuurSmaak = $_POST['melkzuurSmaak'];
        $moutigGeur = $_POST['moutigGeur'];
        $moutigSmaak = $_POST['moutigSmaak'];
        $sherryGeur = $_POST['sherryGeur'];
        $sherrySmaak = $_POST['sherrySmaak'];
        $zoethoutGeur = $_POST['zoethoutGeur'];
        $zoethoutSmaak = $_POST['zoethoutSmaak'];
        $zoetigGeur = $_POST['zoetigGeur'];
        $zoetigSmaak = $_POST['zoetigSmaak'];
        $zoutigGeur = $_POST['zoutigGeur'];
        $zoutigSmaak = $_POST['zoutigSmaak'];
        $waarneembareAndereSmaak = $_POST['waarneembaarAndereSmaak']; 
        $waarneembareAndereGeur = $_POST['waarneembaarAndereGeur'];
        $waarneembareAndere = $_POST['waardeAndere'];
        
        if($aardbeiGeur == '' || $aardbeiSmaak == '' || $ananasGeur == '' || $ananasSmaak == '' || $appelGeur == '' || $appelSmaak == '' || 
          $bosGeur == '' || $bosSmaak == '' || $caramelGeur == '' || $caramelSmaak == '' || $fruitigSmaak == '' || $fruitigGeur == '' || 
          $gebrandGeur == '' || $gebrandSmaak == '' || $gemberGeur == '' || $gemberSmaak == '' || $gistachtigGeur == '' || $gistachtigSmaak == '' || 
          $hogereAlcoholenGeur == '' || $hogereAlcoholenSmaak == '' || $hoppigGeur == '' || $hoppigSmaak == '' || $korianderGeur == '' || $korianderSmaak  == '' || 
          $kruidigSmaak == '' || $kruidigGeur == '' || $kummelGeur == '' || $kummelSmaak == '' || $melkzuurGeur == '' || $melkzuurSmaak == '' || 
          $moutigGeur == '' || $moutigSmaak == '' || $sherrySmaak == '' || $zoethoutGeur == '' || $zoethoutSmaak == '' || $zoetigGeur == '' || $zoetigSmaak == '' || 
          $zoutigGeur == '' || $zoutigSmaak == '') {
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
                toastr["error"]("Gelieve het formulier volledig in te vullen")
                </script>';
        }
        else {
            $query = "CALL beoordeling2('$aardbeiSmaak', '$ananasSmaak', '$appelSmaak', '$bosSmaak', '$caramelSmaak', '$fruitigSmaak', '$gebrandSmaak', 
                '$gemberSmaak', '$gistachtigSmaak', '$hogereAlcoholenSmaak', '$hoppigSmaak', '$korianderSmaak', '$kruidigSmaak', '$kummelSmaak', '$melkzuurSmaak',
                '$moutigSmaak', '$sherrySmaak', '$zoethoutSmaak', '$zoetigSmaak', '$zoutigSmaak', '$waarneembareAndereSmaak', '$waarneembareAndere',
                '$aardbeiGeur', '$ananasGeur', '$appelGeur', '$bosGeur', '$caramelGeur', '$fruitigGeur', '$gebrandGeur', '$gemberGeur',
                '$gistachtigGeur', '$hogereAlcoholenGeur', '$hoppigGeur', '$korianderGeur', '$kruidigGeur', '$kummelGeur', '$melkzuurGeur',
                '$moutigGeur', '$sherryGeur', '$zoethoutGeur', '$zoetigGeur', '$zoutigGeur', '$waarneembareAndereGeur')";
            mysql_query($query) or die ('Error updating' . mysql_error());
            
            $query = "SELECT id FROM smaakneutraal ORDER BY id DESC LIMIT 1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $_SESSION['smaakId'] = $data['id'];
            
            $query = "SELECT id FROM geurneutraal ORDER BY id DESC LIMIT 1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $_SESSION['geurId'] = $data['id'];

            if ($_SESSION['lang'] == "NL")
        	    header("location: beoordeling3.php");
            elseif ($_SESSION['lang'] == "FR")
                header("location: evaluer3.php");
            else
                header("location: evaluation3.php");
        }
    }
?>