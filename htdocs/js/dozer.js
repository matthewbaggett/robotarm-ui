var gamepads = {};
var intervalStartup;
var intervalWatchAction;
var ajax_busy;

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
    if(gp.axes[0] > 0.2 || gp.axes[0] < -0.2){
        runController("action.php?joint=waist&axes=" + gp.axes[0]);
    }
    if(gp.axes[1] > 0.2 || gp.axes[1] < -0.2){
        runController("action.php?joint=hip&axes=" + gp.axes[1]);
    }
}

function webkitGP() {
    var gp = navigator.webkitGetGamepads()[0];
    console.log("webkitGP", gp);
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