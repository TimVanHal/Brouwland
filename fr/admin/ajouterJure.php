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
            
            $_SESSION['lang'] = "FR";
            
            include "../../php/db_config.php"; // Alle database gegevens
            include "../../php/jurylidToevoegendb.php";
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
                            <div class="item"><a href="../../nl/admin/keurderToevoegen.php" class="language">NL</a></div>
                            <div class="item"><a href="../../en/admin/addJudge.php" class="language">ENG</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="http://www.mijnbier.be/fr/">Home</a></li>
                    <li><a href="adminIndex.php">Admin index</a></li>
                    <li><a href="http://www.mijnbier.be/fr/competition-directives">About</a></li>
                    <li><a href="../logout.php">Délogger</a></li>
                </ul>
            </div>
        </nav>
        <form method="POST">
            <div class="panel panel-default">
            <div class="panel-heading">Ajouter un(e) juré(e)</div>
                <div class="panel-body">
                    <div class="input-group col-xs-2">
                        <label>Prénom:</label>
                        <input type="text" class="form-control" placeholder="Prénom" id="voornaam" name="voornaam" required>
                    </div>
                    <div class="input-group col-xs-2">
                        <label>Nom:</label>
                        <input type="text" class="form-control" placeholder="Nom" id="achternaam" name="achternaam" required>
                    </div>
                    <div class="input-group col-xs-2">
                        <label>E-mail:</label>
                        <input type="email" class="form-control" placeholder="E-mail" id="email" name="email" required>
                    </div>
                    <div class="input-group">
                        <label class="control-label">Adresse:</label>
                        <div>
                            <div class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="straat" placeholder="Rue" name="straat" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="huisNr" placeholder="Nr" name="huisnr" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <label class="control-label">Commune:</label>
                        <div>
                            <div class="form-group col-xs-4">
                                <input type="text" class="form-control" id="postcode" placeholder="Code postal" name="postcode" required>
                            </div>
                            <div class="form-group col-xs-8">
                                <input type="text" class="form-control" placeholder="Commune" id="gemeente" name="gemeente" required>
                            </div>
                        </div>
                    </div>
                    <div class="input-group col-xs-2">
                        <label>Pays:</label>
                        <select id="land" class="form-control col-xs-2" name="land" required>
                            <option value="">Selectionnez pays</option>
                            <option value="België/Belgique">België/Belgique</option>
                            <option value="Deutschland">Deutschland</option>
                            <option value="France">France</option>
                            <option value="Nederland">Nederland</option>
                            <option value="United Kingdom">United Kingdom</option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="dienIn">
                <input type="submit" value="Sauvegardez" class="btn btn-primary"/>
            </div>
        </form>
    </body>
</html>