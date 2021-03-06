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
        <meta charset=utf-16 />
    </head>
    <body>
        <?php
            session_start();
            
            include "../../php/checkAuth.php";
            checkAuth();
            
            $_SESSION['lang'] = "EN";
            
            $team = $_SESSION['team'];
            
            include "../../php/db_config.php"; // Alle database gegevens
            include "../../php/teamliddb.php";
        ?>
        <div id="wrap">
            <div id="main">
                <div class="container_16">
                    <div class="grid_16">
                        <header><a href="#">
                                <div class="logo-en">Brouwland Biercompetition</div>
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
                            <div class="item"><a href="../../fr/participant/membre.php" class="language">FR</a></div>
                            <div class="item"><a href="../../nl/deelnemer/teamlid.php" class="language">NL</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="http://www.mijnbier.be">Home</a></li>
                    <li><a href="contenderIndex.php">Contender index</a></li>
                    <li><a href="http://www.mijnbier.be/nl/competitie-richtlijnen">About</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
        <form method="POST">
            <div class="panel panel-default">
            <div class="panel-heading">Add your team member.</div>
                <div class="panel-body">
                    <div class="input-group col-xs-2">
                        <label>First name:</label>
                        <input type="text" class="form-control" placeholder="First name" id="voornaam" name="newVoornaam" required>
                    </div>
                    <div class="input-group col-xs-2">
                        <label>Last name:</label>
                        <input type="text" class="form-control" placeholder="Last name" id="achternaam" name="newAchternaam" required>
                    </div>
                    <div class="input-group col-xs-2">
                        <label>E-mail:</label>
                        <input type="email" class="form-control" placeholder="E-mail" id="email" name="newEmail" required>
                    </div>
                    <label>Gender:</label>
                        <input type="radio" name="newGeslacht" id="geslacht-0" value="m" required>Male
                        <input type="radio" name="newGeslacht" id="geslacht-1" value="v">Female
                </div>
            </div>
            <div id="dienIn">
                <input type="submit" value="Save" class="btn btn-primary"/>
            </div>
        </form>
    </body>
</html>