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
            
            include "../../php/db_config.php";
            include "../../php/beoordeling0db.php";// Alle database gegevens
            
            $_SESSION['lang'] = "EN";
        ?>
        <div id="wrap">
            <div id="main">
                <div class="container_16">
                    <div class="grid_16">
                        <header><a href="#">
                                <div class="logo-en">Brouwland Beer Competition</div>
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
                            <div class="item"><a href="../../fr/jure/evaluer0.php" class="language">FR</a></div>
                            <div class="item"><a href="../../nl/keurder/beoordeling0.php" class="language">NL</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="http://www.mijnbier.be">Home</a></li>
                    <li><a href="judgeIndex.php">Judge index</a></li>
                    <li><a href="http://www.mijnbier.be/nl/competitie-richtlijnen">About</a></li>
                    <li class="active"><a href="#">Evaluation</a></li>
                </ul>
            </div>
        </nav>
        <form method="POST" id="form">
            <div class="panel panel-default">
                <div class="panel-heading">Select beer</div>
                <div class="panel-body">
                    <div class="input-group col-xs-2">
                        <label>Bottle number:</label>
                        <select id="flesnummers" class="form-control col-xs-2" name="flesnummer">
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
                    <strong>Before continuing, please be sure are able to finish the evaluation.
                    <br>It is not possible to resume the evaluation at a later time.</strong>
                    <div id="gaVerder">
                        <input type="submit" value="Continue" class="btn btn-primary"/>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>