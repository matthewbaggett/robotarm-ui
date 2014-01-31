<?php
$host = explode(":", $_SERVER['HTTP_HOST'], 2);
$host = reset($host);
exec("lsusb", $lsusb_out);
$has_controls = false;
foreach($lsusb_out as $lsusb_out_row){
  if(stripos($lsusb_out_row, "1267:0000") !== FALSE){
    $has_controls = true;
  }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dozer C&C</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5shiv.js"></script>
    <script type="text/javascript" src="js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/modernizr.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/dozer.js"></script>

  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Dozer C&amp;C</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div data-ride="carousel" class="carousel slide" id="myCarousel">
      <div class="carousel-inner">
        <div class="item active">
          <img src="http://<?php echo $host ?>:8080/?action=stream" />
          <div class="container">
            <div class="carousel-caption">
              <h1>DOZER</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if($has_controls): ?>
      <div class="container controls">
        <div class="btn-group light">
          <a href="action.php?joint=light&action=on" class="btn btn-success btn-large on">Light On</a>
          <a href="action.php?joint=light&action=rave" class="btn-large btn-warning btn flash">Flash</a>
          <a href="action.php?joint=light&action=off" class="btn-large btn-success btn off">Light Off</a>
        </div>
      </div>
      <div class="container controls">
        <div class="btn-group grip">
          <a href="action.php?joint=grip&action=open" class="btn btn-success btn-large left">Grip Open</a>
          <a href="action.php?joint=grip&action=close"  class="btn btn-success btn-large right">Grip Close</a>
        </div>
      </div>
      <div class="container controls">
        <div class="btn-group wrist">
          <a href="action.php?joint=wrist&action=up" class="btn btn-success btn-large left">Wrist Up</a>
          <a href="action.php?joint=wrist&action=down"  class="btn btn-success btn-large right">Wrist Down</a>
        </div>
      </div>
      <div class="container controls">
        <div class="btn-group elbow">
          <a href="action.php?joint=elbow&action=up" class="btn btn-success btn-large left">Elbow Up</a>
          <a href="action.php?joint=elbow&action=down"  class="btn btn-success btn-large right">Elbow Down</a>
        </div>
      </div>
      <div class="container controls">
        <div class="btn-group shoulder-angle">
          <a href="action.php?joint=hip&action=up" class="btn btn-success btn-large left">Shoulder Up</a>
          <a href="action.php?joint=hip&action=down"  class="btn btn-success btn-large right">Shoulder Down</a>
        </div>
      </div>
      <div class="container controls">
        <div class="btn-group shoulder-rotation">
          <a href="action.php?joint=waist&action=left" class="btn btn-success btn-large left">Shoulder Left</a>
          <a href="action.php?joint=waist&action=right"  class="btn btn-success btn-large right">Shoulder Right</a>
        </div>
      </div>

    <?php else: ?>
      <div class="container">
        No controls available - Arm power off.
      </div>
    <?php endif; ?>

    <div class="container gamepad">
    </div>

    <div class="container">
      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p class="pull-right"><a href="mailto:matthew@baggett.me">&copy; <?php echo date("Y"); ?> Matthew Baggett</a></p>
      </footer>

    </div>

  </body>
</html>
