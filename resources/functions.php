<?php
//Bild-Upload Funktion
function bild_upload($bild){
	for($i=0;$i<count($bild['name']);$i++){
		$allowedExts = array("gif", "jpeg", "jpg", "png","GIF", "JPEG", "JPG", "PNG"); //Allowed Extensions
		$bild_name = explode(".", $bild['name'][$i]); //Bildname extrahieren
		$extension = end($bild_name);
		if ((($bild['type'][$i] == "image/gif")
		|| ($bild["type"][$i] == "image/jpeg")
		|| ($bild["type"][$i] == "image/jpg")
		|| ($bild["type"][$i] == "image/pjpeg")
		|| ($bild["type"][$i] == "image/x-png")
		|| ($bild["type"][$i] == "image/png"))
		&& ($bild["size"][$i] < 20000000)) //Maximal 20MB pro Bild
		  {
			//Errors ausgeben
		  if ($bild["error"][$i] > 0)
			{
			echo "Return Code: " . $bild["file"]["error"][$i] . "<br>";
			}
		  else
			{
				//Die letzte PID + 1 auslesen			
				$sql = "SELECT MAX(PID) + 1 FROM tb_picture";
				$picture_name = select_query($sql);
				if (empty($picture_name[0])){
					$picture_name[0] = 1;
				}
				//Datei speichern als PID.Dateinendung
				  move_uploaded_file($bild["tmp_name"][$i],
				  "upload/" . $picture_name[0] . "." . $extension);
				$path = "upload/" . $picture_name[0] . "." . $extension;
				$timestamp = time();
				//DB Eintrag machen
				$sql = "INSERT INTO tb_picture (UID, PICTURE, TIMESTAMP) VALUES (" . $_SESSION['UID'] . ", '" . $path . "', '" . $timestamp . "')";
				insert_query($sql);
				
				/******************THUMBNAIL******************/
				
				$PicPathIn="upload/"; // Pfad Original Bilder 
				$PicPathOut="upload/thumbnail/"; // Pfad kleine Bilder? Chmod 777 !!
				$picbreite = 450; // 100 Pixel soll Bild breit sein
				$thumbnail_name = $picture_name[0] . "." . $extension; 
				
				// Orginalpic
				$thumbnail= $path;
				// Bilddaten feststellen 
				$size=getimagesize($thumbnail); 
				$breite=$size[0]; 
				$hoehe=$size[1]; 
				$neueBreite=$picbreite; 
				$neueHoehe=intval($hoehe*$neueBreite/$breite);
				 
				 //Wenn Breite grösser als 450px, dann thumbnail erstellen
				if($breite > $picbreite){
					if($size[2]==1) { 
						// Es ist ein GIF 
						$altesBild=ImageCreateFromGIF($thumbnail); 
						$neuesBild=ImageCreate($neueBreite,$neueHoehe);
						//Bild verkleinern 
						ImageCopyResampled($neuesBild,$altesBild,0,0,0,0,$neueBreite,
						$neueHoehe,$breite,$hoehe); 
						//Bild speichern
						ImageGIF($neuesBild,$PicPathOut."tn_".$thumbnail_name); 
					} 
					
					if($size[2]==2) { 
						// Es ist ein JPG 
						$altesBild=ImageCreateFromJPEG($thumbnail); 
						$neuesBild=imagecreatetruecolor($neueBreite,$neueHoehe); 
						//Bild verkleinern 
						ImageCopyResampled($neuesBild,$altesBild,0,0,0,0,$neueBreite,
						$neueHoehe,$breite,$hoehe);
						//Bild speichern 
						ImageJPEG($neuesBild,$PicPathOut."tn_".$thumbnail_name); 
					} 
					
					if($size[2]==3) { 
						// Es ist ein PNG 
						$altesBild=ImageCreateFromPNG($thumbnail); 
						$neuesBild=ImageCreate($neueBreite,$neueHoehe); 
						//Bild verkleinern 
						ImageCopyResampled($neuesBild,$altesBild,0,0,0,0,$neueBreite,
						$neueHoehe,$breite,$hoehe); 
						//Bild speichern
						ImagePNG($neuesBild,$PicPathOut."tn_".$thumbnail_name); 
					} 
				}
				//Weiterleiten
				if (isset($_GET['p'])){
					//Profilseite zurückkehren
					header("Location: index.php?p=profile&uid=" . $_SESSION['UID']);
				} else {
					//Dashboard zurückkehren
					header("Location: index.php");

				}
				
			}
		  }
		else
		  {
		  echo "Invalid file";
		  }
	  
	}
}

//Zeitvergangen Funktion
function time_elapsed($secs){
    $bit = array(
        ' Jahr'        => $secs / 31556926 % 12,
        ' Woche'        => $secs / 604800 % 52,
        ' Tag'        => $secs / 86400 % 7,
        ' Stunde'        => $secs / 3600 % 24,
        ' Minute'    => $secs / 60 % 60,
        ' Sekunde'    => $secs % 60
        );
    

    $ret[] = 'vor ';    
    foreach($bit as $k => $v){
        if($v > 1)$ret[] = $v . $k . 'n';
        if($v == 1)$ret[] = $v . $k;
        }
    if(join(' ', $ret) == "vor "){
		return "vor wenigen Sekunden";
	} else {
		return join(' ', $ret);
	}
}
?>