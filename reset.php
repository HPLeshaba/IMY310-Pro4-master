<?php

$con=mysqli_connect("localhost","test","")or die("could not connet to masql");

if(!mysqli_select_db($con,'test')){
	echo"failed to selete the database";
}

//validation here

$cpass=$email=$password="";

function test_input($data){
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}

if($_SERVER["REQUEST_METHOD"]=="POST"){

	
	$email=test_input($_POST["email"]);
	$password=test_input($_POST["password"]);
	$cpass=test_input($_POST["cpass"]);


}
	if($password!=$cpass){
		echo"password dont match";
		header("refresh:9; url=index.html");

	}
	else{
		$sql = "SELECT * FROM users WHERE Email='$email'";
		$result=mysqli_query($con,$sql);

		if(mysqli_num_rows($result)>0){

			$sql="UPDATE users SET password = '$password' WHERE Email= '$email'";
			$result=mysqli_query($con,$sql);

			header("refresh:0.5; url=blog.html");
		}
		else{
			echo"user not found";
			header("refresh:9; url=index.html");
		}


	}

?>