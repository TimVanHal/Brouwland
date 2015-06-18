<?php
    function checkAuth() {

        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        
        if(strpos($url, 'admin') !== false){
            if($_SESSION['auth'] != "ADMINOKBROUWLAND"){
                header("location: ../../errors/401.html");
            }
        }
        elseif(strpos($url, 'deelnemer') !== false || strpos($url, 'participant') !== false || strpos($url, 'contender') !== false){
            if($_SESSION['auth'] != "TEAMLIDOK"){
                header("location: ../../errors/401.html");
            }
        }
        elseif(strpos($url, 'keurder') !== false || strpos($url, 'jure') !== false || strpos($url, 'judge') !== false){
            if($_SESSION['auth'] != "JURYLIDOK"){
                header("location: ../../errors/401.html");
            }
        }
    }
?>