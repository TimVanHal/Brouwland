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
            
            include "../../php/checkAuth.php";
            checkAuth();
            
            $_SESSION['lang'] = "EN";
            
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
                                <div class="logo">Brouwland Biercompetition</div>
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
                            <div class="item"><a href="../../fr/jure/pageJure.php" class="language">FR</a></div>
                            <div class="item"><a href="../../nl/keurder/keurderpagina.php" class="language">NL</a></div>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="http://www.mijnbier.be">Home</a></li>
                    <li><a href="judgeIndex.php">Judge index</a></li>
                    <li><a href="http://www.mijnbier.be/nl/competitie-richtlijnen">About</a></li>
                    <li><a href="evaluation0.php">Evaluation</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
        <form method="POST">
            <div class="panel panel-default">
            <div class="panel-heading">Information judge</div>
                <div class="panel-body">
                            <label>First name: </label> 
                                <span id="currentVoornaam">
                                    <?php
                                        $query = "SELECT * FROM voorproever WHERE id='$voorproever'";
                                        $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                        $data = mysql_fetch_assoc($result);
                                        echo $data['voornaam'];
                                    ?>
                                </span>
                                <div class="input-group col-xs-2" id="editVoornaam" style="display:none">
                                    <input type="text" class="form-control" placeholder="First name" id="newVoornaam" name="voornaam">
                                </div>
                                <span id="editBtn1">
                                    <button type="button" onclick="swap('editVoornaam', 'currentVoornaam', 'editBtn1')"><span class="glyphicon glyphicon-edit"></span></button>
                                </span>
                            <br><label>Last name: </label>
                                <span id="currentAchternaam">
                                    <?php
                                        echo $data['naam'];
                                    ?>
                                </span>
                                <div class="input-group col-xs-2" id="editAchternaam" style="display:none">
                                    <input type="text" class="form-control" placeholder="Last name" id="newAchternaam" name="achternaam">
                                </div>
                                <span id="editBtn2">
                                    <button type="button" onclick="swap('editAchternaam', 'currentAchternaam', 'editBtn2')"><span class="glyphicon glyphicon-edit"></span></button>
                                </span>
                            <br><label>Address: </label> 
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
                                        <input type="text" class="form-control" id="newStraat" placeholder="Street" name="straat">
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <input type="number" class="form-control" id="newHuisNr" placeholder="Nr" name="huisnr">
                                    </div>
                                </div>
                                <span id="editBtn3">
                                    <button type="button" onclick="swap('editAdres', 'currentAdres', 'editBtn3')"><span class="glyphicon glyphicon-edit"></span></button>
                                </span>
                            <br><label>Community: </label> 
                                <span id="currentGemeente">
                                    <?php
                                        echo $data1['postcode'] . ' ' . $data1['plaats'];
                                    ?>
                                </span>
                                <div class="form-inline" id="editGemeente" style="display:none">
                                    <div class="form-group col-xs-3">
                                        <input type="number" class="form-control" id="newPostcode" placeholder="Postal code" name="postcode">
                                    </div>
                                    <div class="form-group col-xs-9">
                                        <input type="text" class="form-control" id="newGemeente" placeholder="Community" name="gemeente">
                                    </div>
                                </div>
                                <span id="editBtn4">
                                    <button type="button" onclick="swap('editGemeente', 'currentGemeente', 'editBtn4')"><span class="glyphicon glyphicon-edit"></span></button>
                                </span>
                            <br><label>Country: </label> 
                                <span id="currentLand">
                                    <?php
                                        echo $data1['land'];
                                    ?>
                                </span>
                                <div id="editLand" class="input-group col-xs-2" style="display:none">
                                    <select id="newLand" class="form-control col-xs-2" name="land">
                                        <option value="">Select country</option>
                                        <option value="België/Belgique">België/Belgique</option>
                                        <option value="Deutschland">Deutschland</option>
                                        <option value="France">France</option>
                                        <option value="Nederland">Nederland</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                    </select>
                                </div>
                                <span id="editBtn5">
                                    <button type="button" onclick="swap('editLand', 'currentLand', 'editBtn5')"><span class="glyphicon glyphicon-edit"></span></button>
                                </span>
                            <br><label>E-mail: </label> 
                                <span id="currentEmail">
                                    <?php
                                        $query = "SELECT * FROM voorproever WHERE id='$voorproever'";
                                        $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                        $data = mysql_fetch_assoc($result);
                                        $user = $data['userId'];
                                        $query = "SELECT * FROM users WHERE userId='$user'";
                                        $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                        $data = mysql_fetch_assoc($result);
                                        echo $data['email'];
                                    ?>
                                </span>
                                <div class="input-group col-xs-2" id="editEmail" style="display:none">
                                    <input type="email" class="form-control" placeholder="E-mail" id="newEmail" name="email">
                                </div>
                                <span id="editBtn6">
                                    <button type="button" onclick="swap('editEmail', 'currentEmail', 'editBtn6')"><span class="glyphicon glyphicon-edit"></span></button>
                                </span>
                    <div class="panel panel-info" id="panel2">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panelTwo" aria-expanded="false" aria-controls="panelTwo">
                                    Password
                                </a>
                            </h4>
                        </div>
                        <div id="panelTwo" class="panel-collapse collapse" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <label>Present password:</label>
                                <div class="input-group col-xs-2">
                                    <input name="paswoord1" id="accPassword" type="password" class="form-control" placeholder="Paswoord">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></span>
                                    <script>
                                        $(".glyphicon-eye-open").on("click", function() {
                                            var type = $("#accPassword").attr("type");
                                            if (type == "text")
                                                { $("#accPassword").attr("type", "password");}
                                            else
                                                { $("#accPassword").attr("type", "text"); }
                                            });
                                    </script>
                                </div>
                                <label>New password:</label>
                                <div class="input-group col-xs-2">
                                    <input name="paswoord2" id="newPassword" type="password" class="form-control" placeholder="Paswoord">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></span>
                                    <script>
                                        $(".glyphicon-eye-open").on("click", function() {
                                            var type = $("#newPassword").attr("type");
                                            if (type == "text")
                                                { $("#newPassword").attr("type", "password");}
                                            else
                                                { $("#newPassword").attr("type", "text"); }
                                            });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="dienIn">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>