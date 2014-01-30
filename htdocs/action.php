<?php

switch($_GET['joint']){
  case 'waist':
  case 'light':
    // OK!
    break;

  default:
    die("NEIN");
}

switch($_GET['action']){
  case 'left':
  case 'right':
  case 'stop':
  case 'on':
  case 'off':
  case 'rave':
    // OK!
    break;
  default:
    die("NEIN");
}

/**
 * robotarm 00 02 00 # Rotate Base CounterClockwise
 * robotarm 00 01 00 # Rotate Base Clockwise
 * robotarm 00 02 00 # Rotate Base CounterClockwise
 * robotarm 80 00 00 # Shoulder down
 * robotarm 40 00 00 # Shoulder up
 * robotarm 20 00 00 # Elbow down
 * robotarm 10 00 00 # Elbow up
 * robotarm 08 00 00 # Wrist down
 * robotarm 04 00 00 # Wrist up
 * robotarm 02 00 00 # Grip open
 * robotarm 01 00 00 # Grip close
 * robotarm 00 00 01 # LED on
 * robotarm 00 00 00 # Stop all motion & turn off LED
 */
switch($_GET['joint']){
  case 'light':
    if($_GET['action'] == 'on'){
      $response =  exec("robotarm 00 00 01");
    }elseif($_GET['action'] == 'rave'){
      for($i = 0; $i < 5; $i++){
        sleep(0.25);
        $response =  exec("robotarm 00 00 01");
        sleep(0.25);
        $response = exec("robotarm 00 00 00");
      }
    }else{
      exec("robotarm 00 00 00");
    }
    break;
  case 'waist':
    switch($_GET['action']){
      case 'left':
        exec("robotarm 00 02 00");
        sleep(1);
        exec("robotarm 00 00 00");
        break;
      case 'right':
        exec("robotarm 00 01 00");
        sleep(1);
        exec("robotarm 00 00 00");
        break;

    }
}

var_dump($response);