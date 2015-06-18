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
        <meta charset=utf-16 />
    </head>
    <body>
        <?php
            session_start();
            
            $_SESSION['lang'] = "EN";
            
            include "../../php/checkAuth.php";
            checkAuth();
            
            include "../../php/db_config.php"; // Alle database gegevens
            include "../../php/deadlinedb.php";
            mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
            // Het selecteren van de database
            mysql_select_db ($mysql["db"]);
        ?>
        <div id="wrap">
            <div id="main">
                <div class="container_16">
                    <div class="grid_16">
                        <header><a href="#">
                                <div class="logo-en">Brouwland Biercompetitie</div>
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
                            <div class="item"><a href="../../fr/admin/deadlines.php" class="language">FR</a></div>
                            <div class="item"><a href="../../nl/admin/deadlines.php" class="language">NL</a></div>
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
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
        <form method="POST">
            <div class="panel panel-default">
            <div class="panel-heading">Set deadlines</div>
                <div class="panel-body">
                    <strong>Current dates:</strong><br>
                <br><label>Start registration:</label>
                    <span id="currentStartIn">
                        <?php
                            $query = "SELECT datum FROM deadlines WHERE voor='start inschrijving'";
                            $result = mysql_query($query) or die ('Error updating' . mysql_error());
                            $data = mysql_fetch_assoc($result);
                            echo $data['datum'];
                        ?>
                    </span>
                    <div class="input-group col-xs-2" id="startInschrijving" style="display:none">
                        <input type="date" class="form-control" placeholder="YYYY-MM-DD" id="startInschr" name="startInschr">
                    </div>
                    <span id="editBtn1">
                        <button type="button" onclick="swap('startInschrijving', 'currentStartIn', 'editBtn1')"><span class="glyphicon glyphicon-edit"></span></button>
                    </span>
                <br><label>End registration:</label>
                    <span id="currentEndIn">
                        <?php
                            $query = "SELECT datum FROM deadlines WHERE voor='einde inschrijving'";
                            $result = mysql_query($query) or die ('Error updating' . mysql_error());
                            $data = mysql_fetch_assoc($result);
                            echo $data['datum'];
                        ?>
                    </span>
                    <div class="input-group col-xs-2" id="endInschrijving" style="display:none">
                        <input type="date" class="form-control" placeholder="YYYY-MM-DD" id="endInschr" name="endInschr">
                    </div>
                    <span id="editBtn2">
                        <button type="button" onclick="swap('endInschrijving', 'currentEndIn', 'editBtn2')"><span class="glyphicon glyphicon-edit"></span></button>
                    </span>
                <br><label>Start evaluations:</label>
                    <span id="currentStartBo">
                        <?php
                            $query = "SELECT datum FROM deadlines WHERE voor='start beoordeling'";
                            $result = mysql_query($query) or die ('Error updating' . mysql_error());
                            $data = mysql_fetch_assoc($result);
                            echo $data['datum'];
                        ?>
                    </span>
                    <div class="input-group col-xs-2" id="startBeoordeling" style="display:none">
                        <input type="date" class="form-control" placeholder="YYYY-MM-DD" id="startBo" name="startBo">
                    </div>
                    <span id="editBtn3">
                        <button type="button" onclick="swap('startBeoordeling', 'currentStartBo', 'editBtn3')"><span class="glyphicon glyphicon-edit"></span></button>
                    </span>
                <br><label>End evaluations:</label>
                    <span id="currentEndBo">
                        <?php
                            $query = "SELECT datum FROM deadlines WHERE voor='einde beoordeling'";
                            $result = mysql_query($query) or die ('Error updating' . mysql_error());
                            $data = mysql_fetch_assoc($result);
                            echo $data['datum'];
                        ?>
                    </span>
                    <div class="input-group col-xs-2" id="endBeoordeling" style="display:none">
                        <input type="date" class="form-control" placeholder="YYYY-MM-DD" id="endBo" name="endBo">
                    </div>
                    <span id="editBtn4">
                        <button type="button" onclick="swap('endBeoordeling', 'currentEndBo', 'editBtn4')"><span class="glyphicon glyphicon-edit"></span></button>
                    </span>
                <br><label>Deadline beer delivery:</label>
                    <span id="currentIndien">
                        <?php
                            $query = "SELECT datum FROM deadlines WHERE voor='indienen bier'";
                            $result = mysql_query($query) or die ('Error updating' . mysql_error());
                            $data = mysql_fetch_assoc($result);
                            echo $data['datum'];
                        ?>
                    </span>
                    <div class="input-group col-xs-2" id="indien" style="display:none">
                        <input type="date" class="form-control" placeholder="YYYY-MM-DD" id="indienen" name="indienen">
                    </div>
                    <span id="editBtn5">
                        <button type="button" onclick="swap('indien', 'currentIndien', 'editBtn5')"><span class="glyphicon glyphicon-edit"></span></button>
                    </span>
                </div>
            </div>
            <div id="dienIn">
                <input type="submit" value="Save" class="btn btn-primary"/>
            </div>
        </form>
    </body>
</html>