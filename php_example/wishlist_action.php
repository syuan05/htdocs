<?php
	include("action.php");
	if($_SESSION["login"] == 1){
		echo  '<div id="welcome">歡迎 ',$_SESSION["student_name"],"同學</div>";
	}
?>
<?php
	if(isset($_POST['class_id'], $_POST['student_id'])) {
		$class_id=$_POST["class_id"];
		$student_id = $_POST["student_id"];
		
		$result = $conn->query('select * from wishlist;');
		$tem = 1;
		while ($row = $result->fetch_assoc()){
			if( $row['course_id'] == $class_id && $row['student_id'] == $student_id){
				$tem = 0;
			}
		}
		if ($tem == 1){
			$sql = "INSERT INTO  `wishlist` (`student_id`, `course_id`) VALUE ($student_id,$class_id) ";
			$result = mysqli_query($conn, $sql);
			echo '<script type="text/javascript"> ';   
			echo 'alert("關注成功");';  
			echo '</script>';  
		}
		else{
			echo '<script type="text/javascript"> ';   
			echo 'alert("已經關注了");';  
			echo '</script>';  
		}
		$classid = "SELECT course_id FROM course where course_id LIKE \"".$class_id."%\";";
		
		$studentname = "SELECT student_name FROM students where student_id LIKE \"".$student_id."%\";";
		
		$c_id = mysqli_query($conn, $classid) or die('MySQL query error');
		$student_name = mysqli_query($conn, $studentname) or die('MySQL query error');
		
		echo"<br/><br/>";
		echo"<h1>關注清單</h1>";
		echo'<table>';
		echo "'<tr><td>課程代碼</td> <td>課程名稱</td> <td>實際/開放名額</td></tr>";
		$result = $conn->query('select * from wishlist;');
		while ($row = $result->fetch_assoc()) {
			if($row['student_id'] == $student_id){
				echo "<tr><td>",$row['course_id'];
				$course = $conn->query('select * from course;');
				while($cs = $course->fetch_assoc()){
					if($cs['course_id'] == $row['course_id']){
						echo "</td> <td>",$cs['class_name'],"</td> <td>";
						echo $cs['actual_quota'],"&nbsp / &nbsp";
						echo $cs['open_quota'],"</td></tr>";
					}
				}
			}
		}
	}
	'	</div>
			</div>';
			
?>
