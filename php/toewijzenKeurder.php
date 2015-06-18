<?php
    session_start();
    
    include "db_config.php";
    mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
    // Het selecteren van de database
    mysql_select_db ($mysql["db"]);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $bierId = $_POST['bier'];
        $voorproeverId = $_POST['keurder'];  
        if ($bierId == '' || $voorproeverId == '')
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
            $query = "CALL toewijzen_keurder('$bierId', '$voorproeverId')";
            mysql_query($query) or die ('Error updating' . mysql_error());
        }
    }
    
?>