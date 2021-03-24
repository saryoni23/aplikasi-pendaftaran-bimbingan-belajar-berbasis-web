<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Pusat Bimbingan Belajar PRIMAGAMA</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="http://fonts.googleapis.com/css?family=Archivo+Narrow:400,700" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Open+Sans|Montserrat:400,700" rel="stylesheet" type="text/css" />
	<link href="default.css" rel="stylesheet" type="text/css" media="all" />
	<!--[if IE 6]>
<link href="default_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>

<body>
	<div id="wrapper" class="container">
		<div id="header">
			<div id="logo">
				<h1><a href="./">PRIMAGAMA</a></h1>
			</div>
			<div id="menu">
				<ul>
					<?php
					include "menu.php";
					?>
				</ul>
			</div>
		</div>
		<div id="banner"><img src="images/logogo.jpg" width="1100" height="200" alt="" /></div>
		<div id="page">

			<div id="sidebar">
				<div id="box1">
					<h2 class="title">Berita Terbaru</h2>
					<ul class="style1">
						<?php
						include "berita.php";
						?>
					</ul>
				</div>
			</div>

			<div id="content">
				<?php
				include "content.php";
				?>
			</div>

		</div>
		<div id="footer">
			<p>Copyright (c) 2017 Pusat Bimbingan Belajar PRIMAGAMA. All rights reserved.</p>
		</div>
	</div>
</body>

</html>