<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=320, initial-scale=1"/>
    <title>Dozer C&C</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    <script type="text/javascript">
      var websocket = 'ws://<?php echo $_SERVER['HTTP_HOST']; ?>:8084/';
    </script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jsmpg.js"></script>
    <script type="text/javascript" src="js/canvas.js"></script>
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
  </body>
</html>
