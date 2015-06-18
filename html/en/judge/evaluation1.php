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
            
            $_SESSION['lang']="EN";
            
            include "../../php/db_config.php";
            include "../../php/beoordeling1db.php";
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
                            <div class="item"><a href="../../fr/jure/evaluer1.php" class="language">FR</a></div>
                            <div class="item"><a href="../../nl/keurder/beoordeling1.php" class="language">NL</a></div>

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
                    <li class="active"><a href="#">Evaluation</a></li>
                </ul>
            </div>
        </nav>
        <form method="POST">
            <div class="panel panel-default">
            <div class="panel-heading">Judging Form</div>
                <div class="panel-body">
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a class = "accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberOne" aria-expanded="false" aria-controls="memberOne">
                                    Presentation
                                </a>
                            </h4>
                        </div>
                        <div id="memberOne" class="panel-collapse collapse" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div class="input-group">
                                    <br><input type="radio" name="presentatiecorrectheid" id="presentatiecorrectheid-0" value="1" onClick="showOptions();calcPoints();" required>Correct
                                    <br><input type="radio" name="presentatiecorrectheid" id="presentatiecorrectheid-1" value="0" onClick="showOptions();calcPoints();">Incorrect
                                </div>
                                <div class="input-group" id="fouteCheckBox">
                                    
                                </div>
                                <p id="puntenPresentatie"><font size=4>-<strong>/3</strong></font></p>
                                <script>
                                    var point = 3;
                                    var element0 = document.getElementById("puntenPresentatie");
                                    function showOptions() {
                                        if (document.getElementById('presentatiecorrectheid-1').checked) {
                                            $('#fouteCheckBox').html('<div id="fouteCheckBoxes"><br><input onClick="calcPoints()" type="checkbox" name="presentatieFles" id="presentatie-1" value="1">Niet correct: Fles'
                                                            + '<br><input type="checkbox" name="presentatieVulhoogte" onClick="calcPoints()" id="presentatie-2" value="1">Niet correct: Vulhoogte'
                                                            +'<br><input type="checkbox" name="presentatieUiterlijk" onClick="calcPoints()" id="presentatie-3" value="1">Niet correct: Uiterlijke kenmerken</div>');
                                        }
                                        if (document.getElementById('presentatiecorrectheid-0').checked) {
                                            $('#fouteCheckBoxes').remove();
                                        }
                                    }
                                    function calcPoints () {
                                        if (document.getElementById('presentatiecorrectheid-0').checked) {
                                            point = 3;
                                        }
                                        else if (document.getElementById('presentatiecorrectheid-1').checked) {
                                            if (document.getElementById('presentatie-1').checked && document.getElementById('presentatie-2').checked && document.getElementById('presentatie-3').checked) {
                                                point = 0;
                                            }
                                            else if ((document.getElementById('presentatie-1').checked && document.getElementById('presentatie-2').checked) || (document.getElementById('presentatie-2').checked && document.getElementById('presentatie-3').checked) || (document.getElementById('presentatie-1').checked && document.getElementById('presentatie-3').checked)) {
                                                point = 1;
                                            }
                                            else if (document.getElementById('presentatie-1').checked || document.getElementById('presentatie-2').checked || document.getElementById('presentatie-3').checked) {
                                                point = 2;
                                            }
                                            else {
                                                point = 3;
                                            }
                                        }
                                        element0.innerHTML = "<font size=4>".concat(point, "<strong>/3</strong></font>");
                                        var checkedAtLeastOne = false;
                                        $('input[type="checkbox"]').each(function() {
                                            if ($(this).is(":checked")) {
                                                checkedAtLeastOne = true;
                                            }
                                        });
                                        if (checkedAtLeastOne == false && document.getElementById('presentatiecorrectheid-1').checked){
                                            document.getElementById('presentatie-1').required = true;
                                        }
                                        else if (document.getElementById('presentatiecorrectheid-1').checked)
                                            document.getElementById('presentatie-1').required = false;
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class = "accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberTwo" aria-expanded="false" aria-controls="memberTwo">
                                    Carbonic
                                </a>
                            </h4>
                        </div>
                        <div id="memberTwo" class="panel-collapse collapse" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <input type="radio" name="koolzuur" id="koolzuur-0" value="geen" required>None
                                <br><input type="radio" name="koolzuur" id="koolzuur-1" value="weinig">Little
                                <br><input type="radio" name="koolzuur" id="koolzuur-2" value="correct">Correct
                                <br><input type="radio" name="koolzuur" id="koolzuur-3" value="overschuimend">Frothing over
                                <br><input type="radio" name="koolzuur" id="koolzuur-4" value="spuitend">Spouting
                                <p id="puntenKoolzuur"><font size=4>-<strong>/2</strong></font></p>
                            </div>
                        </div>
                        <script>
                            var element1 = document.getElementById("puntenKoolzuur");
                            var radio1 = document.getElementsByName("koolzuur");
                            var point = 2;
                            for(var i = 0; i < radio1.length; i++) {
                                radio1[i].onclick = function() {
                                    if(this.value == "geen" || this.value == "spuitend")
                                        point = 0;
                                    else if (this.value == "weinig" || this.value == "overschuimend")
                                        point = 1;
                                    else
                                        point = 2;
                                    element1.innerHTML = "<font size=4>".concat(point, "<strong>/2</strong></font>");
                                };
                            }
                        </script>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class = "accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberThree" aria-expanded="false" aria-controls="memberThree">
                                    Clarity
                                </a>
                            </h4>
                        </div>
                        <div id="memberThree" class="panel-collapse collapse" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <input type="radio" name="helderheid" id="helderheid-0" value="2" required>Correct according to type
                                <br><input type="radio" name="helderheid" id="helderheid-1" value="0">Incorrect
                                <br><br><strong>Extra:</strong>
                                <br><input type="checkbox" name="helderheidBriljant" id="helderheidExtra-0" value="briljant ">Brilliant
                                <br><input type="checkbox" name="helderheidHelder" id="helderheidExtra-1" value="helder ">Clear
                                <br><input type="checkbox" name="helderheidTweeschijn" id="helderheidExtra-2" value="tweeschijn ">Two shine
                                <br><input type="checkbox" name="helderheidMistig" id="helderheidExtra-3" value="mistig ">Foggy
                                <br><input type="checkbox" name="helderheidMelk" id="helderheidExtra-4" value="melkachtig ">Milky
                                <br><input type="checkbox" name="helderheidTroebel" id="helderheidExtra-5" value="troebel">Hazy
                                <p id="puntenHelderheid"><font size=4>-<strong>/2</strong></font></p>
                            </div>
                        </div>
                        <script>
                            var element2 = document.getElementById("puntenHelderheid");
                            var radio2 = document.getElementsByName("helderheid");
                            var point = 2;
                            for(var i = 0; i < radio2.length; i++) {
                                radio2[i].onclick = function() {
                                    point=this.value;
                                    element2.innerHTML = "<font size=4>".concat(point, "<strong>/2</strong></font>");
                                };
                            }
                        </script>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class = "accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#memberFour" aria-expanded="false" aria-controls="memberFour">
                                    Foam layer
                                </a>
                            </h4>
                        </div>
                        <div id="memberFour" class="panel-collapse collapse" aria-labelledby="headingFour">
                            <div class="panel-body">
                                <input type="radio" name="schuimkraag" id="schuimkraag-0" value="stabiel" required>Stable & staying
                                <br><input type="radio" name="schuimkraag" id="schuimkraag-1" value="inzakkend">Slow sagging or staying layer
                                <br><input type="radio" name="schuimkraag" id="schuimkraag-2" value="neerslaand">Downing
                                <br><input type="radio" name="schuimkraag" id="schuimkraag-3" value="cola">Cola-like
                                <br><input type="radio" name="schuimkraag" id="schuimkraag-4" value="geen">No foam
                                <br><br><strong>Extra:</strong>
                                <br><input type="checkbox" name="schuimkraagOngelijkmatig" id="schuimkraagExtra-0" value="ongelijkmatig ">Unbalanced foam
                                <br><input type="checkbox" name="schuimkraagMousse" id="schuimkraagExtra-1" value="mousse ">Mousse
                                <br><input type="checkbox" name="schuimkraagRomig" id="schuimkraagExtra-2" value="romig ">Creamy
                                <br><input type="checkbox" name="schuimkraagGlasplakkend" id="schuimkraagExtra-3" value="glasplakkend">Sticking to glass
                                <p id="puntenSchuimkraag"><font size=4>-<strong>/3</strong></font></p>
                            </div>
                        </div>
                        <script>
                            var element3 = document.getElementById("puntenSchuimkraag");
                            var radio3 = document.getElementsByName("schuimkraag");
                            var point = 0;
                            for(var i = 0; i < radio3.length; i++) {
                                radio3[i].onclick = function() {
                                    if(this.value == "stabiel")
                                        point = 3;
                                    else if(this.value == "inzakkend")
                                        point = 2;
                                    else if(this.value == "neerslaand")
                                        point = 1;
                                    else
                                        point = 0;
                                    element3.innerHTML = "<font size=4>".concat(point, "<strong>/3</strong></font>");
                                };
                            }
                        </script>
                    </div>
                    <div id="dienIn">
                        <input type="submit" value="Continue" class="btn btn-primary"/>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>