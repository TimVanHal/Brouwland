<?php
    session_start();
    include "db_config.php"; // Alle database gegevens
    
    // De verbinding met de database
    mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
    // Het selecteren van de database
    mysql_select_db ($mysql["db"]);
    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $datum = $_POST["datum"];
        $aantal = $_POST["aantal"];
        
        if($_POST["gelezen"] == "0"){
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
            toastr["error"]("Gelieve het reglement te accepteren!")
            toastr["error"]("S&#39;il vous plaît accepter le reglement!")
            toastr["error"]("Please accept the terms of agreement!")
            </script>';
        }
        else {
            //pagina 1 inschrijving
            $teamnaam = $_SESSION['teamnaam'];
            $land = $_SESSION['land'];
            $biernaam = $_SESSION['biernaam'];
            $typeBier = $_SESSION['typeBier'];
            $categorie = $_SESSION['categorie'];
            $query = "CALL inschrijving1('$teamnaam', '$land', '$categorie', '$typeBier', '$biernaam')";
            mysql_query($query) or die ('Error updating' . mysql_error());
            
            $teamid = mysql_query("SELECT id FROM team ORDER BY id DESC LIMIT 1");
            $row = mysql_fetch_row($teamid);
            $teamid = $row[0];
            
            //pagina 2 inschrijving
            $voornaam1 = $_SESSION["voornaam1"];
            $achternaam1 = $_SESSION["achternaam1"];
            $straat1 = $_SESSION["straat1"];
            $huisnr1 = $_SESSION["huisnr1"];
            $postcode1 = $_SESSION["postcode1"];
            $gemeente1 = $_SESSION["gemeente1"];
            $land1 = $_SESSION["land1"];
            $telefoon1 = $_SESSION["telefoon1"];
            $geslacht1 = $_SESSION["geslacht1"];
            $email1 = $_SESSION["email1"];
            $paswoord = $_SESSION["paswoord1"];
            $voornaam2 = $_SESSION["voornaam2"];
            $achternaam2 = $_SESSION["achternaam2"];
            $straat2 = $_SESSION["straat2"];
            $huisnr2 = $_SESSION["huisnr2"];
            $postcode2 = $_SESSION["postcode2"];
            $gemeente2 = $_SESSION["gemeente2"];
            $land2 = $_SESSION["land2"];
            $telefoon2 = $_SESSION["telefoon2"];
            $geslacht2 = $_SESSION["geslacht2"];
            $email2 = $_SESSION["email2"];
            $hash_paswoord = crypt($paswoord);
            //kapiteins
            $query = "CALL inschrijving2('$straat1', '$huisnr1', '$postcode1','$gemeente1','$land1', '$teamid', 
                '$voornaam1', '$achternaam1', '$telefoon1', '$geslacht1', '$email1', '$hash_paswoord', '$straat2', '$huisnr2', '$postcode2',
                '$gemeente2', '$land2', '$voornaam2', '$achternaam2', '$telefoon2', '$geslacht2', '$email2')";
            mysql_query($query) or die ('Error updating' . mysql_error());
            //lid 3
            $voornaam3 = $_SESSION["voornaam3"];
            if(!$voornaam3 == ''){
                $achternaam3 = $_SESSION["achternaam3"];
                $email3 = $_SESSION["email3"];
                $geslacht3 = $_SESSION["geslacht3"];
                $query3 = "CALL teamlid('$teamid', '$voornaam3', '$achternaam3', '$geslacht3', '$email3')";
                mysql_query($query3) or die ('Error updating' . mysql_error());
                //lid4
                $voornaam4 = $_SESSION["voornaam4"];
                if(!$voornaam4 == ''){
                    $achternaam4 = $_SESSION["achternaam4"];
                    $email4 = $_SESSION["email4"];
                    $geslacht4 = $_SESSION["geslacht4"];
                    $query4 = "CALL teamlid('$teamid', '$voornaam4', '$achternaam4', '$geslacht4', '$email4')";
                    mysql_query($query4) or die ('Error updating' . mysql_error());
                    //lid5
                    $voornaam5 = $_SESSION["voornaam5"];
                    if(!$voornaam5 == ''){
                        $achternaam5 = $_SESSION["achternaam5"];
                        $email5 = $_SESSION["email5"];
                        $geslacht5 = $_SESSION["geslacht5"];
                        $query5 = "CALL teamlid('$teamid', '$voornaam5', '$achternaam5', '$geslacht5', '$email5')";
                        mysql_query($query5) or die ('Error updating' . mysql_error());
                        //lid6
                        $voornaam6 = $_SESSION["voornaam6"];
                        if(!$voornaam6 == ''){
                            $achternaam6 = $_SESSION["achternaam6"];
                            $email6 = $_SESSION["email6"];
                            $geslacht6 = $_SESSION["geslacht6"];
                            $query6 = "CALL teamlid('$teamid', '$voornaam6', '$achternaam6', '$geslacht6', '$email6')";
                            mysql_query($query6) or die ('Error updating' . mysql_error());
                            //lid7
                            $voornaam7 = $_SESSION["voornaam7"];
                            if(!$voornaam7 == ''){
                                $achternaam7 = $_SESSION["achternaam7"];
                                $email7 = $_SESSION["email7"];
                                $geslacht7 = $_SESSION["geslacht7"];
                                $query7 = "CALL teamlid('$teamid', '$voornaam7', '$achternaam7', '$geslacht7', '$email7')";
                                mysql_query($query7) or die ('Error updating' . mysql_error());
                                //lid8
                                $voornaam8 = $_SESSION["voornaam8"];
                                if(!$voornaam8 == ''){
                                    $achternaam8 = $_SESSION["achternaam8"];
                                    $email8 = $_SESSION["email8"];
                                    $geslacht8 = $_SESSION["geslacht8"];
                                    $query8 = "CALL teamlid('$teamid', '$voornaam8', '$achternaam8', '$geslacht8', '$email8')";
                                    mysql_query($query8) or die ('Error updating' . mysql_error());
                                }
                            }
                        }
                    }
                }
            }
            
            //pagina 3 inschrijving
            if($datum == '' || $aantal == ''){
                if ($_SESSION['lang'] == "NL")
            	    header("location: inschrijvingCompleet.php");
                else if ($_SESSION['lang'] == "FR")
                    header("location: enregistrementComplete.php");
                else
                    header("location: registrationComplete.php");
            }
            else{
                $query = "INSERT INTO cursussen(teamid, aantal, datum) VALUES ($teamid, '$aantal', '$datum')";
                mysql_query($query) or die ('Error updating' . mysql_error());
                
                if ($_SESSION['lang'] == "NL")
            	    header("location: inschrijvingCompleet.php");
                else if ($_SESSION['lang'] == "FR")
                    header("location: enregistrementComplete.php");
                else
                    header("location: registrationComplete.php");
            }
            
            //emailbevestiging
            if ($_SESSION['lang'] == "NL"){
        	    header("location: inschrijvingCompleet.php");
        	    mail($email1, 'Bedankt voor de inschrijving', 'U heeft zich succesvol ingeschreven op de wedstrijd.\r\nU kan zich aanmelden op http://193.191.187.253:8051/nl/login.php');
            }
            else if ($_SESSION['lang'] == "FR"){
                header("location: enregistrementComplete.php");
                mail($email1, 'Merci de vous inscrire', 'Vous avez signé avec succès pour le concours.\r\nVous pouvez vous connecter http://193.191.187.253:8051/fr/login.php');   
            }
            else{
                header("location: registrationComplete.php");
                mail($email1, 'Thanks for registering', 'You have succesfully entered the competition.\r\nYou can login at http://193.191.187.253:8051/en/login.php');   
            }
        }
    }
?>