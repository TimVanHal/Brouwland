<?php
function resultaat(){
    session_start();
    include "db_config.php";
    // De verbinding met de database
    mysql_connect ($mysql["host"], $mysql["user"], $mysql["pass"]) or die ('Er kan geen verbinding worden gemaakt met de database met reden: ' . mysql_error());
    // Het selecteren van de database
    mysql_select_db ($mysql["db"]);
    //include "Classes/PHPExcel.php";
    //include "Classes/PHPExcel/Writer/Excel2007.php";
    include 'Classes/PHPExcel/IOFactory.php';
    require_once 'Classes/PHPExcel.php';
    $inputFileName = '../../php/TemplateResultaat.xlsx';
	try {
		$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($inputFileName);
	} catch(Exception $e) {
		die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
	}
    $objPHPExcel->setActiveSheetIndex(0);
    
    $bier = $_SESSION['team'];
    $query = "SELECT * FROM beoordeling WHERE bierId='$bier'";
    $result = mysql_query($query) or die ('Error updating' . mysql_error());
    $data = mysql_fetch_assoc($result);
    $keurder = $data['voorproeverId'];
    //resultaat($bier, $keurder);

    //function resultaat($bier, $keurder){
        $query = "SELECT * FROM beoordeling WHERE bierId='$bier' AND voorproeverId='$keurder'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $presentatieId = $data['presentatieId'];
        $helderheidId = $data['helderheidId'];
        $schuimkraagId = $data['schuimkraagId'];
        $geurId = $data['geurId'];
        $smaakId = $data['smaakId'];
        $basissmaakId = $data['basissmaakId'];
        $mondgevoelId = $data['mondgevoelId'];
        $nasmaakId = $data['nasmaakId'];
        $koolzuurId = $data['koolzuurId'];
        
        $doordrinkbaarheid = $data['doordrinkbaarheid'];
        $creativiteit = $data['creativiteit'];
        $complexiteit = $data['complexiteit'];
        $opgegevenType = $data['opgegevenType'];
        $balans = $data['balans'];
        
        $query = "SELECT * FROM presentatie WHERE id='$presentatieId'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $presentatieFles = $data['fles'];
        $presentatieVulhoogte = $data['vulhoogte'];
        $presentatieUiterlijk = $data['uiterlijk'];
        
        $query = "SELECT * FROM helderheid WHERE id='$helderheidId'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $helderheidCorrect = $data['correct'];
        $helderheidExtra = $data['extra'];
        
        $query = "SELECT * FROM schuimkraag WHERE id='$schuimkraagId'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $schuimkraagStabiel = $data['stabiel'];
        $schuimkraagInzakkend = $data['inzakkend'];
        $schuimkraagNeerslaand = $data['neerslaand'];
        $schuimkraagCola = $data['cola'];
        $schuimkraagGeen = $data['geen'];
        $schuimkraagExtra = $data['extra'];
        
        $query = "SELECT * FROM geur WHERE id='$geurId'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $geurAfwijk = $data['afwijkingenId'];
        $geurNeutraal = $data['neutraalId'];
        $geurPunt = $data['punten'];
        
        $query = "SELECT * FROM geurafwijkingen WHERE id='$geurAfwijk'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $geurGroeneAppel = $data['groeneAppel'];
        $geurAzijnzuur = $data['azijnzuur'];
        $geurOlie = $data['olie'];
        $geurBranderig = $data['branderig'];
        $geurChloor = $data['chloor'];
        $geurDms = $data['dms'];
        $geurFenol = $data['fenolen'];
        $geurMuf = $data['muf'];
        $geurNoot = $data['nootachtig'];
        $geurLicht = $data['lichtsmaak'];
        $geurMetaal = $data['metaalachtig'];
        $geurOplos = $data['oplosmiddel'];
        $geurSchimmel = $data['schimmelachtig'];
        $geurHars = $data['harsachtig'];
        $geurZwavel = $data['zwavelig'];
        $geurAfwijkAndere = $data['andere'];
        $afwijkAndere = $data['waardeAndere'];
        
        $query = "SELECT * FROM geurneutraal WHERE id='$geurNeutraal'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $geurAardbei = $data['aardbei'];
        $geurAnanas = $data['ananas'];
        $geurAppel = $data['appel'];
        $geurBessen = $data['bessen'];
        $geurCaramel = $data['caramel'];
        $geurFruit = $data['fruitig'];
        $geurGebrand = $data['gebrand'];
        $geurKaneel = $data['kaneel'];
        $geurGist = $data['gistachtig'];
        $geurAlcohol = $data['hogereAlcoholen'];
        $geurHop = $data['hoppig'];
        $geurKoriander = $data['koriander'];
        $geurKruidig = $data['kruidig'];
        $geurKruidnagel = $data['kruidnagel'];
        $geurMelkzuur = $data['melkzuur'];
        $geurGraan = $data['graan'];
        $geurVanille = $data['vanille'];
        $geurAnijs = $data['anijs'];
        $geurZoet = $data['zoetig'];
        $geurZout = $data['zoutig'];
        $geurNeutraalAndere = $data['andere'];
        $neutraalAndere = $data['waardeAndere'];
        
        $query = "SELECT * FROM smaak WHERE id='$smaakId'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $smaakAfwijk = $data['afwijkingenId'];
        $smaakNeutraal = $data['neutraalId'];
        $smaakPunt = $data['punten'];
        
        $query = "SELECT * FROM smaakafwijkingen WHERE id='$smaakAfwijk'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $smaakGroeneAppel = $data['groeneAppel'];
        $smaakAzijnzuur = $data['azijnzuur'];
        $smaakOlie = $data['olie'];
        $smaakBranderig = $data['branderig'];
        $smaakChloor = $data['chloor'];
        $smaakDms = $data['dms'];
        $smaakFenol = $data['fenolen'];
        $smaakMuf = $data['muf'];
        $smaakNoot = $data['nootachtig'];
        $smaakLicht = $data['lichtsmaak'];
        $smaakMetaal = $data['metaalachtig'];
        $smaakOplos = $data['oplosmiddel'];
        $smaakSchimmel = $data['schimmelachtig'];
        $smaakHars = $data['harsachtig'];
        $smaakZwavel = $data['zwavelig'];
        $smaakAfwijkAndere = $data['andere'];
        
        $query = "SELECT * FROM smaakneutraal WHERE id='$smaakNeutraal'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $smaakAardbei = $data['aardbei'];
        $smaakAnanas = $data['ananas'];
        $smaakAppel = $data['appel'];
        $smaakBessen = $data['bessen'];
        $smaakCaramel = $data['caramel'];
        $smaakFruit = $data['fruitig'];
        $smaakGebrand = $data['gebrand'];
        $smaakKaneel = $data['kaneel'];
        $smaakGist = $data['gistachtig'];
        $smaakAlcohol = $data['hogereAlcoholen'];
        $smaakHop = $data['hoppig'];
        $smaakKoriander = $data['koriander'];
        $smaakKruidig = $data['kruidig'];
        $smaakKruidnagel = $data['kruidnagel'];
        $smaakMelkzuur = $data['melkzuur'];
        $smaakGraan = $data['graan'];
        $smaakVanille = $data['vanille'];
        $smaakAnijs = $data['anijs'];
        $smaakZoet = $data['zoetig'];
        $smaakZout = $data['zoutig'];
        $smaakNeutraalAndere = $data['andere'];
        
        $query = "SELECT * FROM basissmaak WHERE id='$basissmaakId'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $basisPunt = $data['punten'];
        $basisBitter = $data['bitter'];
        $basisZoet = $data['zoet'];
        $basisZout = $data['zout'];
        $basisZuur = $data['zuur'];
        
        $query = "SELECT * FROM mondgevoel WHERE id='$mondgevoelId'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $mondgevoelPunt = $data['punten'];
        $mondgevoelKoolzuur = $data['koolzuur'];
        $mondgevoelDroog = $data['droog'];
        $mondgevoelMetaal = $data['metaalachtig'];
        $mondgevoelPlakkerig = $data['plakkerig'];
        $mondgevoelSamen = $data['samentrekken'];
        $mondgevoelVettig = $data['vettig'];
        
        $query = "SELECT * FROM nasmaak WHERE id='$nasmaakId'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $nasmaakPunt = $data['punten'];
        $nasmaakAlcohol = $data['alcohol'];
        $nasmaakBitter = $data['bitter'];
        $nasmaakBranderig = $data['branderig'];
        $nasmaakCaramel = $data['caramel'];
        $nasmaakDrop = $data['dropsmaak'];
        $nasmaakFruit = $data['fruitig'];
        $nasmaakGebrand = $data['gebrand'];
        $nasmaakGist = $data['gist'];
        $nasmaakKruidig = $data['kruidig'];
        $nasmaakMedicinaal = $data['medicinaal'];
        $nasmaakMetaal = $data['metaalachtig'];
        $nasmaakZoet = $data['zoet'];
        $nasmaakZout = $data['zout'];
        $nasmaakZuur = $data['zuur'];
        
        $query = "SELECT * FROM koolzuur WHERE id='$koolzuurId'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $koolzuurGeen = $data['geen'];
        $koolzuurWeinig = $data['weinig'];
        $koolzuurCorrect = $data['correct'];
        $koolzuurOverschuimend = $data['overschuimend'];
        $koolzuurSpuitend = $data['spuitend'];
        
        $query = "SELECT * FROM team WHERE id='$bier'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $teamnaam = $data['naam'];
        
        $query = "SELECT * FROM bier WHERE teamId='$bier'";
        $result = mysql_query($query) or die ('Error updating' . mysql_error());
        $data = mysql_fetch_assoc($result);
        $biernaam = $data['naam'];
    //}
    //presentatie
    $objPHPExcel->getActiveSheet()->setCellValue('S13', $presentatieFles);
    $objPHPExcel->getActiveSheet()->setCellValue('S14', $presentatieVulhoogte);
    $objPHPExcel->getActiveSheet()->setCellValue('S15', $presentatieUiterlijk);
    	
    //koolzuur
    $objPHPExcel->getActiveSheet()->setCellValue('S19', $koolzuurGeen);
    $objPHPExcel->getActiveSheet()->setCellValue('S20', $koolzuurWeinig);
    $objPHPExcel->getActiveSheet()->setCellValue('S21', $koolzuurCorrect);
    $objPHPExcel->getActiveSheet()->setCellValue('S22', $koolzuurOverschuimend);
    $objPHPExcel->getActiveSheet()->setCellValue('S23', $koolzuurSpuitend);
    
    //Helderheid
    $objPHPExcel->getActiveSheet()->setCellValue('S27', $helderheidCorrect);
    $objPHPExcel->getActiveSheet()->setCellValue('J30', $helderheidExtra);
    
    //Schuimkraag
    $objPHPExcel->getActiveSheet()->setCellValue('S36', $schuimkraagStabiel);
    $objPHPExcel->getActiveSheet()->setCellValue('S37', $schuimkraagInzakkend);
    $objPHPExcel->getActiveSheet()->setCellValue('S38', $schuimkraagNeerslaand);
    $objPHPExcel->getActiveSheet()->setCellValue('S39', $schuimkraagCola);
    $objPHPExcel->getActiveSheet()->setCellValue('S40', $schuimkraagGeen);
    $objPHPExcel->getActiveSheet()->setCellValue('J42', $schuimkraagExtra);
    
    //geuren neutraal
    $objPHPExcel->getActiveSheet()->setCellValue('S58', $geurAardbei);
    $objPHPExcel->getActiveSheet()->setCellValue('S59', $geurAnanas);
    $objPHPExcel->getActiveSheet()->setCellValue('S60', $geurAppel);
    $objPHPExcel->getActiveSheet()->setCellValue('S61', $geurBessen);
    $objPHPExcel->getActiveSheet()->setCellValue('S62', $geurCaramel);
    $objPHPExcel->getActiveSheet()->setCellValue('S63', $geurFruit);
    $objPHPExcel->getActiveSheet()->setCellValue('S64', $geurGebrand);
    $objPHPExcel->getActiveSheet()->setCellValue('S65', $geurKaneel);
    $objPHPExcel->getActiveSheet()->setCellValue('S66', $geurGist);
    $objPHPExcel->getActiveSheet()->setCellValue('S67', $geurAlcohol);
    $objPHPExcel->getActiveSheet()->setCellValue('S68', $geurHop);
    $objPHPExcel->getActiveSheet()->setCellValue('S69', $geurKoriander);
    $objPHPExcel->getActiveSheet()->setCellValue('S70', $geurKruidig);
    $objPHPExcel->getActiveSheet()->setCellValue('S71', $geurKruidnagel);
    $objPHPExcel->getActiveSheet()->setCellValue('S72', $geurMelkzuur);
    $objPHPExcel->getActiveSheet()->setCellValue('S73', $geurGraan);
    $objPHPExcel->getActiveSheet()->setCellValue('S74', $geurVanille);
    $objPHPExcel->getActiveSheet()->setCellValue('S75', $geurAnijs);
    $objPHPExcel->getActiveSheet()->setCellValue('S76', $geurZoet);
    $objPHPExcel->getActiveSheet()->setCellValue('S77', $geurZout);
    $objPHPExcel->getActiveSheet()->setCellValue('S78', $geurNeutraalAndere);
    $objPHPExcel->getActiveSheet()->setCellValue('C78', $neutraalAndere);
    
    //smaken neutraal
    $objPHPExcel->getActiveSheet()->setCellValue('T58', $smaakAardbei);
    $objPHPExcel->getActiveSheet()->setCellValue('T59', $smaakAnanas);
    $objPHPExcel->getActiveSheet()->setCellValue('T60', $smaakAppel);
    $objPHPExcel->getActiveSheet()->setCellValue('T61', $smaakBessen);
    $objPHPExcel->getActiveSheet()->setCellValue('T62', $smaakCaramel);
    $objPHPExcel->getActiveSheet()->setCellValue('T63', $smaakFruit);
    $objPHPExcel->getActiveSheet()->setCellValue('T64', $smaakGebrand);
    $objPHPExcel->getActiveSheet()->setCellValue('T65', $smaakKaneel);
    $objPHPExcel->getActiveSheet()->setCellValue('T66', $smaakGist);
    $objPHPExcel->getActiveSheet()->setCellValue('T67', $smaakAlcohol);
    $objPHPExcel->getActiveSheet()->setCellValue('T68', $smaakHop);
    $objPHPExcel->getActiveSheet()->setCellValue('T69', $smaakKoriander);
    $objPHPExcel->getActiveSheet()->setCellValue('T70', $smaakKruidig);
    $objPHPExcel->getActiveSheet()->setCellValue('T71', $smaakKruidnagel);
    $objPHPExcel->getActiveSheet()->setCellValue('T72', $smaakMelkzuur);
    $objPHPExcel->getActiveSheet()->setCellValue('T73', $smaakGraan);
    $objPHPExcel->getActiveSheet()->setCellValue('T74', $smaakVanille);
    $objPHPExcel->getActiveSheet()->setCellValue('T75', $smaakAnijs);
    $objPHPExcel->getActiveSheet()->setCellValue('T76', $smaakZoet);
    $objPHPExcel->getActiveSheet()->setCellValue('T77', $smaakZout);
    $objPHPExcel->getActiveSheet()->setCellValue('T78', $smaakNeutraalAndere);

    //Afwijkingen geur
    $objPHPExcel->getActiveSheet()->setCellValue('S82', $geurGroeneAppel);
    $objPHPExcel->getActiveSheet()->setCellValue('S83', $geurAzijnzuur);
    $objPHPExcel->getActiveSheet()->setCellValue('S84', $geurOlie);
    $objPHPExcel->getActiveSheet()->setCellValue('S85', $geurBranderig);
    $objPHPExcel->getActiveSheet()->setCellValue('S86', $geurChloor);
    $objPHPExcel->getActiveSheet()->setCellValue('S87', $geurDms);
    $objPHPExcel->getActiveSheet()->setCellValue('S88', $geurFenol);
    $objPHPExcel->getActiveSheet()->setCellValue('S89', $geurMuf);
    $objPHPExcel->getActiveSheet()->setCellValue('S90', $geurNoot);
    $objPHPExcel->getActiveSheet()->setCellValue('S91', $geurLicht);
    $objPHPExcel->getActiveSheet()->setCellValue('S92', $geurMetaal);
    $objPHPExcel->getActiveSheet()->setCellValue('S93', $geurOplos);
    $objPHPExcel->getActiveSheet()->setCellValue('S94', $geurSchimmel);
    $objPHPExcel->getActiveSheet()->setCellValue('S95', $geurHars);
    $objPHPExcel->getActiveSheet()->setCellValue('S96', $geurZwavel);
    $objPHPExcel->getActiveSheet()->setCellValue('S97', $geurAfwijkAndere);
    $objPHPExcel->getActiveSheet()->setCellValue('C97', $afwijkAndere);
        
    //Afwijkingen smaak
    $objPHPExcel->getActiveSheet()->setCellValue('T82', $smaakGroeneAppel);
    $objPHPExcel->getActiveSheet()->setCellValue('T83', $smaakAzijnzuur);
    $objPHPExcel->getActiveSheet()->setCellValue('T84', $smaakOlie);
    $objPHPExcel->getActiveSheet()->setCellValue('T85', $smaakBranderig);
    $objPHPExcel->getActiveSheet()->setCellValue('T86', $smaakChloor);
    $objPHPExcel->getActiveSheet()->setCellValue('T87', $smaakDms);
    $objPHPExcel->getActiveSheet()->setCellValue('T88', $smaakFenol);
    $objPHPExcel->getActiveSheet()->setCellValue('T89', $smaakMuf);
    $objPHPExcel->getActiveSheet()->setCellValue('T90', $smaakNoot);
    $objPHPExcel->getActiveSheet()->setCellValue('T91', $smaakLicht);
    $objPHPExcel->getActiveSheet()->setCellValue('T92', $smaakMetaal);
    $objPHPExcel->getActiveSheet()->setCellValue('T93', $smaakOplos);
    $objPHPExcel->getActiveSheet()->setCellValue('T94', $smaakSchimmel);
    $objPHPExcel->getActiveSheet()->setCellValue('T95', $smaakHars);
    $objPHPExcel->getActiveSheet()->setCellValue('T96', $smaakZwavel);
    $objPHPExcel->getActiveSheet()->setCellValue('T97', $smaakAfwijkAndere);
        
    //punten geur en smaak
    $objPHPExcel->getActiveSheet()->setCellValue('G99', $geurPunt);
    $objPHPExcel->getActiveSheet()->setCellValue('L99', $smaakPunt);
    
    $objPHPExcel->getActiveSheet()->setCellValue('S107', $smaakAfwijkAndere); //doordrinkbaarheid
    $objPHPExcel->getActiveSheet()->setCellValue('S113', $smaakAfwijkAndere); //Balans
    
    //Basissmaak
    $objPHPExcel->getActiveSheet()->setCellValue('L121', $basisPunt);
    $objPHPExcel->getActiveSheet()->setCellValue('S120', $basisBitter);
    $objPHPExcel->getActiveSheet()->setCellValue('S121', $basisZoet);
    $objPHPExcel->getActiveSheet()->setCellValue('S122', $basisZout);
    $objPHPExcel->getActiveSheet()->setCellValue('S123', $basisZuur);
    
    //Mondgevoel
    $objPHPExcel->getActiveSheet()->setCellValue('L129', $mondgevoelPunt);
    $objPHPExcel->getActiveSheet()->setCellValue('S127', $mondgevoelKoolzuur);
    $objPHPExcel->getActiveSheet()->setCellValue('S128', $mondgevoelDroog);
    $objPHPExcel->getActiveSheet()->setCellValue('S129', $mondgevoelMetaal);
    $objPHPExcel->getActiveSheet()->setCellValue('S130', $mondgevoelPlakkerig);
    $objPHPExcel->getActiveSheet()->setCellValue('S131', $mondgevoelSamen);
    $objPHPExcel->getActiveSheet()->setCellValue('S132', $mondgevoelVettig);
    
    //nasmaak
    $objPHPExcel->getActiveSheet()->setCellValue('L141', $nasmaakPunt);
    $objPHPExcel->getActiveSheet()->setCellValue('S136', $nasmaakAlcohol);
    $objPHPExcel->getActiveSheet()->setCellValue('S137', $nasmaakBitter);
    $objPHPExcel->getActiveSheet()->setCellValue('S138', $nasmaakBranderig);
    $objPHPExcel->getActiveSheet()->setCellValue('S139', $nasmaakCaramel);
    $objPHPExcel->getActiveSheet()->setCellValue('S140', $nasmaakDrop);
    $objPHPExcel->getActiveSheet()->setCellValue('S141', $nasmaakFruit);
    $objPHPExcel->getActiveSheet()->setCellValue('S142', $nasmaakGebrand);
    $objPHPExcel->getActiveSheet()->setCellValue('S143', $nasmaakGist);
    $objPHPExcel->getActiveSheet()->setCellValue('S144', $nasmaakKruidig);
    $objPHPExcel->getActiveSheet()->setCellValue('S145', $nasmaakMedicinaal);
    $objPHPExcel->getActiveSheet()->setCellValue('S146', $nasmaakMetaal);
    $objPHPExcel->getActiveSheet()->setCellValue('S147', $nasmaakZoet);
    $objPHPExcel->getActiveSheet()->setCellValue('S148', $nasmaakZout);
    $objPHPExcel->getActiveSheet()->setCellValue('S149', $nasmaakZuur);

    //Creativiteit
    $objPHPExcel->getActiveSheet()->setCellValue('S153', $creativiteit);
    
    //complexiteit
    $objPHPExcel->getActiveSheet()->setCellValue('S161', $complexiteit);
    
    //Voldoet type
    $objPHPExcel->getActiveSheet()->setCellValue('S168', $opgegevenType);
    
    //bier- & teamnaam
    $objPHPExcel->getActiveSheet()->setCellValue('C4', $teamnaam);
    $objPHPExcel->getActiveSheet()->setCellValue('C5', $biernaam);
    
    //save
    //header('Content-Type: application/vnd.ms-excel'); 
    //header('Content-Disposition: attachment; filename="results.xls"'); 
    //header('Cache-Control: max-age=0'); 

	$saveFile = "../../php/results.xlsx";
	try {
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save($saveFile);
		//$objWriter->save('php://output');
	} catch(Exception $e) {
		die('Error saving file "'.pathinfo($saveFile,PATHINFO_BASENAME).'": '.$e->getMessage());
	}
	
    //$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    //$objWriter->save('results.xlsx');
	return $saveFile;
}
?>