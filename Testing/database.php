<?php
    $servername = "localhost";
    $username = "root";
    $password = "APBrouwland";
    $dbname = "brouwland";
    
    mysql_connect("localhost", "root", "APBrouwland") or die(mysql_error());
    mysql_select_db("brouwland") or die(mysql_error());
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <?php
            $id = 100;            
            $flesnr = 14;

            $data14 = mysql_query("SELECT * FROM beoordeling WHERE bierId = $flesnr")  or die(mysql_error());
            $info14 = mysql_fetch_array($data14);
            print "<h1>Selecteer bier</h1>";
            print "<b>Flesnr: </b><b id = $id>$flesnr</b></br>";

            print "</br><h3>Einde beoordeling 0</h3>";
            print "</br>";

//-----------------------------------------------------------------------------------------------
            $presentatieId = $info14['presentatieId'];
            $data = mysql_query("SELECT * FROM presentatie WHERE id = $presentatieId")  or die(mysql_error());
            $info = mysql_fetch_array($data);
            print "<h1>Presentatie</h1>"; 
            $id++;
            print "<b>PresentatieId: </b><b id=$id>" . $presentatieId ."</b></br>";
            $id++;
            print "<b>Fles: </b><b id=$id>" .$info['fles'] ."</b></br>";
            $id++;
            print "<b>Vulhoogte: </b><b id=$id>" .$info['vulhoogte'] ."</b></br>";
            $id++;
            print "<b>Uiterlijk: </b><b id=$id>" .$info['uiterlijk'] ."</b></br>";

            print "</br>";
            
            $koolzuurId = $info14['koolzuurId'];
            $data = mysql_query("SELECT * FROM koolzuur WHERE id = $koolzuurId")  or die(mysql_error());
            $info = mysql_fetch_array($data);
            print "<h1>Koolzuur</h1>"; 
            $id++;
            print "<b>KoolzuurId: </b><b id=$id>" . $koolzuurId ."</b></br>";
            $id++;
            print "<b>Geen: </b><b id=$id>" .$info['geen'] ."</b></br>";
            $id++;
            print "<b>Weinig: </b><b id=$id>" .$info['weinig'] ."</b></br>";
            $id++;
            print "<b>Correct: </b><b id=$id>" .$info['correct'] ."</b></br>";
            $id++;
            print "<b>Overschuimend: </b><b id=$id>" .$info['overschuimend'] ."</b></br>";
            $id++;
            print "<b>Spuitend: </b><b id=$id>" .$info['spuitend'] ."</b></br>";

            print "</br>";

            $helderheidId = $info14['helderheidId'];
            $data = mysql_query("SELECT * FROM helderheid WHERE id = $helderheidId")  or die(mysql_error());
            $info = mysql_fetch_array($data);
            print "<h1>Helderheid</h1>"; 
            $id++;
            print "<b>HelderheidId: </b><b id=$id>" . $helderheidId ."</b></br>";
            $id++;
            print "<b>Correct: </b><b id=$id>" .$info['correct'] ."</b></br>";
            $id++;
            print "<b>Extra: </b><b id=$id>" .$info['extra'] ."</b></br>";

            print "</br>";

            $schuimkraagId = $info14['schuimkraagId'];
            $data = mysql_query("SELECT * FROM schuimkraag WHERE id = $schuimkraagId")  or die(mysql_error());
            $info = mysql_fetch_array($data);
            print "<h1>Schuimkraag</h1>"; 
            $id++;
            print "<b>SchuimkraagId: </b><b id=$id>" . $schuimkraagId ."</b></br>";
            $id++;
            print "<b>Stabiel: </b><b id=$id>" .$info['stabiel'] ."</b></br>";
            $id++;
            print "<b>Inzakkend: </b><b id=$id>" .$info['inzakkend'] ."</b></br>";
            $id++;
            print "<b>Neerslaand: </b><b id=$id>" .$info['neerslaand'] ."</b></br>";
            $id++;
            print "<b>Cola: </b><b id=$id>" .$info['cola'] ."</b></br>";
            $id++;
            print "<b>Geen: </b><b id=$id>" .$info['geen'] ."</b></br>";
            $id++;
            print "<b>Extra: </b><b id=$id>" .$info['extra'] ."</b></br>";

            print "</br><h3>Einde beoordeling 1</h3>";
            print "</br>";

