<?php

$uname = $_REQUEST['uname'];
$msg = $_REQUEST['msg'];

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'chatbox');

mysqli_query($con,"INSERT INTO logs (`username`, `msg`) VALUES ('$uname', '$msg')");

$result1 = mysqli_query($con,"SELECT * FROM logs ORDER BY id DESC");

while($extract = mysqli_fetch_array($result1)) {
	echo "<span>" . $extract['username'] . "</span>: <span>" . $extract['msg'] . "</span><br />";
}