<?php
// De verbinding met de database
    session_start();
    include "../php/db_config.php"; // Alle database gegevens
    mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
    // Het selecteren van de database
    mysql_select_db ($mysql["db"]);
    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $teamnaam = $_POST["teamNaam"];
        $land = $_POST["land"];
        $biernaam = $_POST["bierNaam"];
        $typeBier = $_POST["types"];
        $categorie = $_POST["category"];
        
        if ($teamnaam == '' || $land == '' || $biernaam == '' || $typeBier == '' || $categorie == '') {
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
                toastr["error"]("S&#39;il vous plaît compléter le formulaire entièrement!")
                toastr["error"]("Please complete the form!")
                </script>';
        }
        else {
            
            $_SESSION['teamnaam'] = $teamnaam;
            $_SESSION['land'] = $land;
            $_SESSION['biernaam'] = $biernaam;
            $_SESSION['typeBier'] = $typeBier;
            $_SESSION['categorie'] = $categorie;
            
        	if ($_SESSION['lang'] == "NL")
        	    header("location: inschrijving2.php");
            else if ($_SESSION['lang'] == "FR")
                header("location: enregistrement2.php");
            else
                header("location: registration2.php");
        }
    }
?>