//-----------------------------------------------------------------------------------------------
            print "<h1>Smaak en geuren</h1>"; 

            $geurId = $info14['geurId'];
            $data = mysql_query("SELECT * FROM geur WHERE id = $geurId")  or die(mysql_error());
            $info = mysql_fetch_array($data);
            print "<h2>Geur</h2>";
            $id++;
            print "<b>GeurId: </b><b id=$id>" .$geurId ."</b></br>";
            
            $geurneutraalId = $info['neutraalId'];
            $id++;
            print "<b>GeurneutraalId: </b><b id=$id>" .$geurneutraalId ."</b></br>";
            $data = mysql_query("SELECT * FROM geurneutraal WHERE id = $geurneutraalId");
            $extrainfo = mysql_fetch_array($data);
            $id++;
            print "<b>Aardbei: </b><b id=$id>" .$extrainfo['aardbei'] ."</b></br>";
            $id++;
            print "<b>Ananas: </b><b id=$id>" .$extrainfo['ananas'] ."</b></br>";
            $id++;
            print "<b>Appel: </b><b id=$id>" .$extrainfo['appel'] ."</b></br>";
            $id++;
            print "<b>Bessen: </b><b id=$id>" .$extrainfo['bessen'] ."</b></br>";
            $id++;
            print "<b>Caramel: </b><b id=$id>" .$extrainfo['caramel'] ."</b></br>";
            $id++;
            print "<b>Fruitig: </b><b id=$id>" .$extrainfo['fruitig'] ."</b></br>";
            $id++;
            print "<b>Gebrand: </b><b id=$id>" .$extrainfo['gebrand'] ."</b></br>";
            $id++;
            print "<b>Kaneel: </b><b id=$id>" .$extrainfo['kaneel'] ."</b></br>";
            $id++;
            print "<b>Gistachtig: </b><b id=$id>" .$extrainfo['gistachtig'] ."</b></br>";
            $id++;
            print "<b>Hogere Alcoholen: </b><b id=$id>" .$extrainfo['hogereAlcoholen'] ."</b></br>";
            $id++;
            print "<b>Hoppig: </b><b id=$id>" .$extrainfo['hoppig'] ."</b></br>";
            $id++;
            print "<b>Koriander: </b><b id=$id>" .$extrainfo['koriander'] ."</b></br>";
            $id++;
            print "<b>Kruidig: </b><b id=$id>" .$extrainfo['kruidig'] ."</b></br>";
            $id++;
            print "<b>Kruidnagel: </b><b id=$id>" .$extrainfo['kruidnagel'] ."</b></br>";
            $id++;
            print "<b>Melkzuur: </b><b id=$id>" .$extrainfo['melkzuur'] ."</b></br>";
            $id++;
            print "<b>Graan: </b><b id=$id>" .$extrainfo['graan'] ."</b></br>";
            $id++;
            print "<b>Vanille: </b><b id=$id>" .$extrainfo['vanille'] ."</b></br>";
            $id++;
            print "<b>Anijs: </b><b id=$id>" .$extrainfo['anijs'] ."</b></br>";
            $id++;
            print "<b>Zoetig: </b><b id=$id>" .$extrainfo['zoetig'] ."</b></br>";
            $id++;
            print "<b>Zoutig: </b><b id=$id>" .$extrainfo['zoutig'] ."</b></br>";
            $id++;
            print "<b>Andere: </b><b id=$id>" .$extrainfo['andere'] ."</b></br>";
            $id++;
            print "<b>Waarde andere: </b><b id=$id>" .$extrainfo['waardeAndere'] ."</b></br>";
            
            $smaakId = $info14['smaakId'];
            $data = mysql_query("SELECT * FROM smaak WHERE id = $smaakId")  or die(mysql_error());
            $info = mysql_fetch_array($data);
            $id++;
            print "<b>SmaakId: </b><b id=$id>" .$smaakId ."</b></br>";
            
            print "<h2>Smaak</h2>";
            $smaakneutraalId = $info['neutraalId'];
            $id++;
            print "<b>SmaakneutraalId: </b><b id=$id>" .$smaakneutraalId ."</b></br>";
            $data = mysql_query("SELECT * FROM smaakneutraal WHERE id = $smaakneutraalId");
            $extrainfo = mysql_fetch_array($data);
            $id++;
            print "<b>Aardbei: </b><b id=$id>" .$extrainfo['aardbei'] ."</b></br>";
            $id++;
            print "<b>Ananas: </b><b id=$id>" .$extrainfo['ananas'] ."</b></br>";
            $id++;
            print "<b>Appel: </b><b id=$id>" .$extrainfo['appel'] ."</b></br>";
            $id++;
            print "<b>Bessen: </b><b id=$id>" .$extrainfo['bessen'] ."</b></br>";
            $id++;
            print "<b>Caramel: </b><b id=$id>" .$extrainfo['caramel'] ."</b></br>";
            $id++;
            print "<b>Fruitig: </b><b id=$id>" .$extrainfo['fruitig'] ."</b></br>";
            $id++;
            print "<b>Gebrand: </b><b id=$id>" .$extrainfo['gebrand'] ."</b></br>";
            $id++;
            print "<b>Kaneel: </b><b id=$id>" .$extrainfo['kaneel'] ."</b></br>";
            $id++;
            print "<b>Gistachtig: </b><b id=$id>" .$extrainfo['gistachtig'] ."</b></br>";
            $id++;
            print "<b>Hogere Alcoholen: </b><b id=$id>" .$extrainfo['hogereAlcoholen'] ."</b></br>";
            $id++;
            print "<b>Hoppig: </b><b id=$id>" .$extrainfo['hoppig'] ."</b></br>";
            $id++;
            print "<b>Koriander: </b><b id=$id>" .$extrainfo['koriander'] ."</b></br>";
            $id++;
            print "<b>Kruidig: </b><b id=$id>" .$extrainfo['kruidig'] ."</b></br>";
            $id++;
            print "<b>Kruidnagel: </b><b id=$id>" .$extrainfo['kruidnagel'] ."</b></br>";
            $id++;
            print "<b>Melkzuur: </b><b id=$id>" .$extrainfo['melkzuur'] ."</b></br>";
            $id++;
            print "<b>Graan: </b><b id=$id>" .$extrainfo['graan'] ."</b></br>";
            $id++;
            print "<b>Vanille: </b><b id=$id>" .$extrainfo['vanille'] ."</b></br>";
            $id++;
            print "<b>Anijs: </b><b id=$id>" .$extrainfo['anijs'] ."</b></br>";
            $id++;
            print "<b>Zoetig: </b><b id=$id>" .$extrainfo['zoetig'] ."</b></br>";
            $id++;
            print "<b>Zoutig: </b><b id=$id>" .$extrainfo['zoutig'] ."</b></br>";
            $id++;
            print "<b>Andere: </b><b id=$id>" .$extrainfo['andere'] ."</b></br>";
            $id++;
            print "<b>Waarde andere: </b><b id=$id>" .$extrainfo['waardeAndere'] ."</b></br>";
            
            print "</br><h3>Einde beoordeling 2</h3>";
            print "</br>";

