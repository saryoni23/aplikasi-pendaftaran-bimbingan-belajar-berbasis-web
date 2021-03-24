<?php
session_start();
error_reporting(0);

// if (empty($_SESSION['namauser'] and empty($_SESSION['passuser']))) {
// 	echo "
//  <center>Untuk mengakses menu admin, Anda harus login.<br>";
// 	echo "<a href=index.html><b>LOGIN</b></a></center>";
// } else {
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="content-language" content="en" />
		<meta name="robots" content="noindex,nofollow" />
		<link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css" /> <!-- RESET -->
		<link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" /> <!-- MAIN STYLE SHEET -->
		<link rel="stylesheet" media="screen,projection" type="text/css" href="css/2col.css" title="2col" /> <!-- DEFAULT: 2 COLUMNS -->
		<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="css/1col.css" title="1col" /> <!-- ALTERNATE: 1 COLUMN -->
		<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]-->
		<!-- MSIE6 -->
		<link rel="stylesheet" media="screen,projection" type="text/css" href="css/style.css" /> <!-- GRAPHIC THEME -->
		<link rel="stylesheet" media="screen,projection" type="text/css" href="css/mystyle.css" /> <!-- WRITE YOUR CSS CODE HERE -->
		<link rel="stylesheet" href="css/paging.css" type="text/css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/switcher.js"></script>
		<script type="text/javascript" src="js/toggle.js"></script>
		<script type="text/javascript" src="js/ui.core.js"></script>
		<script type="text/javascript" src="js/ui.tabs.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$(".tabs > ul").tabs();
			});
		</script>
		<script language="javascript" type="text/javascript">
			tinyMCE_GZ.init({
				plugins: 'style,layer,table,save,advhr,advimage, ...',
				themes: 'simple,advanced',
				languages: 'en',
				disk_cache: true,
				debug: false
			});
		</script>
		<script language="javascript" type="text/javascript" src="../tinymcpuk/tiny_mce_src.js"></script>
		<script type="text/javascript">
			tinyMCE.init({
				mode: "textareas",
				theme: "advanced",
				plugins: "table,youtube,advhr,advimage,advlink,emotions,flash,searchreplace,paste,directionality,noneditable,contextmenu",
				theme_advanced_buttons1_add: "fontselect,fontsizeselect",
				theme_advanced_buttons2_add: "separator,preview,zoom,separator,forecolor,backcolor,liststyle",
				theme_advanced_buttons2_add_before: "cut,copy,paste,separator,search,replace,separator",
				theme_advanced_buttons3_add_before: "tablecontrols,separator,youtube,separator",
				theme_advanced_buttons3_add: "emotions,flash",
				theme_advanced_toolbar_location: "top",
				theme_advanced_toolbar_align: "left",
				theme_advanced_statusbar_location: "bottom",
				extended_valid_elements: "hr[class|width|size|noshade]",
				file_browser_callback: "fileBrowserCallBack",
				paste_use_dialog: false,
				theme_advanced_resizing: true,
				theme_advanced_resize_horizontal: false,
				theme_advanced_link_targets: "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
				apply_source_formatting: true
			});

			function fileBrowserCallBack(field_name, url, type, win) {
				var connector = "../../filemanager/browser.html?Connector=connectors/php/connector.php";
				var enableAutoTypeSelection = true;

				var cType;
				tinymcpuk_field = field_name;
				tinymcpuk = win;

				switch (type) {
					case "image":
						cType = "Image";
						break;
					case "flash":
						cType = "Flash";
						break;
					case "file":
						cType = "File";
						break;
				}

				if (enableAutoTypeSelection && cType) {
					connector += "&Type=" + cType;
				}

				window.open(connector, "tinymcpuk", "modal,width=600,height=400");
			}
		</script>
		<link href="menu_assets/styles.css" rel="stylesheet" type="text/css">
		<title>Pusat Bimbingan Belajar PRIMAGAMA</title>
	</head>

	<body>

		<div id="main">

			<!-- Tray -->
			<div id="tray" class="box">

				<p class="f-left box">
					<strong>Pusat Bimbingan Belajar PRIMAGAMA</strong>

				</p>

				<p class="f-right">User: <strong><a href="#"><?php echo $_SESSION['namauser']; ?></a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Level User: <strong><a href="#"><?php echo $_SESSION['leveluser']; ?></a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="logout.php" id="logout">Logout</a></strong></p>

			</div> <!--  /tray -->

			<hr class="noscreen" />

			<!-- Menu -->

			<?php include "menu.php"; ?>


			<hr class="noscreen" />

			<!-- Columns -->
			<div id="cols" class="box">

				<hr class="noscreen" />

				<!-- Content (Right Column) -->
				<div id="content" class="box">

					<?php include "content.php"; ?>

				</div> <!-- /content -->

			</div> <!-- /cols -->

			<hr class="noscreen" />

			<!-- Footer -->
			<div id="footer" class="box">

				<p class="f-left">&copy; 2017 Pusat Bimbingan Belajar PRIMAGAMA, All Rights Reserved &reg;</p>

			</div> <!-- /footer -->

		</div> <!-- /main -->

	</body>

	</html>
<?php
// }

?>