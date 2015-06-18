<?php
    session_start();
    include "db_config.php";
    
    // De verbinding met de database
    mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
    // Het selecteren van de database
    mysql_select_db ($mysql["db"]);
    
    $bier = $_SESSION['bier'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $doordrinkbaarheid = $_POST['doordrinkbaarheid'];
        $balans = $_POST['balans'];
        $bitterness = $_POST['bitterness'];
        $sweetness = $_POST['sweetness'];
        $acidness = $_POST['acidness'];
        $saltiness = $_POST['saltiness'];
        $carbonic = $_POST['carbonic'];
        $dryness = $_POST['dryness'];
        $metallic = $_POST['metallic'];
        $stickyness = $_POST['stickyness'];
        $constrict = $_POST['constrict'];
        $greasyness = $_POST['greasyness'];
        $alcoholic = $_POST['alcoholic'];
        $bitter = $_POST['bitter'];
        $burning = $_POST['burning'];
        $caramel = $_POST['caramel'];
        $liquorice = $_POST['liquorice'];
        $fruity = $_POST['fruity'];
        $burned = $_POST['burned'];
        $yeast = $_POST['yeast'];
        $spicy = $_POST['spicy'];
        $medicinal = $_POST['medicinal'];
        $metal = $_POST['metal'];
        $sweet = $_POST['sweet'];
        $salt = $_POST['salt'];
        $acid = $_POST['acid'];
        $creativiteit = $_POST['creativiteit'];
        $complexiteit = $_POST['complexiteit'];
        $type = $_POST['type'];
        $basissmaak = $_POST['puntenBasissmaak'];
        $nasmaak = $_POST['puntenNasmaak'];
        $mondgevoel = $_POST['puntenMondgevoel'];
        if ($doordrinkbaarheid == '' || $balans == '' || $bitterness == '' || $sweetness == '' || $acidness == '' ||
            $saltiness == '' || $carbonic == '' || $dryness == '' || $metallic == '' || $stickyness == '' ||
            $constrict == '' || $greasyness == '' || $alcoholic == '' || $bitter == '' || $burning == '' ||
            $caramel == '' || $liquorice == '' || $fruity == '' || $burned == '' || $yeast == '' ||
            $spicy == '' || $medicinal == '' || $metal == '' || $sweet == '' ||
            $salt == '' || $acid == '' || $creativiteit == '' || $complexiteit == '' || $type == '' ||
            $basissmaak == '' || $nasmaak == '' || $mondgevoel == '')
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
            
        
        $query = "INSERT INTO basissmaak(punten, bitter, zoet, zuur, zout) VALUES ('$basissmaak', '$bitterness', '$sweetness', '$acidness', '$saltiness')";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $query = "INSERT INTO mondgevoel(punten, koolzuur, droog, metaalachtig, plakkerig, samentrekken, vettig) VALUES ('$mondgevoel', '$carbonic', '$dryness', '$metal', '$stickyness', '$constrict', '$greasyness')";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $query = "INSERT INTO nasmaak(punten, alcohol, bitter, branderig, caramel, dropsmaak, fruitig, gebrand, gist, kruidig, medicinaal, metaalachtig, zoet, zout, zuur)
                VALUES ('$nasmaak', '$alcoholic', '$bitter', '$burning', '$caramel', '$liquorice', '$fruity', '$burned', '$yeast', '$spicy', '$medicinal', '$metal', '$sweet', '$salt', '$acid')";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $query = "SELECT id FROM basissmaak ORDER BY id DESC LIMIT 1";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $basisId = $data['id'];
        $query = "SELECT id FROM mondgevoel ORDER BY id DESC LIMIT 1";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $mondId = $data['id'];
        $query = "SELECT id FROM nasmaak ORDER BY id DESC LIMIT 1";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $nasmaakId = $data['id'];
        
        $voorproever = $_SESSION["voorproever"];
        $bierId = $_SESSION['bierId'];
        $query = "UPDATE beoordeling SET doordrinkbaarheid = '$doordrinkbaarheid', balans= '$balans', creativiteit = '$creativiteit', 
                complexiteit = '$complexiteit', opgegevenType = '$type', basissmaakId = '$basisId', mondgevoelId = '$mondId', nasmaakId = '$nasmaakId' 
                WHERE voorproeverId = $voorproever AND bierId = $bierId";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        
        if ($_SESSION['lang'] == "NL")
	        header("location: beoordelingCompleet.php");
        elseif ($_SESSION['lang'] == "FR")
            header("location: evaluerComplete.php");
        else
            header("location: evaluationComplete.php");
        die();
        }
    }
?>