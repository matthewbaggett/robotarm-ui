var gamepads = {};
var intervalStartup;
var intervalWatchAction;
var ajax_busy;

var slop = 0.5;

function gamepadHandler(event, connecting) {
    var gamepad = event.gamepad;

    if (connecting) {
        gamepads[gamepad.id] = gamepad;
    } else {
        delete gamepads[gamepad.id];
    }
}

function runController(url){
    console.log(url);
    if(typeof(ajax_busy) == 'undefined' || ajax_busy.readyState == 4){
        ajax_busy = jQuery.ajax(url, function(data){

        });
    }
}

function watchController(){
    var gp = navigator.webkitGetGamepads()[0];
    jQuery('.container.gamepad').empty().append(gp.axes[0] + " x " + gp.axes[1]);
    if(gp.axes[0] > slop || gp.axes[0] < (slop*-1)){
        runController("action.php?joint=waist&axes=" + gp.axes[0]);
    }
    if(gp.axes[1] > slop || gp.axes[1] < (slop*-1)){
        runController("action.php?joint=hip&axes=" + gp.axes[1]);
    }
    if(gp.axes[3] > slop || gp.axes[3] < (slop*-1)){
        runController("action.php?joint=elbow&axes=" + gp.axes[3]);
    }

    if(gp.buttons[0] == 1){
        runController("action.php?joint=light&action=toggle");
    }
    if(gp.buttons[7] == 1){
        runController("action.php?joint=grip&action=close");
    }
    if(gp.buttons[6] == 1){
        runController("action.php?joint=grip&action=open");
    }

    if(gp.buttons[12] == 1){
        runController("action.php?joint=wrist&action=up");
    }
    if(gp.buttons[13] == 1){
        runController("action.php?joint=wrist&action=down");
    }
}

function webkitGP() {
    var gp = navigator.webkitGetGamepads()[0];
    if(gp) {
        jQuery('.container.gamepad')
            .empty()
            .append("Gamepad connected at index " + gp.index + ": " + gp.id + ". It has " + gp.buttons.length + " buttons and " + gp.axes.length + " axes.");
        clearInterval(intervalStartup);
        intervalWatchAction = setInterval(watchController, 500);
    }
}

jQuery(document).ready(function(){
    jQuery('.controls .btn').bind('click', function(e){
        var button = jQuery(this);
        e.preventDefault();
        jQuery.get(button.attr('href'));
    })

    var gamepadSupportAvailable = Modernizr.gamepads;

    console.log("Gamepad support available");
    window.addEventListener("gamepadconnected", function(e) { gamepadHandler(e, true); }, false);
    window.addEventListener("gamepaddisconnected", function(e) { gamepadHandler(e, false); }, false);
    // Webkit browser that uses prefixes

    intervalStartup = setInterval(webkitGP, 500);



});