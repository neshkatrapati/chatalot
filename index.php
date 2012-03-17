<style>
	.centerd{
			margin-top:10%;
			width:90%;
			
	}
	input[type='text']{
			height:auto;
	}
</style>
<?php
	echo "<link href='bootstrap/css/bootstrap.css' rel='stylesheet' type='text/css'></link>";
	echo "<script src='jquery.js' type='text/javascript'></script>";
	echo "<script src='bootstrap/js/bootstrap.js' type='text/javascript'></script>";
	echo "<script src='bootstrap/js/bootstrap-dropdown.js' type='text/javascript'></script>";
	echo "<script src='bootstrap/js/bootstrap-typeahead.js' type='text/javascript'></script>";
	echo "<script type='text/javascript'>$('.typeahead').typeahead();</script>";
	echo "<div class='alert alert-info'><h1>Welcome to CHATALOT!</h1></div>";
	echo "<form action='' method='post'>";
	echo "<center><div class='centerd'>";
	echo "<ul class='thumbnails' style='margin-left:10%;'>
  <li class='span3'>
    <div class='thumbnail'>
      <div class='well'><h1>Create A Room!</h1></div>
      <h5>Create a room for you and your friends!</h5>
      <p><a class='btn' href='room.php'>Create Room</a></p>
    </div>
  </li>
  <li class='span3'>
    <div class='thumbnail'>
      <div class='well'><h1>Join A Room!</h1></div>
      <h5>Join into rooms that you friends have created!</h5>
      <p><a class='btn' href='joinroom.php'>Join Room</a></p>
    </div>
  </li>
  <li class='span3'>
    <div class='thumbnail'>
      <div class='well'><h1>Manage your rooms</h1></div>
      <h5>Control & Manage your rooms</h5>
      <p><a class='btn' href='manage.php'>Manage Rooms	</a></p>
    </div>
  </li>
  <li class='span3'>
    <div class='thumbnail'>
      <div class='well'><h1>About Chatalot!</h1></div>
      <h5>License : GNU AGPLv3</h5>
      <p>Copyright : Ganesh Katrapati - neshmailsu@gmail.com 2012</p>
     </div>
  </li>
  <li class='span3'>
    <div class='thumbnail'>
      <div class='well'><h1>Signup</h1></div>
      <h5>Signup to chatalot!</h5>
      <p><a class='btn' href='signup.php'>Sign up!</a></p>
    </div>
  </li>
  <li class='span3'>
    <div class='thumbnail'>
      <div class='well'><h1>Signin</h1></div>
      <h5>Signin to chatalot!</h5>
      <p><a class='btn' href='signin.php'>Signin!</a></p>
    </div>
  </li>
</ul>";
	echo "</div></center>";
	echo "</form>";
?>
