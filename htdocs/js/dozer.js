
var gamepads = {};

function gamepadHandler(event, connecting) {
    var gamepad = event.gamepad;

    if (connecting) {
        gamepads[gamepad.id] = gamepad;
    } else {
        delete gamepads[gamepad.id];
    }
}

function webkitGP() {
    var gp = navigator.webkitGetGamepads()[0];
    console.log("webkitGP", gp);
    if(gp) {
        jQuery('.container.gamepad')
            .empty()
            .append("Gamepad connected at index " + gp.index + ": " + gp.id + ". It has " + gp.buttons.length + " buttons and " + gp.axes.length + " axes.");
        clearInterval(interval);
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
    var interval = setInterval(webkitGP, 500);
    


});