<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("location:index.php");
} else {
	include 'db.php';
?>
	<html>

	<head>
		<link href="good.css" rel="stylesheet" type="text/css" />

		<title>
			Registerar page
		</title>
		<style>
			body {
				background-color: dimgray;
				background-image: url(iterfaceimage/registrar.jpg);
			}

			.rightDiv {
				margin: 5px;
				padding: 5px;
				float: left;
				width: 1670PX;
				height: 800px;
				background-color: dimgray;

			}
		#leftdiv{
			display: flex;
			flex-direction: row!important;
		}
        #yuu{
            float: left!important;
            width: 200px!important;
            height: 100%!important;
            background-color: black!important;
            color: white!important;
        }
		#leftsh{
			float: left!important;
            width: 200px!important;
            height: 100%!important;
            background-color: black!important;
            color: white!important;
		}
    
		</style>
	</head>

	<body>
		<?php
			include "registerarheader.php";
			?>
		<div id="leftdiv">
			
			<div id="leftsh">
				<?php
				include "registerarLeft.php";
				?>
			</div>

		
		</div>
	</body>

	</html>
<?php
}
?>