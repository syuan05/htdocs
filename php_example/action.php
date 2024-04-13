<?php
	require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>選課系統</title>
    <link rel="shortcut icon"
        href="https://scontent-tpe1-1.xx.fbcdn.net/v/t1.6435-9/158085107_943582286450234_4361715186074855098_n.png?_nc_cat=104&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=lBLWazwq7McAX-0gm-h&_nc_ht=scontent-tpe1-1.xx&oh=00_AT9xOz6DOELqW7WEzj-b6_h9kfkFjilLTObeBVy8TAxqHQ&oe=61FEBF20"
        type="image/x-icon">
    <script src="//cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdn.staticfile.org/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <style>
        html {
            width: 100%;
            height: 100%;
            font-style: sans-serif;
			scroll-behavior: smooth;
        }

        body {
            width: 100%;
            height: 100%;
            font-family: 'Open Sans', sans-serif;
            margin: 0;
        }

        #center {
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -130px 0 0 -145px;
            width: 300px;
            height: 300px;
        }

		#center_r {
            position: absolute;
            top: 45%;
            left: 50%;
            margin: -150px 0 0 -145px;
            width: 300px;
            height: 250px;
        }
		
        #boder {
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -140px 0 0 -200px;
            width: 400px;
            height: 300px;
            border: 2px black solid;
        }

        #boder_r {
            position: absolute;
            top: 40%;
            left: 50%;
            margin: -100px 0 0 -200px;
            width: 400px;
            height: 350px;
            border: 2px black solid;
        }

        h1 {
            letter-spacing: 1px;
            text-align: center;
            font-size: 2em;
            margin: 0.67em 0;
        }


		p {
			position: relative;
            top: 30%;
            left: 40%;
			text-align: center;
            width: 400px;
            height: 50px;
            margin-bottom: 10px;
            outline: none;
            padding: 10px;
            font-size: 25px;
            border-top: 1px solid #312E3D;
            border-left: 1px solid #312E3D;
            border-right: 1px solid #312E3D;
            border-bottom: 1px solid #56536A;
            border-radius: 4px;
        }

        table {
            width: 450px;
            position: absolute;
            text-align: center;
            top: 25%;
            left: 35%;
            font-size:20px;
            border-collapse: collapse;
        }

		.classtable {
            width: 1000px;
            position: absolute;
            text-align: center;
            top: 30%;
            left: 20%;
            font-size:20px;
            border-collapse: collapse;
        }


        table, th, td {
            border:2px solid black;
            padding: 10px;
        }

        input {
            width: 280px;
            height: 38px;
            margin-bottom: 10px;
            outline: none;
            padding: 10px;
            font-size: 13px;
            border-top: 1px solid #312E3D;
            border-left: 1px solid #312E3D;
            border-right: 1px solid #312E3D;
            border-bottom: 1px solid #56536A;
            border-radius: 4px;
        }

        .but {
            width: 280px;
            min-height: 20px;
            display: block;
            background-color: black;
            border: 1px solid black;
            color: #fff;
            padding: 9px 14px;
            font-size: 15px;
            line-height: normal;
            border-radius: 5px;
            margin: 0;
        }
		
		#welcome {
            color: white;
            position: absolute;
            top: 2.2%;
            left: 85%;
			font-weight：Normal;
			font-size：24px;
			text-color：Secondary;
        }
    </style>
</head>

<body>
    <div id="tab-demo">
        <nav class="navbar navbar-dark navbar-expand-lg bg-dark navbar-dark">
            <a class="nav-link" href="http://localhost/php_example/action.php" role="button"
                style="color:white; ">Course Selection</a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/php_example/timetable.php" role="button" style="color:white;">查詢課表</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/php_example/add.php" role="button" style="color:white;">加選</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/php_example/delete.php" role="button" style="color:white;">退選</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/php_example/available_action.php" role="button" style="color:white;">可選課程</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/php_example/wishlist.php" role="button" style="color:white;">關注課程</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/php_example/order.php" role="button" style="color:white;">抽籤</a>
                    </li>
					<?php
						if($_SESSION["login"] == 0){
							echo 
							'<li class="nav-item">
								<a class="nav-link" href="http://localhost/php_example/login.php" role="button" style="color:white;">登入</a>
							</li>',
							'<li class="nav-item">
								<a class="nav-link" href="http://localhost/php_example/registration.php" role="button" style="color:white;">註冊</a>
							</li>';
						}
						else{
							echo '<li class="nav-item">
								<a class="nav-link" href="http://localhost/php_example/logout.php" role="button" style="color:white;">登出</a>
							</li>';
						}
					?>
					
                </ul>
            </div>
        </nav>
    </div>
</body>

</html>
