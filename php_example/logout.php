<?php
	include("action.php");
?>
<?php
	$_SESSION = [];
	session_unset();
	$_SESSION["login"] = 0;
	if($_SESSION["login"] == 0){
		echo "<meta content='0; url=http://localhost/php_example/action.php' http-equiv='refresh'>";
	}
?>
