<!DOCTYPE html>
<html>
    <head>
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/styles.css" media="screen">
        <link rel="stylesheet" type="text/css" href="../css/grid.css" media="screen">
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
        <link href="../css/main.css" rel="stylesheet" type="text/css">
        <link href="../css/toastr.min.css" rel="stylesheet"/>
        <script src="../js/jquery-2.1.3.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/toastr.min.js"></script>
        <meta charset=utf-16 />
    </head>
    <body>
        <?php
            session_start();
            
            $_SESSION['lang'] = "NL";
            
            include "../php/db_config.php"; // Alle database gegevens
            include "../php/inschrijving1db.php"; //pushen en getten van DB
            
            include "../php/checkDeadline.php";
            checkDeadline();
        ?>
        <div id="wrap">
            <div id="main">
                <div class="container_16">
                    <div class="grid_16">
                        <header><a href="#">
                                <div class="logo">Brouwland Biercompetitie</div>
                            </a></header>
                        <div class="bottles"><img src="../img/pic-bottles.png" class="img-default" alt="Brouwland Biercompetitie">
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
                            <div class="item"><a href="../fr/enregistrement1.php" class="language">FR</a></div>
                            <div class="item"><a href="../en/registration1.php" class="language">ENG</a></div>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="http://www.mijnbier.be/nl/">Home</a></li>  
                    <li class="active"><a href="#">Inschrijven</a></li>
                    <li><a href="http://www.mijnbier.be/nl/competitie-richtlijnen">About</a></li>
                </ul>
            </div>
        </nav>
        <form method="POST" name="inschrijven1">
            <div class="panel panel-default">
                <div class="panel-heading">Informatie team & bier:</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="input-group col-xs-2">
                            <label for="teamName">Teamnaam:</label>
                            <input id="teamName"  name="teamNaam" type="text" class="form-control" placeholder="Teamnaam" required>
                        </div>
                        <div class="input-group col-xs-2">
                            <label>Land:</label>
                            <select id="countries" class="form-control col-xs-2" name="land" required>
                                <option value="">Selecteer land</option>
                                <option value="BE">België/Belgique</option>
                                <option value="DE">Deutschland</option>
                                <option value="FR">France</option>
                                <option value="NL">Nederland</option>
                                <option value="UK">United Kingdom</option>
                            </select>
                        </div>
                        <div class="input-group col-xs-2">
                            <label for="beerName">Biernaam:</label>
                            <input id="beerName" name="bierNaam" type="text" class="form-control" placeholder="Naam van bier" required>
                        </div>
                        <div class="input-group col-xs-2">
                            <label>Type bier:</label>
                            <select id="types" name="types" class="form-control col-xs-2" required>
                                <option value="">Selecteer type</option>
                                <option value="Belgische Pale Ale">Belgische Pale Ale</option>
                                <option value="Dortmunder Export">Dortmunder Export (D)</option>
                                <option value="Kolsch">Kölsch</option>
                                <option value="Munchener Helles">Münchener Helles (D)</option>
                                <option value="Ordinary & Best Bitter">Ordinary & Best Bitter</option>
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
                        <div class="input-group col-xs-2">
                            <label>Categorie:</label>
                            <select id="category" name="category" class="form-control col-xs-2" required>
                                <option value="">Selecteer categorie</option>
                                <option value="H">Beste hobbybier</option>
                                <option value="S">Beste studentenbier</option>
                            </select>
                        </div>
                    </div>
                    <div id="gaVerder">
                        <input type="submit" value="Ga verder" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>