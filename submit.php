<?php 

if(isset($_POST["loginEmail"]) && isset($_POST["loginPassword"])){
    $email=$_POST["loginEmail"];
    $password=$_POST["loginPassword"];

    $url = "login.php";
	header("Location: ".$url. "?loginEmail=".$email ."");
}

if(isset($_POST["signupEmail"]) && isset($_POST["signupPassword"]) && isset($_POST["gender"]) && isset($_POST["signupFirstName"]) && isset($_POST["signupFamilyName"])){
    $email=$_POST["signupEmail"];
    $name=$_POST["signupFirstName"];
    $familyname=$_POST["signupFamilyName"];
    $gender=$_POST["gender"];
    $password=$_POST["signupPassword"];

    $url = "login.php";
	header("Location: ".$url. "?signupEmail=".$email ."&signupFirstName=".$name."&genderRegister=".$gender."&signupFamilyName=".$familyname."");
}




?>