<?php
    function logout_function(){
        session_start();
        
        $_SESSION['auth'] = "";
        $_SESSION['user'] = "";
        $_SESSION['team'] = "";
        $_SESSION['voorproever'] = "";
    }
?>