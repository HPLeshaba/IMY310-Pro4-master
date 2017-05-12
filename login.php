<?php

$con=mysqli_connect("localhost","test","")or die("could not connet to masql");

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

	
	$email=test_input($_POST["email"]);
	$password=test_input($_POST["password"]);


}

	$sql = "SELECT * FROM users WHERE Email='$email' and Password='$password'";
	$result=mysqli_query($con,$sql);

	if(mysqli_num_rows($result)>0){

			setcookie('email',$email,time()+60*60*7);
			session_start();
			$_SESSION['email']=$email;
		
		header("refresh:0.5; url=blog.html");
	}
	else{
		echo"user not found";
		header("refresh:9; url=index.html");
	}

?>