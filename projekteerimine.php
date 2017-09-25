<?php
	//muutujad
	$myName = "Krister";
	$myFamilyName = "Riska";
?>

<!DOCTYPE html>
<html>
	<head>
		<style> 
		
			body {
    background-image: url("http://www.wallpapersvenue.com/wp-content/uploads/2017/07/white-background-for-websites.jpg");
    background-color: #cccccc;
} 
		
		p.serif {
    font-family: "Times New Roman", Times, serif;
}

		</style>
		<meta charset="utf-8">
		<title>Krister Riska veebiprogrammeerimine</title>
	</head>
<body>
	<h1>
	<?php
		echo $myName ." " .$myFamilyName; echo date(" d.m.Y");
	?>
	</h1>
	<p class="serif"><font size="4">See veebileht on loodud õppetöö raames ning ei sisalda tõsiseltvõetavat sisu.</font></p>
	<p class="serif"><font size="4">1: <a href=http://greeny.cs.tlu.ee/~riskkris/andmebaaside_projekteerimine/kodut%C3%B6%C3%B6_1.txt>Kodutöö 1</a></font></p>
</body>
</html>