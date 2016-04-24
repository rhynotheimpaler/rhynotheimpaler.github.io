<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Unity Web Player | SpaceShooter</title>
		<script type='text/javascript' src='https://ssl-webplayer.unity3d.com/download_webplayer-3.x/3.0/uo/jquery.min.js'></script>
		<script type="text/javascript">
		<!--
		var unityObjectUrl = "http://webplayer.unity3d.com/download_webplayer-3.x/3.0/uo/UnityObject2.js";
		if (document.location.protocol == 'https:')
			unityObjectUrl = unityObjectUrl.replace("http://", "https://ssl-");
		document.write('<script type="text\/javascript" src="' + unityObjectUrl + '"><\/script>');
		-->
		</script>
		<script type="text/javascript">
		<!--
			var config = {
				width: 600, 
				height: 900,
				params: { enableDebugging:"0" }
				
			};
			var u = new UnityObject2(config);
			
			jQuery(function() {

				var $missingScreen = jQuery("#unityPlayer").find(".missing");
				var $brokenScreen = jQuery("#unityPlayer").find(".broken");
				$missingScreen.hide();
				$brokenScreen.hide();

				u.observeProgress(function (progress) {
					switch(progress.pluginStatus) {
						case "broken":
							$brokenScreen.find("a").click(function (e) {
								e.stopPropagation();
								e.preventDefault();
								u.installPlugin();
								return false;
							});
							$brokenScreen.show();
						break;
						case "missing":
							$missingScreen.find("a").click(function (e) {
								e.stopPropagation();
								e.preventDefault();
								u.installPlugin();
								return false;
							});
							$missingScreen.show();
						break;
						case "installed":
							$missingScreen.remove();
						break;
						case "first":
						break;
					}
				});
				u.initPlugin(jQuery("#unityPlayer")[0], "Space.unity3d");
			});
		-->
		</script>
		<style type="text/css">
		<!--
		body {
			font-family: Helvetica, Verdana, Arial, sans-serif;
			background-color: black;
			color: white;
			text-align: center;
		}
		a:link, a:visited {
			color: #bfbfbf;
		}
		a:active, a:hover {
			color: #bfbfbf;
		}
		p.header {
			font-size: small;
		}
		p.header span {
			font-weight: bold;
		}
		p.footer {
			font-size: x-small;
		}
		div.content {
	margin: auto;
	width: 600px;
	float: none;
		}
		div.broken,
		div.missing {
			margin: auto;
			position: relative;
			top: 50%;
			width: 193px;
		}
		div.broken a,
		div.missing a {
			height: 63px;
			position: relative;
			top: -31px;
		}
		div.broken img,
		div.missing img {
			border-width: 0px;
		}
		div.broken {
			display: none;
		}
		div#unityPlayer {
			cursor: default;
			height: 900px;
			width: 600px;
		}
.highscore  {
	float: left;
	text-align: left;
	width: 250px;
	border: thin solid #FFFFFF;
	height: 500px;
	margin-left: 5%;
	margin-top: 100px;
}
.content {
}
		-->
		</style>
	</head>
	<body>
		<?php
		include('mysqli_connect.php');
		?>
		<p class="header"><span>Unity Web Player | </span>SpaceShooter</p>
        <div class="highscore">
        <h1>Highscore</h1>
		<?
			$query = "SELECT * FROM scoreboard ORDER BY score";
			$results = mysqli_query($dbc, $query);
			while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
				echo "<h2>".$row['name'].": ".$row['score']."</h2>";
			}
		?>
        </div>
		<div class="content">
          
          <div id="unityPlayer">
            <div class="missing"> <a href="http://unity3d.com/webplayer/" title="Unity Web Player. Install now!"> <img alt="Unity Web Player. Install now!" src="http://webplayer.unity3d.com/installation/getunity.png" width="193" height="63" /> </a> </div>
          </div>
		</div>
		<p class="footer">&laquo; created with <a href="http://unity3d.com/unity/" title="Go to unity3d.com">Unity</a> &raquo;</p>
	</body>
</html>
