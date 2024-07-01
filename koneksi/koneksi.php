<?php
$con = mysqli_connect("localhost","root","","spdempstershaferv1");

try {
	if(mysqli_connect_errno($con)){
		echo "Failed to connect to MySQL : ".mysqli_connect_error();
	}
	else{
		echo "";
	}
} catch (Throwable $th) {
	if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL : ".mysqli_connect_error();
	}
	else{
		echo "";
	}
}

?>