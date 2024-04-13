<?php
	include("action.php");
	if($_SESSION["login"] == 1){
		echo  '<div id="welcome">歡迎 ',$_SESSION["student_name"],"同學</div>";
		$student_id = $_SESSION["student_id"];
	}
?>
<?php
    if (isset($_POST['course_id'], $_POST['student_id'])) {
        $course_id = $_POST["course_id"];
        $student_id = $_POST["student_id"];

        $student = $conn->query('select * from students;');
        while ($st = $student->fetch_assoc()) {
            if ($st['student_id'] == $student_id) {
                echo "<p>", $st['student_name'], "同學"."&nbsp";
                $had_credit = $st['credit'];
                echo "目前學分 : ", $st['credit']."<p/>";
            }
        }

        $course = $conn->query('select * from course;');
        while ($cs = $course->fetch_assoc()) {
            if ($cs['course_id'] == $course_id) {
                $add_name = $cs['class_name'];
                $add_time = $cs['class_time'];
                $open_quota = $cs['open_quota'];
                $actual_quota = $cs['actual_quota'];
                $add_credit = $cs['credits'];
            }
        }

        $tem = 1;
        $classtable = $conn->query('select * from classtable;');
        while ($ct = $classtable->fetch_assoc()) {
            if ($ct['student_id'] == $student_id) {
                $repeatname = "SELECT class_name FROM course where course_id LIKE \"".$ct['course_id']."%\";";
                $repeat_name = mysqli_query($conn, $repeatname) or die('MySQL query error');
                $repeatid = "SELECT course_id FROM classtable where course_id LIKE \"".$ct['course_id']."%\";";
                $repeat_id = mysqli_query($conn, $repeatid) or die('MySQL query error');
                while ($rn = mysqli_fetch_array($repeat_name)) {
                    if ($rn['class_name'] == $add_name) {
                        $ri = mysqli_fetch_array($repeat_id);
                        if ($ri['course_id'] == $course_id) {
                            die("加選失敗，不可加選已有課程")."<br/>";
                        } else {
                            die("加選失敗，不可加選同名的課程")."<br/>";
                        }
                    } else {
                        $repeattime = "SELECT class_time FROM course where course_id LIKE \"".$ct['course_id']."%\";";
                        $repeat_time = mysqli_query($conn, $repeattime) or die('MySQL query error');
                        $rt = mysqli_fetch_array($repeat_time);
                        if ($rt['class_time'] == $add_time) {
                            die("加選失敗，衝堂")."<br/>";
                        }
                    }
                }
            }
        }
        if (($had_credit + $add_credit) > 30) {
            die("加選失敗，已超過最高學分限制")."<br/>";
        } elseif ($actual_quota == $open_quota) {
            die("加選失敗，人數已滿 ")."<br/>";
        }
        $after_credit = $had_credit + $add_credit;
        $insert = "INSERT INTO  `classtable` (`student_id`, `course_id`) VALUE ($student_id,$course_id) ";
        $update_credit ="update students set credit= '"."$after_credit' where student_id = $student_id";
        $update_people ="update course set actual_quota= actual_quota+1 where course_id = $course_id";
        $result = mysqli_query($conn, $insert);
        $udc = mysqli_query($conn, $update_credit);
        $udp = mysqli_query($conn, $update_people);
        if ($result) {
            echo "加選成功，加選後學分為 : ", $had_credit + $add_credit."<br/>";
        }
    }
