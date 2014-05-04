<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Conway's Game of Life</title>
<link href="gof_style.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="gameOfLife.js"></script>
<script>

var playField = new Array(30);
var running = false;

for(var i = 0; i < 30; i++){
	playField[i] = new Array(30);
	for(var x = 0; x < 30; x++){
		playField[i][x] = 0;
	}
}

$(function(){
	$( ".field" ).click(function(){
		if(!running){
			$( "#"+this.id ).toggleClass( "active" );
			var c = $( "#"+this.id ).attr("id").split("_");
			var y = c[0].split("f")[1];
			x = c[1];
			
			if(playField[y][x] == 0){
				playField[y][x] = 1;
			}
			else if(playField[y][x] == 1){
				playField[y][x] = 0;
			}
		}
	});
	var runInterval;
	$( ".buttons" ).click(function(){
		running = !running;
		if(running){
			$( "#play" ).attr("id", "pause");
			runInterval = setInterval(function(){run()},115);
		}
		else {
			$( "#pause" ).attr("id", "play");
			clearInterval(runInterval);
		}
	});
	$( "#stop" ).click(function() {
		running = false;
		clearInterval(runInterval);
		$( "#pause" ).attr("id", "play");
		for(var i = 0; i < 30; i++){
			for(var x = 0; x < 30; x++){
				playField[i][x] = 0;
			}
		}
		display();
	});
});

function run(){
	if(running){
		playField = gameOfLife(30, 30, playField);
		display();
	}
	
}

function display(){
	
	for(var y = 0; y < 30; y++){
		for(var x = 0; x < 30; x++){
			if(playField[y][x] == 1){
				$( "#f" + y + "_" + x).addClass("active");
			}
			else if(playField[y][x] == 0){
				$( "#f" + y + "_" + x).removeClass("active");
			}
		}
	}
	
}

</script>
</head>

<body>
<div id="main">
	
    <?php 
		for($y = 0; $y < 30; $y++){
			for($x = 0; $x < 30; $x++){
	?>
			<div class="field" id="f<?php echo $y."_".$x?>"></div>
    <?php	
			}
		}
	?>

</div>
<ul id="controls">
	<li class="buttons" id="play"><a href="#"></a></li>
    <li id="stop"><a href="#"></a></li>
</ul>
</body>
</html>
