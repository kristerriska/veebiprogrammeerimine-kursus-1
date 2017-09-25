<?php
	$picsDir = "./pics/";
	$picFiles = [];
	$picFileTypes = ["jpg", "jpeg", "png", "gif"];
	
	$allFiles = array_slice(scandir($picsDir), 2);
	
	foreach ($allFiles as $file) {
		$fileType = pathinfo($file, PATHINFO_EXTENSION);
		if (in_array($fileType, $picFileTypes) == true) {
			array_push($picFiles, $file);
		}	
	}
	
	//var_dump($picFiles);
	$fileCount = count($picFiles);
	$picNumber = mt_rand(0, ($fileCount - 1));
	$picFile = $picFiles[$picNumber];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Krister Riska veebiprogrammeerimine
	</title>
	
	<style>
	body {
    background-image: url("http://www.wallpapersvenue.com/wp-content/uploads/2017/07/white-background-for-websites.jpg");
    background-color: #cccccc;
} 
	</style>
</head>
<body>
	
	<p>See veebileht on loodud õppetöö raames ning ei sisalda tõsiseltvõetavat sisu.</p>
	<h2>Pilte ülikoolist</h2>
	<img src="<?php echo $picsDir .$picFile; ?>" alt="Tallinna ülikool">
</body>
</html>