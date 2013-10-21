<!DOCTYPE html>
<html>
<head>
<title>Muzikos pamoka - natos</title>
<meta charset="utf-8" />
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="style.css" media="all" />
<style type="text/css">
</style>
</head>
<body onload="perpiesti();">

	<div class="page clearfix">
		<header class="page-header">
			<h1 class="logo">Muzikos Pamoka </h1>
		</header>
		<nav class="page-nav">
			<ul class="meniu">
				<li> <a  href="./index.php">Pradžia</a> </li>
				<li> <a  href="./rezultatai.php">Rezultatai</a> </li>
				<li> <a  href="./apie.html">Apie</a> </li>
			</ul>
		</nav>
		<div class ="content-wrapper clearfix">
			<form name="myWebForm" action="index.php" method="post">
					Vartotojas:
					<input title="Please Enter " id="user" name="user" type="text" size="24" maxlength="24" value="Vardas" />
					Taškai: <div id="taskai">0</div>
					<input type="hidden" name="hpoints" id="hpoints" value="" />
					<input class="btn" type="submit" value="Siųsti rezultatą" name="submit" />
			</form>	
			<div class="sidebar">
				<img class="key" alt="Smuiko raktas" src="key.png">
			</div>
			<div class="content">
				<canvas	id="canvas" width="600" height="350"></canvas>
			</div>			
		</div><!--content wrapper-->
		<form name="atsakymai1" >
			<input class="answer" type="button" name="7" value="C"  onclick="atsakymas(this.name); perpiesti();">
			<input class="answer" type="button" name="1" value="D"  onclick="atsakymas(this.name); perpiesti();">
			<input class="answer" type="button" name="2" value="E"  onclick="atsakymas(this.name); perpiesti();"> 
			<input class="answer" type="button" name="3" value="F"  onclick="atsakymas(this.name); perpiesti();">
			<input class="answer" type="button" name="4" value="G"  onclick="atsakymas(this.name); perpiesti();">
			<input class="answer" type="button" name="5" value="A"  onclick="atsakymas(this.name); perpiesti();">
			<input class="answer" type="button" name="6" value="H"  onclick="atsakymas(this.name); perpiesti();">
		</form>
		<?php 
			$host="stud.if.ktu.lt";
			$user="deiost";
			$password="Eikaiz8uraej9ion";
			$database_name="deiost";
			/*
			$host="localhost";
			$user="root";
			$password="dima123";
			$database_name="deiost";
			*/
			$dbc=mysql_connect($host,$user,$password) or die ("Negaliu prisijungti prie MySQL: " . mysql_error() );
			mysql_select_db($database_name) or die ("Negaliu pasirinkti duomenu baze: " . mysql_error() );	
			if (isset($_POST["submit"])){
			$query = "INSERT INTO game (user, points) VALUES ('$_POST[user]','$_POST[hpoints]');";
			$result = @mysql_query ($query);
			}
			mysql_close();
		?>
		<footer class="page-footer">		
			<p>© Deimas Ostreika, 2013 </p>
		</footer>
	</div><!--page-->
<script type="text/javascript">
var canvas = document.getElementById('canvas'),
    context = canvas.getContext('2d'),
    endPoints = [
       { x: 0, y: 0 },
       { x: 600, y: 350 },
    ],
    controlPoints = [
       { x: 0, y: 0 },
       { x: 600, y: 350 },
    ];
var	points = 0;
var note =0;
function drawStaff(color, stepx, stepy) {
	context.save()
	context.strokeStyle = color;
	context.lineWidth = 2;
	for (var i = 80; i <= 260; i += 40) {
		context.beginPath();
		context.moveTo(0, i);
		context.lineTo(context.canvas.width, i);
		context.stroke();
   }
   context.restore();
}
function drawOval(centerY, centerX, radius){
    context.save();
    context.beginPath();//  circle
    context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
	context.fill();
	context.beginPath();//kojele
	context.moveTo(centerX+radius-1, centerY);
    context.lineTo(centerX+radius-1, centerY-70);
    context.stroke();
    context.restore();
	context.fillStyle = 'black';
    context.lineWidth = 5;
    context.strokeStyle = 'black';
    context.stroke();
	context.restore();
}
function drawNote(){
note = Math.floor((Math.random()*10)+1);
switch(note){
case 1:
  drawOval(260,300,15);
  break;
case 2:
    drawOval(240,300,15);
  break;
case 3:
    drawOval(220,300,15);
  break;
case 4:
    drawOval(200,300,15);
  break;
case 5:
    drawOval(180,300,15);
  break;
case 6:
    drawOval(160,300,15);
  break;  
case 7:
    drawOval(140,300,15);
  break; 
case 8:
    drawOval(120,300,15);
  break; 
case 9:
    drawOval(100,300,15);
	 break; 
case 10:
    drawOval(80,300,15);
  break;  
default:
	drawOval(80,300,15);
  break;  
}
}
function atsakymas(reiksme){
var temp = parseInt(reiksme)+7;
	if(reiksme == note || note == temp ){
		points+=1;
		document.getElementById("hpoints").value = points;
	}
	else{
		points-=1;
		document.getElementById("hpoints").value = points;
	}
		var y=document.getElementById("taskai");
		y.innerHTML=points;
}
function perpiesti(){
context.clearRect(0, 0, canvas.width, canvas.height);
drawStaff('black', 10, 10);
drawNote();
}
</script>
</body>
</html>
