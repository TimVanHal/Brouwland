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
            
            $_SESSION['lang'] = "FR";
            
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
                                <div class="logo-fr">Brouwland Competition de biere</div>
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
                            <div class="item"><a href="../nl/inschrijving1.php" class="language">NL</a></div>
                            <div class="item"><a href="../en/registration1.php" class="language">ENG</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="http://www.mijnbier.be/fr/">Home</a></li>
                    <li class="active"><a href="#">Enregistrer</a></li>
                    <li><a href="http://www.mijnbier.be/fr/competition-directives">About</a></li>
                </ul>
            </div>
        </nav>
        <form method="POST" name="inschrijven1">
            <div class="panel panel-default">
                <div class="panel-heading">Information Equipe et Bière:</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="input-group col-xs-2">
                            <label for="teamName">Nom de l'Equipe:</label>
                            <input id="teamName" name="teamNaam" type="text" class="form-control" placeholder="Nom de l'équipe" required>
                        </div>
                        <div class="input-group col-xs-2">
                            <label>Pays:</label>
                            <select id="countries" name="land" class="form-control col-xs-2" required>
                                <option value="">Choissisez votre pays</option>
                                <option value="BE">België/Belgique</option>
                                <option value="DE">Deutschland</option>
                                <option value="FR">France</option>
                                <option value="NL">Nederland</option>
                                <option value="UK">United Kingdom</option>
                            </select>
                        </div>
                        <div class="input-group col-xs-2">
                            <label for="beerName">Nom de Biere:</label>
                            <input id="beerName" name="bierNaam" type="text" class="form-control" placeholder="Nom de Biere" required>
                        </div>
                        <div class="input-group col-xs-2">
                            <label>Type de la biere:</label>
                            <select id="types" name="types" class="form-control col-xs-2" required>
                                <option value="">Choissisez le type préferée</option>
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
                        <div class="input-group col-xs-2">
                                    <label>Catégorie:</label>
                                    <select id="category" name="category" class="form-control col-xs-2" required>
                                        <option value="">Sélectionner une catégorie</option>
                                        <option value="H">Meilleure Bière Amateur</option>
                                        <option value="S">Meilleure Bière Étudiant</option>
                                    </select>
                                </div>
                    </div>
                    <a href="/enregistrement2.php">
                        <input type="submit" value="Continuez" class="btn btn-primary">
                    </a>
                </div>
            </div>
        </form>
    </body>
</html>