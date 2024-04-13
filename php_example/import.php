<?php
	include("action.php");
	if($_SESSION["login"] == 1){
		echo  '<div id="welcome">歡迎 ',$_SESSION["student_name"],"同學</div>";
	}
?>
<?php
	$course = $conn->query('select * from course;');
	$s = 0;
	while ($cs = $course->fetch_assoc()) {
		if($cs['need'] == "必修"){
			$cid = $cs['course_id'];
			$student_id = "SELECT student_id FROM students where department_id LIKE \"".$cs['open_departmentid']."%\" and schoolyear LIKE \"".$cs['open_schoolyear']."%\"";
			$stu = mysqli_query($conn, $student_id);
			while($row = mysqli_fetch_array($stu)){
				$sid = $row['student_id'];
				$sql = "INSERT INTO  `classtable` (`student_id`, `course_id`) VALUE ($sid, $cid) ";
				$result = mysqli_query($conn, $sql);
				if($result){
					$s = 1;
				}
			}		
		}
	}
	if($s == 1){
		echo "<p>必修匯入成功";
	}
?>
