<?php
	include("action.php");
	if($_SESSION["login"] == 1){
		echo  '<div id="welcome">歡迎 ',$_SESSION["student_name"],"同學</div>";
	}
?>
<?php
    $course = $conn->query('select * from course;');
	echo"<br/><br/>";
	echo"<h1>可選課程</h1>";
    echo'<table>';
    while ($cs = $course->fetch_assoc()) {
        echo '<tr><td>',$cs['course_id'],'</td> <td>',$cs['class_name'],'</td></tr>';
    }
	'<table/>';
?>