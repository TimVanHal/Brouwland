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
            
            $_SESSION["lang"] = "EN";
            
            include "../../php/db_config.php";
            include "../../php/beoordelen2db.php";
            
            include "../../php/checkDeadline.php";
            checkDeadline();
        ?>
        <div id="wrap">
            <div id="main">
                <div class="container_16">
                    <div class="grid_16">
                        <header><a href="#">
                                <div class="logo">Brouwland Beercompetition</div>
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
                            <div class="item"><a href="../../fr/jure/evaluer2.php" class="language">FR</a></div>
                            <div class="item"><a href="../../nl/keurder/beoordeling2.php" class="language">NL</a></div>

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
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
        <form method="post" action="">
            <div class="panel panel-default">
            <div class="panel-heading">Judge Form</div>
                <div class="panel-body">
                    <div class="panel panel-info">
                        <div class="panel-heading">Flavor and Smells</div>
                        <div class="panel-body">
                            <div class="input-group">
                                <table id="table">
                                    <tr>
                                        <th id="voorbeeldje">Smell - & Flavor association</th>
                                        <th colspan="4">Smell</th>
                                        <th colspan="4">Flavor</th>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje"><strong>Percevation - nuetral</strong></td>
                                        <td><strong>Weak</strong></td>
                                        <td><strong>Moderately</strong></td>
                                        <td><strong>Strong</strong></td>
                                        <td><strong>DNA</strong></td>
                                        <td><strong>Weakk</strong></td>
                                        <td><strong>Moderately</strong></td>
                                        <td><strong>Strong</strong></td>
                                        <td><strong>DNA</strong></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">Stramberry / rasberry / abricot</td>
                                        <td><input type="radio" name="aardbeiGeur" id="aardbei-0" value="1" required></td>
                                        <td><input type="radio" name="aardbeiGeur" id="aardbei-1" value="2"></td>
                                        <td><input type="radio" name="aardbeiGeur" id="aardbei-2" value="3"></td>
                                        <td><input type="radio" name="aardbeiGeur" id="aardbei-3" value="0"></td>
                                        <td><input type="radio" name="aardbeiSmaak" id="aardbei-4" value="1" required></td>
                                        <td><input type="radio" name="aardbeiSmaak" id="aardbei-5" value="2"></td>
                                        <td><input type="radio" name="aardbeiSmaak" id="aardbei-6" value="3"></td>
                                        <td><input type="radio" name="aardbeiSmaak" id="aardbei-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">Pineapple / banana / pear / melon</td>
                                        <td><input type="radio" name="ananasGeur" id="ananas-0" value="1" required></td>
                                        <td><input type="radio" name="ananasGeur" id="ananas-1" value="2"></td>
                                        <td><input type="radio" name="ananasGeur" id="ananas-2" value="3"></td>
                                        <td><input type="radio" name="ananasGeur" id="ananas-3" value="0"></td>
                                        <td><input type="radio" name="ananasSmaak" id="ananas-4" value="1" required></td>
                                        <td><input type="radio" name="ananasSmaak" id="ananas-5" value="2"></td>
                                        <td><input type="radio" name="ananasSmaak" id="ananas-6" value="3"></td>
                                        <td><input type="radio" name="ananasSmaak" id="ananas-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">Appel / citrus / cherry</td>
                                        <td><input type="radio" name="appelGeur" id="appel-0" value="1" required></td>
                                        <td><input type="radio" name="appelGeur" id="appel-1" value="2"></td>
                                        <td><input type="radio" name="appelGeur" id="appel-2" value="3"></td>
                                        <td><input type="radio" name="appelGeur" id="appel-3" value="0"></td>
                                        <td><input type="radio" name="appelSmaak" id="appel-4" value="1" required></td>
                                        <td><input type="radio" name="appelSmaak" id="appel-5" value="2"></td>
                                        <td><input type="radio" name="appelSmaak" id="appel-6" value="3"></td>
                                        <td><input type="radio" name="appelSmaak" id="appel-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">Forest / elderberry / black berry</td>
                                        <td><input type="radio" name="bosGeur" id="bos-0" value="1" required></td>
                                        <td><input type="radio" name="bosGeur" id="bos-1" value="2"></td>
                                        <td><input type="radio" name="bosGeur" id="bos-2" value="3"></td>
                                        <td><input type="radio" name="bosGeur" id="bos-3" value="0"></td>
                                        <td><input type="radio" name="bosSmaak" id="bos-4" value="1" required></td>
                                        <td><input type="radio" name="bosSmaak" id="bos-5" value="2"></td>
                                        <td><input type="radio" name="bosSmaak" id="bos-6" value="3"></td>
                                        <td><input type="radio" name="bosSmaak" id="bos-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">Caramel / sirup / Liquorice</td>
                                        <td><input type="radio" name="caramelGeur" id="caramel-0" value="1" required></td>
                                        <td><input type="radio" name="caramelGeur" id="caramel-1" value="2"></td>
                                        <td><input type="radio" name="caramelGeur" id="caramel-2" value="3"></td>
                                        <td><input type="radio" name="caramelGeur" id="caramel-3" value="0"></td>
                                        <td><input type="radio" name="caramelSmaak" id="caramel-4" value="1" required></td>
                                        <td><input type="radio" name="caramelSmaak" id="caramel-5" value="2"></td>
                                        <td><input type="radio" name="caramelSmaak" id="caramel-6" value="3"></td>
                                        <td><input type="radio" name="caramelSmaak" id="caramel-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">Fruity (esters)</td>
                                        <td><input type="radio" name="fruitigGeur" id="fruitig-0" value="1" required></td>
                                        <td><input type="radio" name="fruitigGeur" id="fruitig-1" value="2"></td>
                                        <td><input type="radio" name="fruitigGeur" id="fruitig-2" value="3"></td>
                                        <td><input type="radio" name="fruitigGeur" id="fruitig-3" value="0"></td>
                                        <td><input type="radio" name="fruitigSmaak" id="fruitig-4" value="1" required></td>
                                        <td><input type="radio" name="fruitigSmaak" id="fruitig-5" value="2"></td>
                                        <td><input type="radio" name="fruitigSmaak" id="fruitig-6" value="3"></td>
                                        <td><input type="radio" name="fruitigSmaak" id="fruitig-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">Burned</td>
                                        <td><input type="radio" name="gebrandGeur" id="gebrand-0" value="1" required></td>
                                        <td><input type="radio" name="gebrandGeur" id="gebrand-1" value="2"></td>
                                        <td><input type="radio" name="gebrandGeur" id="gebrand-2" value="3"></td>
                                        <td><input type="radio" name="gebrandGeur" id="gebrand-3" value="0"></td>
                                        <td><input type="radio" name="gebrandSmaak" id="gebrand-4" value="1" required></td>
                                        <td><input type="radio" name="gebrandSmaak" id="gebrand-5" value="2"></td>
                                        <td><input type="radio" name="gebrandSmaak" id="gebrand-6" value="3"></td>
                                        <td><input type="radio" name="gebrandSmaak" id="gebrand-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">Ginger / cinnamon / gale</td>
                                        <td><input type="radio" name="gemberGeur" id="gember-0" value="1" required></td>
                                        <td><input type="radio" name="gemberGeur" id="gember-1" value="2"></td>
                                        <td><input type="radio" name="gemberGeur" id="gember-2" value="3"></td>
                                        <td><input type="radio" name="gemberGeur" id="gember-3" value="0"></td>
                                        <td><input type="radio" name="gemberSmaak" id="gember-4" value="1" required></td>
                                        <td><input type="radio" name="gemberSmaak" id="gember-5" value="2"></td>
                                        <td><input type="radio" name="gemberSmaak" id="gember-6" value="3"></td>
                                        <td><input type="radio" name="gemberSmaak" id="gember-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">Yeasty</td>
                                        <td><input type="radio" name="gistachtigGeur" id="gistachtig-0" value="1" required></td>
                                        <td><input type="radio" name="gistachtigGeur" id="gistachtig-1" value="2"></td>
                                        <td><input type="radio" name="gistachtigGeur" id="gistachtig-2" value="3"></td>
                                        <td><input type="radio" name="gistachtigGeur" id="gistachtig-3" value="0"></td>
                                        <td><input type="radio" name="gistachtigSmaak" id="gistachtig-4" value="1" required></td>
                                        <td><input type="radio" name="gistachtigSmaak" id="gistachtig-5" value="2"></td>
                                        <td><input type="radio" name="gistachtigSmaak" id="gistachtig-6" value="3"></td>
                                        <td><input type="radio" name="gistachtigSmaak" id="gistachtig-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">Higher alcohol</td>
                                        <td><input type="radio" name="hogereAlcoholenGeur" id="hogereAlcoholen-0" value="1" required></td>
                                        <td><input type="radio" name="hogereAlcoholenGeur" id="hogereAlcoholen-1" value="2"></td>
                                        <td><input type="radio" name="hogereAlcoholenGeur" id="hogereAlcoholen-2" value="3"></td>
                                        <td><input type="radio" name="hogereAlcoholenGeur" id="hogereAlcoholen-3" value="0"></td>
                                        <td><input type="radio" name="hogereAlcoholenSmaak" id="hogereAlcoholen-4" value="1" required></td>
                                        <td><input type="radio" name="hogereAlcoholenSmaak" id="hogereAlcoholen-5" value="2"></td>
                                        <td><input type="radio" name="hogereAlcoholenSmaak" id="hogereAlcoholen-6" value="3"></td>
                                        <td><input type="radio" name="hogereAlcoholenSmaak" id="hogereAlcoholen-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">Hoppy / bitter</td>
                                        <td><input type="radio" name="hoppigGeur" id="hoppig-0" value="1" required></td>
                                        <td><input type="radio" name="hoppigGeur" id="hoppig-1" value="2"></td>
                                        <td><input type="radio" name="hoppigGeur" id="hoppig-2" value="3"></td>
                                        <td><input type="radio" name="hoppigGeur" id="hoppig-3" value="0"></td>
                                        <td><input type="radio" name="hoppigSmaak" id="hoppig-4" value="1" required></td>
                                        <td><input type="radio" name="hoppigSmaak" id="hoppig-5" value="2"></td>
                                        <td><input type="radio" name="hoppigSmaak" id="hoppig-6" value="3"></td>
                                        <td><input type="radio" name="hoppigSmaak" id="hoppig-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">Parsley / cumin</td>
                                        <td><input type="radio" name="korianderGeur" id="koriander-0" value="1" required></td>
                                        <td><input type="radio" name="korianderGeur" id="koriander-1" value="2"></td>
                                        <td><input type="radio" name="korianderGeur" id="koriander-2" value="3"></td>
                                        <td><input type="radio" name="korianderGeur" id="koriander-3" value="0"></td>
                                        <td><input type="radio" name="korianderSmaak" id="koriander-4" value="1" required></td>
                                        <td><input type="radio" name="korianderSmaak" id="koriander-5" value="2"></td>
                                        <td><input type="radio" name="korianderSmaak" id="koriander-6" value="3"></td>
                                        <td><input type="radio" name="korianderSmaak" id="koriander-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">Spicey / flowerlike</td>
                                        <td><input type="radio" name="kruidigGeur" id="kruidig-0" value="1" required></td>
                                        <td><input type="radio" name="kruidigGeur" id="kruidig-1" value="2"></td>
                                        <td><input type="radio" name="kruidigGeur" id="kruidig-2" value="3"></td>
                                        <td><input type="radio" name="kruidigGeur" id="kruidig-3" value="0"></td>
                                        <td><input type="radio" name="kruidigSmaak" id="kruidig-4" value="1" required></td>
                                        <td><input type="radio" name="kruidigSmaak" id="kruidig-5" value="2"></td>
                                        <td><input type="radio" name="kruidigSmaak" id="kruidig-6" value="3"></td>
                                        <td><input type="radio" name="kruidigSmaak" id="kruidig-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">Kummel / clove</td>
                                        <td><input type="radio" name="kummelGeur" id="kummel-0" value="1" required></td>
                                        <td><input type="radio" name="kummelGeur" id="kummel-1" value="2"></td>
                                        <td><input type="radio" name="kummelGeur" id="kummel-2" value="3"></td>
                                        <td><input type="radio" name="kummelGeur" id="kummel-3" value="0"></td>
                                        <td><input type="radio" name="kummelSmaak" id="kummel-4" value="1" required></td>
                                        <td><input type="radio" name="kummelSmaak" id="kummel-5" value="2"></td>
                                        <td><input type="radio" name="kummelSmaak" id="kummel-6" value="3"></td>
                                        <td><input type="radio" name="kummelSmaak" id="kummel-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">lactic acid / citrus juice</td>
                                        <td><input type="radio" name="melkzuurGeur" id="melkzuur-0" value="1" required></td>
                                        <td><input type="radio" name="melkzuurGeur" id="melkzuur-1" value="2"></td>
                                        <td><input type="radio" name="melkzuurGeur" id="melkzuur-2" value="3"></td>
                                        <td><input type="radio" name="melkzuurGeur" id="melkzuur-3" value="0"></td>
                                        <td><input type="radio" name="melkzuurSmaak" id="melkzuur-4" value="1" required></td>
                                        <td><input type="radio" name="melkzuurSmaak" id="melkzuur-5" value="2"></td>
                                        <td><input type="radio" name="melkzuurSmaak" id="melkzuur-6" value="3"></td>
                                        <td><input type="radio" name="melkzuurSmaak" id="melkzuur-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">Malty / barley / wheat / grain</td>
                                        <td><input type="radio" name="moutigGeur" id="moutig-0" value="1" required></td>
                                        <td><input type="radio" name="moutigGeur" id="moutig-1" value="2"></td>
                                        <td><input type="radio" name="moutigGeur" id="moutig-2" value="3"></td>
                                        <td><input type="radio" name="moutigGeur" id="moutig-3" value="0"></td>
                                        <td><input type="radio" name="moutigSmaak" id="moutig-4" value="1" required></td>
                                        <td><input type="radio" name="moutigSmaak" id="moutig-5" value="2"></td>
                                        <td><input type="radio" name="moutigSmaak" id="moutig-6" value="3"></td>
                                        <td><input type="radio" name="moutigSmaak" id="moutig-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">Sherry / porto / vanilla</td>
                                        <td><input type="radio" name="sherryGeur" id="sherry-0" value="1" required></td>
                                        <td><input type="radio" name="sherryGeur" id="sherry-1" value="2"></td>
                                        <td><input type="radio" name="sherryGeur" id="sherry-2" value="3"></td>
                                        <td><input type="radio" name="sherryGeur" id="sherry-3" value="0"></td>
                                        <td><input type="radio" name="sherrySmaak" id="sherry-4" value="1" required></td>
                                        <td><input type="radio" name="sherrySmaak" id="sherry-5" value="2"></td>
                                        <td><input type="radio" name="sherrySmaak" id="sherry-6" value="3"></td>
                                        <td><input type="radio" name="sherrySmaak" id="sherry-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">Liquorice / anise</td>
                                        <td><input type="radio" name="zoethoutGeur" id="zoethout-0" value="1" required></td>
                                        <td><input type="radio" name="zoethoutGeur" id="zoethout-1" value="2"></td>
                                        <td><input type="radio" name="zoethoutGeur" id="zoethout-2" value="3"></td>
                                        <td><input type="radio" name="zoethoutGeur" id="zoethout-3" value="0"></td>
                                        <td><input type="radio" name="zoethoutSmaak" id="zoethout-4" value="1" required></td>
                                        <td><input type="radio" name="zoethoutSmaak" id="zoethout-5" value="2"></td>
                                        <td><input type="radio" name="zoethoutSmaak" id="zoethout-6" value="3"></td>
                                        <td><input type="radio" name="zoethoutSmaak" id="zoethout-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">Sweet / honey / Candy</td>
                                        <td><input type="radio" name="zoetigGeur" id="zoetig-0" value="1" required></td>
                                        <td><input type="radio" name="zoetigGeur" id="zoetig-1" value="2"></td>
                                        <td><input type="radio" name="zoetigGeur" id="zoetig-2" value="3"></td>
                                        <td><input type="radio" name="zoetigGeur" id="zoetig-3" value="0"></td>
                                        <td><input type="radio" name="zoetigSmaak" id="zoetig-4" value="1" required></td>
                                        <td><input type="radio" name="zoetigSmaak" id="zoetig-5" value="2"></td>
                                        <td><input type="radio" name="zoetigSmaak" id="zoetig-6" value="3"></td>
                                        <td><input type="radio" name="zoetigSmaak" id="zoetig-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">Salty</td>
                                        <td><input type="radio" name="zoutigGeur" id="zoutig-0" value="1" required></td>
                                        <td><input type="radio" name="zoutigGeur" id="zoutig-1" value="2"></td>
                                        <td><input type="radio" name="zoutigGeur" id="zoutig-2" value="3"></td>
                                        <td><input type="radio" name="zoutigGeur" id="zoutig-3" value="0"></td>
                                        <td><input type="radio" name="zoutigSmaak" id="zoutig-4" value="1" required></td>
                                        <td><input type="radio" name="zoutigSmaak" id="zoutig-5" value="2"></td>
                                        <td><input type="radio" name="zoutigSmaak" id="zoutig-6" value="3"></td>
                                        <td><input type="radio" name="zoutigSmaak" id="zoutig-7" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td id="voorbeeldje">other: <input type="text" name="WaarneembaarAndere"/></td>
                                        <td><input type="radio" name="waarneembaarAndereGeur" id="WaarneembaarAndere-0" value="1"></td>
                                        <td><input type="radio" name="waarneembaarAndereGeur" id="WaarneembaarAndere-1" value="2"></td>
                                        <td><input type="radio" name="waarneembaarAndereGeur" id="WaarneembaarAndere-2" value="3"></td>
                                        <td><input type="radio" name="waarneembaarAndereGeur" id="WaarneembaarAndere-3" value="0"></td>
                                        <td><input type="radio" name="waarneembaarAndereSmaak" id="WaarneembaarAndere-4" value="1"></td>
                                        <td><input type="radio" name="waarneembaarAndereSmaak" id="WaarneembaarAndere-5" value="2"></td>
                                        <td><input type="radio" name="waarneembaarAndereSmaak" id="WaarneembaarAndere-6" value="3"></td>
                                        <td><input type="radio" name="waarneembaarAndereSmaak" id="WaarneembaarAndere-7" value="0"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="dienIn">
                        <input type="submit" value="Continue" class="btn btn-primary"/>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>