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

$lights_state = file_exists("/tmp/lights.lock")?'01':'00';

if($_GET['action']){
  switch($_GET['joint']){
    case 'light':
      if($_GET['action'] == 'on'){
        $response =  exec("robotarm 00 00 01");
        touch("/tmp/lights.lock");
      }elseif($_GET['action'] == 'rave'){
        for($i = 0; $i < 5; $i++){
          sleep(1);
          $response = exec("robotarm 00 00 01");
          sleep(1);
          $response = exec("robotarm 00 00 00");
        }
      }else{
        unlink("/tmp/lights.lock");
        exec("robotarm 00 00 00");
      }
      break;

    case 'waist':
      switch($_GET['action']){
        case 'left':
          exec("robotarm 00 01 $lights_state");
          sleep(1);
          exec("robotarm 00 00 $lights_state");
          break;
        case 'right':
          exec("robotarm 00 02 $lights_state");
          sleep(1);
          exec("robotarm 00 00 $lights_state");
          break;
      }
      break;

    case 'hip':
      switch($_GET['action']){
        case 'up':
          exec("robotarm 40 00 $lights_state");
          sleep(1);
          exec("robotarm 00 00 $lights_state");
          break;
        case 'down':
          exec("robotarm 80 00 $lights_state");
          sleep(1);
          exec("robotarm 00 00 $lights_state");
          break;
      }
      break;

    case 'elbow':
      switch($_GET['action']){
        case 'up':
          exec("robotarm 10 00 $lights_state");
          sleep(1);
          exec("robotarm 00 00 $lights_state");
          break;
        case 'down':
          exec("robotarm 20 00 $lights_state");
          sleep(1);
          exec("robotarm 00 00 $lights_state");
          break;
      }
      break;

    case 'wrist':
      switch($_GET['action']){
        case 'down':
          exec("robotarm 04 00 $lights_state");
          sleep(1);
          exec("robotarm 00 00 $lights_state");
          break;
        case 'up':
          exec("robotarm 08 00 $lights_state");
          sleep(1);
          exec("robotarm 00 00 $lights_state");
          break;
      }
      break;

    case 'grip':
      switch($_GET['action']){
        case 'close':
          exec("robotarm 01 00 $lights_state");
          sleep(0.25);
          exec("robotarm 00 00 $lights_state");
          break;
        case 'open':
          exec("robotarm 02 00 $lights_state");
          sleep(0.25);
          exec("robotarm 00 00 $lights_state");
          break;
      }
      break;

  }
}
if($_GET['axes']){
  $begin = microtime(true);
  $axes = abs($_GET['axes']);

  while($begin >= microtime(true) - 0.2){
    switch($_GET['joint']){
      case 'hip':
        $num = $_GET['axes'] > 0 ? '40' : '80';
        exec("robotarm {$num} 00 $lights_state");
        sleep(0.2 * $axes);
        exec("robotarm 00 00 $lights_state");
        sleep(0.2 * ($axes*-1));
        break;

      case 'waist':
        $num = $_GET['axes'] > 0 ? '01' : '02';
        exec("robotarm 00 {$num} $lights_state");
        sleep(0.2 * $axes);
        exec("robotarm 00 00 $lights_state");
        sleep(0.2 * ($axes*-1));
        break;

    }
  }
}

