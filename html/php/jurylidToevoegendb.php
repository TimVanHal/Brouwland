<?php
    session_start();
    include "db_config.php";
    // De verbinding met de database
    mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
    // Het selecteren van de database
    mysql_select_db ($mysql["db"]);
    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $voornaam = $_POST["voornaam"];
        $achternaam = $_POST["achternaam"];
        $email = $_POST["email"];
        $straat = $_POST["straat"];
        $huisnr = $_POST["huisnr"];
        $postcode = $_POST["postcode"];
        $gemeente = $_POST["gemeente"];
        $land = $_POST["land"];
        
        if ($voornaam == '' || $achternaam == '' || $email == '' || $straat == '' || $huisnr == '' || $postcode == '' || $gemeente == '' || $land == '') {
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
            
            $hash_paswoord = crypt("P4ssword"); 
            
            $query = "INSERT INTO adres(straat, huisnummer, postcode, plaats, land) VALUES ('$straat', '$huisnr', '$postcode','$gemeente','$land')";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "SELECT * FROM adres ORDER BY id DESC LIMIT 1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $adresId = $data['id'];
            $query = "INSERT INTO users(email, paswoord, jury) VALUES ('$email', '$hash_paswoord', 1)";
            mysql_query($query) or die ('Error updating' . mysql_error());
            $query = "SELECT * FROM users ORDER BY userId DESC LIMIT 1";
            $result = mysql_query($query) or die ('Error updating' . mysql_error());
            $data = mysql_fetch_assoc($result);
            $userId = $data['userId'];
            $query = "INSERT INTO voorproever(voornaam, naam, adresId, userId) VALUES ('$voornaam', '$achternaam', '$adresId', '$userId')";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
    }
?>