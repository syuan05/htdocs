<?php
	include("action.php");
	if($_SESSION["login"] == 1){
		echo  '<div id="welcome">歡迎 ',$_SESSION["student_name"],"同學</div>";
	}
?>
<?php
    if (isset($_POST['course_id'], $_POST['student_id'])) {
        $course_id=$_POST["course_id"];
        $student_id = $_POST["student_id"];
        
        $classname = "SELECT class_name FROM course where course_id LIKE \"".$course_id."%\";";
        $credit = "SELECT credit FROM students where student_id LIKE \"".$student_id."%\";";
        $studentname = "SELECT student_name FROM students where student_id LIKE \"".$student_id."%\";";
        $classcredit = "SELECT credits FROM course where course_id LIKE \"".$course_id."%\";";


        $class_name = mysqli_query($conn, $classname) or die('MySQL query error');
        $had_credit = mysqli_query($conn, $credit) or die('MySQL query error');
        $student_name = mysqli_query($conn, $studentname) or die('MySQL query error');
        $class_credit = mysqli_query($conn, $classcredit) or die('MySQL query error');

        while ($row = mysqli_fetch_array($student_name)) {
            echo "<p>", $row['student_name'], "同學"."&nbsp";
        }
        while ($row = mysqli_fetch_array($had_credit)) {
            $c = $row['credit'];
            echo "目前學分 : ", $row['credit']."<p/>";
        }
        while ($row = mysqli_fetch_array($class_name)) {
            $cn = $row['class_name'];//找出同學名然後顯示目前學分
        }
        while ($row = mysqli_fetch_array($class_credit)) {
            $cc = $row['credits'];//這堂課的學分
            $studentid = "SELECT student_id FROM classtable where course_id LIKE \"".$course_id."%\" AND student_id LIKE \"".$student_id."%\"";
            $sid = mysqli_query($conn, $studentid);//找出這堂課
            if (($c - $cc)<9) {
                die("退選失敗，已低於最低學分限制")."<br/>";
            } //若所有學分扣掉選的學分小於九,則退選失敗
			if (mysqli_num_rows($sid) == 0) {
                die("退選失敗，你沒有這門課")."<br/>";
            }//若沒有找到這堂課則顯示失敗
			else {
                $classtable = $conn->query('select * from classtable;');//找到classtable
                while ($ct = $classtable->fetch_assoc()) {
                    if ($ct['student_id'] == $student_id && $ct['course_id'] == $course_id) {
                        $course = $conn->query('select * from course;');
                        while ($cs = $course->fetch_assoc()) {
                            if ($cs['course_id'] == $course_id) {
                                if ($cs['need'] == "必修") {//若course裡的必選修為必修的話
                                    echo '<script type="text/javascript"> ';
                                    echo 'alert("你現在退選的為必修");';//就會顯示他為必修
                                    echo '</script>';
                                    $sql = sprintf(
                                        'DELETE FROM `classtable` where student_id = %d AND course_id LIKE %d',
                                        $student_id,
                                        $course_id
                                    );//然後從資料庫裏面刪除
                                    $result = $conn->query($sql);
                                    $after_credit = $c - $cc;//然後學分會扣掉選的課程的學分
                                    $update_credit ="update students set credit= '"."$after_credit' where student_id = $student_id";
                                    $update_people ="update course set actual_quota= actual_quota-1 where course_id = $course_id";
                                    $udc = mysqli_query($conn, $update_credit);
                                    $udp = mysqli_query($conn, $update_people);//更新學分還有人
                                } 
                                else {
                                    $sql = sprintf(
                                        'DELETE FROM `classtable` where student_id = %d AND course_id LIKE %d',
                                        $student_id,
                                        $course_id
                                    );
                                    $result = $conn->query($sql);
                                    $after_credit = $c - $cc;
                                    $update_credit ="update students set credit= '"."$after_credit' where student_id = $student_id";
                                    $update_people ="update course set actual_quota= actual_quota-1 where course_id = $course_id";
                                    $udc = mysqli_query($conn, $update_credit);
                                    $udp = mysqli_query($conn, $update_people);
                                }//後面的是一樣的只是若是必修會跳警告,但都可以退選
                                echo "退選成功，退選後學分為 : ", $c - $cc."<br/>";
                            }
                        }
                    }
                }
            }
        }
    }

?>
