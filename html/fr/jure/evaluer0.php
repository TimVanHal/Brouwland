<!DOCTYPE html>
<html>
    <head>
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../../css/styles.css" media="screen">
        <link rel="stylesheet" type="text/css" href="../../css/grid.css" media="screen">
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/main.css" rel="stylesheet" type="text/css">
        <link href="../../css/toastr.min.css" rel="stylesheet" type"text/css">
        <script src="../../js/jquery-2.1.3.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/toastr.min.js"></script>
        <meta charset=utf-16/>
    </head>
    <body>
        <?php
            session_start();
            
            include "../../php/checkAuth.php";
            checkAuth();

            include "../../php/db_config.php"; // Alle database gegevens
            include "../../php/beoordeling0db.php";
            
            $_SESSION['lang'] = "FR";
        ?>
        <div id="wrap">
            <div id="main">
                <div class="container_16">
                    <div class="grid_16">
                        <header><a href="#">
                                <div class="logo-fr">Brouwland Competition de bière</div>
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
                            <div class="item"><a href="../../nl/keurder/beoordeling0.php" class="language">NL</a></div>
                            <div class="item"><a href="../../en/judge/evaluation0.php" class="language">ENG</a></div>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="http://www.mijnbier.be/fr/">Home</a></li>
                    <li><a href="jureIndex.php">Index juré</a></li>
                    <li><a href="http://www.mijnbier.be/fr/competition-directives">About</a></li>
                    <li class="active"><a href="#">Evaluation</a></li>
                </ul>
            </div>
        </nav>
        <form action="" method="post" id="form">
            <div class="panel panel-default">
                <div class="panel-heading">Choisissez une biere</div>
                <div class="panel-body">
                    <div class="input-group col-xs-2">
                        <label>Numéro de bouteille:</label>
                        <select id="flesnummers" class="form-control col-xs-2" name="flesnummer">
                            <option value="">Choisissez une biere</option>
                            <?php
                                $voorproever = $_SESSION['voorproever'];
                                $sql = "SELECT * FROM beoordeling WHERE voorproeverId = '$voorproever'";
                                $result = mysql_query($sql);
                                
                                while ($row = mysql_fetch_array($result)) {
                                    if($row['presentatieId'] == null && $row['helderheidId'] == null && $row['schuimkraagId'] == null
                                      && $row['geurId'] == null && $row['smaakId'] == null && $row['basissmaakId'] == null
                                      && $row['mondgevoelId'] == null && $row['nasmaakId'] == null && $row['koolzuurId'] == null
                                      && $row['doordrinkbaarheid'] == null && $row['creativiteit'] == null && $row['complexiteit'] == null
                                      && $row['opgegevenType'] == null && $row['balans'] == null){
                                        echo "<option value='" . $row['bierId'] . "'>" . $row['bierId'] . "</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <strong>Avant de commencer l'evaluation, vueillez être sur que vous avez assez de temps pour finir.
                    <br>Ce n'est pas possible de continuer à un autre temps.</strong>
                    <div id="gaVerder">
                        <input type="submit" value="Continuez" class="btn btn-primary"/>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>