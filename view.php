<?php
	include("connect.php");
?>
<html>
<head>
	<title>
	Мой блог
	</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<link rel="stylesheet" type="text/css" href="css/style.css"  />
</head>
<body>

	<div class="wrapper">
		<div class="header">
			<a href="index.php"><img id=logo src="img/logo.jpg" /></a>
		</div>
		
		<div class="content">
		
			<div class="left">
				<?php
					$result = mysql_query("SELECT * FROM data") or die(mysql_error());
					$data = mysql_fetch_array($result);
					do{
						printf('
						<div class="article">
							<img src="img/logo1.jpg" />
							<a class="title" href="#"><h2>%s</h2></a>
							<p>%s
							<a href="#">полностью</a></p>
							<div style="clear:both;"></div>
						</div>
						',$data["title"],$data["m_desc"]);
					}
					while($date = mysql_fetch_array($result));
				?>
			</div>
				
			<div class="right">
			
				<div class="right_menu">
					<a href="#">Главная</a>
					<a href="#">Статьи</a>
					<a href="#">Видио</a>
					<a href="#">Фотографии</a>
					<a href="#">Архив</a>
					<a href="#">Обратная связь</a>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
			
		
		<div class="footer">Мой блог (с)2014 </div>
	</div>
</body>
</html>