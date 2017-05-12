<?php

			    

			    if(isset($_POST['submit'])){

			    	
			      
			      //the path to store the uploeaded image
			    	if(isset($_FILES['audio'])){


			        $target = "upload/".basename($_FILES["audio"]["name"]);
			        echo"in upload file";

			        if($_FILES['audio']['type']=='audio/mpeg' || $_FILES['audio']['type']=='audio/mpeg3' || $_FILES['audio']['type']=='audio/x-mpeg3' || $_FILES['audio']['type']=='audio/mp3' || $_FILES['audio']['type']=='audio/x-wav' || $_FILES['audio']['type']=='audio/wav')
					{ 

						
			        //connet to datasase
				        $db= mysqli_connect("localhost","test","");

				        //getting all element submisted through the form
				        $song=$_FILES['audio']['name'];
				        $text=$_POST['text'];
	                    $name_song=$_POST['nameOfSong'];
	                    $cat=$_POST["cat"];
				        


				        $sql="INSERT INTO register (name_song,category,song,text,song_path) VALUES ('$name_song','$cat','$song','$text','$target')";
				       if( mysqli_query($db,$sql)){
				       	echo"added in the table";

				       	if(move_uploaded_file($_FILES['audio']['tmp_name'], $target)){
	                       /*header("refresh:1; url=profile.php");*/
	                  	 echo"song uploaded";
	                  	 header("refresh:8; url=button.html");

				            
				       	 }
				        else{
				        	echo"failed to uploaded";
				             header("refresh:8; url=button.html");
	                     
				        }
				       }else{
				       	echo"failed to connect";
				       }

				        //now storing images into the folder upload
			        }
			    }else{
			    	echo"not set";
			    }
			}
                /*if(isset($_POST['delete'])){
                    $data=$_POST['nameD'];
                     $dell= new mysqli("wheatley.cs.up.ac.za","u15043844","ufeesaun");
                     $sql="DELETE FROM image where name_ofImage='$data'";
                    if($dell->query($sql)==TRUE){

                    }
                    $dell->close();
                }
                if(isset($_POST['share'])){

                    $data =$_POST['nameS'];
                     $dell= new mysqli("wheatley.cs.up.ac.za","u15043844","ufeesaun");
                     $sql="SELECT FROM image  where name_ofImage='$data' SET img_path='YES' ";
                if($dell->query($sql)==TRUE){

                    }
                    $dell->close();
                   
                }*/
			  
			?>
