jQuery(document).ready(function(){
    // Show loading notice
    var canvas = document.getElementById('videoCanvas');
    var ctx = canvas.getContext('2d');
    ctx.fillStyle = '#444';
    ctx.fillText('Connecting to Bulldozer...', canvas.width/2-30, canvas.height/3);

    // Setup the WebSocket connection and start the player
    var client = new WebSocket(websocket);
    var player = new jsmpeg(client, {canvas:canvas});
});
