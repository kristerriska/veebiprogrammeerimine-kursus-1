<?php
	require("../../config.php");
	//echo $serverHost; Saab kontrollida, kas ta loeb andmeid
	$signupBirthday = null;
	$signupBirthMonth = null;
	$signupBirthYear = null;
	
	$loginEmail = "";
	
	$signupFirstNameError = "";
	$signupFamilyNameError = "";
	$signupBirthDayError = "";
	$signupGenderError = "";
	$signupEmailError = "";
	$signupPasswordError = "";
	
	//kontrollime, kas kirjutati eesnimi
		if (isset ($_POST["signupFirstName"])){
		if (empty($_POST["signupFirstName"])){
			$signupFirstNameError ="NB! Väli on kohustuslik!";
		} else {
			$signupFirstName = $_POST["signupFirstName"];
		}
	}
	
	//Kas päev on valitud
		if (isset ($_POST["signupBirthday"])){
		$signupBirthday = $_POST["signupBirthday"];
	}
	
	
	//Kas sünnikuu on valitud
	if(isset($_POST["signupBirthMonth"])) {
		$signupBirthMonth = intval($_POST["signupBirthMonth"]);
	}
	
	
	//Kas aasta on valitud
	if (isset ($_POST["signupBirthYear"])){
		$signupBirthYear = $_POST["signupBirthYear"];
	}
	
	if (isset ($_POST["signupBirthday"]) and isset($_POST["signupBirthMonth"]) and isset ($_POST["signupBirthYear"])) {
		//kontrollin kuupäeva valiidsust
		if(checkdate(intval($_POST["signupBirthMonth"], intval($_POST["signupBirthMonth"], intval($_POST["signupBirthYear"])))))
			$birthDate - date_create(($_POST["signupBirthday"]) ."/" .intval($_POST["signupBirthMonth"]) ."/" .intval($_POST["signupBirthYear"]));
			$signupBirthday = date_format($birthDate, "Y-m-d");
			//echo @signupBirthday
		} else {
			$signupBirthDayError .= "Kuupäev ei vasta nõuetele!";
		}
	
	//KIRJUTAN KASUTAJA ANDMEBAASI
	if(empty($signupFirstNameError) and empty($signupFamilyNameError) and empty($signupBirthDayError) and empty($signupGenderError) and empty($signupEmailError) and empty($signupPasswordError)) {
		echo "Hakkan salvestama! \n";
		$signupPassword = hash("sha512", $POST["signupPassword"]);
		//echo $signupPassword;
		//ühendus serveriga
		$database = "if17_riska_2";
		$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
		//käsk andmebaasile
		$stmt = $mysqli->prepare("INSERT INTO vpusers (firstname, lastname, birthday, gender, email, password) VALUES (?, ?, ?, ?, ?, ?)");
		echo $mysqli->error;
		//s - string, tekst
		//i - integer, täisarv
		//d - decimal, ujukoma arv
		$stmt->bind_param("sssiss", $signupFirstName, $signupFamilyName, $signupBirthDate, $gender, $signupEmail, $signupPassword);
		//$stmt->execute();
		if ($stmt->execute()) {
			echo "Õnnestus!" ;
		}	else {
			echo "Tekkis viga: " .$stmt->error;
		}
	}
	
	//Tekitame kuupäeva valiku
	$signupDaySelectHTML = "";
	$signupDaySelectHTML .= '<select name="signupBirthday">' ."\n";
	$signupDaySelectHTML .= '<option value="" selected disabled>päev</option>' ."\n";
	for ($i = 1; $i < 32; $i ++){
		if($i == $signupBirthday){
			$signupDaySelectHTML .= '<option value="' .$i .'" selected>' .$i .'</option>' ."\n";
		} else {
			$signupDaySelectHTML .= '<option value="' .$i .'">' .$i .'</option>' ." \n";
		}
		
	}
	$signupDaySelectHTML.= "</select> \n";
	
	//Tekitame sünnikuu valiku
	$monthNamesET = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
	$signupMonthSelectHTML = "";
	$signupMonthSelectHTML .= '<select name="signupBirthMonth">' ."\n";
	$signupMonthSelectHTML .= '<option value="" selected disabled>kuu</option>' ."\n";
	foreach ($monthNamesET as $key=>$month) {
		if($key + 1 === $signupBirthMonth) {
			$signupMonthSelectHTML .= '<option value="' .($key + 1) .'" selected>' .$month ."</option> \n";
		}	else {
			$signupMonthSelectHTML .= '<option value="' .($key + 1) .'">' .$month ."</option> \n";
		}
	}
	$signupMonthSelectHTML .= "</select> \n";
	
	//Tekitame aasta valiku
	$signupYearSelectHTML = "";
	$signupYearSelectHTML .= '<select name="signupBirthYear">' ."\n";
	$signupYearSelectHTML .= '<option value="" selected disabled>aasta</option>' ."\n";
	$yearNow = date("Y");
	for ($i = $yearNow; $i > 1900; $i --){
		if($i == $signupBirthYear){
			$signupYearSelectHTML .= '<option value="' .$i .'" selected>' .$i .'</option>' ."\n";
		} else {
			$signupYearSelectHTML .= '<option value="' .$i .'">' .$i .'</option>' ."\n";
		}
		
	}
	$signupYearSelectHTML.= "</select> \n";
