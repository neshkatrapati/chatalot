<style>
	.centerd{
			margin-top:10%;
			width:30%;
			text-align:center;
	}
	input[type='text'],input[type='email'],input[type='password']{
			height:auto;
	}
</style>
<?php
	echo "<link href='bootstrap/css/bootstrap.css' rel='stylesheet' type='text/css'></link>";
	echo "<script src='bootstrap/js/bootstrap.js' type='text/javascript'></script>";
	echo "<script src='bootstrap/js/bootstrap-dropdown.js' type='text/javascript'></script>";
	echo "<div class='alert alert-info'><h1>Signup to chatalot!</h1></div>";
	if(isset($_POST["phase1"])){
			require_once 'connection.php';
			$email = $_POST["email"];
			$query = mysql_query("SELECT * from members");
			$id = mysql_num_rows($query);
			$token = uniqid();
			mysql_query("insert into members values($id,'','$email','','$token')");
			if (mailit($_POST["email"],$token)!= FALSE)
				echo "<center><div class='alert alert-success' style='width:50%'>Check Your Mail!</div></center>";	
			
	}
	if($_GET["token"] == ""){
		echo "<form action='' method='post'>";
		echo "<center><div class='centerd'>";
		echo "<table class='table table-bordered' style='text-align:center'>";
		echo "<tr><td>Enter your email!</td><td><input type='email' name='email'></input></td></tr>";
		echo "<tr><td></td><td><input type='submit' value='Signup!' name='phase1' class='btn'></input></td></tr>";
		echo "</table>";
		echo "</div></center>";
		echo "</form>";
	}
	else{
		require_once 'connection.php';
		$token = $_GET["token"];
		$query  = mysql_query("select * from members where token='$token'");
		if(mysql_num_rows($query) == 0)
				echo "<center><div class='alert alert-danger' style='width:50%'>Invalid Token!!</div></center>";
		else{
			$row = mysql_fetch_array($query);
			echo "<center><div class='centerd'><table class='table table-bordered'>";
			echo "<tr><td>Name</td><td><input type='text' name='name'></input></td></tr>";
			echo "<tr><td>Password</td><td><input type='password' id='p1' name='password'></input></td></tr>";
			echo "<tr><td>Confirm Password</td><td><input type='password' id='p2' name='cpassword'></input></td></tr>";
			echo "<tr><td>Email</td><td>".$row["uname"]."</td></tr>";
			echo "<tr><td></td><td><input type='submit' value='Signup!' name='phase1' class='btn'></input></td></tr>";
			echo "</table></div></center>";
			
			
		}
		
		
		
	}
function mailit($email,$token){
	require_once "Mail.php";
        $from = "Chatalot";
        $to = $email;
        $subject = "Chatalot Registration";
		
       $body = "This mail is sent by Chatalot regarding the registration done on ".date("Y-m-d H:i:s")." If it is not you ignore it.
Please click the link for registration http://localhost/chatalot/signup.php?token=$token";
		
        $host = "smtp.gmail.com";
        $username = "neshmailsu@gmail.com";
        $password = "philology";
        $headers = array ('From' => $from,
          'To' => $to,
          'Subject' => $subject);
        $smtp = Mail::factory('smtp',
        array ('host' => $host,
            'auth' => true,
            'username' => $username,
                'password' => $password));
 
 $mail = $smtp->send($to, $headers, $body);

 if (PEAR::isError($mail)) {
    return FALSE;
  } else {
	RETURN TRUE;
  }
}
?>
