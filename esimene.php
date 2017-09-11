<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Krister Riska veebiprogrammeerimine</title>
	</head>
<body>
	<h1>Krister Riska</h1>
	<p>See veebileht on loodud õppetöö raames ning ei sisalda tõsiseltvõetavat sisu.</p>
	<?php
		echo "<p>Kõige esimene php abil väljastatud sõnum.</p>";
		echo "<p>Täna on ";
		echo date("d.m.Y");
		echo ".</p>";
		echo "<p>Lehe avamise hetkel oli kell " .date("H:i:s") .".</p>";
	?>
</body>
</html>