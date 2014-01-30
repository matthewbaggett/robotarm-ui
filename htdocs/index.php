<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=320, initial-scale=1"/>
	<title>Dozer C&C</title>
	<style type="text/css">
		body {
			background: #333;
			text-align: center;
			margin-top: 10%;
		}	
	</style>
</head>
<body>		
	<canvas id="videoCanvas" width="640" height="480">
		<p>
			Please use a browser that supports the Canvas Element, like
			<a href="http://www.google.com/chrome">Chrome</a>,
			<a href="http://www.mozilla.com/firefox/">Firefox</a>,
			<a href="http://www.apple.com/safari/">Safari</a> or Internet Explorer 10
		</p>
	</canvas>
	<script type="text/javascript" src="jsmpg.js"></script>
	<script type="text/javascript">
		// Show loading notice
		var canvas = document.getElementById('videoCanvas');
		var ctx = canvas.getContext('2d');
		ctx.fillStyle = '#444';
		ctx.fillText('Loading...', canvas.width/2-30, canvas.height/3);

		// Setup the WebSocket connection and start the player
		var client = new WebSocket( 'ws://milan.fouroneone.us:8084/' );
		var player = new jsmpeg(client, {canvas:canvas});
	</script>
</body>
</html>