<!DOCTYPE html>
<html>
<head>
<title>Muzikos pamoka - rezultatai</title>
<meta charset="utf-8" />
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="style.css" media="all" />
<style type="text/css">
</style>
</head>
<body>

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
		
		<div class="sidebar">
			<img class="key" alt="Smuiko raktas" src="key.png">
		</div>
			<div class="content">
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
			//isemimas
			$query = "SELECT user, points FROM game ;";
			$result = @mysql_query ($query);
			echo"<h3>Reultatų lentelė</h3><table> <tr><th>Vartotojas</th><th>Rezultas</th></tr>";
			while ($row=mysql_fetch_array($result)){
			echo"<tr>";
			echo "<td>". $row["user"] ."</td><td>". $row["points"] ."</td>" ;
			echo"</tr>";
			}
			echo"</table>";
			mysql_close();	
		?>	
		</div>	
		</div><!--content wrapper-->	
		<footer class="page-footer">
				
			<p>© Deimas Ostreika, 2013 </p>
		</footer>
	</div><!--page-->

</body>
</html>
