<?php
session_start();

$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con,'chatbox');


$uname = $_POST['username'];
$passw = $_POST['password'];

$result = mysqli_query($con,"SELECT * FROM users WHERE username='$uname' AND password='$passw'");

if(mysqli_num_rows($result)){
	$res = mysqli_fetch_array($result);
	
	$_SESSION['username'] = $res['username'];
        echo"Enter The Chat Bot";
        echo"<br>";
	echo "<a href='index.php'><Button type=button>ChatBot</button></a>";
        echo"<br>";
}

else{
        echo "No user found";
        echo "<br>";
        echo "<a href='reg2.html'><Button type=button>Register</button></a>";
}

?>
