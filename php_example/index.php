<?php
	include("action.php");
	if($_SESSION["login"] == 1){
		echo  '<div id="welcome">歡迎 ',$_SESSION["student_name"],"同學</div>";
	}
?>
<?php
if (!empty($_SESSION["student_id"])) {
    $student_id = $_SESSION["student_id"];
    $result = mysqli_query($conn, "SELECT * FROM students WHERE student_id = '$student_id'");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
  </head>
  <body>
    <h1>Welcome <?php echo $row["student_id"]; ?></h1>
    <a href="logout.php">Logout</a>
  </body>
</html>
