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
            
            $_SESSION['lang'] = "NL";
            
            include "../../php/checkAuth.php";
            checkAuth();
            
            include "../../php/db_config.php"; // Alle database gegevens
            include "../../php/toewijzenKeurder.php";
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
                            <div class="item"><a href="../../fr/admin/assignerJure.php" class="language">FR</a></div>
                            <div class="item"><a href="../../en/admin/assignJudge.php" class="language">ENG</a></div>
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
                    <li><a href="../logout.php">Afmelden</a></li>
                </ul>
            </div>
        </nav>
        <form method="POST">
            <div class="panel panel-default">
                <div class="panel-heading">Keurders toewijzen</div>
                <div class="panel-body">
                    Selecteer een keurder en zijn respectievelijke bier om te evalueren.
                    <div id="keurderSelect" class="input-group col-xs-2">
                        <label>Keurder:</label>
                        <select id="keurder" name="keurder" class="form-control col-xs-2">
                            <option value="">Selecteer keurder</option>
                            <?php
                                $query = "SELECT * FROM voorproever";
                                $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
                                    $id = $row['id'];
                                    $naam = $row['naam'];
                                    echo "<option value='$id'>Keurder $id: $naam</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div id="bierSelect" class="input-group col-xs-2">
                        <label>Bier:</label>
                        <select id="bier" name="bier" class="form-control col-xs-2">
                            <option value="">Selecteer bier</option>
                            <?php
                                $query = "SELECT * FROM bier";
                                $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
                                    $id = $row['teamId'];
                                    $naam = $row['naam'];
                                    $soort = $row['soort'];
                                    
                                    echo "<option value='$id'>Bier $id: $naam, $soort</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div id="dienIn">
                        <input type="submit" value="Wijs toe" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>