//-----------------------------------------------------------------------------------------------
            print "<h1>Smaak en geuren</h1>"; 

            $geurId = $info14['geurId'];
            $data = mysql_query("SELECT * FROM geur WHERE id = $geurId")  or die(mysql_error());
            $info = mysql_fetch_array($data);
            $id++;
            print "<b>GeurId: </b><b id=$id>" .$geurId ."</b></br>";

            $afwijkingenId = $info['afwijkingenId'];
            $id++;
            print "<b>afwijkingenId: </b><b id=$id>" .$afwijkingenId ."</b></br>";
            $data = mysql_query("SELECT * FROM geurafwijkingen WHERE id = $afwijkingenId");
            $extrainfo = mysql_fetch_array($data);
            $id++;
            print "<b>Groene Appel: </b><b id=$id>" .$extrainfo['groeneAppel'] ."</b></br>";
            $id++;
            print "<b>Azijnzuur: </b><b id=$id>" .$extrainfo['azijnzuur'] ."</b></br>";
            $id++;
            print "<b>Olie: </b><b id=$id>" .$extrainfo['olie'] ."</b></br>";
            $id++;
            print "<b>Branderig: </b><b id=$id>" .$extrainfo['branderig'] ."</b></br>";
            $id++;
            print "<b>Chloor: </b><b id=$id>" .$extrainfo['chloor'] ."</b></br>";
            $id++;
            print "<b>Dms: </b><b id=$id>" .$extrainfo['dms'] ."</b></br>";
            $id++;
            print "<b>Fenolen: </b><b id=$id>" .$extrainfo['fenolen'] ."</b></br>";
            $id++;
            print "<b>Muf: </b><b id=$id>" .$extrainfo['muf'] ."</b></br>";
            $id++;
            print "<b>Nootachtig: </b><b id=$id>" .$extrainfo['nootachtig'] ."</b></br>";
            $id++;
            print "<b>Lichtsmaak: </b><b id=$id>" .$extrainfo['lichtsmaak'] ."</b></br>";
            $id++;
            print "<b>Metaalachtig: </b><b id=$id>" .$extrainfo['metaalachtig'] ."</b></br>";
            $id++;
            print "<b>Oplosmiddel: </b><b id=$id>" .$extrainfo['oplosmiddel'] ."</b></br>";
            $id++;
            print "<b>Schimmelachtig: </b><b id=$id>" .$extrainfo['schimmelachtig'] ."</b></br>";
            $id++;
            print "<b>Harsachtig: </b><b id=$id>" .$extrainfo['harsachtig'] ."</b></br>";
            $id++;
            print "<b>Zwavelig: </b><b id=$id>" .$extrainfo['zwavelig'] ."</b></br>";
            $id++;
            print "<b>Andere: </b><b id=$id>" .$extrainfo['andere'] ."</b></br>";
            $id++;
            print "<b>Waarde Andere: </b><b id=$id>" .$extrainfo['waardeAndere'] ."</b></br>";
            $id++;
            print "<b>Punten geur: </b><b id=$id>" .$info['punten'] ."</b></br>";

            print "</br>";

            $smaakId = $info14['smaakId'];
            $data = mysql_query("SELECT * FROM smaak WHERE id = $smaakId")  or die(mysql_error());
            $info = mysql_fetch_array($data);
            $id++;
            print "<b>SmaakId: </b><b id=$id>" .$smaakId ."</b></br>";

            $afwijkingenId = $info['afwijkingenId'];
            $id++;
            print "<b>afwijkingenId: </b><b id=$id>" .$afwijkingenId ."</b></br>";
            $data = mysql_query("SELECT * FROM smaakafwijkingen WHERE id = $afwijkingenId");
            $extrainfo = mysql_fetch_array($data);
            $id++;
            print "<b>Groene Appel: </b><b id=$id>" .$extrainfo['groeneAppel'] ."</b></br>";
            $id++;
            print "<b>Azijnzuur: </b><b id=$id>" .$extrainfo['azijnzuur'] ."</b></br>";
            $id++;
            print "<b>Olie: </b><b id=$id>" .$extrainfo['olie'] ."</b></br>";
            $id++;
            print "<b>Branderig: </b><b id=$id>" .$extrainfo['branderig'] ."</b></br>";
            $id++;
            print "<b>Chloor: </b><b id=$id>" .$extrainfo['chloor'] ."</b></br>";
            $id++;
            print "<b>Dms: </b><b id=$id>" .$extrainfo['dms'] ."</b></br>";
            $id++;
            print "<b>Fenolen: </b><b id=$id>" .$extrainfo['fenolen'] ."</b></br>";
            $id++;
            print "<b>Muf: </b><b id=$id>" .$extrainfo['muf'] ."</b></br>";
            $id++;
            print "<b>Nootachtig: </b><b id=$id>" .$extrainfo['nootachtig'] ."</b></br>";
            $id++;
            print "<b>Lichtsmaak: </b><b id=$id>" .$extrainfo['lichtsmaak'] ."</b></br>";
            $id++;
            print "<b>Metaalachtig: </b><b id=$id>" .$extrainfo['metaalachtig'] ."</b></br>";
            $id++;
            print "<b>Oplosmiddel: </b><b id=$id>" .$extrainfo['oplosmiddel'] ."</b></br>";
            $id++;
            print "<b>Schimmelachtig: </b><b id=$id>" .$extrainfo['schimmelachtig'] ."</b></br>";
            $id++;
            print "<b>Harsachtig: </b><b id=$id>" .$extrainfo['harsachtig'] ."</b></br>";
            $id++;
            print "<b>Zwavelig: </b><b id=$id>" .$extrainfo['zwavelig'] ."</b></br>";
            $id++;
            print "<b>Andere: </b><b id=$id>" .$extrainfo['andere'] ."</b></br>";
            $id++;
            print "<b>Waarde Andere: </b><b id=$id>" .$extrainfo['waardeAndere'] ."</b></br>";
            $id++;
            print "<b>Punten smaak: </b><b id=$id>" .$info['punten'] ."</b></br>";
            
            print "</br><h3>Einde beoordeling 3</h3>";
            print "</br>";

