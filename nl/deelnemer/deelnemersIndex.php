<!DOCTYPE html>
<html>
    <head>
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../../css/styles.css" media="screen">
        <link rel="stylesheet" type="text/css" href="../../css/grid.css" media="screen">
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/main.css" rel="stylesheet" type="text/css">
        <link href="../../css/toastr.min.css" rel="stylesheet"/>
        <script src="../../js/jquery-2.1.3.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/toastr.min.js"></script>
        <meta charset="utf-16" />
    </head>
    <body>
        <?php
            session_start();
            
            include "../../php/checkAuth.php";
            checkAuth();
            
            include "../../php/db_config.php";

            include "../../php/resultaat.php";
            
            mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
            // Het selecteren van de database
            mysql_select_db ($mysql["db"]);
            
            $_SESSION['lang'] = "NL";
        ?>
        <div id="wrap">
            <div id="main">
                <div class="container_16">
                    <div class="grid_16">
                        <header><a href="#">
                                <div class="logo">Brouwland Biercompetitie</div>
                            </a></header>
                        <div class="bottles"><img src="../../img/pic-bottles.png" class="img-default" alt="Brouwland Biercompetitie">
                        </div>
                        <div id="topbox">
                            <div class="item"><a href="http://www.facebook.com/mijnbier" target="_blank" title="Facebook"><span
                                        class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x fa-inverse"></i><i
                                            class="fa fa-facebook-square fa-stack-1x btn-facebook"></i></span></a></div>
                            <div class="item"><a href="https://twitter.com/MijnEigenBier" target="_blank" title="Twitter"><span
                                        class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x fa-inverse"></i><i
                                            class="fa fa-twitter fa-stack-1x btn-twitter"></i></span></a></div>
                            <div class="item"><a href="http://www.youtube.com/bierbrouwen" target="_blank" title="YouTube"><span
                                        class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x fa-inverse"></i><i
                                            class="fa fa-youtube fa-stack-1x btn-youtube"></i></span></a></div>
                            <div class="item"><a href="../../fr/participant/participantIndex.php" class="language">FR</a></div>
                            <div class="item"><a href="../../en/contender/contenderIndex.php" class="language">ENG</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="http://www.mijnbier.be/nl/">Home</a></li>
                    <li class="active"><a href="#">Deelnemersindex</a></li>
                    <li><a href="http://www.mijnbier.be/nl/competitie-richtlijnen">About</a></li>
                    <li><a href="../logout.php">Afmelden</a></li>
                </ul>
            </div>
        </nav>
        <div class="panel panel-default">
            <div class="panel-heading">Index deelnemers</div>
            <div class="panel-body">
                Wat wilt u doen?
                <ul id="opties">
                    <li><a href="deelnemerspagina1.php">Raadplegen/aanpassen van informatie over teamleden.</a></li>
                    <li><a href="deelnemerspagina2.php">Raadplegen/aanpassen van informatie over het team of het bier.</a></li>
                    <li><?php
                        $url = resultaat();
                        echo "<a href='" . $url . "'>Download hier je resultaat</a>";
                    ?></li>
                    
                    De deadline voor het binnenbrengen van het uw bier is: 
                    <?php
                        $query = "SELECT datum FROM deadlines WHERE voor='indienen bier'";
                        $result = mysql_query($query) or die ('Error updating' . mysql_error());
                        $data = mysql_fetch_assoc($result);
                        echo $data['datum'];
                    ?>
                </ul>
            </div>
        </div>
    </body>
</html>