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
            include "../php/inschrijving2db.php";
            
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
                            <div class="item"><a href="../fr/enregistrement2.php" class="language">FR</a></div>
                            <div class="item"><a href="../en/registration2.php" class="language">ENG</a></div>
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
        <form method="POST" name="inschrijven2">
            <div class="panel panel-default">
            <div class="panel-heading">Teamleden</div>
                <div class="panel-body">
                    <div class="panel panel-info">
                        <div class="panel-heading">Teamlid 1 (hoofdkapitein)</div>
                        <div class="panel-body">
                            <div class="input-group col-xs-2">
                                <label>Voornaam:</label>
                                <input type="text" class="form-control" placeholder="Voornaam" id="voornaamKapitein" name="voornaam1" required>
                            </div>
                            <div class="input-group col-xs-2">
                                <label>Achternaam:</label>
                                <input type="text" class="form-control" placeholder="Achternaam" id="achternaamKapitein" name="achternaam1" required>
                            </div>
                            <div class="input-group">
                                <label for="adresKapitein" class="control-label">Straatnaam + nr:</label>
                                <div>
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="straatKapitein" placeholder="Straat" name="straat1" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="huisNrKapitein" placeholder="Nr" name="huisnr1" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group">
                                <label for="gemeenteKapt" class="control-label">Gemeente:</label>
                                <div>
                                    <div class="form-group col-xs-4">
                                        <input type="text" class="form-control" id="postcodeKapitein" placeholder="Postcode" name="postcode1" required>
                                    </div>
                                    <div class="form-group col-xs-8">
                                        <input type="text" class="form-control" placeholder="Gemeente" id="gemeenteKapitein" name="gemeente1" required>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group col-xs-2">
                                <label>Land:</label>
                                <select id="landKapitein" class="form-control col-xs-2" name="land1" required>
                                    <option value="">Selecteer land</option>
                                    <option value="BE">België/Belgique</option>
                                    <option value="DE">Deutschland</option>
                                    <option value="FR">France</option>
                                    <option value="NL">Nederland</option>
                                    <option value="UK">United Kingdom</option>
                                </select>
                            </div>
                            <div class="input-group col-xs-2">
                                <label>Telefoon/GSM:</label>
                                <input type="text" class="form-control" placeholder="Telefoon/GSM-nummer" id="telefoonKapitein" name="telefoon1" required>
                            </div>
                            <label>Geslacht:</label>
                                <input type="radio" name="geslacht1" id="geslachtKapitein-0" value="m" required>Man
                                <input type="radio" name="geslacht1" id="geslachtKapitein-1" value="v">Vrouw
                            <div class="input-group col-xs-2">
                                <label>E-mail:</label>
                                <input type="email" class="form-control" placeholder="E-mail adres" id="emailKapitein" name="email1" required>
                            </div>
                            <label>Paswoord:</label>
                            <div class="input-group col-xs-2">
                                <input name="paswoord1" id="accPassword" type="password" class="form-control" placeholder="Paswoord" required>
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
                            <br><strong>Het e-mail adres van de teamkapitein zal gebruikt worden voor alle communicatie en als log-in.</strong>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">Teamlid 2 (reservekapitein)</div>
                        <div class="panel-body">
                            <div class="input-group col-xs-2">
                                <label>Voornaam:</label>
                                <input type="text" class="form-control" placeholder="Voornaam" id="voornaamReserve" name ="voornaam2" required>
                            </div>
                            <div class="input-group col-xs-2">
                                <label>Achternaam:</label>
                                <input type="text" class="form-control" placeholder="Achternaam" id="achternaamReserve" name="achternaam2" required>
                            </div>
                            <div class="input-group">
                                <label for="adresReserve" class="control-label">Straatnaam + nr:</label>
                                <div class="col-xs-0">
                                    <div class="form-inline">
                                        <div class="form-group col-xs-9">
                                            <input type="text" class="form-control" id="straatReserve" placeholder="Straat" name="straat2" required>
                                        </div>
                                        <div class="form-group col-xs-3">
                                            <input type="text" class="form-control" id="huisNrReserve" placeholder="Nr" name="huisnr2" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group">
                                <label for="gemeenteRes" class="control-label">Gemeente:</label>
                                <div class="col-xs-0">
                                    <div class="form-group col-xs-4">
                                        <input type="text" class="form-control" id="postcodeReserve" placeholder="Postcode" name="postcode2" required>
                                    </div>
                                    <div class="form-group col-xs-8">
                                        <input type="text" class="form-control" placeholder="Gemeente" id="gemeenteReserve" name="gemeente2" required>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group col-xs-2">
                                <label>Land:</label>
                                <select id="landReserve" class="form-control col-xs-2" name="land2" required>
                                    <option value="">Selecteer land</option>
                                    <option value="BE">België/Belgique</option>
                                    <option value="DE">Deutschland</option>
                                    <option value="FR">France</option>
                                    <option value="NL">Nederland</option>
                                    <option value="UK">United Kingdom</option>
                                </select>
                            </div>
                            <div class="input-group col-xs-2">
                                <label>Telefoon/GSM:</label>
                                <input type="text" class="form-control" placeholder="Telefoon/GSM-nummer" id="telefoonReserve" name="telefoon2" required>
                            </div>
                            <div class="input-group col-xs-2">
                                <label>E-mail:</label>
                                <input type="email" class="form-control" placeholder="E-mail adres" id="emailReserve" name="email2" required>
                            </div>
                            <label>Geslacht:</label>
                                <input type="radio" name="geslacht2" id="geslachtReserve-0" value="m" required>Man
                                <input type="radio" name="geslacht2" id="geslachtReserve-1" value="v">Vrouw
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class = "accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberThree" aria-expanded="false" aria-controls="memberThree">
                                    Teamlid 3*
                                </a>
                            </h4>
                        </div>
                        <div id="memberThree" class="panel-collapse collapse" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="input-group col-xs-2">
                                    <label>Voornaam:</label>
                                    <input type="text" class="form-control 3" placeholder="Voornaam" id="voornaam3" name="voornaam3">
                                </div>
                                <div class="input-group col-xs-2">
                                    <label>Achternaam:</label>
                                    <input type="text" class="form-control 3" placeholder="Achternaam" id="achternaam3" name="achternaam3">
                                </div>
                                <div class="input-group col-xs-2">
                                    <label>E-mail:</label>
                                    <input type="email" class="form-control 3" placeholder="E-mail adres" id="email3" name="email3">
                                </div>
                                <label>Geslacht:</label>
                                    <input type="radio" name="geslacht3" id="geslachtTeamlid3-0" value="m">Man
                                    <input type="radio" name="geslacht3" id="geslachtTeamlid3-1" value="v">Vrouw
                            </div>
                            <script>
                                var voornaam3 = document.getElementById("voornaam3");
                                var achternaam3 = document.getElementById("achternaam3");
                                var email3 = document.getElementById("email3");
                                var geslacht3 = document.getElementsByName("geslacht3");
                                var alles3 = document.getElementsByClassName("3");
                                for(var i = 0; i < alles3.length; i++) {
                                    alles3[i].onchange = function() {
                                        for(var j = 0; j < geslacht3.length; j++) {
                                            if(geslacht3[j].checked == true) {
                                               var geslacht3Val = geslacht3[j].value;
                                            }
                                        }
                                        if((voornaam3.value == "" || voornaam3.value == null) && (achternaam3.value == "" || achternaam3.value == null) && 
                                          (email3.value == "" || email3.value == null) && (geslacht3Val == "" || geslacht3Val == null)) {
                                            voornaam3.required = false ;
                                            achternaam3.required = false ;
                                            email3.required = false ;
                                            geslacht3[0].required = false ;
                                        }
                                        else {
                                            voornaam3.required = true ;
                                            achternaam3.required = true ;
                                            email3.required = true ;
                                            geslacht3[0].required = true ;
                                        }
                                    };
                                }
                            </script>
                        </div>
                        <div class="panel-footer">*: Optioneel</div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class = "accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberFour" aria-expanded="false" aria-controls="memberFour">
                                    Teamlid 4*
                                </a>
                            </h4>
                        </div>
                        <div id="memberFour" class="panel-collapse collapse" aria-labelledby="headingFour">
                            <div class="panel-body">
                                <div class="input-group col-xs-2">
                                    <label>Voornaam:</label>
                                    <input type="text" class="form-control 4" placeholder="Voornaam" id="voornaam4" name="voornaam4">
                                </div>
                                <div class="input-group col-xs-2">
                                    <label>Achternaam:</label>
                                    <input type="text" class="form-control 4" placeholder="Achternaam" id="achternaam4" name="achternaam4">
                                </div>
                                <div class="input-group col-xs-2">
                                    <label>E-mail:</label>
                                    <input type="email" class="form-control 4" placeholder="E-mail adres" id="email4" name="email4">
                                </div>
                                <label>Geslacht:</label>
                                    <input type="radio" name="geslacht4" id="geslachtTeamlid4-0" value="m">Man
                                    <input type="radio" name="geslacht4" id="geslachtTeamlid4-1" value="v">Vrouw
                            </div>
                            <script>
                                var voornaam4 = document.getElementById("voornaam4");
                                var achternaam4 = document.getElementById("achternaam4");
                                var email4 = document.getElementById("email4");
                                var geslacht4 = document.getElementsByName("geslacht4");
                                var alles4 = document.getElementsByClassName("4");
                                for(var i = 0; i < alles4.length; i++) {
                                    alles4[i].onchange = function() {
                                        for(var j = 0; j < geslacht4.length; j++) {
                                            if(geslacht4[j].checked == true) {
                                               var geslacht4Val = geslacht4[j].value;
                                            }
                                        }
                                        if((voornaam4.value == "" || voornaam4.value == null) && (achternaam4.value == "" || achternaam4.value == null) && 
                                          (email4.value == "" || email4.value == null) && (geslacht4Val == "" || geslacht4Val == null)) {
                                            voornaam4.required = false ;
                                            achternaam4.required = false ;
                                            email4.required = false ;
                                            geslacht4[0].required = false ;
                                        }
                                        else {
                                            voornaam4.required = true ;
                                            achternaam4.required = true ;
                                            email4.required = true ;
                                            geslacht4[0].required = true ;
                                        }
                                    };
                                }
                            </script>
                        </div>    
                        <div class="panel-footer">*: Optioneel</div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingFive">
                            <h4 class="panel-title">
                                <a class = "accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberFive" aria-expanded="false" aria-controls="memberFive">
                                    Teamlid 5*
                                </a>
                            </h4>
                        </div>
                        <div id="memberFive" class="panel-collapse collapse" aria-labelledby="headingFive">
                            <div class="panel-body">
                                <div class="input-group col-xs-2">
                                    <label>Voornaam:</label>
                                    <input type="text" class="form-control 5" placeholder="Voornaam" id="voornaam5" name="voornaam5">
                                </div>
                                <div class="input-group col-xs-2">
                                    <label>Achternaam:</label>
                                    <input type="text" class="form-control 5" placeholder="Achternaam" id="achternaam5" name="achternaam5">
                                </div>
                                <div class="input-group col-xs-2">
                                    <label>E-mail:</label>
                                    <input type="email" class="form-control 5" placeholder="E-mail adres" id="email5" name="email5">
                                </div>
                                <label>Geslacht:</label>
                                    <input type="radio" name="geslacht5" id="geslachtTeamlid5-0" value="m">Man
                                    <input type="radio" name="geslacht5" id="geslachtTeamlid5-1" value="v">Vrouw
                            </div>
                            <script>
                                var voornaam5 = document.getElementById("voornaam5");
                                var achternaam5 = document.getElementById("achternaam5");
                                var email5 = document.getElementById("email5");
                                var geslacht5 = document.getElementsByName("geslacht5");
                                var alles5 = document.getElementsByClassName("5");
                                for(var i = 0; i < alles5.length; i++) {
                                    alles5[i].onchange = function() {
                                        for(var j = 0; j < geslacht5.length; j++) {
                                            if(geslacht5[j].checked == true) {
                                               var geslacht5Val = geslacht5[j].value;
                                            }
                                        }
                                        if((voornaam5.value == "" || voornaam5.value == null) && (achternaam5.value == "" || achternaam5.value == null) && 
                                          (email5.value == "" || email5.value == null) && (geslacht5Val == "" || geslacht5Val == null)) {
                                            voornaam5.required = false ;
                                            achternaam5.required = false ;
                                            email5.required = false ;
                                            geslacht5[0].required = false ;
                                        }
                                        else {
                                            voornaam5.required = true ;
                                            achternaam5.required = true ;
                                            email5.required = true ;
                                            geslacht5[0].required = true ;
                                        }
                                    };
                                }
                            </script>
                            </div>
                        <div class="panel-footer">*: Optioneel</div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class = "accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberSix" aria-expanded="false" aria-controls="memberSix">
                                    Teamlid 6*
                                </a>
                            </h4>
                        </div>
                        <div id="memberSix" class="panel-collapse collapse" aria-labelledby="headingSix">
                            <div class="panel-body">
                                <div class="input-group col-xs-2">
                                    <label>Voornaam:</label>
                                    <input type="text" class="form-control 6" placeholder="Voornaam" id="voornaam6" name="voornaam6">
                                </div>
                                <div class="input-group col-xs-2">
                                    <label>Achternaam:</label>
                                    <input type="text" class="form-control 6" placeholder="Achternaam" id="achternaam6" name="achternaam6">
                                </div>
                                <div class="input-group col-xs-2">
                                    <label>E-mail:</label>
                                    <input type="email" class="form-control 6" placeholder="E-mail adres" id="email6" name="email6">
                                </div>
                                <label>Geslacht:</label>
                                    <input type="radio" name="geslacht6" id="geslachtTeamlid6-0" value="m">Man
                                    <input type="radio" name="geslacht6" id="geslachtTeamlid6-1" value="v">Vrouw
                            </div>
                            <script>
                                var voornaam6 = document.getElementById("voornaam6");
                                var achternaam6 = document.getElementById("achternaam6");
                                var email6 = document.getElementById("email6");
                                var geslacht6 = document.getElementsByName("geslacht6");
                                var alles6 = document.getElementsByClassName("6");
                                for(var i = 0; i < alles6.length; i++) {
                                    alles6[i].onchange = function() {
                                        for(var j = 0; j < geslacht6.length; j++) {
                                            if(geslacht6[j].checked == true) {
                                               var geslacht6Val = geslacht6[j].value;
                                            }
                                        }
                                        if((voornaam6.value == "" || voornaam6.value == null) && (achternaam6.value == "" || achternaam6.value == null) && 
                                          (email6.value == "" || email6.value == null) && (geslacht6Val == "" || geslacht6Val == null)) {
                                            voornaam6.required = false ;
                                            achternaam6.required = false ;
                                            email6.required = false ;
                                            geslacht6[0].required = false ;
                                        }
                                        else {
                                            voornaam6.required = true ;
                                            achternaam6.required = true ;
                                            email6.required = true ;
                                            geslacht6[0].required = true ;
                                        }
                                    };
                                }
                            </script>
                            </div>
                        <div class="panel-footer">*: Optioneel</div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingSeven">
                            <h4 class="panel-title">
                                <a class = "accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberSeven" aria-expanded="false" aria-controls="memberSeven">
                                    Teamlid 7*
                                </a>
                            </h4>
                        </div>
                        <div id="memberSeven" class="panel-collapse collapse" aria-labelledby="headingSeven">
                            <div class="panel-body">
                                <div class="input-group col-xs-2">
                                    <label>Voornaam:</label>
                                    <input type="text" class="form-control 7" placeholder="Voornaam" id="voornaam7" name="voornaam7">
                                </div>
                                <div class="input-group col-xs-2">
                                    <label>Achternaam:</label>
                                    <input type="text" class="form-control 7" placeholder="Achternaam" id="achternaam7" name="achternaam7">
                                </div>
                                <div class="input-group col-xs-2">
                                    <label>E-mail:</label>
                                    <input type="email" class="form-control 7" placeholder="E-mail adres" id="email7" name="email7">
                                </div>
                                <label>Geslacht:</label>
                                    <input type="radio" name="geslacht7" id="geslachtTeamlid7-0" value="m">Man
                                    <input type="radio" name="geslacht7" id="geslachtTeamlid7-1" value="v">Vrouw
                            </div>
                            <script>
                                var voornaam7 = document.getElementById("voornaam7");
                                var achternaam7 = document.getElementById("achternaam7");
                                var email7 = document.getElementById("email7");
                                var geslacht7 = document.getElementsByName("geslacht7");
                                var alles7 = document.getElementsByClassName("7");
                                for(var i = 0; i < alles7.length; i++) {
                                    alles7[i].onchange = function() {
                                        for(var j = 0; j < geslacht7.length; j++) {
                                            if(geslacht7[j].checked == true) {
                                               var geslacht7Val = geslacht7[j].value;
                                            }
                                        }
                                        if((voornaam7.value == "" || voornaam7.value == null) && (achternaam7.value == "" || achternaam7.value == null) && 
                                          (email7.value == "" || email7.value == null) && (geslacht7Val == "" || geslacht7Val == null)) {
                                            voornaam7.required = false ;
                                            achternaam7.required = false ;
                                            email7.required = false ;
                                            geslacht7[0].required = false ;
                                        }
                                        else {
                                            voornaam7.required = true ;
                                            achternaam7.required = true ;
                                            email7.required = true ;
                                            geslacht7[0].required = true ;
                                        }
                                    };
                                }
                            </script>
                            </div>
                        <div class="panel-footer">*: Optioneel</div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingEight">
                            <h4 class="panel-title">
                                <a class = "accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberEight" aria-expanded="false" aria-controls="memberEight">
                                    Teamlid 8*
                                </a>
                            </h4>
                        </div>
                        <div id="memberEight" class="panel-collapse collapse" aria-labelledby="headingEight">
                            <div class="panel-body">
                                <div class="input-group col-xs-2">
                                    <label>Voornaam:</label>
                                    <input type="text" class="form-control 8" placeholder="Voornaam" id="voornaam8" name="voornaam8">
                                </div>
                                <div class="input-group col-xs-2">
                                    <label>Achternaam:</label>
                                    <input type="text" class="form-control 8" placeholder="Achternaam" id="achternaam8" name="achternaam8">
                                </div>
                                <div class="input-group col-xs-2">
                                    <label>E-mail:</label>
                                    <input type="email" class="form-control 8" placeholder="E-mail adres" id="email8" name="email8">
                                </div>
                                <label>Geslacht:</label>
                                    <input type="radio" name="geslacht8" id="geslachtTeamlid8-0" value="m">Man
                                    <input type="radio" name="geslacht8" id="geslachtTeamlid8-1" value="v">Vrouw
                            </div>
                            <script>
                                var voornaam8 = document.getElementById("voornaam8");
                                var achternaam8 = document.getElementById("achternaam8");
                                var email8 = document.getElementById("email8");
                                var geslacht8 = document.getElementsByName("geslacht8");
                                var alles8 = document.getElementsByClassName("8");
                                for(var i = 0; i < alles8.length; i++) {
                                    alles8[i].onchange = function() {
                                        for(var j = 0; j < geslacht8.length; j++) {
                                            if(geslacht8[j].checked == true) {
                                               var geslacht8Val = geslacht8[j].value;
                                            }
                                        }
                                        if((voornaam8.value == "" || voornaam8.value == null) && (achternaam8.value == "" || achternaam8.value == null) && 
                                          (email8.value == "" || email8.value == null) && (geslacht8Val == "" || geslacht8Val == null)) {
                                            voornaam8.required = false ;
                                            achternaam8.required = false ;
                                            email8.required = false ;
                                            geslacht8[0].required = false ;
                                        }
                                        else {
                                            voornaam8.required = true ;
                                            achternaam8.required = true ;
                                            email8.required = true ;
                                            geslacht8[0].required = true ;
                                        }
                                    };
                                }
                            </script>
                            </div>
                        <div class="panel-footer">*: Optioneel</div>
                    </div>
                    <div id="gaVerder">
                        <input type="submit" value="Ga verder" class="btn btn-primary"/>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>