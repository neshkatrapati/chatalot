<?php echo "<script>var mobject = ".$_GET["room"].";</script>"; ?> <script
type='text/javascript'>
	function checker(object,user){
	
		if(event) {
			if(event.keyCode == 13)
				post(object,user);
		}
		
	}
	function postspl(object,msg){
		var el = document.getElementById("msg");

		if (window.XMLHttpRequest) {
			xmlhttp=new XMLHttpRequest();
		} xmlhttp.onreadystatechange=function() {
		
			if(xmlhttp.readyState==4 && xmlhttp.status==200) {
			
				el.value = "";
		
			
			}
		}
		
		var string = "handler.php?mode=post&msg="+msg+"&rid="+object;
		
		xmlhttp.open("GET",string,true); xmlhttp.send();

	}
    function post(object,user){
		var el = document.getElementById("msg"); if (el.value != ""){ if
		(window.XMLHttpRequest) {
			xmlhttp=new XMLHttpRequest();
		} xmlhttp.onreadystatechange=function() {
		
			if(xmlhttp.readyState==4 && xmlhttp.status==200) {
			
				el.value = "";
		
			
			}
		}
		
		var string =
		"handler.php?mode=post&msg="+user+":"+el.value+"&rid="+object;
		
		xmlhttp.open("GET",string,true); xmlhttp.send();
	} }
	 window.setInterval(function() {
		var el = document.getElementById("stream"); if
		(window.XMLHttpRequest) {
			xmlhttp=new XMLHttpRequest();
		} xmlhttp.onreadystatechange=function() {
		
			if(xmlhttp.readyState==4 && xmlhttp.status==200) {
			
				el.innerHTML = xmlhttp.responseText;
		
			
			}
		}
		var string = "handler.php?mode=get&object="+mobject;
		
		xmlhttp.open("GET",string,true); xmlhttp.send();
	},1000);
</script> <?php
	if($_COOKIE["user"] == ""){
		echo
		"<script>window.location='joinroom.php?room=".$_GET["room"]."';</script>";
		
	}
	echo "<script>postspl(".$_GET["room"].",\"".$_COOKIE["user"]." Joined the room!\")</script>"; echo "<link href='bootstrap/css/bootstrap.css'
	rel='stylesheet' type='text/css'></link>"; echo "<script
	src='bootstrap/js/bootstrap.js' type='text/javascript'></script>"; echo
	"<script src='bootstrap/js/bootstrap-dropdown.js'
	type='text/javascript'></script>";
	
	require_once 'connection.php'; $x = mysql_query("SELECT * from rooms
	where rid like ".$_GET["room"]); $t = mysql_fetch_array($x); $rname =
	$t["rname"];
	
	echo "<div class='alert alert-info'><h1>".$_COOKIE["user"]." - $rname -
	CHATALOT!</h1></div>"; echo "<div class='row' style='margin-left:10%'>";
	echo "<div class='span10'><table class='table table-bordered' 
	style='text-align:right'><tr><td style='height:400px'><div
	style='overflow: auto; height:400; border:0 #000000 solid; text-align:
	left; padding: 2px' id='stream'></div>";echo "</td></tr>"; echo
	"<tr><td><textarea id='msg' rows='2' cols='500' style='width:100%;'
	onkeyup='checker(".$_GET["room"].",\"".$_COOKIE["user"]."\")'></textarea>";
	echo "<center><button class='btn'
	onclick='post(".$_GET["room"].",\"".$_COOKIE["user"]."\")'
	style='float:center;width:50%'
	type='button'>Submit!</button></center></td></tr>"; echo "</table></div>";
	echo "<div  class='span4'>";
	echo "<table class='table table-bordered'><th>Rooms</th>";	
	require_once 'connection.php';
	$q = mysql_query("SELECT * from rooms where creator='".$_COOKIE["user"]."'");
	while($row=mysql_fetch_array($q)){
		
		echo "<tr><td>".$row["rname"]."</td><td style='text-align:center'><a href='joinroom.php?room=".$row["rid"]."&hide' class='btn btn-success'>Join the room!</a></td></tr>";
	}
	echo "</table>";
	echo "</div>";
	echo "</div>";

?>
