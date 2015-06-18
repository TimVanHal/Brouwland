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
            
            $_SESSION['lang'] = "FR";
            
            include "../../php/db_config.php";
            include "../../php/beoordeling3db.php";
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
                            <div class="item"><a href="../../nl/keurder/beoordeling3.php" class="language">NL</a></div>
                            <div class="item"><a href="../../en/judge/evaluation3.php" class="language">ENG</a></div>
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
        <form method="post" action="">
            <div class="panel panel-default">
            <div class="panel-heading">Forme de Juge</div>
                <div class="panel-body">
                    <div class="panel panel-info">
                        <div class="panel-heading">Saveur et Parfum</div>
                        <div class="panel-body">
                            <div class="input-group">
                                <table id="table">
                                    <tr>
                                        <th id="hoofding">Association de Saveur et Parfum</th>
                                        <th colspan="4">Parfum</th>
                                        <th colspan="4">Saveur</th>
                                    </tr>
                                    <tr>
                                        <td id="hoofding"><strong>Défauts - Fautes - Specialités</strong></td>
                                        <td><strong>Faible</strong></td>
                                        <td><strong>Modéré</strong></td>
                                        <td><strong>Fort</strong></td>
                                        <td><strong>Non applicable</strong></td>
                                        <td><strong>Faible</strong></td>
                                        <td><strong>Modéré</strong></td>
                                        <td><strong>Fort</strong></td>
                                        <td><strong>Non applicable</strong></td>
                                    </tr>
                                    <tr>
                                        <td id="hoofding">Acétaldéhyde / pomme vert</td>
                                        <td><input type="radio" name="acetaldehydeGeur" id="acetaldehyde-0" value="1" required></td>
                                        <td><input type="radio" name="acetaldehydeGeur" id="acetaldehyde-1" value="2"></td>
                                        <td><input type="radio" name="acetaldehydeGeur" id="acetaldehyde-2" value="3"></td>
                                        <td><input type="radio" name="acetaldehydeGeur" id="acetaldehyde-3" value="0"></td>
                                        <td><input type="radio" name="acetaldehydeSmaak" id="acetaldehyde-4" value="1" required></td>
                                        <td><input type="radio" name="acetaldehydeSmaak" id="acetaldehyde-5" value="2"></td>
                                        <td><input type="radio" name="acetaldehydeSmaak" id="acetaldehyde-6" value="3"></td>
                                        <td><input type="radio" name="acetaldehydeSmaak" id="acetaldehyde-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="hoofding">Acide acétique</td>
                                        <td><input type="radio" name="azijnzuurGeur" id="azijnzuur-0" value="1" required></td>
                                        <td><input type="radio" name="azijnzuurGeur" id="azijnzuur-1" value="2"></td>
                                        <td><input type="radio" name="azijnzuurGeur" id="azijnzuur-2" value="3"></td>
                                        <td><input type="radio" name="azijnzuurGeur" id="azijnzuur-3" value="0"></td>
                                        <td><input type="radio" name="azijnzuurSmaak" id="azijnzuur-4" value="1" required></td>
                                        <td><input type="radio" name="azijnzuurSmaak" id="azijnzuur-5" value="2"></td>
                                        <td><input type="radio" name="azijnzuurSmaak" id="azijnzuur-6" value="3"></td>
                                        <td><input type="radio" name="azijnzuurSmaak" id="azijnzuur-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="hoofding">Beurre / huile / savonneux</td>
                                        <td><input type="radio" name="boterGeur" id="boter-0" value="1" required></td>
                                        <td><input type="radio" name="boterGeur" id="boter-1" value="2"></td>
                                        <td><input type="radio" name="boterGeur" id="boter-2" value="3"></td>
                                        <td><input type="radio" name="boterGeur" id="boter-3" value="0"></td>
                                        <td><input type="radio" name="boterSmaak" id="boter-4" value="1" required></td>
                                        <td><input type="radio" name="boterSmaak" id="boter-5" value="2"></td>
                                        <td><input type="radio" name="boterSmaak" id="boter-6" value="3"></td>
                                        <td><input type="radio" name="boterSmaak" id="boter-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="hoofding">Brûlant / fumé</td>
                                        <td><input type="radio" name="brandigGeur" id="brandig-0" value="1" required></td>
                                        <td><input type="radio" name="brandigGeur" id="brandig-1" value="2"></td>
                                        <td><input type="radio" name="brandigGeur" id="brandig-2" value="3"></td>
                                        <td><input type="radio" name="brandigGeur" id="brandig-3" value="0"></td>
                                        <td><input type="radio" name="brandigSmaak" id="brandig-4" value="1" required></td>
                                        <td><input type="radio" name="brandigSmaak" id="brandig-5" value="2"></td>
                                        <td><input type="radio" name="brandigSmaak" id="brandig-6" value="3"></td>
                                        <td><input type="radio" name="brandigSmaak" id="brandig-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="hoofding">Chlore</td>
                                        <td><input type="radio" name="chloorGeur" id="chloor-0" value="1" required></td>
                                        <td><input type="radio" name="chloorGeur" id="chloor-1" value="2"></td>
                                        <td><input type="radio" name="chloorGeur" id="chloor-2" value="3"></td>
                                        <td><input type="radio" name="chloorGeur" id="chloor-3" value="0"></td>
                                        <td><input type="radio" name="chloorSmaak" id="chloor-4" value="1" required></td>
                                        <td><input type="radio" name="chloorSmaak" id="chloor-5" value="2"></td>
                                        <td><input type="radio" name="chloorSmaak" id="chloor-6" value="3"></td>
                                        <td><input type="radio" name="chloorSmaak" id="chloor-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="hoofding">DMS / sucre / légumes cuits</td>
                                        <td><input type="radio" name="dmsGeur" id="dms-0" value="1" required></td>
                                        <td><input type="radio" name="dmsGeur" id="dms-1" value="2"></td>
                                        <td><input type="radio" name="dmsGeur" id="dms-2" value="3"></td>
                                        <td><input type="radio" name="dmsGeur" id="dms-3" value="0"></td>
                                        <td><input type="radio" name="dmsSmaak" id="dms-4" value="1" required></td>
                                        <td><input type="radio" name="dmsSmaak" id="dms-5" value="2"></td>
                                        <td><input type="radio" name="dmsSmaak" id="dms-6" value="3"></td>
                                        <td><input type="radio" name="dmsSmaak" id="dms-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="hoofding">Phénols / médicinal / brûlé</td>
                                        <td><input type="radio" name="fenolenGeur" id="fenolen-0" value="1" required></td>
                                        <td><input type="radio" name="fenolenGeur" id="fenolen-1" value="2"></td>
                                        <td><input type="radio" name="fenolenGeur" id="fenolen-2" value="3"></td>
                                        <td><input type="radio" name="fenolenGeur" id="fenolen-3" value="0"></td>
                                        <td><input type="radio" name="fenolenSmaak" id="fenolen-4" value="1" required></td>
                                        <td><input type="radio" name="fenolenSmaak" id="fenolen-5" value="2"></td>
                                        <td><input type="radio" name="fenolenSmaak" id="fenolen-6" value="3"></td>
                                        <td><input type="radio" name="fenolenSmaak" id="fenolen-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="hoofding">Oxydé / cartonneux / moisi</td>
                                        <td><input type="radio" name="geoxideerdGeur" id="geoxideerd-0" value="1" required></td>
                                        <td><input type="radio" name="geoxideerdGeur" id="geoxideerd-1" value="2"></td>
                                        <td><input type="radio" name="geoxideerdGeur" id="geoxideerd-2" value="3"></td>
                                        <td><input type="radio" name="geoxideerdGeur" id="geoxideerd-3" value="0"></td>
                                        <td><input type="radio" name="geoxideerdSmaak" id="geoxideerd-4" value="1" required></td>
                                        <td><input type="radio" name="geoxideerdSmaak" id="geoxideerd-5" value="2"></td>
                                        <td><input type="radio" name="geoxideerdSmaak" id="geoxideerd-6" value="3"></td>
                                        <td><input type="radio" name="geoxideerdSmaak" id="geoxideerd-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="hoofding">Herbeux / de type noix</td>
                                        <td><input type="radio" name="grasachtigGeur" id="grasachtig-0" value="1" required></td>
                                        <td><input type="radio" name="grasachtigGeur" id="grasachtig-1" value="2"></td>
                                        <td><input type="radio" name="grasachtigGeur" id="grasachtig-2" value="3"></td>
                                        <td><input type="radio" name="grasachtigGeur" id="grasachtig-3" value="0"></td>
                                        <td><input type="radio" name="grasachtigSmaak" id="grasachtig-4" value="1" required></td>
                                        <td><input type="radio" name="grasachtigSmaak" id="grasachtig-5" value="2"></td>
                                        <td><input type="radio" name="grasachtigSmaak" id="grasachtig-6" value="3"></td>
                                        <td><input type="radio" name="grasachtigSmaak" id="grasachtig-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="hoofding">Goût léger</td>
                                        <td><input type="radio" name="lichtsmaakGeur" id="lichtsmaak-0" value="1" required></td>
                                        <td><input type="radio" name="lichtsmaakGeur" id="lichtsmaak-1" value="2"></td>
                                        <td><input type="radio" name="lichtsmaakGeur" id="lichtsmaak-2" value="3"></td>
                                        <td><input type="radio" name="lichtsmaakGeur" id="lichtsmaak-3" value="0"></td>
                                        <td><input type="radio" name="lichtsmaakSmaak" id="lichtsmaak-4" value="1" required></td>
                                        <td><input type="radio" name="lichtsmaakSmaak" id="lichtsmaak-5" value="2"></td>
                                        <td><input type="radio" name="lichtsmaakSmaak" id="lichtsmaak-6" value="3"></td>
                                        <td><input type="radio" name="lichtsmaakSmaak" id="lichtsmaak-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="hoofding">Métallique</td>
                                        <td><input type="radio" name="metaalachtigGeur" id="metaalachtig-0" value="1" required></td>
                                        <td><input type="radio" name="metaalachtigGeur" id="metaalachtig-1" value="2"></td>
                                        <td><input type="radio" name="metaalachtigGeur" id="metaalachtig-2" value="3"></td>
                                        <td><input type="radio" name="metaalachtigGeur" id="metaalachtig-3" value="0"></td>
                                        <td><input type="radio" name="metaalachtigSmaak" id="metaalachtig-4" value="1" required></td>
                                        <td><input type="radio" name="metaalachtigSmaak" id="metaalachtig-5" value="2"></td>
                                        <td><input type="radio" name="metaalachtigSmaak" id="metaalachtig-6" value="3"></td>
                                        <td><input type="radio" name="metaalachtigSmaak" id="metaalachtig-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="hoofding">Solvant (acétate d'éthyle)</td>
                                        <td><input type="radio" name="oplos2delGeur" id="oplos2del-0" value="1" required></td>
                                        <td><input type="radio" name="oplos2delGeur" id="oplos2del-1" value="2"></td>
                                        <td><input type="radio" name="oplos2delGeur" id="oplos2del-2" value="3"></td>
                                        <td><input type="radio" name="oplos2delGeur" id="oplos2del-3" value="0"></td>
                                        <td><input type="radio" name="oplos2delSmaak" id="oplos2del-4" value="1" required></td>
                                        <td><input type="radio" name="oplos2delSmaak" id="oplos2del-5" value="2"></td>
                                        <td><input type="radio" name="oplos2delSmaak" id="oplos2del-6" value="3"></td>
                                        <td><input type="radio" name="oplos2delSmaak" id="oplos2del-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="hoofding">De type champignon</td>
                                        <td><input type="radio" name="schimmelachtigGeur" id="schimmelachtig-0" value="1" required></td>
                                        <td><input type="radio" name="schimmelachtigGeur" id="schimmelachtig-1" value="2"></td>
                                        <td><input type="radio" name="schimmelachtigGeur" id="schimmelachtig-2" value="3"></td>
                                        <td><input type="radio" name="schimmelachtigGeur" id="schimmelachtig-3" value="0"></td>
                                        <td><input type="radio" name="schimmelachtigSmaak" id="schimmelachtig-4" value="1" required></td>
                                        <td><input type="radio" name="schimmelachtigSmaak" id="schimmelachtig-5" value="2"></td>
                                        <td><input type="radio" name="schimmelachtigSmaak" id="schimmelachtig-6" value="3"></td>
                                        <td><input type="radio" name="schimmelachtigSmaak" id="schimmelachtig-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="hoofding">De type racine / résineux</td>
                                        <td><input type="radio" name="wortGeur" id="wort-0" value="1" required></td>
                                        <td><input type="radio" name="wortGeur" id="wort-1" value="2"></td>
                                        <td><input type="radio" name="wortGeur" id="wort-2" value="3"></td>
                                        <td><input type="radio" name="wortGeur" id="wort-3" value="0"></td>
                                        <td><input type="radio" name="wortSmaak" id="wort-4" value="1" required></td>
                                        <td><input type="radio" name="wortSmaak" id="wort-5" value="2"></td>
                                        <td><input type="radio" name="wortSmaak" id="wort-6" value="3"></td>
                                        <td><input type="radio" name="wortSmaak" id="wort-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="hoofding">Sulfureux / sulfite</td>
                                        <td><input type="radio" name="zwaveligGeur" id="zwavelig-0" value="1" required></td>
                                        <td><input type="radio" name="zwaveligGeur" id="zwavelig-1" value="2"></td>
                                        <td><input type="radio" name="zwaveligGeur" id="zwavelig-2" value="3"></td>
                                        <td><input type="radio" name="zwaveligGeur" id="zwavelig-3" value="0"></td>
                                        <td><input type="radio" name="zwaveligSmaak" id="zwavelig-4" value="1" required></td>
                                        <td><input type="radio" name="zwaveligSmaak" id="zwavelig-5" value="2"></td>
                                        <td><input type="radio" name="zwaveligSmaak" id="zwavelig-6" value="3"></td>
                                        <td><input type="radio" name="zwaveligSmaak" id="zwavelig-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td>Autre: <input type="text" name="afwijkingenAndere"></td>
                                        <td><input type="radio" name="afwijkingenAndereGeur" id="afwijkingenAndere-0" value="1"></td>
                                        <td><input type="radio" name="afwijkingenAndereGeur" id="afwijkingenAndere-1" value="2"></td>
                                        <td><input type="radio" name="afwijkingenAndereGeur" id="afwijkingenAndere-2" value="3"></td>
                                        <td><input type="radio" name="afwijkingenAndereGeur" id="afwijkingenAndere-3" value="0"></td>
                                        <td><input type="radio" name="afwijkingenAndereSmaak" id="afwijkingenAndere-4" value="1"></td>
                                        <td><input type="radio" name="afwijkingenAndereSmaak" id="afwijkingenAndere-5" value="2"></td>
                                        <td><input type="radio" name="afwijkingenAndereSmaak" id="afwijkingenAndere-6" value="3"></td>
                                        <td><input type="radio" name="afwijkingenAndereSmaak" id="afwijkingenAndere-7" value="0"></td>
                                    </tr>
                                </table>
                            </div>
                            <br><br>
                            <div class="input-group">
                                <label class="control-label">Points de saveur et parfum:</label>
                                <div>
                                    <div class="form-inline">
                                        <div class="form-group col-xs-6">
                                            <input type="number" class="form-control" id="puntenGeur" placeholder="Parfum" min="0" max="25" required>/25
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <input type="number" class="form-control" id="puntensmaak" placeholder="Saveur" min="0" max="15" required>/15
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="dienIn">
                        <input type="submit" value="Continuez" class="btn btn-primary"/>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>