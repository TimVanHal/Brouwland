<?php
    session_start();
    include "db_config.php";
    // De verbinding met de database
    mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
    // Het selecteren van de database
    mysql_select_db ($mysql["db"]);
    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $voornaamNew = $_POST["newVoornaam"];
        $achternaamNew = $_POST["newAchternaam"];
        $emailNew = $_POST["newEmail"];
        $geslachtNew = $_POST["newGeslacht"];
        
        if ($voornaamNew == '' || $achternaamNew == '' || $emailNew == '' || $geslachtNew == '') {
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
            $team = $_SESSION['team'];
            
            $query = "CALL teamlid('$team', '$voornaamNew', '$achternaamNew', '$geslachtNew', '$emailNew')";
            mysql_query($query) or die ('Error updating' . mysql_error());
            
            if($_SESSION['auth'] == "TEAMLIDOK"){
                if ($_SESSION['lang'] == "NL")
            	    header("location: deelnemerspagina1.php");
                else if ($_SESSION['lang'] == "FR")
                    header("location: pageParticipants1.php");
                else
                    header("location: contenderpage1.php");
            }
            else if($_SESSION['auth'] == "ADMINOKBROUWLAND"){
            	header("location: adminIndex.php");
            }
        }
    }
?>