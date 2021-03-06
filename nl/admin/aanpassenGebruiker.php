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
            include "../../php/editGebruiker.php";
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
                            <div class="item"><a href="../../fr/admin/ajusterUsager.php" class="language">FR</a></div>
                            <div class="item"><a href="../../en/admin/editUser.php" class="language">ENG</a></div>
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
                <div class="panel-heading">Aanpassen gebruiker</div>
                <div class="panel-body">
                    Welke gebruiker wilt u aanpassen?
                    <div class="input-group col-xs-2">
                        <label>Selecteer soort gebruiker:</label>
                        <select id="gebruiker" name="gebruiker" class="form-control col-xs-2" onChange="showDropDown(this.value)">
                            <option value="">Selecteer gebruiker</option>
                            <option value="deelnemer">Deelnemer</option>
                            <option value="keurder">Voorproever/jurylid</option>
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
                        <label>Deelnemer:</label>
                        <select id="deelnemer" name="deelnemer" class="form-control col-xs-2">
                            <option value="">Selecteer deelnemer</option>
                            <?php
                                $query = "SELECT * FROM team";
                                $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
                                    $id = $row['id'];
                                    $naam = $row['naam'];
                                    echo "<option value='$id'>Team $id: $naam</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div id="keurderSelect" class="input-group col-xs-2" style="display:none">
                        <label>Keurder:</label>
                        <select id="keurder" name="keurder" class="form-control col-xs-2">
                            <option value="">Selecteer voorproever/jurylid</option>
                            <?php
                                $query = "SELECT * FROM voorproever";
                                $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
                                    $id = $row['id'];
                                    $achternaam = $row['naam'];
                                    $voornaam = $row['voornaam'];
                                    echo "<option value='$id'>$voornaam $achternaam</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div id="dienIn">
                        <input type="submit" value="Selecteer" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>