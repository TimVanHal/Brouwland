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
        <script src="../../js/swap.js"></script>
        <meta charset="utf-16" />
    </head>
    <body>
        <?php
            session_start();
            
            $_SESSION['lang'] = "NL";
            
            include "../../php/checkAuth.php";
            checkAuth();
            
            $voorproever = $_SESSION['voorproever'];
            
            include "../../php/db_config.php";
            include "../../php/keurderdb.php";
            mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
            // Het selecteren van de database
            mysql_select_db ($mysql["db"]);
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
                            <div class="item"><a href="../../fr/admin/ajouterJure.php" class="language">FR</a></div>
                            <div class="item"><a href="../../en/admin/addJudge.php" class="language">ENG</a></div>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="http://www.mijnbier.be/nl/">Home</a></li>
                    <li><a href="adminIndex.php">Admin index</a></li>
                    <li><a href="http://www.mijnbier.be/nl/competitie-richtlijnen">About</a></li>
                </ul>
            </div>
        </nav>
        <form method="POST">
            <div class="panel panel-default">
            <div class="panel-heading">Teamleden</div>
                <div class="panel-body">
                    <div class="panel panel-info">
                        <div class="panel-heading">Informatie team en bier</div>
                        <div class="panel-body">
                            <label>Voornaam: </label> 
                                <span id="currentVoornaam">
                                    <?php
                                        $query = "SELECT * FROM voorproever WHERE id='$voorproever'";
                                        $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                        $data = mysql_fetch_assoc($result);
                                        echo $data['voornaam'];
                                    ?>
                                </span>
                                <div class="input-group col-xs-2" id="editVoornaam" style="display:none">
                                    <input type="text" class="form-control" placeholder="Voornaam" id="newVoornaam" name="voornaam">
                                </div>
                                <span id="editBtn1">
                                    <button type="button" onclick="swap('editVoornaam', 'currentVoornaam', 'editBtn1')"><span class="glyphicon glyphicon-edit"></span></button>
                                </span>
                            <br><label>Achternaam: </label>
                                <span id="currentAchternaam">
                                    <?php
                                        echo $data['naam'];
                                    ?>
                                </span>
                                <div class="input-group col-xs-2" id="editAchternaam" style="display:none">
                                    <input type="text" class="form-control" placeholder="Achternaam" id="newAchternaam" name="achternaam">
                                </div>
                                <span id="editBtn2">
                                    <button type="button" onclick="swap('editAchternaam', 'currentAchternaam', 'editBtn2')"><span class="glyphicon glyphicon-edit"></span></button>
                                </span>
                            <br><label>Adres: </label> 
                                <span id="currentAdres">
                                    <?php
                                        $adres = $data['adresId'];
                                        $query = "SELECT * FROM adres WHERE id='$adres'";
                                        $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                        $data1 = mysql_fetch_assoc($result);
                                        echo $data1['straat'] . ' ' . $data1['huisnummer'];
                                    ?>
                                </span>
                                <div class="form-inline" id="editAdres" style="display:none">
                                    <div class="form-group col-xs-9">
                                        <input type="text" class="form-control" id="newStraat" placeholder="Straat" name="straat">
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <input type="number" class="form-control" id="newHuisNr" placeholder="Nr" name="huisnr">
                                    </div>
                                </div>
                                <span id="editBtn3">
                                    <button type="button" onclick="swap('editAdres', 'currentAdres', 'editBtn3')"><span class="glyphicon glyphicon-edit"></span></button>
                                </span>
                            <br><label>Gemeente: </label> 
                                <span id="currentGemeente">
                                    <?php
                                        echo $data1['postcode'] . ' ' . $data1['plaats'];
                                    ?>
                                </span>
                                <div class="form-inline" id="editGemeente" style="display:none">
                                    <div class="form-group col-xs-3">
                                        <input type="number" class="form-control" id="newPostcode" placeholder="Postcode" name="postcode">
                                    </div>
                                    <div class="form-group col-xs-9">
                                        <input type="text" class="form-control" id="newGemeente" placeholder="Gemeente" name="gemeente">
                                    </div>
                                </div>
                                <span id="editBtn4">
                                    <button type="button" onclick="swap('editGemeente', 'currentGemeente', 'editBtn4')"><span class="glyphicon glyphicon-edit"></span></button>
                                </span>
                            <br><label>Land: </label> 
                                <span id="currentLand">
                                    <?php
                                        echo $data1['land'];
                                    ?>
                                </span>
                                <div id="editLand" class="input-group col-xs-2" style="display:none">
                                    <select id="newLand" class="form-control col-xs-2" name="land">
                                        <option value="">Selecteer land</option>
                                        <option value="BE">België/Belgique</option>
                                        <option value="DE">Deutschland</option>
                                        <option value="FR">France</option>
                                        <option value="NL">Nederland</option>
                                        <option value="UK">United Kingdom</option>
                                    </select>
                                </div>
                                <span id="editBtn5">
                                    <button type="button" onclick="swap('editLand', 'currentLand', 'editBtn5')"><span class="glyphicon glyphicon-edit"></span></button>
                                </span>
                        </div>
                    </div>
                    <div id="dienIn">
                        <input type="submit" value="Sla op" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>