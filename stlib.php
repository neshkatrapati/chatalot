<?php
	function postToStream($rid,$message){
			
			$query = "SELECT * FROM chats";
			$result = mysql_query($query);
			$rows = mysql_num_rows($result);
			$date = strtotime("now");
			$query = "INSERT INTO chats VALUES($rows,\"".$message."\",$rid,'".$date."')";
			echo $query;
			return mysql_query($query);
	}
	function getStream($rid){
			$query = "SELECT * FROM chats where rid = $rid  ORDER BY(time)";
			
			$result = mysql_query($query);
			$ret = "<table class='table'>";
			while($row = mysql_fetch_array($result)){
				$ret .= "<tr><td>".$row["message"]."</td></tr>";
				
			}
			$ret .= "</table>";
			return $ret;
		
	}
	function getStreamByObject($object){
			$query = "SELECT * FROM MSTREAMT WHERE oid=$object ORDER BY(sid) DESC";
			$result = mysql_query($query);
			$ret = "<table class='table' style='width:300px;'>";
			while($row = mysql_fetch_array($result)){
				$o = getObject($row["oid"]);
				$id = $row["oid"];
				$im = getImgUri($o["oimgid"]);
				$ret .= "<tr><td>".$row["message"]."</td><td>".dateify($row["postedon"])."</td></tr>";
				
			}
			$ret .= "</table>";
			return $ret;
		
	}
	function dateify($date){
			$d = date("Y-m-d h:i",$date);
			return time_difference($d);
			
	}
	function time_difference($date){
		if(empty($date)) {
			return "No date provided";
		}
		$periods         = array("second","minute", "hour", "day", "week", "month", "year", "decade");
		$lengths         = array("60","60","24","7","4.35","12","10");
		$now             = time();
		$unix_date         = strtotime($date);
		 if($now > $unix_date) {
        $difference = $now - $unix_date;
        $tense = "ago";} 
        else {
        $difference = $unix_date - $now;
        $tense = "from now";}
        for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
			$difference /= $lengths[$j];}
			$difference = round($difference);
			if($difference != 1) {
				$periods[$j].= "s";
			}
		if($j == 0)
			return "A few seconds Ago";
		return "$difference $periods[$j] {$tense}";
 
	}
	
?>
