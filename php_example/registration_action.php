<?php
	include("action.php");
	if($_SESSION["login"] == 1){
		echo  '<div id="welcome">歡迎 ',$_SESSION["student_name"],"同學</div>";
	}
?>
<?php
if (isset($_POST["student_id"], $_POST["student_name"], $_POST["password"], $_POST["confirmpassword"])) {
    $student_id = $_POST["student_id"];
    $student_name = $_POST["student_name"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM students WHERE student_id = '$student_id'");
    
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert('Student ID Has Already Taken'); </script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO students VALUES ('$student_id', '$student_name', 0 ,'$password', 0, '0', 0)";
            mysqli_query($conn, $query);
            echo "<script> alert('Registration Successful'); </script>";
        } else {
            echo "<script> alert('Password Does Not Match'); </script>";
        }
    }
}
