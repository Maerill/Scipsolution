<!--
Startpage, every other page gets loaded in.
-->
<!DOCTYPE html>
<html lang="de">
  <head>
    <?php require_once("resources/head.php"); ?>
  </head>
  <body>
  <div class="header">
  	<?php require_once("resources/pageHeader.php"); ?>
  </div>
  <div class="content">
	<h1>Willkommen bei Scip</h1>
	<?php
		// Wo sind die Seiten?
		$seitenordner = 'sites/';
		$defaultseite = 'home';

		if (!empty($_GET['site'])) {	// Wurde eine Seite uebergeben
			$seite = $_GET["site"];
		} else {						// Standardseite
			$seite = $defaultseite;
		}

		// Gibt es die Datei wirklich
		if (!file_exists($seitenordner . $seite .".php")) {
            $seite = $defaultseite.".php";
        }

        // Inhalt einlesen
        include $seitenordner . basename($seite.".php");
        ?>
  </div>
  	<?php require_once("resources/footer.php"); ?>
  </body>
</html>