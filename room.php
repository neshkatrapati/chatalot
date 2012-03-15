<style>
	.centerd{
			margin-top:10%;
			width:30%;
			text-align:center;
	}
	input[type='text']{
			height:auto;
	}
</style>
<?php
	echo "<link href='bootstrap/css/bootstrap.css' rel='stylesheet' type='text/css'></link>";
	echo "<script src='bootstrap/js/bootstrap.js' type='text/javascript'></script>";
	echo "<script src='bootstrap/js/bootstrap-dropdown.js' type='text/javascript'></script>";
	echo "<div class='alert alert-info'><h1>Create A Room</h1></div>";
	if(isset($_POST["phase1"])){
			require_once 'connection.php';
			$x = mysql_query("SELECT * FROM rooms");
			$rid = mysql_num_rows($x);
			$rname = $_POST["rname"];
			$creator = $_POST["creator"];
			
			$st = mysql_query("INSERT INTO rooms VALUES($rid,'$rname','$creator',0)");
			$url = "chat.php?room=$rid";
			setcookie("user",$creator);
			
			if($st != FALSE){
					echo "<center><div class='alert alert-success' style='width:50%'>Success! Room Created Share  <a href='$url'>This URL</a> To Your Friends!!</div></center>";
			}
			
	}
	echo "<form action='' method='post'>";
	echo "<center><div class='centerd'>";
		echo "<table class='table table-bordered' style='text-align:center'>";
		echo "<tr><td>Room Name</td><td><input type='text' name='rname'></input></td></tr>";
		echo "<tr><td>Your Name</td><td><input type='text' name='creator'></input></td></tr>";
		echo "<tr><td></td><td><input type='submit' name='phase1' class='btn'></input></td></tr>";
		echo "</table>";
	echo "</div></center>";
	echo "</form>";
?>
