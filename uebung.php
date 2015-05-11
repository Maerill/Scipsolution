<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
<h1>Hallo welt...</h1>
<?php
	$array = array("Fischers", "Fritz", "fischt", "frische", "Fische");
	$output = "";
	foreach($array as $value){
		$output .= $value . " ";
	}
	$output .= ",";
	$output = str_replace('Fische ,', 'Fische,', $output);
	$output .= $array[3]." ";
	$output .= $array[4]." ";
	$output .= $array[2]." ";
	$output .= $array[0]." ";
	$output .= $array[1].".";

	echo '<h1>'.$output.'</h1>';

	print_r($array);

	echo '<br>';

	$cities = array("Bern", "Basel", "Zuerich", "Luzern", "Fribourg", "Logano");

	print_r($cities);

	echo '<br>';

	$cities2 = array(
		"Bern" => array(
				"Köniz",
				"Bümpliz",
				"Münsingen"
		),
		"Basel" => array(
				"Bettingen",
				"Riehen"
		));

	echo '<h1>'.$cities2["Bern"][0].'</h1>';

	for($i=13;$i<=27;$i++){
		$squarenumber = $i."*".$i."=".$i*$i;
		echo '<div>'.$squarenumber.'</h1>';
	}
?>

</body>
</html>