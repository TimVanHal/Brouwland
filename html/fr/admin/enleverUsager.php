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
            
            include "../../php/db_config.php"; // Alle database gegevens
            include "../../php/deleteGebruiker.php";
            mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
            // Het selecteren van de database
            mysql_select_db ($mysql["db"]);
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
                            <div class="item"><a href="../../nl/admin/verwijderenGebruiker.php" class="language">NL</a></div>
                            <div class="item"><a href="../../en/admin/removeUser.php" class="language">ENG</a></div>
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
                </ul>
            </div>
        </nav>
        <form method="POST">
            <div class="panel panel-default">
                <div class="panel-heading">Enlever usager</div>
                <div class="panel-body">
                    Vous voulez enlever quel usager?
                    <div class="input-group col-xs-2">
                        <label>Usager:</label>
                        <select id="gebruiker" name="gebruiker" class="form-control col-xs-2" onChange="showDropDown(this.value)">
                            <option value="">Selectionnez usager</option>
                            <option value="deelnemer">Participant</option>
                            <option value="keurder">Juré</option>
                        </select>
                    </div>
                    <script>
                        function showDropDown(option){
                            if(option == "deelnemer"){
                                document.getElementById("deelnemerSelect").style.display = 'inline-block';
                                document.getElementById("keurderSelect").style.display = 'none';
                            }
                            else if(option == "keurder"){
                                document.getElementById("deelnemerSelect").style.display = 'none';
                                document.getElementById("keurderSelect").style.display = 'inline-block';
                            }
                            else{
                                document.getElementById("deelnemerSelect").style.display = 'none';
                                document.getElementById("keurderSelect").style.display = 'none';
                            }
                        }
                    </script>
                    <div id="deelnemerSelect" class="input-group col-xs-2" style="display:none">
                        <label>Participant:</label>
                        <select id="deelnemer" name="deelnemer" class="form-control col-xs-2">
                            <option value="">Selectionnez participant</option>
                            <?php
                                $query = "SELECT COUNT(*) FROM team";
                                $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                $data = mysql_fetch_assoc($result);
                                $count = $data['COUNT(*)'];
                                for ($x = 1; $x <= $count; $x++){
                                    $query = "SELECT naam FROM team WHERE id='$x'";
                                    $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                    $data = mysql_fetch_assoc($result);
                                    $naam = $data['naam'];
                                    echo "<option value='$x'>Team $x: $naam</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div id="keurderSelect" class="input-group col-xs-2" style="display:none">
                        <label>Juré:</label>
                        <select id="keurder" name="keurder" class="form-control col-xs-2">
                            <option value="">Selectionnez juré</option>
                            <?php
                                $query = "SELECT COUNT(*) FROM voorproever";
                                $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                $data = mysql_fetch_assoc($result);
                                $count = $data['COUNT(*)'];
                                for ($x = 1; $x <= $count; $x++){
                                    $query = "SELECT * FROM voorproever WHERE id='$x'";
                                    $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                    $data = mysql_fetch_assoc($result);
                                    $achternaam = $data['naam'];
                                    $voornaam = $data['voornaam'];
                                    echo "<option value='$x'>$voornaam $achternaam</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div id="dienIn">
                        <input type="submit" value="Enlever" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>