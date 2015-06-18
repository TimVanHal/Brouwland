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
            
            $_SESSION['lang'] = "NL";
            
            include "../../php/db_config.php";
            include "../../php/beoordeling4db.php";
            
            include "../../php/checkDeadline.php";
            checkDeadline();
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
                            <div class="item"><a href="../../fr/jure/evaluer4.php" class="language">FR</a></div>
                            <div class="item"><a href="../../en/judge/evaluation4.php" class="language">ENG</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="http://www.mijnbier.be/nl/">Home</a></li>
                    <li><a href="keurderIndex.php">Keurder index</a></li>
                    <li><a href="http://www.mijnbier.be/nl/competitie-richtlijnen">About</a></li>
                    <li class="active"><a href="#">Beoordeling</a></li>
                    <li><a href="../logout.php">Afmelden</a></li>
                </ul>
            </div>
        </nav>
        <form id="form" action="" method="post">
            <div class="panel panel-default">
            <div class="panel-heading">Beoordelingsformulier</div>
                <div class="panel-body">
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a class = "accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberOne" aria-expanded="false" aria-controls="memberOne">
                                    Doordrinkbaarheid
                                </a>
                            </h4>
                        </div>
                        <div id="memberOne" class="panel-collapse collapse" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <br><input type="radio" name="doordrinkbaarheid" id="doordrinkbaarheid-0" value="5" required>Goed
                                <br><input type="radio" name="doordrinkbaarheid" id="doordrinkbaarheid-1" value="3">Redelijk
                                <br><input type="radio" name="doordrinkbaarheid" id="doordrinkbaarheid-2" value="1">Matig
                                <br><input type="radio" name="doordrinkbaarheid" id="doordrinkbaarheid-3" value="0">Slecht
                                <p id="puntenDoordrinkbaarheid"><font size=4>-<strong>/5</strong></font></p>
                            </div>
                        </div>
                        <script>
                            var element1 = document.getElementById("puntenDoordrinkbaarheid");
                            var radio1 = document.getElementsByName("doordrinkbaarheid");
                            var point = 0;
                            for(var i = 0; i < radio1.length; i++) {
                                radio1[i].onclick = function() {
                                    point = this.value;
                                    element1.innerHTML = "<font size=4>".concat(point, "<strong>/5</strong></font>");
                                };
                            }
                        </script>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class = "accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberTwo" aria-expanded="false" aria-controls="memberTwo">
                                    Balans
                                </a>
                            </h4>
                        </div>
                        <div id="memberTwo" class="panel-collapse collapse" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <br><input type="radio" name="balans" id="balans-0" value="5" required>Goed
                                <br><input type="radio" name="balans" id="balans-1" value="3">Redelijk
                                <br><input type="radio" name="balans" id="balans-2" value="1">Matig
                                <br><input type="radio" name="balans" id="balans-3" value="0">Slecht
                                <p id="puntenBalans"><font size=4>-<strong>/5</strong></font></p>
                            </div>
                        </div>
                        <script>
                            var element2 = document.getElementById("puntenBalans");
                            var radio2 = document.getElementsByName("balans");
                            var point = 0;
                            for(var i = 0; i < radio2.length; i++) {
                                radio2[i].onclick = function() {
                                    point = this.value;
                                    element2.innerHTML = "<font size=4>".concat(point, "<strong>/5</strong></font>");
                                };
                            }
                        </script>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class = "accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberThree" aria-expanded="false" aria-controls="memberThree">
                                    Basissmaak
                                </a>
                            </h4>
                        </div>
                        <div id="memberThree" class="panel-collapse collapse" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="input-group">
                                    <table id="table">
                                        <tr>
                                            <td></td>
                                            <td><strong>Zwak</strong></td>
                                            <td><strong>Matig</strong></td>
                                            <td><strong>Sterk</strong></td>
                                            <td><strong>NVT</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Bitter</td>
                                            <td><input class="radiobtn" type="radio" name="bitterness" id="bitterness-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="bitterness" id="bitterness-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="bitterness" id="bitterness-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="bitterness" id="bitterness-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Zoet</td>
                                            <td><input class="radiobtn" type="radio" name="sweetness" id="sweetness-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="sweetness" id="sweetness-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="sweetness" id="sweetness-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="sweetness" id="sweetness-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Zuur</td>
                                            <td><input class="radiobtn" type="radio" name="acidness" id="acidness-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="acidness" id="acidness-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="acidness" id="acidness-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="acidness" id="acidness-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Zout</td>
                                            <td><input class="radiobtn" type="radio" name="saltiness" id="saltiness-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="saltiness" id="saltiness-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="saltiness" id="saltiness-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="saltiness" id="saltiness-3" value="0"></td>
                                        </tr>
                                    </table>
                                </div>
                                <br><label>Punten:</label>
                                <div class="input-group">
                                    <div class="form-group col-xs-10">
                                        <input type="number" class="form-control" id="puntenBasissmaak" placeholder="0-5" min="0" max="5" name="puntenBasissmaak" required>/5
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class = "accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberFour" aria-expanded="false" aria-controls="memberFour">
                                    Mondgevoel
                                </a>
                            </h4>
                        </div>
                        <div id="memberFour" class="panel-collapse collapse" aria-labelledby="headingFour">
                            <div class="panel-body">
                                <div class="input-group">
                                    <table id="table">
                                        <tr>
                                            <td></td>
                                            <td><strong>Zwak</strong></td>
                                            <td><strong>Matig</strong></td>
                                            <td><strong>Sterk</strong></td>
                                            <td><strong>NVT</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Koolzuur</td>
                                            <td><input class="radiobtn" type="radio" name="carbonic" id="carbonic-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="carbonic" id="carbonic-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="carbonic" id="carbonic-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="carbonic" id="carbonic-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Droog</td>
                                            <td><input class="radiobtn" type="radio" name="dryness" id="dryness-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="dryness" id="dryness-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="dryness" id="dryness-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="dryness" id="dryness-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Metaalachtig</td>
                                            <td><input class="radiobtn" type="radio" name="metallic" id="metallic-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="metallic" id="metallic-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="metallic" id="metallic-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="metallic" id="metallic-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Plakkerig / mondklevend</td>
                                            <td><input class="radiobtn" type="radio" name="stickyness" id="stickyness-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="stickyness" id="stickyness-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="stickyness" id="stickyness-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="stickyness" id="stickyness-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Samentrekken / wrang</td>
                                            <td><input class="radiobtn" type="radio" name="constrict" id="constrict-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="constrict" id="constrict-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="constrict" id="constrict-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="constrict" id="constrict-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Vettig</td>
                                            <td><input class="radiobtn" type="radio" name="greasyness" id="greasyness-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="greasyness" id="greasyness-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="greasyness" id="greasyness-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="greasyness" id="greasyness-3" value="0"></td>
                                        </tr>
                                    </table>
                                </div>
                                <br><label>Punten:</label>
                                <div class="input-group">
                                    <div class="form-group col-xs-10">
                                        <input type="number" class="form-control" id="puntenMondgevoel" placeholder="0-5" min="0" max="5" name="puntenMondgevoel" required>/5
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingFive">
                            <h4 class="panel-title">
                                <a class = "accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberFive" aria-expanded="false" aria-controls="memberFive">
                                    Nasmaak
                                </a>
                            </h4>
                        </div>
                        <div id="memberFive" class="panel-collapse collapse" aria-labelledby="headingFive">
                            <div class="panel-body">
                                <div class="input-group">
                                    <table id="table">
                                        <tr>
                                            <td></td>
                                            <td><strong>Zwak</strong></td>
                                            <td><strong>Matig</strong></td>
                                            <td><strong>Sterk</strong></td>
                                            <td><strong>NVT</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Alcohol (verwarmend)</td>
                                            <td><input class="radiobtn" type="radio" name="alcoholic" id="alcoholic-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="alcoholic" id="alcoholic-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="alcoholic" id="alcoholic-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="alcoholic" id="alcoholic-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Bitter / hoppig</td>
                                            <td><input class="radiobtn" type="radio" name="bitter" id="bitter-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="bitter" id="bitter-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="bitter" id="bitter-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="bitter" id="bitter-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Branderig</td>
                                            <td><input class="radiobtn" type="radio" name="burning" id="burning-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="burning" id="burning-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="burning" id="burning-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="burning" id="burning-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Caramelachtig</td>
                                            <td><input class="radiobtn" type="radio" name="caramel" id="caramel-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="caramel" id="caramel-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="caramel" id="caramel-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="caramel" id="caramel-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Dropachtig</td>
                                            <td><input class="radiobtn" type="radio" name="liquorice" id="liquorice-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="liquorice" id="liquorice-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="liquorice" id="liquorice-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="liquorice" id="liquorice-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Fruitig</td>
                                            <td><input class="radiobtn" type="radio" name="fruity" id="fruity-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="fruity" id="fruity-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="fruity" id="fruity-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="fruity" id="fruity-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Gebrand</td>
                                            <td><input class="radiobtn" type="radio" name="burned" id="burned-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="burned" id="burned-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="burned" id="burned-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="burned" id="burned-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Gistachig</td>
                                            <td><input class="radiobtn" type="radio" name="yeast" id="yeast-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="yeast" id="yeast-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="yeast" id="yeast-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="yeast" id="yeast-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Kruidig</td>
                                            <td><input class="radiobtn" type="radio" name="spicy" id="spicy-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="spicy" id="spicy-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="spicy" id="spicy-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="spicy" id="spicy-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Medicinaal</td>
                                            <td><input class="radiobtn" type="radio" name="medicinal" id="medicinal-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="medicinal" id="medicinal-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="medicinal" id="medicinal-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="medicinal" id="medicinal-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Metaalachtig</td>
                                            <td><input class="radiobtn" type="radio" name="metal" id="metal-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="metal" id="metal-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="metal" id="metal-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="metal" id="metal-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Zoetig / moutig</td>
                                            <td><input class="radiobtn" type="radio" name="sweet" id="sweet-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="sweet" id="sweet-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="sweet" id="sweet-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="sweet" id="sweet-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Zout</td>
                                            <td><input class="radiobtn" type="radio" name="salt" id="salt-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="salt" id="salt-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="salt" id="salt-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="salt" id="salt-3" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="criteria">Zuur</td>
                                            <td><input class="radiobtn" type="radio" name="acid" id="acid-0" value="1" required></td>
                                            <td><input class="radiobtn" type="radio" name="acid" id="acid-1" value="2"></td>
                                            <td><input class="radiobtn" type="radio" name="acid" id="acid-2" value="3"></td>
                                            <td><input class="radiobtn" type="radio" name="acid" id="acid-3" value="0"></td>
                                        </tr>
                                    </table>
                                </div>
                                <br><label>Punten:</label>
                                <div class="input-group">
                                    <div class="form-group col-xs-10">
                                        <input type="number" class="form-control" id="puntenNasmaak" placeholder="0-15" min="0" max="15" name="puntenNasmaak" required>/15
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class = "accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberSix" aria-expanded="false" aria-controls="memberSix">
                                    Creativiteit
                                </a>
                            </h4>
                        </div>
                        <div id="memberSix" class="panel-collapse collapse" aria-labelledby="headingSix">
                            <div class="panel-body">
                                <br><input type="radio" name="creativiteit" id="creativiteit-0" value="5" required>Goed
                                <br><input type="radio" name="creativiteit" id="creativiteit-1" value="3">Redelijk
                                <br><input type="radio" name="creativiteit" id="creativiteit-2" value="1">Matig
                                <br><input type="radio" name="creativiteit" id="creativiteit-3" value="0">Slecht
                                <p id="puntenCreativiteit"><font size=4>-<strong>/5</strong></font></p>
                            </div>
                        </div>
                        <script>
                            var element3 = document.getElementById("puntenCreativiteit");
                            var radio3 = document.getElementsByName("creativiteit");
                            var point = 0;
                            for(var i = 0; i < radio3.length; i++) {
                                radio3[i].onclick = function() {
                                    point = this.value;
                                    element3.innerHTML = "<font size=4>".concat(point, "<strong>/5</strong></font>");
                                };
                            }
                        </script>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingSeven">
                            <h4 class="panel-title">
                                <a class = "accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberSeven" aria-expanded="false" aria-controls="memberSeven">
                                    Complexiteit
                                </a>
                            </h4>
                        </div>
                        <div id="memberSeven" class="panel-collapse collapse" aria-labelledby="headingSeven">
                            <div class="panel-body">
                                <br><input type="radio" name="complexiteit" id="complexiteit-0" value="5" required>Goed
                                <br><input type="radio" name="complexiteit" id="complexiteit-1" value="3">Redelijk
                                <br><input type="radio" name="complexiteit" id="complexiteit-2" value="1">Matig
                                <br><input type="radio" name="complexiteit" id="complexiteit-3" value="0">Slecht
                                <p id="puntenComplexiteit"><font size=4>-<strong>/5</strong></font></p>
                            </div>
                        </div>
                        <script>
                            var element4 = document.getElementById("puntenComplexiteit");
                            var radio4 = document.getElementsByName("complexiteit");
                            var point = 0;
                            for(var i = 0; i < radio4.length; i++) {
                                radio4[i].onclick = function() {
                                    point = this.value;
                                    element4.innerHTML = "<font size=4>".concat(point, "<strong>/5</strong></font>");
                                };
                            }
                        </script>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingEight">
                            <h4 class="panel-title">
                                <a class = "accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberEight" aria-expanded="false" aria-controls="memberEight">
                                    Voldoet aan opgegeven type
                                </a>
                            </h4>
                        </div>
                        <div id="memberEight" class="panel-collapse collapse" aria-labelledby="headingEight">
                            <div class="panel-body">
                                <br><input type="radio" name="type" id="type-0" value="5" required>Goed
                                <br><input type="radio" name="type" id="type-1" value="3">Redelijk
                                <br><input type="radio" name="type" id="type-2" value="1">Matig
                                <br><input type="radio" name="type" id="type-3" value="0">Slecht
                                <p id="puntenType"><font size=4>-<strong>/5</strong></font></p>
                            </div>
                        </div>
                        <script>
                            var element5 = document.getElementById("puntenType");
                            var radio5 = document.getElementsByName("type");
                            var point = 0;
                            for(var i = 0; i < radio5.length; i++) {
                                radio5[i].onclick = function() {
                                    point = this.value;
                                    element5.innerHTML = "<font size=4>".concat(point, "<strong>/5</strong></font>");
                                };
                            }
                        </script>
                    </div>
                    <div id="dienIn">
                        <input type="submit" value="Dien in!" class="btn btn-primary"/>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>