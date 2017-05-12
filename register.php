<?php

$con=mysqli_connect("localhost","test","") or die("could not connet to masql");

//$now=mysqli_select_db($con,'photo') or die("no database");

if(!mysqli_select_db($con,'test')){
	echo"failed to selete the database";
}

//validation here

$name=$lastname=$email=$password="";

function test_input($data){
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}

if($_SERVER["REQUEST_METHOD"]=="POST"){

	$username=test_input($_POST["username"]);
	$phoneNumber=test_input($_POST["phonenumber"]);
	$email=test_input($_POST["email"]);
	$password=test_input($_POST["password"]);

}


	$sql = "SELECT * FROM users WHERE Email='$email'";
	$result=mysqli_query($con,$sql);

	if(mysqli_num_rows($result)>0){
		echo" username already taken";
		header("refresh:8; url=index.html");
	}
	else{
		$db="INSERT INTO users (username, phone_number, email,Password) VALUES ('$username', '$phoneNumber', '$email','$password')";

		if(!mysqli_query($con,$db)){
			echo"failed to add user";
		}else{
			echo" user added";
			//location(url="blog.html");
			header("refresh:8; url=blog.html");
		}
			header("refresh:8; url=index.html");
	}
	

?>