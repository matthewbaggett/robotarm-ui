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
  </head>
  <body>
    <img src="<?php echo $_SERVER['HTTP_HOST']; ?>:8080/?action=stream" />
  </body>
</html>
