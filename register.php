<?php

if(isset($_POST['submit'])) 
{

	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con,'chatbox');
	
	$uname = $_POST['username'];
	$pword = $_POST['password'];
        $email = $_POST['email'];
	
		$checkexist = mysqli_query($con,"SELECT username FROM users WHERE username = '$uname'");
		if(mysqli_num_rows($checkexist)){
			echo "Username already exists, Please select other username.<br>";
		}
		else {
			mysqli_query($con,"INSERT INTO users (username,password,email) VALUES('$uname','$pword','$email')" );
			
			echo "You are now registered.";
                        echo "<br>";
                        echo "<a href='index.php'><Button type=button>Chat Box</button></a>" ;

		}
		
	}


?>

