<html>
	<head>
		<meta charset="utf-8">
		<title> LK-Professor</title>
		<link rel="stylesheet" href="/css/style-reg-auth.css">
        <link rel="stylesheet" href="/css/style.css">
	</head>
	<body>
	<?php session_start();?>
	<div id="header">
		<img src="https://www.sut.ru/doci/logo/sut-logo.png"alt="logo SPBGUT" width="250px" height="100px">	
		<nav class="website-main-navigation">
			<span class="menu-item"><a href="lk-admin-table-professors.php">Заявки преподавателей</a></span>
			<span class="menu-item"><a href="lk-admin-table-students.php">Заявки студентов</a></span>
		</nav>
		<div class="exit">
			<span class="menu-exit">
			<?php  
				
				echo($_SESSION["nowUserLogin"])
			?>
				<a href="../index.php?exit=1">
					<img src="https://lk.sut.ru/cabinet/ini/general/0/cabinet/img/exit.png" >
				</a>
			</span>
		</div>
	</div>
	<?php include "../construct/dbOpen.php";?>	
	