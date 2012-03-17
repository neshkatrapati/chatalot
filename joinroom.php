<style>
	.centerd{
			margin-top:5%; width:30%; text-align:center;
	} input[type='text']{
			height:auto;
	}
</style> <?php
	function redirect($location) { echo "
		<script type='text/javascript'>
			setTimeout('delayer()',1000); function delayer(){
			
			window.location = '".$location."'; }
		</script> ";

	} echo "<link href='bootstrap/css/bootstrap.css' rel='stylesheet'
	type='text/css'></link>"; echo "<script src='jquery.js'
	type='text/javascript'></script>"; echo "<script
	src='bootstrap/js/bootstrap.js' type='text/javascript'></script>"; echo
	"<script src='bootstrap/js/bootstrap-dropdown.js'
	type='text/javascript'></script>"; echo "<script
	src='bootstrap/js/bootstrap-typeahead.js'
	type='text/javascript'></script>"; echo "<script
	type='text/javascript'>$('.typeahead').typeahead();</script>"; echo
	"<div class='alert alert-info'><h1>Join A Room</h1></div>";
	if(isset($_POST["phase1"])){
			$rname = $_POST["rname"]; require_once 'connection.php';
			$q = mysql_query("SELECT * from rooms where rname like
			'$rname'"); $r = mysql_fetch_array($q); $rid =
			$r["rid"]; $url = "chat.php?room=$rid";
			setcookie("user",$_POST["name"]); redirect($url);
			
	
	} $rname = ""; if($_GET["room"]!=""){
		require_once 'connection.php'; $q = mysql_query("SELECT * from
		rooms where rid like ".$_GET["room"].""); $r =
		mysql_fetch_array($q); $rname = $r["rname"];
	}
			
	
	echo "<form action='' method='post'>"; echo "<center><div
	class='centerd'>";
		echo "<table class='table table-bordered'
		style='text-align:center'>";
		if(!array_key_exists("hide",$_GET)){
		echo "<tr><td>Room Name</td><td><input type='text' required='true' name='rname'
		autocomplete='off' value='$rname'v data-provide='typeahead'
		data-source=\"["; require_once 'connection.php'; $q =
		mysql_query("SELECT * from rooms"); $len = mysql_num_rows($q);
		for($i=0;$row = mysql_fetch_array($q);$i++)
			if($i!=$len-1)
				echo "&quot;".$row["rname"]."&quot;,";
			else
				echo "&quot;".$row["rname"]."&quot;";
	echo "]\"></td></tr>";}
		else{
			
			echo "<tr><td>Room Name</td><td>$rname<input type='hidden' name='rname' value='$rname'></td></tr>";
		}
		echo "<tr><td>Your Name</td><td><input type='text' value='".$_COOKIE["user"]."'
		name='name'></input></td></tr>"; echo "<tr><td></td><td><input
		type='submit' name='phase1' class='btn'></input></td></tr>";
		echo "</table>";
	
	echo "<table class='table table-bordered'><th>Rooms</th>";	
	require_once 'connection.php';
	$q = mysql_query("SELECT * from rooms");
	while($row=mysql_fetch_array($q)){
		
		echo "<tr><td>".$row["rname"]."</td><td style='text-align:center'><a href='?room=".$row["rid"]."&hide' class='btn btn-success'>Join the room!</a></td></tr>";
	}
	echo "</table>";
	echo "</div></center>"; echo "</form>";
?>

