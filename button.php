
<!DOCTYPE HTML>
<html>
<head>
<title>Come Up</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.css" type='text/css' />
<!-- //lined-icons -->
 <!-- Meters graphs -->
<script src="js/jquery-2.1.4.js"></script>


</head> 
<body>



<!-- line modal -->
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">My Modal</h3>
		</div>
		<div class="modal-body">
			
            <!-- content goes here -->
			<form action="button.php" method="post">
              <div class="form-group">
                 
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" name="audio" id="exampleInputFile">
              </div>
              <div>
	               <textarea name="text" cols="40" rows="4" placeholder="Say  something about this image"></textarea>
	           </div>
             <div>
                     <input type="name" name="nameOfSong" placeholder="name of image">
                </div>
                 <div>
                     <input type="name" name="cat" placeholder="category">
                </div>
              <button type="submit" name="submit" class="btn btn-default">Submit</button>
            </form>

		</div>
		<div class="modal-footer">
			<div class="btn-group btn-group-justified" role="group" aria-label="group button">
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
				</div>
				<div class="btn-group btn-delete hidden" role="group">
					<button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" id="saveImage" class="btn btn-default btn-hover-green" data-action="save" role="button">Save</button>
				</div>
			</div>
		
<style>
	
	.center {
    margin-top:50px;   
}

.modal-header {
	padding-bottom: 5px;
}

.modal-footer {
    	padding: 0;
	}
    
.modal-footer .btn-group button {
	height:40px;
	border-top-left-radius : 0;
	border-top-right-radius : 0;
	border: none;
	border-right: 1px solid #ddd;
}
	
.modal-footer .btn-group:last-child > button {
	border-right: 0;
}
</style>
</body>

<?php

			    

			    if(isset($_POST['submit'])){

			    	echo"in upload file";
			      
			      //the path to store the uploeaded image
			    	if(isset($_FILES['audio'])){


			        $target = "upload/".basename($_FILES["audio"]["name"]);
			        

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
	                  	 header("refresh:8; url=button.php");

				            
				       	 }
				        else{
				        	echo"failed to uploaded";
				             header("refresh:8; url=button.php");
	                     
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


</html>