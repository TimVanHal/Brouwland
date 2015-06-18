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
            
            $team = $_SESSION['team'];
            
            include "../../php/db_config.php";
            include "../../php/deelnemers2db.php";
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
                            <div class="item"><a href="../../fr/participant/pageParticipants2.php" class="language">FR</a></div>
                            <div class="item"><a href="../../en/contender/contenderpage2.php" class="language">ENG</a></div>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="http://www.mijnbier.be/nl/">Home</a></li>
                    <li><a href="deelnemersIndex.php">Deelnemersindex</a></li>
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
                            <label>Teamnaam: </label> 
                                <span id="currentTeamName">
                                    <?php
                                        $query = "SELECT * FROM team WHERE id='$team'";
                                        $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                        $data = mysql_fetch_assoc($result);
                                        echo $data['naam'];
                                    ?>
                                </span>
                                <div class="input-group col-xs-2" id="editTeamName" style="display:none">
                                    <input type="text" class="form-control" placeholder="Teamnaam" id="newTeamName" name="teamNaam">
                                </div>
                                <span id="editBtn1">
                                    <button type="button" onclick="swap('editTeamName', 'currentTeamName', 'editBtn1')"><span class="glyphicon glyphicon-edit"></span></button>
                                </span>
                            <br><label>Land: </label>
                                <span id="currentLang">
                                    <?php
                                        echo $data['taal'];
                                    ?>
                                </span>
                                <div id="editLang" class="input-group col-xs-2" style="display:none">
                                    <select id="newLang" class="form-control col-xs-2" name="taal">
                                        <option value="">Selecteer land</option>
                                        <option value="BE">België/Belgique</option>
                                        <option value="DE">Deutschland</option>
                                        <option value="FR">France</option>
                                        <option value="NL">Nederland</option>
                                        <option value="UK">United Kingdom</option>
                                    </select>
                                </div>
                                <span id="editBtn2">
                                    <button type="button" onclick="swap('editLang', 'currentLang', 'editBtn2')"><span class="glyphicon glyphicon-edit"></span></button>
                                </span>
                            <br><label>Categorie bier: </label>
                                <span id="currentCategory">
                                    <?php
                                        $cat = $data['categorie'];
                                        if($cat == "H")
                                            echo "Beste hobbybier";
                                        else
                                            echo "Beste studentenbier";
                                    ?>
                                </span>
                                <div id="editCategory" class="input-group col-xs-2" style="display:none">
                                    <select id="newCategory" class="form-control col-xs-2" name="category">
                                        <option value="">Selecteer categorie</option>
                                        <option value="H">Beste hobbybier</option>
                                        <option value="S">Beste studentenbier</option>
                                    </select>
                                </div>
                                <span id="editBtn3">
                                    <button type="button" onclick="swap('editCategory', 'currentCategory', 'editBtn3')"><span class="glyphicon glyphicon-edit"></span></button>
                                </span>
                            <br><label>Biernaam: </label>
                                <span id="currentBeerName">
                                    <?php
                                        $query = "SELECT * FROM bier WHERE teamId='$team'";
                                        $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                        $data1 = mysql_fetch_assoc($result);
                                        echo $data1['naam'];
                                    ?>
                                </span>
                                <div class="input-group col-xs-2" id="editBeerName" style="display:none">
                                    <input type="text" class="form-control" placeholder="Biernaam" id="newBeerName" name="bierNaam">
                                </div>
                                <span id="editBtn4">
                                    <button type="button" onclick="swap('editBeerName', 'currentBeerName', 'editBtn4')"><span class="glyphicon glyphicon-edit"></span></button>
                                </span>
                            <br><label>Type bier: </label>
                                <span id="currentType">
                                    <?php
                                        echo $data1['soort'];
                                    ?>
                                </span>
                                <div id="editType" class="input-group col-xs-2" style="display:none">
                                    <select id="newType" class="form-control col-xs-2" name="type">
                                        <option value="">Selecteer type</option>
                                        <option value="Belgische Pale Ale">Belgische Pale Ale</option>
                                        <option value="Dortmunder Export">Dortmunder Export (D)</option>
                                        <option value="Kolsch">Kölsch</option>
                                        <option value="Munchener Helles">Münchener Helles (D)</option>
                                        <option value="Ordinare & Best Bitter">Ordinary & Best Bitter</option>
                                        <option value="Oud Geuze-Lambiek">Oud Geuze-Lambiek</option>
                                        <option value="Pale Ale">Pale Ale (GB)</option>
                                        <option value="Pilsener">Pilsener</option>
                                        <option value="Saison">Saison (B)</option>
                                        <option value="Traditionele Lambiek">Traditionele Lambiek</option>
                                        <option value="Weizen">Weizen</option>
                                        <option value="Witbier">Witbier</option>
                                        <option value="Brown Ale">Brown Ale</option>
                                        <option value="Brown Porter">Brown Porter</option>
                                        <option value="Dunkel Weizen">Dunkel Weizen</option>
                                        <option value="Fruitlambiek">Fruitlambiek</option>
                                        <option value="Irish Dry Stout">Irish Dry Stout</option>
                                        <option value="Milk Stout">Milk Stout</option>
                                        <option value="Oud Bruin">Oud Bruin (NL)</option>
                                        <option value="Rauchbier">Rauchbier</option>
                                        <option value="Schwarzbier">Schwarzbier</option>
                                        <option value="Vlaams Bruin">Vlaams Bruin (B)</option>
                                        <option value="Vlaams Rood">Vlaams Rood (B)</option>
                                        <option value="Licht Dubbelbock">Licht Dubbelbock</option>
                                    </select>
                                </div>
                                <span id="editBtn5">
                                    <button type="button" onclick="swap('editType', 'currentType', 'editBtn5')"><span class="glyphicon glyphicon-edit"></span></button>
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