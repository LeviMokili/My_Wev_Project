<?php  include("config/db.php")?>
<?php include("Server_Side.php");?>

<?php  $user_id = $_SESSION['id'];
       $username = $_SESSION['username'];
       
?>

<?php 
	if (isset($_GET['Edit'])) {
        $user_id = $_SESSION['id'];
		$post_id  = $_GET['Edit'];
		$record = mysqli_query($db, "SELECT * FROM userpost WHERE post_id ='$post_id' AND user_id = '$user_id'");

		if (count(array($record)) == 1 ) {
			$n = mysqli_fetch_array($record);
			$content = $n['content'];
		}
	}

?>


<?php  if(!$_SESSION['username']) :?>

<?php header("location:Login.php") ?>

<?php else :?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cards Gallery</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
</head>
<body>

<!--<style>
 body {
    background: #000D;
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: #BA68C8;
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.image-upload>input {
  display: none;
}
</style> -->
<!-- getting the default avatr to deplay on the page if the user has not yet chosen one -- >
<?php 
       $url = $_SERVER['PHP_SELF'];
       $seg = explode('/', $url);
       $path = "http://localhost" .$seg[0].'/'.$seg[1];
       $full_path  = $path. '/'.'Blogimages'.'/'. 'User_Default_profile_pricture'.'/'.'Default_avatar.png';
       
       

?>


    


<?php   
  
  $sql = "SELECT * FROM userprofile WHERE  user_id = '$user_id' ";
  $result = mysqli_query($db,$sql);

              if (mysqli_num_rows($result) > 0) { 
                    while ($profile = mysqli_fetch_assoc($result)) {
                        $user_id = $profile['user_id'];
                        $username = $profile['username'];
                        $avatar = $profile['avatar'];
                        $profession = $profile['profession'];
                        $birthday = $profile['birthday'];
                        $phone_number = $profile['phone_number'];
                        $province = $profile['province'];
                        $Etat_Civil = $profile['Etat_Civil'];
                        $Bio = $profile['Bio'];
                        $vill_actuel = $profile['ville_actuel'];

                    }
}

?>

<!-- Desplaying all post of  single user -->
<?php  
 $user_id = $_SESSION['id'];
$sql2 ="SELECT * FROM userpost WHERE user_id = '$user_id' ";
$result2 = mysqli_query($db, $sql2);
$count_likes = mysqli_num_rows($result2);



?>









<?php 
$sql3 ="SELECT * FROM users WHERE  user_id = '$user_id'   ";
$result3 = mysqli_query($db, $sql3);

if (mysqli_num_rows($result3)) {
    while ($user = mysqli_fetch_array($result3)) {
         $created_at = $user['created_at'];
    }
}

?>


















<?php  if(isset($avatar)) :?>

<div class="container">
     <div class="card mt-5 border-5 pt-2 active pb-0 px-3 ">
         <div class="card-body  ">
			
		
			
             <div class="row ">
                 <div class="col-12 ">
                 <img src=<?php  echo $avatar ?> alt="DP" class=" rounded-circle img-fluid " width="70" height="70">
                 <h4 class="card-title "><b><?php  echo $username ?></b></h4>
                
                 </div>
                 <div class="col-lg-4 ">
                     <h6 class="card-subtitle mb-2 text-muted">
                         <p class="card-text text-muted small "> <img src="https://img.icons8.com/metro/26/000000/star.png" class="mr-1 " width="19" height="19" id="star"> <span class="vl mr-2 ml-0"></span> 
                          le compte a ete creer le <?php echo $created_at ?></p>
                          


                         
                         
                            <a href="Edit_user_profile.php?Edit_Profile=<?=  $user_id ?>">
                            
                                        <small>
                                            <button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Modifier votre profile</button>
                                        </small>
                            </a>
                      </h6>
                 </div>

                 <div class="col-lg-8">
                 <i class="fa fa-briefcase"> <b><?php echo $profession ?></b></i><br><br>
                          <li style="color:black" >Etat_Civil => <?php  echo $Etat_Civil ?></li>
                          <li style="color:black">Ville actuel => <?php  echo $vill_actuel ?></li>
                          <li style="color:black">Province d'origine => <?php  echo $province ?></li>
                          <li style="color:black">Telephone => <?php  echo $phone_number ?></li>
                 </div>
                 
             </div>
         </div>
         <div class="card-footer bg-white px-0 bg-dark">
             <div class="row ">
                 <div class=" col-md-auto  "> <a href="#" class="btn btn-outlined btn-black text-muted bg-transparent" data-wow-delay="0.7s"></a>  <a href="Home.php" class=" btn-outlined btn-black text-muted"><img src="https://img.icons8.com/metro/26/000000/link.png" width="17" height="17" id="plus"> <small>Rentrer a la page d'accuile</small> </a>  </div>
                 
                   
                 <div class="col-md-auto ">
                     <ul class="list-inline">
                        
                            <li class="list-inline-item">  </li>
                       

                          
                         
                        
                     </ul>
                 </div>
             </div>
         </div>
     </div>
     
 </div>
 

<form action="" method="post">


<section class="gallery-block cards-gallery bg-dark" style="margin-top:10px">
  
	    <div class="container">
		   <h5 style="color:#eef">Tout tes publications</h5>
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
	        
	        <div class="row">
             
            <!-- fetching all user post from the userpost table where user_id = $user_id -->
			<?php  while ($a = mysqli_fetch_assoc($result2)) { ?>
                
              
                 <!--count comment for each post where post_id = post_id -->
                <?php   
                   $user_id = $a['user_id'];
                   $post_id = $a['post_id'];

                   $sql = "SELECT * FROM usercomments WHERE  post_id = '$post_id'";
                   $query = mysqli_query($db, $sql);
                   $count_comments = mysqli_num_rows($query);

                
                
                ?>

                <?php   
                
                $post_id = $a['post_id'];

                $sql = "SELECT * FROM userlikes WHERE  post_id = '$post_id'";
                $query = mysqli_query($db, $sql);
                $count_likes = mysqli_num_rows($query);
                
                
               
                
                
                ?>
                
	            <div class="col-md-5 col-lg-4">
                
                    <input type="hidden" name="post_id" value=<?php  echo $a['post_id'] ?>>
                    
	                <div class="card border-0 transform-on-hover">
                        
                        <a class="lightbox" >
                        <?php 
                          $image_post = $a['image_post'];
                          $video_post = $a['video_post'];
                        
                        ?>

                     <?php
                      
                      if ($image_post == 'No image') { ?>
                          <video controls width="100%">

                            <source src="<?php  echo $video_post ?>" type=""></source>
                         </video>

                      <?php }elseif ($video_post == 'No Video') { ?>
                        
                        <img src="<?php echo $image_post  ?>" alt="" srcset="" width="100%">
                        

                        
                     <?php } ?>
	                		
	                		
	                	</a>
	                    <div class="card-body">
                        
                        <!-- The avatar of account owner-->
                        <img src=<?php  echo $avatar ?> alt="DP" class=" rounded-circle img-fluid " width="40" height="40"><br><br>
                        <p><b> Poster le</b> <?php echo $a['Time_posted'] ?></p>

                        <!-- desplaying like for each post where user_id = user_id -->
                    <?php 

                        $post_id = $a['post_id'];
                        $K = "SELECT * FROM  userlikes  INNER JOIN userprofile ON  userlikes.user_id = userprofile.user_id WHERE  post_id = '$post_id'";
                        $Query = mysqli_query($db, $K);
                        $count_likes = mysqli_num_rows($Query);


                    ?>
                        <!-- The dropdwon button that will show all persons who liked the post-->
                        <div class="btn-group dropup" >
                         <form action="profile_gallery.php" method="post">

                         <button type="submit" name="like" style="background:none;border:none;" >
                                    <span class="ml-2"><span class="fa fa-heart"></span> </span><?php  echo $count_likes ?>
                                </button>
                         </form>
                      
                       
                        </div>


                              
 <!-- desplaying like for each post where user_id = user_id -->
 <?php 

$post_id = $a['post_id'];
$K2 = "SELECT * FROM  usercomments  INNER JOIN userprofile ON  usercomments.user_id = userprofile.user_id WHERE  post_id = '$post_id'";
$Query2 = mysqli_query($db, $K2);

$count_comments = mysqli_num_rows($Query2);

?>

    <!-- The dropdwon button that will show all persons who liked the post-->
    
    <div class="btn-group dropup" >
                          
                         <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background:none;border:none;color:black">
                         <span class="fa fa-comments" style="background:none;border:none;color:black"> <?php   echo $count_comments ?>
                         </button>
                         <div class="dropdown-menu" style="width:300px;margin-left:-160px" >
                         <h6 ><?php  echo $count_comments  ?>commentaires  
                                 <small style="padding-left:20px"> <i class="fa fa-pencil" style="padding-left:4px"></i><a href="comment.php?user_id=<?php echo $user_id  ?> && post_id=<?php echo $a['post_id'] ?>" style="color:red"> Commenter</small> </a></h6>
                                  
                                  <?php while ($R = mysqli_fetch_array($Query2)) { ?>
                                    
                                    <div class="container">
                                      
                                    <div class="image" style="padding-bottom:5px">
                                        <img src=<?php echo  $R['avatar']  ?> alt="DP" class=" rounded-circle img-fluid " width="40" height="40">
                                         <small><b> <a href="Single_User_Profile.php?U_ID=<?php  echo $R['user_id'] ?>"><?php echo $R['username']  ?></a></b> : </small>
                                        <small> <?php  echo $R['comment'] ?></small>
                                        <hr>
                                        
                                        
                                    </div> 
                                    </div>
                                    
                                    
                                     
                                     
                                     
                         <?php  } ?>
                                  
                                
                         </div>
                         </div>
                         <div class="dropdown">
  <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     nombre des aimes
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <?php  while ($row = mysqli_fetch_array($Query)) { ?>
        <div class="image" style="padding-bottom:5px">
                                        <img src=<?php echo  $row['avatar']  ?> alt="DP" class=" rounded-circle img-fluid " width="40" height="40">
                                         <small><b><?php echo  $row['username'] ?></b> : </small>
                                       
                                        <hr>
                                        
                                        
                                    </div> 
    <?php } ?>
  </div>
</div>
                        <span class="ml-2">
                            <a href="">
                             
                            </a>

                          
                        
                       
                        
                         
                            
                      </span><br>
                            <p class="text-muted card-text"><?php  echo $a['content']?></p>
                             
                           <!-- Button for Edit post took from the modal-->
                                    
                               
                                    <a href="Edit_user_posts.php?Edit=<?php  echo $a['post_id'] ?>">
                                        <i class="fa fa-pencil"> </i>
                                    </a>
                            <a href="profile_gallery.php" onclick="return confirm('voulez vous suprimer ce post?')">
                                <button  type="submit" class="form-control" name="Delete" >
                                <i class="fa fa-trash" aria-hidden="true" ></i>
                                </button>
                            </a>

                            
                          
                        </div>
                        
                  </div>
                    
	            </div>
                


                  






	           
	            
		<?php  } ?>  
	    </div>
</form>

    



       
    
 
  </section>

</form>
 
  <?php else :?>
    <form action="profile_gallery.php" method="post" enctype="multipart/form-data">
    
    <div class="container rounded bg-white mt-5">
    <div class="row">
        <div class="col-md-4 border-right">
        
        <!-- this code allows us to view the profile picture before to upload into the database-->
        <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Update image</h4>
        </div>
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="<?php echo $full_path ?>" width="90" onClick="triggerClick()" id="profileDisplay" name="avatar">
            <span class="font-weight-bold">
            
              
            </span>
            <input type="file" name="avatar" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
            <span><label><i class="fa fa-camera"></i></label></span>
            <?php echo $username  ?></span><span class="text-black-50"><?php echo $email  ?></span><span>United States</span></div>
            
        </div>
        <div class="col-md-8">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                        <a href="Home.php"><h6>Back to home</h6></a>
                    </div>
                    <h6 class="text-right">Ajouter les information sur votre profile</h6>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><input type="text" class="form-control" placeholder="profession" name="profession" ></div>
                    <div class="col-md-6"><input type="tel" class="form-control"  placeholder="votre numero de telephone" name="phone_number"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><input type="text" class="form-control" placeholder="province d'origine" name="province"></div>
                    <div class="col-md-6"><input type="text" class="form-control" placeholder="Ville actuel" name="ville_actuel"></div>
                    <div class="col-md-6"><input class="form-control" id="date" name="birthday" placeholder="date de naissance" type="text" name="birthday"/></div><br>
                    
                    
                </div>
                
                <div class="row mt-3">
                <div class="col-md-6"><input type="text" class="form-control"  placeholder="Etat civil" name="Etat_Civil"></div>
                    <div class="col-md-6"><Textarea type="text" class="form-control" placeholder="Ecrire ce que vous aimez faire quand votre" name="Bio"></Textarea></div>
                    
                   
                </div>
                <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit" name="Save">Sauvergarder vos informations</button></div>
            </div>
        </div>
    </div>
</div>
    
    </form>
    
  <?php endif ?>




  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    

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


    
</body>
</html>

<script>
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
<?php endif ?>