<?php

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
        sleep(0.5);
        $response =  exec("robotarm 00 00 01");
        sleep(0.5);
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
    break;

  case 'hip':
    switch($_GET['action']){
      case 'up':
        exec("robotarm 00 02 00");
        sleep(1);
        exec("robotarm 00 00 00");
        break;
      case 'down':
        exec("robotarm 40 00 00");
        sleep(1);
        exec("robotarm 80 00 00");
        break;
    }
    break;

}

var_dump($response);