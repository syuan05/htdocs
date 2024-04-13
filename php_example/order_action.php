<?php
	include("action.php");
	if($_SESSION["login"] == 1){
		echo  '<div id="welcome">歡迎 ',$_SESSION["student_name"],"同學</div>";
	}
?>
<?php
	if(isset($_POST['course_id'], $_POST['student_id'])) {
		$course_id=$_POST["course_id"];
		$student_id = $_POST["student_id"];

		$classname = "SELECT class_name FROM course where course_id LIKE \"".$course_id."%\";";
		$credit = "SELECT credit FROM students where student_id LIKE \"".$student_id."%\";";
		$studentname = "SELECT student_name FROM students where student_id LIKE \"".$student_id."%\";";
		$classcredit = "SELECT credits FROM course where course_id LIKE \"".$course_id."%\";";
		$actualquota = "SELECT actual_quota FROM course where course_id LIKE \"".$course_id."%\";";
		$openquota = "SELECT open_quota FROM course where course_id LIKE \"".$course_id."%\";";
		$class_name = mysqli_query($conn, $classname) or die('MySQL query error');
		$had_credit = mysqli_query($conn, $credit) or die('MySQL query error');
		$student_name = mysqli_query($conn, $studentname) or die('MySQL query error');
		$class_credit = mysqli_query($conn, $classcredit) or die('MySQL query error');
		$actual_quota = mysqli_query($conn, $actualquota) or die('MySQL query error');
		$open_quota = mysqli_query($conn, $openquota) or die('MySQL query error'); 
        $max=0;
        $fail=0;
		while($row = mysqli_fetch_array($student_name)){
			echo "<p>", $row['student_name'], "同學"."&nbsp";
		}
		while($row = mysqli_fetch_array($had_credit)){
			$c = $row['credit'];
			echo "目前學分 : ", $row['credit']."<p/>";//抓出目前學分和同學姓名
		}
		while($row = mysqli_fetch_array($class_name)){
			$cn = $row['class_name'];
		}
		while($row = mysqli_fetch_array($open_quota)){
			$o = $row['open_quota'];
		}
		while($row = mysqli_fetch_array($actual_quota)){
			$a = $row['actual_quota'];//抓出要選的課程並抓出實際名額和開放名額
		}
		
		while($row = mysqli_fetch_array($class_credit)){
			$result = $conn->query('select * from classtable;');
			$tem = 1;
			$cc = $row['credits'];
			if( $a == $o ){
                $orderid = $conn->query('select * from orderid;');
                while ($order = $orderid->fetch_assoc()) {
					if( $order['course_id'] ==  $course_id){
                        if($order['student_id']==$student_id){
                            $fail=1;//找出那個課程的抽籤順序然後你因為已經抽過課所以讓他fail等於1表示已經抽過
                        }
                        if($max<$order['order_id']){
                           $max=$order['order_id'];//max為裡面抽籤的最大順序若有數字大於最大數字<則就變成最大數字
                        }
                    }
                }
                if($fail==1){
                    echo("你已抽過籤")."<br/>";//就顯示抽過籤
                }
                if($fail==0){
                    echo("你的序號是 : ");
                    echo($max+1);
                    $sql = "INSERT INTO `orderid`(`student_id`, `course_id`, `order_id`) VALUES ($student_id,$course_id,$max+1)";
                    $result = $conn->query($sql);//如果沒抽過籤第一次抽的話,則就會更新sql裡的資料
			    }
            }
			else{
				echo("此堂課尚可加選")."<br/>";
			}
		}
	}
?>
