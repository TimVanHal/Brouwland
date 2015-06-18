<?php
    session_start();
    include "db_config.php";
    // De verbinding met de database
    mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
    // Het selecteren van de database
    mysql_select_db ($mysql["db"]);
    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //teamkapitein
        $voornaam1 = $_POST["voornaam1"];
        $achternaam1 = $_POST["achternaam1"];
        $straat1 = $_POST["straat1"];
        $huisnr1 = $_POST["huisnr1"];
        $postcode1 = $_POST["postcode1"];
        $gemeente1 = $_POST["gemeente1"];
        $land1 = $_POST["land1"];
        $telefoon1 = $_POST["telefoon1"];
        $geslacht1 = $_POST["geslacht1"];
        $email1 = $_POST["email1"];
        $paswoord = $_POST["paswoord1"];
        //reservekapitein
        $voornaam2 = $_POST["voornaam2"];
        $achternaam2 = $_POST["achternaam2"];
        $straat2 = $_POST["straat2"];
        $huisnr2 = $_POST["huisnr2"];
        $postcode2 = $_POST["postcode2"];
        $gemeente2 = $_POST["gemeente2"];
        $land2 = $_POST["land2"];
        $telefoon2 = $_POST["telefoon2"];
        $geslacht2 = $_POST["geslacht2"];
        $email2 = $_POST["email2"];

        
        if ($voornaam1 == '' || $achternaam1 == '' || $straat1 == '' || $huisnr1 == '' || $postcode1 == '' || $gemeente1 == '' || $land1 == '' || $telefoon1 == '' || $geslacht1 == '' || $email1 == '' || $paswoord == '' 
          || $voornaam2 == '' || $achternaam2 == '' || $straat2 == '' || $huisnr2 == '' || $postcode2 == '' || $gemeente2 == '' || $land2 == '' || $telefoon2 == '' || $geslacht2 == '' || $email2 == ''
          ) {
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
            $_SESSION['voornaam1'] = $voornaam1;
            $_SESSION["achternaam1"] = $achternaam1;
            $_SESSION["straat1"] = $straat1;
            $_SESSION["huisnr1"] = $huisnr1;
            $_SESSION["postcode1"] = $postcode1;
            $_SESSION["gemeente1"] = $gemeente1;
            $_SESSION["land1"] = $land1;
            $_SESSION["telefoon1"] = $telefoon1;
            $_SESSION["geslacht1"] = $geslacht1;
            $_SESSION["email1"] = $email1;
            $_SESSION["paswoord1"] = $paswoord;
            //reservekapitein
            $_SESSION["voornaam2"] = $voornaam2;
            $_SESSION["achternaam2"] = $achternaam2;
            $_SESSION["straat2"] = $straat2;
            $_SESSION["huisnr2"] = $huisnr2;
            $_SESSION["postcode2"] = $postcode2;
            $_SESSION["gemeente2"] = $gemeente2;
            $_SESSION["land2"] = $land2;
            $_SESSION["telefoon2"] = $telefoon2;
            $_SESSION["geslacht2"] = $geslacht2;
            $_SESSION["email2"] = $email2;
            //lid 3
            $_SESSION['voornaam3'] = $_POST["voornaam3"];
            $_SESSION['achternaam3'] = $_POST["achternaam3"];
            $_SESSION['email3'] = $_POST["email3"];
            $_SESSION['geslacht3'] = $_POST["geslacht3"];
            //lid 4
            $_SESSION['voornaam4'] = $_POST["voornaam4"];
            $_SESSION['achternaam4'] = $_POST["achternaam4"];
            $_SESSION['email4'] = $_POST["email4"];
            $_SESSION['geslacht4'] = $_POST["geslacht4"];
            //lid 5
            $_SESSION['voornaam5'] = $_POST["voornaam5"];
            $_SESSION['achternaam5'] = $_POST["achternaam5"];
            $_SESSION['email5'] = $_POST["email5"];
            $_SESSION['geslacht5'] = $_POST["geslacht5"];
            //lid 6
            $_SESSION['voornaam6'] = $_POST["voornaam6"];
            $_SESSION['achternaam6'] = $_POST["achternaam6"];
            $_SESSION['email6'] = $_POST["email6"];
            $_SESSION['geslacht6'] = $_POST["geslacht6"];
            //lid 7
            $_SESSION['voornaam7'] = $_POST["voornaam7"];
            $_SESSION['achternaam7'] = $_POST["achternaam7"];
            $_SESSION['email7'] = $_POST["email7"];
            $_SESSION['geslacht7'] = $_POST["geslacht7"];
            //lid 8
            $_SESSION['voornaam8'] = $_POST["voornaam8"];
            $_SESSION['achternaam8'] = $_POST["achternaam8"];
            $_SESSION['email8'] = $_POST["email8"];
            $_SESSION['geslacht8'] = $_POST["geslacht8"];
            
        	if ($_SESSION['lang'] == "NL")
        	    header("location: inschrijving3.php");
            else if ($_SESSION['lang'] == "FR")
                header("location: enregistrement3.php");
            else
                header("location: registration3.php");
        }
    }
?>