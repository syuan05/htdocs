<?php
	include("action.php");
	if($_SESSION["login"] == 1){
		echo "<p> Welcome";
		echo  '<div id="welcome">歡迎 ',$_SESSION["student_name"],"同學</div>";
	}
?>
<?php
if (isset($_POST["student_id"],$_POST["password"])) {
    $student_id = $_POST["student_id"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM students WHERE student_id = '$student_id'");
    $row = mysqli_fetch_assoc($result);
    if ($row['student_id'] != NULL) {
        if ($password == $row['PASSWORD']) {
            $_SESSION["login"] = true;
            $_SESSION["student_id"] = $row["student_id"];
			$_SESSION["student_name"] = $row["student_name"];
			echo '<meta http-equiv="refresh" content="0"/>';
        }
		else {
            echo "<script> alert('Wrong Password'); </script>";
        }
    }
	else {
        echo "<script> alert('User Not Registered'); </script>";
    }
}
?>
