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
            
            $_SESSION['lang'] = "EN";
            
            include "../../php/checkAuth.php";
            checkAuth();
            
            $team = $_SESSION['team'];
            
            include "../../php/db_config.php";
            include "../../php/deelnemersdb.php";
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
                                <div class="logo-en">Brouwland Biercompetition</div>
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
                            <div class="item"><a href="../../admin/ajusterParticipant.php" class="language">FR</a></div>
                            <div class="item"><a href="../../admin/aanpassenDeelnemer.php" class="language">NL</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="http://www.mijnbier.be/">Home</a></li>
                    <li><a href="adminIndex.php">Admin index</a></li>
                    <li><a href="http://www.mijnbier.be/nl/competitie-richtlijnen">About</a></li>
                </ul>
            </div>
        </nav>
        <form method="POST">
            <div class="panel panel-default">
            <div class="panel-heading">Condender information</div>
                <div class="panel-body">
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingZero">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberZero" aria-expanded="false" aria-controls="memberZero">
                                    Information team and beer
                                </a>
                            </h4>
                        </div>
                        <div id="memberZero" class="panel-collapse collapse" aria-labelledby="headingZero">
                            <div class="panel-body">
                            <label>Teamname: </label> 
                                <span id="currentTeamName">
                                    <?php
                                        $query = "SELECT * FROM team WHERE id='$team'";
                                        $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                        $data = mysql_fetch_assoc($result);
                                        echo $data['naam'];
                                    ?>
                                </span>
                                <div class="input-group col-xs-2" id="editTeamName" style="display:none">
                                    <input type="text" class="form-control" placeholder="Teamname" id="newTeamName" name="teamNaam">
                                </div>
                                <span id="editBtn41">
                                    <button type="button" onclick="swap('editTeamName', 'currentTeamName', 'editBtn41')"><span class="glyphicon glyphicon-edit"></span></button>
                                </span>
                            <br><label>Country: </label>
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
                                <span id="editBtn42">
                                    <button type="button" onclick="swap('editLang', 'currentLang', 'editBtn42')"><span class="glyphicon glyphicon-edit"></span></button>
                                </span>
                            <br><label>Category beer: </label>
                                <span id="currentCategory">
                                    <?php
                                        $cat = $data['categorie'];
                                        if($cat == "H")
                                            echo "Best hobbybeer";
                                        else
                                            echo "Best studentbeer";
                                    ?>
                                </span>
                                <div id="editCategory" class="input-group col-xs-2" style="display:none">
                                    <select id="newCategory" class="form-control col-xs-2" name="category">
                                        <option value="">Select category</option>
                                        <option value="H">Best hobbybeer</option>
                                        <option value="S">Best studentbeer</option>
                                    </select>
                                </div>
                                <span id="editBtn43">
                                    <button type="button" onclick="swap('editCategory', 'currentCategory', 'editBtn43')"><span class="glyphicon glyphicon-edit"></span></button>
                                </span>
                            <br><label>Beername: </label>
                                <span id="currentBeerName">
                                    <?php
                                        $query = "SELECT * FROM bier WHERE teamId='$team'";
                                        $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                        $data1 = mysql_fetch_assoc($result);
                                        echo $data1['naam'];
                                    ?>
                                </span>
                                <div class="input-group col-xs-2" id="editBeerName" style="display:none">
                                    <input type="text" class="form-control" placeholder="Beername" id="newBeerName" name="bierNaam">
                                </div>
                                <span id="editBtn44">
                                    <button type="button" onclick="swap('editBeerName', 'currentBeerName', 'editBtn44')"><span class="glyphicon glyphicon-edit"></span></button>
                                </span>
                            <br><label>Type of beer: </label>
                                <span id="currentType">
                                    <?php
                                        echo $data1['soort'];
                                    ?>
                                </span>
                                <div id="editType" class="input-group col-xs-2" style="display:none">
                                    <select id="newType" class="form-control col-xs-2" name="type">
                                        <option value="">Select type</option>
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
                                <span id="editBtn45">
                                    <button type="button" onclick="swap('editType', 'currentType', 'editBtn45')"><span class="glyphicon glyphicon-edit"></span></button>
                                </span>
                        </div>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberOne" aria-expanded="false" aria-controls="memberOne">
                                    Team member 1 (head captain)
                                </a>
                            </h4>
                        </div>
                        <div id="memberOne" class="panel-collapse collapse" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <label>First name: </label> 
                                    <span id="currentVoornaamKapt">
                                        <?php
                                            $query = "SELECT * FROM teamkapitein WHERE teamId='$team' AND hoofdkapitein=1";
                                            $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                            $data = mysql_fetch_assoc($result);
                                            echo $data['voornaam'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editVoornaamKapitein" style="display:none">
                                        <input type="text" class="form-control" placeholder="First name" id="newVoornaamKapitein" name="voornaam1">
                                    </div>
                                    <span id="editBtn1">
                                        <button type="button" onclick="swap('editVoornaamKapitein', 'currentVoornaamKapt', 'editBtn1')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Last name: </label> 
                                    <span id="currentAchternaamKapt">
                                        <?php
                                            echo $data['naam'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editAchternaamKapitein" style="display:none">
                                        <input type="text" class="form-control" placeholder="Last name" id="newAchternaamKapitein" name="achternaam1">
                                    </div>
                                    <span id="editBtn2">
                                        <button type="button" onclick="swap('editAchternaamKapitein', 'currentAchternaamKapt', 'editBtn2')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Address: </label> 
                                    <span id="currentAdresKapt">
                                        <?php
                                            $adres = $data['adresId'];
                                            $query = "SELECT * FROM adres WHERE id='$adres'";
                                            $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                            $data1 = mysql_fetch_assoc($result);
                                            echo $data1['straat'] . ' ' . $data1['huisnummer'];
                                        ?>
                                    </span>
                                    <div class="form-inline" id="editAdresKapitein" style="display:none">
                                        <div class="form-group col-xs-9">
                                            <input type="text" class="form-control" id="newStraatKapitein" placeholder="Street" name="straat1">
                                        </div>
                                        <div class="form-group col-xs-3">
                                            <input type="number" class="form-control" id="newHuisNrKapitein" placeholder="Nr" name="huisnr1">
                                        </div>
                                    </div>
                                    <span id="editBtn3">
                                        <button type="button" onclick="swap('editAdresKapitein', 'currentAdresKapt', 'editBtn3')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Community: </label> 
                                    <span id="currentGemeenteKapt">
                                        <?php
                                            echo $data1['postcode'] . ' ' . $data1['plaats'];
                                        ?>
                                    </span>
                                    <div class="form-inline" id="editGemeenteKapitein" style="display:none">
                                        <div class="form-group col-xs-3">
                                            <input type="number" class="form-control" id="newPostcodeKapitein" placeholder="Postal code" name="postcode1">
                                        </div>
                                        <div class="form-group col-xs-9">
                                            <input type="text" class="form-control" id="newGemeenteKapitein" placeholder="Community" name="gemeente1">
                                        </div>
                                    </div>
                                    <span id="editBtn4">
                                        <button type="button" onclick="swap('editGemeenteKapitein', 'currentGemeenteKapt', 'editBtn4')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Country: </label> 
                                    <span id="currentLandKapt">
                                        <?php
                                            echo $data1['land'];
                                        ?>
                                    </span>
                                    <div id="editLandKapitein" class="input-group col-xs-2" style="display:none">
                                        <select id="newLandKapitein" class="form-control col-xs-2" name="land1">
                                            <option value="">Select country</option>
                                            <option value="BE">België/Belgique</option>
                                            <option value="DE">Deutschland</option>
                                            <option value="FR">France</option>
                                            <option value="NL">Nederland</option>
                                            <option value="UK">United Kingdom</option>
                                        </select>
                                    </div>
                                    <span id="editBtn5">
                                        <button type="button" onclick="swap('editLandKapitein', 'currentLandKapt', 'editBtn5')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Phone number: </label> 
                                    <span id="currentTelefoonNrKapt">
                                        <?php
                                            echo $data['GSM'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editTelefoonNrKapitein" style="display:none">
                                        <input type="text" class="form-control" placeholder="Phone" id="newTelefoonNrKapitein" name="telefoon1">
                                    </div>
                                    <span id="editBtn6">
                                        <button type="button" onclick="swap('editTelefoonNrKapitein', 'currentTelefoonNrKapt', 'editBtn6')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Gender: </label> 
                                    <span id="currentGeslachtKapt">
                                        <?php
                                            $geslacht = $data['geslacht'];
                                            if ($geslacht == 'm')
                                                echo('Male');
                                            else
                                                echo('Female');
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editGeslachtKapitein" style="display:none">
                                        <input type="radio" name="geslacht1" id="geslachtKapitein-0" value="m">Male
                                        <input type="radio" name="geslacht1" id="geslachtKapitein-1" value="v">Female
                                    </div>
                                    <span id="editBtn7">
                                        <button type="button" onclick="swap('editGeslachtKapitein', 'currentGeslachtKapt', 'editBtn7')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>E-mail: </label> 
                                    <span id="currentEmailKapt">
                                        <?php
                                            echo $data['email'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editEmailKapitein" style="display:none">
                                        <input type="email" class="form-control" placeholder="E-mail" id="newEmailKapitein" name="email1">
                                    </div>
                                    <span id="editBtn8">
                                        <button type="button" onclick="swap('editEmailKapitein', 'currentEmailKapt', 'editBtn8')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberTwo" aria-expanded="false" aria-controls="memberTwo">
                                    Team member 2 (reserve captain)
                                </a>
                            </h4>
                        </div>
                        <div id="memberTwo" class="panel-collapse collapse" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <label>First name: </label> 
                                    <span id="currentVoornaamReserve">
                                        <?php
                                            $query = "SELECT * FROM teamkapitein WHERE teamId='$team' AND hoofdkapitein=0";
                                            $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                            $data2 = mysql_fetch_assoc($result);
                                            echo $data2['voornaam'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editVoornaamReserve" style="display:none">
                                        <input type="text" class="form-control" placeholder="First name" id="newReserveKapitein" name="voornaam2">
                                    </div>
                                    <span id="editBtn9">
                                        <button type="button" onclick="swap('editVoornaamReserve', 'currentVoornaamReserve', 'editBtn9')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Last name: </label> 
                                    <span id="currentAchternaamReserve">
                                        <?php
                                            echo $data2['naam'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editAchternaamReserve" style="display:none">
                                        <input type="text" class="form-control" placeholder="Last name" id="newAchternaamReserve" name="achternaam2">
                                    </div>
                                    <span id="editBtn10">
                                        <button type="button" onclick="swap('editAchternaamReserve', 'currentAchternaamReserve', 'editBtn10')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Asdress: </label> 
                                    <span id="currentAdresReserve">
                                        <?php
                                            $adres = $data2['adresId'];
                                            $query = "SELECT * FROM adres WHERE id='$adres'";
                                            $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                            $data3 = mysql_fetch_assoc($result);
                                            echo $data3['straat'] . ' ' . $data3['huisnummer'];
                                        ?>
                                    </span>
                                    <div class="form-inline" id="editAdresReserve" style="display:none">
                                        <div class="form-group col-xs-9">
                                            <input type="text" class="form-control" id="newStraatReserve" placeholder="Stret" name="straat2">
                                        </div>
                                        <div class="form-group col-xs-3">
                                            <input type="number" class="form-control" id="newHuisNrReserve" placeholder="Nr" name="huisnr2">
                                        </div>
                                    </div>
                                    <span id="editBtn11">
                                        <button type="button" onclick="swap('editAdresReserve', 'currentAdresReserve', 'editBtn11')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Community: </label> 
                                    <span id="currentGemeenteReserve">
                                        <?php
                                            echo $data3['postcode'] . ' ' . $data3['plaats'];
                                        ?>
                                    </span>
                                    <div class="form-inline" id="editGemeenteReserve" style="display:none">
                                        <div class="form-group col-xs-3">
                                            <input type="number" class="form-control" id="newPostcodeReserve" placeholder="Postal code" name="postcode2">
                                        </div>
                                        <div class="form-group col-xs-9">
                                            <input type="text" class="form-control" id="newGemeenteReserve" placeholder="Community" name="gemeente2">
                                        </div>
                                    </div>
                                    <span id="editBtn12">
                                        <button type="button" onclick="swap('editGemeenteReserve', 'currentGemeenteReserve', 'editBtn12')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Country: </label> 
                                    <span id="currentLandReserve">
                                        <?php
                                            echo $data3['land'];
                                        ?>
                                    </span>
                                    <div id="editLandReserve" class="input-group col-xs-2" style="display:none">
                                        <select id="newLandReserve" class="form-control col-xs-2" name="land2">
                                            <option value="">Select country</option>
                                            <option value="BE">België/Belgique</option>
                                            <option value="DE">Deutschland</option>
                                            <option value="FR">France</option>
                                            <option value="NL">Nederland</option>
                                            <option value="UK">United Kingdom</option>
                                        </select>
                                    </div>
                                    <span id="editBtn13">
                                        <button type="button" onclick="swap('editLandReserve', 'currentLandReserve', 'editBtn13')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Phone number: </label> 
                                    <span id="currentTelefoonNrReserve">
                                        <?php
                                            echo $data2['GSM'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editTelefoonNrReserve" style="display:none">
                                        <input type="text" class="form-control" placeholder="Phone" id="newTelefoonNrReserve" name="telefoon2">
                                    </div>
                                    <span id="editBtn14">
                                        <button type="button" onclick="swap('editTelefoonNrReserve', 'currentTelefoonNrReserve', 'editBtn14')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Gender: </label> 
                                    <span id="currentGeslachtReserve">
                                        <?php
                                            $geslacht = $data2['geslacht'];
                                            if ($geslacht == 'm')
                                                echo('Male');
                                            else
                                                echo('Female');
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editGeslachtReserve" style="display:none">
                                        <input type="radio" name="geslacht2" id="geslachtReserve-0" value="m">Male
                                        <input type="radio" name="geslacht2" id="geslachtReserve-1" value="v">Female
                                    </div>
                                    <span id="editBtn15">
                                        <button type="button" onclick="swap('editGeslachtReserve', 'currentGeslachtReserve', 'editBtn15')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>E-mail: </label> 
                                    <span id="currentEmailReserve">
                                        <?php
                                            echo $data2['email'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editEmailReserve" style="display:none">
                                        <input type="email" class="form-control" placeholder="E-mail" id="newEmailReserve" name="email2">
                                    </div>
                                    <span id="editBtn16">
                                        <button type="button" onclick="swap('editEmailReserve', 'currentEmailReserve', 'editBtn16')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info" id="panel3">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberThree" aria-expanded="false" aria-controls="memberThree">
                                    Team member 3
                                </a>
                            </h4>
                        </div>
                        <div id="memberThree" class="panel-collapse collapse" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <label>First name: </label> 
                                    <span id="currentVoornaamTeamlid3">
                                        <?php
                                            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1";
                                            $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                            $data4 = mysql_fetch_array($result);
                                            echo $data4['voornaam'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editVoornaamTeamlid3" style="display:none">
                                        <input type="text" class="form-control" placeholder="First name" id="newTeamlid3Kapitein" name="voornaam3">
                                    </div>
                                    <span id="editBtn17">
                                        <button type="button" onclick="swap('editVoornaamTeamlid3', 'currentVoornaamTeamlid3', 'editBtn17')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Last name: </label> 
                                    <span id="currentAchternaamTeamlid3">
                                        <?php
                                            echo $data4['naam'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editAchternaamTeamlid3" style="display:none">
                                        <input type="text" class="form-control" placeholder="Last name" id="newAchternaamTeamlid3" name="achternaam3">
                                    </div>
                                    <span id="editBtn18">
                                        <button type="button" onclick="swap('editAchternaamTeamlid3', 'currentAchternaamTeamlid3', 'editBtn18')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Gender: </label> 
                                    <span id="currentGeslachtTeamlid3">
                                        <?php
                                            $geslacht = $data4['geslacht'];
                                            if ($geslacht == 'm')
                                                echo('Male');
                                            else
                                                echo('Female');
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editGeslachtTeamlid3" style="display:none">
                                        <input type="radio" name="geslacht3" id="geslachtTeamlid3-0" value="m">Male
                                        <input type="radio" name="geslacht3" id="geslachtTeamlid3-1" value="v">Female
                                    </div>
                                    <span id="editBtn19">
                                        <button type="button" onclick="swap('editGeslachtTeamlid3', 'currentGeslachtTeamlid3', 'editBtn19')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>E-mail: </label> 
                                    <span id="currentEmailTeamlid3">
                                        <?php
                                            echo $data4['email'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editEmailTeamlid3" style="display:none">
                                        <input type="email" class="form-control" placeholder="E-mail" id="newEmailTeamlid3" name="email3">
                                    </div>
                                    <span id="editBtn20">
                                        <button type="button" onclick="swap('editEmailTeamlid3', 'currentEmailTeamlid3', 'editBtn20')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info" id="panel4">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberFour" aria-expanded="false" aria-controls="memberFour">
                                    Team member 4
                                </a>
                            </h4>
                        </div>
                        <div id="memberFour" class="panel-collapse collapse" aria-labelledby="headingFour">
                            <div class="panel-body">
                                <label>First name: </label> 
                                    <span id="currentVoornaamTeamlid4">
                                        <?php
                                            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 1, 1";
                                            $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                            $data5 = mysql_fetch_array($result);
                                            echo $data5['voornaam'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editVoornaamTeamlid4" style="display:none">
                                        <input type="text" class="form-control" placeholder="First name" id="newTeamlid4Kapitein" name="voornaam4">
                                    </div>
                                    <span id="editBtn21">
                                        <button type="button" onclick="swap('editVoornaamTeamlid4', 'currentVoornaamTeamlid4', 'editBtn21')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Last name: </label> 
                                    <span id="currentAchternaamTeamlid4">
                                        <?php
                                            echo $data5['naam'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editAchternaamTeamlid4" style="display:none">
                                        <input type="text" class="form-control" placeholder="Last name" id="newAchternaamTeamlid4" name="achternaam4">
                                    </div>
                                    <span id="editBtn22">
                                        <button type="button" onclick="swap('editAchternaamTeamlid4', 'currentAchternaamTeamlid4', 'editBtn22')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Gender: </label> 
                                    <span id="currentGeslachtTeamlid4">
                                        <?php
                                            $geslacht = $data5['geslacht'];
                                            if ($geslacht == 'm')
                                                echo('Male');
                                            else
                                                echo('Female');
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editGeslachtTeamlid4" style="display:none">
                                        <input type="radio" name="geslacht4" id="geslachtTeamlid4-0" value="m">Male
                                        <input type="radio" name="geslacht4" id="geslachtTeamlid4-1" value="v">Female
                                    </div>
                                    <span id="editBtn23">
                                        <button type="button" onclick="swap('editGeslachtTeamlid4', 'currentGeslachtTeamlid4', 'editBtn23')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>E-mail: </label> 
                                    <span id="currentEmailTeamlid4">
                                        <?php
                                            echo $data5['email'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editEmailTeamlid4" style="display:none">
                                        <input type="email" class="form-control" placeholder="E-mail" id="newEmailTeamlid4" name="email4">
                                    </div>
                                    <span id="editBtn24">
                                        <button type="button" onclick="swap('editEmailTeamlid4', 'currentEmailTeamlid4', 'editBtn24')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info" id="panel5">
                        <div class="panel-heading" role="tab" id="headingFive">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberFive" aria-expanded="false" aria-controls="memberFive">
                                    Team member 5
                                </a>
                            </h4>
                        </div>
                        <div id="memberFive" class="panel-collapse collapse" aria-labelledby="headingFive">
                            <div class="panel-body">
                                <label>First name: </label> 
                                    <span id="currentVoornaamTeamlid5">
                                        <?php
                                            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 2,1";
                                            $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                            $data6 = mysql_fetch_array($result);
                                            echo $data6['voornaam'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editVoornaamTeamlid5" style="display:none">
                                        <input type="text" class="form-control" placeholder="First name" id="newTeamlid5Kapitein" name="voornaam5">
                                    </div>
                                    <span id="editBtn25">
                                        <button type="button" onclick="swap('editVoornaamTeamlid5', 'currentVoornaamTeamlid5', 'editBtn25')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Last name: </label> 
                                    <span id="currentAchternaamTeamlid5">
                                        <?php
                                            echo $data6['naam'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editAchternaamTeamlid5" style="display:none">
                                        <input type="text" class="form-control" placeholder="Last name" id="newAchternaamTeamlid5" name="achternaam5">
                                    </div>
                                    <span id="editBtn26">
                                        <button type="button" onclick="swap('editAchternaamTeamlid5', 'currentAchternaamTeamlid5', 'editBtn26')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Gender: </label> 
                                    <span id="currentGeslachtTeamlid5">
                                        <?php
                                            $geslacht = $data6['geslacht'];
                                            if ($geslacht == 'm')
                                                echo('Male');
                                            else
                                                echo('Female');
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editGeslachtTeamlid5" style="display:none">
                                        <input type="radio" name="geslacht5" id="geslachtTeamlid5-0" value="m">Male
                                        <input type="radio" name="geslacht5" id="geslachtTeamlid5-1" value="v">Female
                                    </div>
                                    <span id="editBtn27">
                                        <button type="button" onclick="swap('editGeslachtTeamlid5', 'currentGeslachtTeamlid5', 'editBtn27')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>E-mail: </label> 
                                    <span id="currentEmailTeamlid5">
                                        <?php
                                            echo $data6['email'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editEmailTeamlid5" style="display:none">
                                        <input type="email" class="form-control" placeholder="E-mail" id="newEmailTeamlid5" name="email5">
                                    </div>
                                    <span id="editBtn28">
                                        <button type="button" onclick="swap('editEmailTeamlid5', 'currentEmailTeamlid5', 'editBtn28')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info" id="panel6">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberSix" aria-expanded="false" aria-controls="memberSix">
                                    Team member 6
                                </a>
                            </h4>
                        </div>
                        <div id="memberSix" class="panel-collapse collapse" aria-labelledby="headingSix">
                            <div class="panel-body">
                                <label>First name: </label> 
                                    <span id="currentVoornaamTeamlid6">
                                        <?php
                                            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 3,1";
                                            $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                            $data7 = mysql_fetch_array($result);
                                            echo $data7['voornaam'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editVoornaamTeamlid6" style="display:none">
                                        <input type="text" class="form-control" placeholder="First name" id="newTeamlid6Kapitein" name="voornaam6">
                                    </div>
                                    <span id="editBtn29">
                                        <button type="button" onclick="swap('editVoornaamTeamlid6', 'currentVoornaamTeamlid6', 'editBtn29')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Last name: </label> 
                                    <span id="currentAchternaamTeamlid6">
                                        <?php
                                            echo $data7['naam'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editAchternaamTeamlid6" style="display:none">
                                        <input type="text" class="form-control" placeholder="Last name" id="newAchternaamTeamlid6" name="achternaam6">
                                    </div>
                                    <span id="editBtn30">
                                        <button type="button" onclick="swap('editAchternaamTeamlid6', 'currentAchternaamTeamlid6', 'editBtn30')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Gender: </label> 
                                    <span id="currentGeslachtTeamlid6">
                                        <?php
                                            $geslacht = $data7['geslacht'];
                                            if ($geslacht == 'm')
                                                echo('Male');
                                            else
                                                echo('Female');
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editGeslachtTeamlid6" style="display:none">
                                        <input type="radio" name="geslacht6" id="geslachtTeamlid6-0" value="m">Male
                                        <input type="radio" name="geslacht6" id="geslachtTeamlid6-1" value="v">Female
                                    </div>
                                    <span id="editBtn31">
                                        <button type="button" onclick="swap('editGeslachtTeamlid6', 'currentGeslachtTeamlid6', 'editBtn31')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>E-mail: </label> 
                                    <span id="currentEmailTeamlid6">
                                        <?php
                                            echo $data7['email'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editEmailTeamlid6" style="display:none">
                                        <input type="email" class="form-control" placeholder="E-mail" id="newEmailTeamlid6" name="email6">
                                    </div>
                                    <span id="editBtn32">
                                        <button type="button" onclick="swap('editEmailTeamlid6', 'currentEmailTeamlid6', 'editBtn32')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info" id="panel7">
                        <div class="panel-heading" role="tab" id="headingSeven">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberSeven" aria-expanded="false" aria-controls="memberSeven">
                                    Team member 7
                                </a>
                            </h4>
                        </div>
                        <div id="memberSeven" class="panel-collapse collapse" aria-labelledby="headingSeven">
                            <div class="panel-body">
                                <label>First name: </label> 
                                    <span id="currentVoornaamTeamlid7">
                                        <?php
                                            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 4,1";
                                            $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                            $data8 = mysql_fetch_array($result);
                                            echo $data8['voornaam'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editVoornaamTeamlid7" style="display:none">
                                        <input type="text" class="form-control" placeholder="First name" id="newTeamlid7Kapitein" name="voornaam7">
                                    </div>
                                    <span id="editBtn33">
                                        <button type="button" onclick="swap('editVoornaamTeamlid7', 'currentVoornaamTeamlid7', 'editBtn33')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Last name: </label> 
                                    <span id="currentAchternaamTeamlid7">
                                        <?php
                                            echo $data8['naam'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editAchternaamTeamlid7" style="display:none">
                                        <input type="text" class="form-control" placeholder="Last name" id="newAchternaamTeamlid7" name="achternaam7">
                                    </div>
                                    <span id="editBtn34">
                                        <button type="button" onclick="swap('editAchternaamTeamlid7', 'currentAchternaamTeamlid7', 'editBtn34')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Gender: </label> 
                                    <span id="currentGeslachtTeamlid7">
                                        <?php
                                            $geslacht = $data8['geslacht'];
                                            if ($geslacht == 'm')
                                                echo('Male');
                                            else
                                                echo('Female');
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editGeslachtTeamlid7" style="display:none">
                                        <input type="radio" name="geslacht7" id="geslachtTeamlid7-0" value="m">Male
                                        <input type="radio" name="geslacht7" id="geslachtTeamlid7-1" value="v">Female
                                    </div>
                                    <span id="editBtn35">
                                        <button type="button" onclick="swap('editGeslachtTeamlid7', 'currentGeslachtTeamlid7', 'editBtn35')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>E-mail: </label> 
                                    <span id="currentEmailTeamlid7">
                                        <?php
                                            echo $data8['email'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editEmailTeamlid7" style="display:none">
                                        <input type="email" class="form-control" placeholder="E-mail" id="newEmailTeamlid7" name="email7">
                                    </div>
                                    <span id="editBtn36">
                                        <button type="button" onclick="swap('editEmailTeamlid7', 'currentEmailTeamlid7', 'editBtn36')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info" id="panel8">
                        <div class="panel-heading" role="tab" id="headingEight">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberEight" aria-expanded="false" aria-controls="memberEight">
                                    Team member 8
                                </a>
                            </h4>
                        </div>
                        <div id="memberEight" class="panel-collapse collapse" aria-labelledby="headingEight">
                            <div class="panel-body">
                                <label>First name: </label> 
                                    <span id="currentVoornaamTeamlid8">
                                        <?php
                                            $query = "SELECT * FROM teamlid WHERE teamId='$team' LIMIT 5,1";
                                            $result = mysql_query($query) or die ('Error updating' . mysql_error());
                                            $data9 = mysql_fetch_array($result);
                                            echo $data9['voornaam'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editVoornaamTeamlid8" style="display:none">
                                        <input type="text" class="form-control" placeholder="First name" id="newTeamlid8Kapitein" name="voornaam8">
                                    </div>
                                    <span id="editBtn37">
                                        <button type="button" onclick="swap('editVoornaamTeamlid8', 'currentVoornaamTeamlid8', 'editBtn37')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Last name: </label> 
                                    <span id="currentAchternaamTeamlid8">
                                        <?php
                                            echo $data9['email'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editAchternaamTeamlid8" style="display:none">
                                        <input type="text" class="form-control" placeholder="Last name" id="newAchternaamTeamlid8" name="achternaam8">
                                    </div>
                                    <span id="editBtn38">
                                        <button type="button" onclick="swap('editAchternaamTeamlid8', 'currentAchternaamTeamlid8', 'editBtn38')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>Gender: </label> 
                                    <span id="currentGeslachtTeamlid8">
                                        <?php
                                            $geslacht = $data9['geslacht'];
                                            if ($geslacht == 'm')
                                                echo('Male');
                                            else
                                                echo('Female');
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editGeslachtTeamlid8" style="display:none">
                                        <input type="radio" name="geslacht8" id="geslachtTeamlid8-0" value="m">Male
                                        <input type="radio" name="geslacht8" id="geslachtTeamlid8-1" value="v">Female
                                    </div>
                                    <span id="editBtn39">
                                        <button type="button" onclick="swap('editGeslachtTeamlid8', 'currentGeslachtTeamlid8', 'editBtn39')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                                <br><label>E-mail: </label> 
                                    <span id="currentEmailTeamlid8">
                                        <?php
                                            echo $data9['email'];
                                        ?>
                                    </span>
                                    <div class="input-group col-xs-2" id="editEmailTeamlid8" style="display:none">
                                        <input type="email" class="form-control" placeholder="E-mail" id="newEmailTeamlid8" name="email8">
                                    </div>
                                    <span id="editBtn40">
                                        <button type="button" onclick="swap('editEmailTeamlid8', 'currentEmailTeamlid8', 'editBtn40')"><span class="glyphicon glyphicon-edit"></span></button>
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div id="voegToe" style="display:none">
                        <button type="button" onclick="location.href='/en/admin/addMember.php'">Click here to add a member.</button>
                    </div>
                    <?php
                        $query = "SELECT COUNT(*) FROM teamlid WHERE teamId='$team'";
                        $result = mysql_query($query) or die ('Error updating' . mysql_error());
                        $dataRes = mysql_fetch_assoc($result);
                        $count = $dataRes['COUNT(*)'];
                        echo "<script>
                            if ($count < 6){
                                var panel8 = document.getElementById('panel8');
                                panel8.style.display = 'none';
                                var button = document.getElementById('voegToe');
                                button.style.display = 'inline-block';
                            }
                            if ($count < 5){
                                var panel7 = document.getElementById('panel7');
                                panel7.style.display = 'none';
                            }
                            if ($count < 4){
                                var panel6 = document.getElementById('panel6');
                                panel6.style.display = 'none';
                            }
                            if ($count < 3){
                                var panel5 = document.getElementById('panel5');
                                panel5.style.display = 'none';
                            }
                            if ($count < 2){
                                var panel4 = document.getElementById('panel4');
                                panel4.style.display = 'none';
                            }
                            if ($count < 1){
                                var panel3 = document.getElementById('panel3');
                                panel3.style.display = 'none';
                            }</script>";
                    ?>
                    <div id="dienIn">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>