?>


<!DOCTYPE html>
<html lang="et-EE">

<head>
    <meta charset="utf-8">
    <title>Sisselogimine</title>
	<style type="text/css">
	div.big {
		line-height: 200%;
}
	div.float{
		float:left;
		left: 30px;
		position: relative;
}
	div.floatright{
		float:right;
		left: 30px;
		position: relative;
}
	
	div.relative {
    position: relative;
    left: 30px;
}
	
	body {
    background-image: url("http://www.wallpapersvenue.com/wp-content/uploads/2017/07/white-background-for-websites.jpg");
    background-color: #cccccc;
} 
	</style>
</head>

<body>
                <div class="float">
                    <h1 align="left" ; class="big" >Logi Sisse</h1>
                    <form method="POST" action="submit.php">
                        <div align="justify";>
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="loginEmail" name="loginEmail" value="<?php if(isset($_GET[" loginEmail
                                "])){ echo $_GET["loginEmail "];} ?>" required>
                        </div>
                        <div align="justify"; style="margin: 5px auto;">
                            <label for="pwd">Parool:</label>
                            <input type="password" class="form-control" id="loginPassword" name="loginPassword" required>
                        </div>
						<div style="margin: 5px auto;">
                        <button  type="submit" class="btn btn-default">Logi sisse</button>
						</div>
                    </form>
                </div>

                <div class="floatright" style="margin: 5px auto;" >
					<h1 style="margin-right: 450px">Registreeri</h1>
                    <form method="POST" action="submit.php">
                        <div>
                            <label for="name">Eesnimi:</label>
                            <input type="name" class="form-control" id="signupFirstName" name="signupFirstName" value="<?php if(isset($_GET[" signupFirstName
                                "])){ echo $_GET["signupFirstName "];} ?>" required>
                        </div>
                        <div>
                            <label for="name">Perekonnanimi:</label>
                            <input type="name" class="form-control" id="signupFamilyName" name="signupFamilyName" value="<?php if(isset($_GET[" signupFamilyName
                                "])){ echo $_GET["signupFamilyName "];} ?>" required>
								<span><?php echo $signupFirstNameError; ?></span>
							<br>
							<label for="date">Teie sünnikuupäev:</label>
							<?php
								echo $signupMonthSelectHTML .$signupDaySelectHTML .$signupYearSelectHTML;
							?>
                        </div>
                        <div>
                            <h3><b>Sugu:</b></h3>
                            <label>Mees </label>
                            <input type="radio" name="gender" value="1" <?php if(isset($_GET[ "genderRegister"])){ if($_GET[ "genderRegister"]==1){echo
                                'checked';} } ?>>
                            <label>Naine </label>
                            <input type="radio" name="gender" value="2" <?php if(isset($_GET[ "genderRegister"])){ if($_GET[ "genderRegister"]==2){echo
                                'checked';} } ?>>
                        </div>
                        <div>
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="signupEmail" name="signupEmail" value="<?php if(isset($_GET[" signupEmail
                                "])){ echo $_GET["signupEmail "];} ?>" required>
                        </div>
                        <div>
                            <label for="pwd">Parool:</label>
                            <input type="password" class="form-control" id="signupPassword" name="signupPassword" required>
                        </div>
                        <button type="submit" class="btn btn-default">Registreeri</button>
                    </form>
					</div>
</body>

</html>