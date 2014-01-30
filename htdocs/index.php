<?php
$host = explode(":", $_SERVER['HTTP_HOST'], 2);
$host = reset($host);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dozer C&C</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5shiv.js"></script>
    <script type="text/javascript" src="js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/buttons.js"></script>
    <script type="text/javascript" src="js/dozer.js"></script>

  </head>
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <div role="navigation" class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a href="#" class="navbar-brand">Dozer C&amp;C</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Dropdown <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div data-ride="carousel" class="carousel slide" id="myCarousel">
      <div class="carousel-inner">
        <div class="item active">
          <img src="http://<?php echo $host ?>:8080/?action=stream" />
          <div class="container">
            <div class="carousel-caption">
              <h1>DOZER DERP</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container controls">
      <div class="btn-group waist">
        <a href="action.php?joint=waist&action=left" class="btn btn-large left">Left</a>
        <a href="action.php?joint=waist&action=stop"  class="btn btn-large stop">Stop</a>
        <a href="action.php?joint=waist&action=right"  class="btn btn-large right">Right</a>
      </div>

      <div class="btn-group light">
        <a href="action.php?joint=light&action=on" class="btn btn-large left">Light On</a>
        <a href="action.php?joint=light&action=rave" class="btn-large btn left">RAVE</a>
        <a href="action.php?joint=light&action=off" class="btn-large btn left">Light Off</a>
      </div>
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
