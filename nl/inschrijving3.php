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
        <meta charset="utf-16" />
    </head>
    <body>
        <?php
            session_start();
            
            $_SESSION['lang'] = "NL";
            
            include "../php/db_config.php"; // Alle database gegevens
            include "../php/inschrijving3db.php";
            
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
                            <div class="item"><a href="../fr/enregistrement3.php" class="language">FR</a></div>
                            <div class="item"><a href="../en/registration3.php" class="language">ENG</a></div>
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
        <form method="POST" name="inschrijven3">
            <div class="panel panel-default">
                <div class="panel-heading">Inschrijving cursus:</div>
                <div class="panel-body">
                    <div class="input-group col-xs-2">
                        <label>Datum:</label>
                            <select id="cursusdata" class="form-control col-xs-2" name="datum">
                                <option value="">Selecteer datum</option>
                                <?php
                                    $sql = "SELECT datum FROM cursusDagen";
                                    $result = mysql_query($sql);
                                    
                                    while ($row = mysql_fetch_array($result)) {
                                        echo "<option value='" . $row['datum'] . "'>" . $row['datum'] . "</option>";
                                    }
                                ?>
                            </select>
                    </div>
                    <div class="input-group col-xs-2">
                        <label>Aantal personen:</label>
                        <select id="aantalpers" class="form-control col-xs-2" name="aantal">
                            <option value="">Selecteer aantal</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Wedstrijdvoorwaarden:</div>
                <div class="panel-body">
                    Ik, de teamkapitein, verklaar hierbij dat wij als team het 
                        <a id="voorwaarden" href="http://mijnbier.be/downloads/Wedstrijdreglement-BBC2015-nl.pdf" target="_blank">algemene wedstrijdregelement</a>
                    van de Brouwland Biercompetitie hebben gelezen en hiermee akkoord gaan.
                    <div class="checkbox">
                        <label>
                            <input type="hidden" name="gelezen" value="0" />
                            <input type="checkbox" name="gelezen" id="gelezen" value="1" required> Bevestigen
                        </label>
                    </div>
                </div>
            </div>
            <div id="gaVerder">
                <input type="submit" value="Ga verder" class="btn btn-primary"/>
            </div>
        </form>
    </body>
</html>