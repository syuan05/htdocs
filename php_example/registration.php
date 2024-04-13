<?php
	include("action.php");
	if($_SESSION["login"] == 1){
		echo  '<div id="welcome">歡迎 ',$_SESSION["student_name"],"同學</div>";
	}
?>

<div id="boder_r">
	<div id="center_r">
		<h1>註冊</h1>
		<form method="post" action="registration_action.php" >
			<input placeholder="帳號" name="student_idz">
			<input placeholder="姓名" name="student_name">
			<input placeholder="密碼" type="password" name="password">
			<input placeholder="確認密碼" type="password" name="confirmpassword">
			<input class="but" type="submit" value="註冊">
		</form>
	</div>
</div>
