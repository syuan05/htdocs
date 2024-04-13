<?php
	include("action.php");
	if($_SESSION["login"] == 1){
		echo  '<div id="welcome">歡迎 ',$_SESSION["student_name"],"同學</div>";
		$student_id = $_SESSION["student_id"];
		$sid = mysqli_query($conn, "SELECT * FROM classtable WHERE student_id = '$student_id'");
		$cid = mysqli_query($conn, "SELECT classtable.course_id, course.class_name, course.credits, course.need, course.open_class, course.class_time, course.teacher, course.classroom
		FROM classtable
		inner JOIN course
		ON classtable.course_id = course.course_id
		WHERE student_id = '$student_id';
		");
		
		echo"<br/><br/>";
		echo"<h1>課表</h1>";
		echo'<table class = "classtable">';
		echo'<tr><td>課程代碼</td> <td>課程名稱</td> <td>學分</td> <td>必/選修</td> <td>開課班級</td> <td>上課時間</td> <td>授課老師</td> <td>上課教室</td></tr>';
		while ($row = mysqli_fetch_assoc($cid)) {
			echo'<tr><td>',$row['course_id'],'</td> <td>',$row['class_name'],'</td> <td>',$row['credits'],'</td> <td>',$row['need'],'</td> <td>',$row['open_class'],'</td> <td>',$row['class_time'],'</td> <td>',$row['teacher'],'</td> <td>',$row['classroom'],'</td></tr>';
		}
		'<table/>';
	}
	else{
		echo 
			'<div id="boder">
				 <div id="center">
					<h1>課表</h1>
					<form method="post" action="timetable_action.php" >
						<input placeholder="學號" name="student_id">
						<input class="but" type="submit" value="選課">
				    </form>
				</div>
			</div>';
	}
?>
