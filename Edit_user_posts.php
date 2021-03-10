<?php  include("config/db.php")?>
<?php include("Server_Side.php");?>

<?php  $user_id = $_SESSION['id'];
       $username = $_SESSION['username'];
       
       
      
 ?>
 





<?php  if(!$_SESSION['username']) :?>

<?php header("location:Login.php") ?>

<?php else :?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="cards-gallery.css">
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <title>Document</title>
</head>
<body>

<!-- <style>
       body{
           background:#000D;
       }
    </style> -->

<?php 
	if (isset($_GET['Edit'])) {
        $user_id = $_SESSION['id'];
		$post_id  = $_GET['Edit'];
		$record = mysqli_query($db, "SELECT * FROM userpost WHERE post_id ='$post_id' AND user_id = '$user_id'");

		if (count(array($record)) == 1 ) {
			$n = mysqli_fetch_array($record);
            $content = $n['content'];
            $image_post = $n['image_post'];
		}
	}

?>




<div class="container rounded bg-white mt-5" style="background:#000D;
       ">
  <h5 style="padding-left:100px">Edit votre post</h5>
  <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> <i class="fa fa-trash" aria-hidden="true" ></i>!</strong> 
                <?php 

                      
                        echo $_SESSION['message']; 
                        unset($_SESSION['message']);
                    ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
          </div>
                
                    
               
         <?php endif ?>
 <form action="Edit_user_posts.php" method="post" enctype="multipart/form-data" accept="image/gif, image/jpeg, image/jpg, image/png, video/mp4" style="margin-top:-30px">
            <div class="row">
                <div class="col-md-4 border-right">
                <?php 
                          $image_post = $n['image_post'];
                          $video_post = $n['video_post'];
                        
                        ?>

                     <?php
                      
                      if ($image_post == 'No image') { ?>
                          <video controls width="100%">

                            <source src="<?php  echo  $video_post ?>" type=""></source>
                         </video>

                      <?php }elseif ($video_post == 'No Video') { ?>
                        
                        <img  src=<?php  echo  $image_post ?> width="350" onClick="triggerClick()" id="profileDisplay">
                        

                        
                     <?php } ?>
	                		
              
                </div>
                <div class="col-md-8">
                
            
                    <?php  include("errors.php") ?>
                            <input type="hidden" name="post_id" value=<?php  echo $post_id ?>>
                            <div class="form-group">
                                
                                <textarea  class="form-control" name="content"   required   placeholder=" Write something to post " width="300px">
                                <?=  $content  ?>
                                </textarea>
                            </div>

                            <div class="image-upload">
                                <label for="file-input">
                                    <input type="hidden" name="oldimage" value=<?php echo  $image_post ?>>
                                <i class="fa fa-camera" style="margin-top:-90px"></i> choisissez le photo à remplacer <br>
                                </label><input id="file-input" type="file" name="image_post" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none; id="profileImage" />
                            </div>
                            <div class="form-group"  Style="text-size:3px">
                            <button type="submit" name="Update_Post" class="btn btn-primary" Style="border-radius:50px; text-size:3px"><i class="fa fa-pencil"></i> Modifier le post </button>
                            <a href="profile_gallery.php">
                                    <button type="button"  class="btn btn-default" Style="border-radius:50px; text-size:3px"> Retour </button>
                                </a>
                            </div>
                            
                        
                        
                </div>
            </div>
            
        </div>
</form>




    
</body>
</html>

<script>
        function triggerClick(e) {
        document.querySelector('#profileImage').click();
        }
        function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
        }
    </script>

<?php endif ?>