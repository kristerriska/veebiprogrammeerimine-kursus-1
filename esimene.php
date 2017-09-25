<?php
	//muutujad
	$myName = "Krister";
	$myFamilyName = "Riskaaaaa";
	
	$hourNow = date("H");
	
	$schoolDayStart = date("d.m.Y") . " 8.15";
	//echo $schoolDayStart;
	$schoolBegin = strtotime($schoolDayStart);
	//echo $schoolBegin;
	$timeNow = strtotime("now");
	//echo ($timeNow - $schoolBegin);
	
	$minutesPassed = round(($timeNow - $schoolBegin) / 60);
	//echo $minutesPassed;
	
	//echo $hourNow;
	//võrdlen kellaaega ja annan hinnangu, mis päeva osaga on tegu (<  >  ==  >=  <= != )
	$partOfDay = "";
	if ( $hourNow < 8 ){
		$partOfDay = "Varajane hommik";
	}	
	//echo $partOfDay;
	if ( $hourNow >= 8 and $hourNow < 16 ) {
		$partOfDay = "Koolipäev";
	}
	if ( $hourNow >= 16 ) {
		$partOfDay = "Vaba aeg";
	}
	
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
					echo $myName ." " .$myFamilyName;
				?>
			</h1>
		<p>See veebileht on loodud õppetöö raames ning ei sisalda tõsiseltvõetavat sisu.</p>
		<p class="serif"><font size="4">1: <a href=http://greeny.cs.tlu.ee/~riskkris/veebiprogrammeerimine-kursus-1/tund3.php>Kolmas tund</a>
		<p class="serif"><font size="4">1: <a href=http://greeny.cs.tlu.ee/~riskkris/veebiprogrammeerimine-kursus-1/login.php>Kodune töö nr. 2</a>
			<?php
				echo "<p>Kõige esimene php abil väljastatud sõnum.</p>";
				echo "<p>Täna on ";
				echo date("d.m.Y") .", käes on " .$partOfDay;
				echo ".</p>";
				echo "<p>Lehe avamise hetkel oli kell " .date("H:i:s") .".</p>";
			?>
	</body>
</html>