//-----------------------------------------------------------------------------------------------
            print "<h1>Doordrinkbaarheid</h1>";
            $id++;
            print "<b>Doordrinkbaarheid: </b><b id=$id>" .$info14['doordrinkbaarheid'] ."</b></br>";

            print "</br>";

            print "<h1>Balans</h1>";
            $id++;
            print "<b>Balans: </b><b id=$id>" .$info14['balans'] ."</b></br>";

            print "</br>";

            $basissmaakId = $info14['basissmaakId'];
            $data = mysql_query("SELECT * FROM basissmaak WHERE id = $basissmaakId")  or die(mysql_error());
            $info = mysql_fetch_array($data);
            print "<h1>Basissmaak</h1>";
            $id++;
            print "<b>BasissmaakId: </b><b id=$id>" .$basissmaakId ."</b></br>";
            $id++;
            print "<b>Bitter: </b><b id=$id>" .$info['bitter'] ."</b></br>";
            $id++;
            print "<b>Zoet: </b><b id=$id>" .$info['zoet'] ."</b></br>";
            $id++;
            print "<b>Zuur: </b><b id=$id>" .$info['zuur'] ."</b></br>";
            $id++;
            print "<b>Zout: </b><b id=$id>" .$info['zout'] ."</b></br>";
            $id++;
            print "<b>Punten: </b><b id=$id>" .$info['punten'] ."</b></br>";
            
            print "</br>";

            $mondgevoelId = $info14['mondgevoelId'];
            $data = mysql_query("SELECT * FROM mondgevoel WHERE id = $mondgevoelId")  or die(mysql_error());
            $info = mysql_fetch_array($data);
            print "<h1>Mondgevoel</h1>";
            $id++;
            print "<b>MondgevoelId: </b><b id=$id>" .$mondgevoelId ."</b></br>";
            $id++;
            print "<b>Koolzuur: </b><b id=$id>" .$info['koolzuur'] ."</b></br>";
            $id++;
            print "<b>Droog: </b><b id=$id>" .$info['droog'] ."</b></br>";
            $id++;
            print "<b>Metaalachtig: </b><b id=$id>" .$info['metaalachtig'] ."</b></br>";
            $id++;
            print "<b>Plakkerig: </b><b id=$id>" .$info['plakkerig'] ."</b></br>";
            $id++;
            print "<b>Samentrekken: </b><b id=$id>" .$info['samentrekken'] ."</b></br>";
            $id++;
            print "<b>Vettig: </b><b id=$id>" .$info['vettig'] ."</b></br>";
            $id++;
            print "<b>Punten: </b><b id=$id>" .$info['punten'] ."</b></br>";
            
            print "</br>";

            $nasmaakId = $info14['nasmaakId'];
            $data = mysql_query("SELECT * FROM nasmaak WHERE id = $nasmaakId")  or die(mysql_error());
            $info = mysql_fetch_array($data);
            print "<h1>Nasmaak</h1>";
            $id++;
            print "<b>NasmaakId: </b><b id=$id>" .$nasmaakId ."</b></br>";
            $id++;
            print "<b>Alcohol: </b><b id=$id>" .$info['alcohol'] ."</b></br>";
            $id++;
            print "<b>Bitter: </b><b id=$id>" .$info['bitter'] ."</b></br>";
            $id++;
            print "<b>Branderig: </b><b id=$id>" .$info['branderig'] ."</b></br>";
            $id++;
            print "<b>Caramel: </b><b id=$id>" .$info['caramel'] ."</b></br>";
            $id++;
            print "<b>Dropsmaak: </b><b id=$id>" .$info['dropsmaak'] ."</b></br>";
            $id++;
            print "<b>Fruitig: </b><b id=$id>" .$info['fruitig'] ."</b></br>";
            $id++;
            print "<b>Gebrand: </b><b id=$id>" .$info['gebrand'] ."</b></br>";
            $id++;
            print "<b>Gist: </b><b id=$id>" .$info['gist'] ."</b></br>";
            $id++;
            print "<b>Kruidig: </b><b id=$id>" .$info['kruidig'] ."</b></br>";
            $id++;
            print "<b>Medicinaal: </b><b id=$id>" .$info['medicinaal'] ."</b></br>";
            $id++;
            print "<b>Metaalachtig: </b><b id=$id>" .$info['metaalachtig'] ."</b></br>";
            $id++;
            print "<b>Zoet: </b><b id=$id>" .$info['zoet'] ."</b></br>";
            $id++;
            print "<b>Zout: </b><b id=$id>" .$info['zout'] ."</b></br>";
            $id++;
            print "<b>Zuur: </b><b id=$id>" .$info['zuur'] ."</b></br>";
            $id++;
            print "<b>Punten: </b><b id=$id>" .$info['punten'] ."</b></br>";
            
            print "</br>";

            print "<h1>Creativiteit</h1>";
            $id++;
            print "<b>Creativiteit: </b><b id=$id>" .$info14['creativiteit'] ."</b></br>";

            print "</br>";

            print "<h1>Complexiteit</h1>";
            $id++;
            print "<b>Complexiteit: </b><b id=$id>" .$info14['complexiteit'] ."</b></br>";
            
            print "</br>";

            print "<h1>Voldoet aan opgegeven type</h1>";
            $id++;
            print "<b>Opgegeven Type: </b><b id=$id>" .$info14['opgegevenType'] ."</b></br>";
        ?>
    </body>
</html>
