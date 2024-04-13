<?php
	include("action.php");
?>
<div id="boder">
	<div id="center">
		<h1>加選</h1>
		<form method="post" action="add_action.php" >
			<?php
				if($_SESSION["login"] == 1){
					echo  '<div id="welcome">歡迎 ',$_SESSION["student_name"],"同學</div>";
					$sid = $_SESSION["student_id"];
					echo '<input placeholder="學號" name="student_id" value="',$sid,'" readonly';
				}
			?>
			<input placeholder="學號" name="student_id">
			<input placeholder="選課代碼" name="course_id">
			<input class="but" type="submit" value="加選">
		</form>
	</div>
</div>

