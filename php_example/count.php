<?php
	include("action.php");
	if($_SESSION["login"] == 1){
		echo  '<div id="welcome">歡迎 ',$_SESSION["student_name"],"同學</div>";
	}
?>
<?php
	$update_people = "update course set actual_quota = 0";
	$udp = mysqli_query($conn, $update_people);
	$classtable = $conn->query('select * from classtable;');
	while ($ct = $classtable->fetch_assoc()) {
		$cid = $ct['course_id'];
		$update_people = "update course set actual_quota= actual_quota+1 where course_id = $cid";
		$udp = mysqli_query($conn, $update_people);
	}
	echo "<p>人數更新成功";
	
	$update_credit = "update students set credit = 0";
	$udc = mysqli_query($conn, $update_credit);
	$classtable = $conn->query('select * from classtable;');
	while ($ct = $classtable->fetch_assoc()) {
		$sid = $ct['student_id'];
		$credits = "SELECT credits FROM course where course_id LIKE \"".$ct['course_id']."%\"";
		$cre = mysqli_query($conn, $credits);
		while($credit = mysqli_fetch_array($cre)){
			$c = $credit['credits'];
		}
		$update_credit = "update students set credit = credit+$c where student_id = $sid";
		$udp = mysqli_query($conn, $update_credit);
	}
	echo "<p>學分更新成功";