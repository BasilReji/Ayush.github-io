<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["test"]);
$url = "login.html";
if(isset($_GET["session_expired"])) {
	$url .= "?session_expired=" . $_GET["session_expired"];
}
header("Location:$url");
?>