<?php include("config/db.php")?>
<?php include("Server_Side.php");?>

<?php  $user_id = $_SESSION['id'];
       $username = $_SESSION['username'];
?>


<?php  if(!$_SESSION['username']) :?>

   <?php header("location:Login.php") ?>

<?php else :?>


<!doctype html>
<html lang="en">
  <head>
    <title>Colorlib Wordify &mdash; Minimal Blog Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.6.3/jquery.timeago.js"></script>

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/Homestyle.css">
  </head>

  <script src="emojiPicker.js"></script>
    <script>
        (() => {
        new EmojiPicker()
        })()
    </script>
  <style>
    .image-upload>input {
  display: none;
}
.video-upload>input{
   display : none;
}
  </style>
  <body>

    <?php 
       $url = $_SERVER['PHP_SELF'];
       $seg = explode('/', $url);
       $path = "http://localhost" .$seg[0].'/'.$seg[1];
       $full_path  = $path. '/'.'Blogimages'.'/'. 'User_Default_profile_pricture'.'/'.'Default_avatar.png';
       
       

    ?>


    



    <div class="wrap" >

      <header role="banner">
        <div class="top-bar " style="background:#000D">
          <div class="container">
            <div class="row">
              <div class="col-9 social  ">
                <h3 style="color:white;font-family:cursive">CongoBlog</h3>
                
              </div>
              

              <!-- Code allaoeing to search people on the -->
              
              

               
              <div class="col-3 search-top">
                 
                <form action="Search.php" class="search-top-form" method="POST">
                  <span class="icon fa fa-search"></span>
                  <input type="text" id="s" placeholder="Recherche..." name="Search">
                 
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="container logo-wrap">
          <div class="row pt-5">
            <div class="col-12 text-center">
              <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a><br><br>
              <h1 class="site-logo"><a href="index.html" style="color:#1B4F72"></a></h1>
            </div>
          </div>
        </div>
        
        <nav class="navbar navbar-expand-md  navbar-dark bg-dark" style="margin-top:-20px">
          <div class="container">
            
           
            <div class="collapse navbar-collapse " id="navbarMenu">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="index.html" style="color:black;font-size:17px">Accueil</a>
                </li>
                
               
                <li class="nav-item">
                  <a class="nav-link" href="SchoolsPage.php" style="color:black;font-size:17px">ECOLES</a>
                </li>
               
                <li class="nav-item">
                  <a class="nav-link" href="logout.php" style="color:black;font-size:17px">Se Deconnecter</a>
                </li>
              </ul>
              
              
            </div>
           
          </div>
          
        </nav>
      </header><br>
      <!-- END header -->


      

      
      

  
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      <i class="fa fa-pencil"></i> Click ici pour Publier
   </button>
 

  
   
</div>


<?php include('errors.php'); ?>


<!-- Modal For Publication-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          
        <h5 class="modal-title" id="exampleModalLabel">
       
        
        Ecrivez et Choisisez une photo ou  avant de publier</h5>
        <img src="images/imoji.jpg" alt="" srcset="" width="50px">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class="modal-body">
      <img  src="<?php echo $full_path ?>" width="100%" height="100px" onClick="triggerClick()" id="profileDisplay">
          <form action="Home.php" method="post" enctype="multipart/form-data" accept="image/gif, image/jpeg, image/jpg, image/png">
               
               
                      <div class="form-group">
                        <textarea  class="form-control" name="content"   placeholder=" Write something to post "  id="content" data-emoji-picker="true" ></textarea>
                      </div>

                      <div class="image-upload">
                        <label for="file-input">
                          <i class="fa fa-image" style="margin-top:-90px"></i> Photo <br>
                          </label><input id="file-input" type="file" name="image_post" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none; id="profileImage" />
                      </div>
                      <div class="form-group"  Style="text-size:3px">
                        <button type="submit" name="Add_Post" class="btn btn-default" Style="border-radius:50px; text-size:3px" id="Add_Post"> Publier </button>
                      </div>
                </form>
                

                
            
      </div>
      
    </div>
  </div>
</div>
      
<section class="site-section pt-5 pb-5" >
        <div class="container" >
          <div class="row" height="10%">
            <div class="col-md-12">

              <div class="owl-carousel owl-theme home-slider">
                <div>
                  <a href="#" class="a-block d-flex align-items-center height-lg" style="background-image: url('Blogimages/img_1.jpg'); ">
                    <div class="text half-to-full">
                      <span class="category mb-5">Videos</span>
                     
                      <h3>How to Find the Video Games of Your Youth</h3>
                      <p>partager vos videos sur les site que ca soit video ou photos></video></p>
                    </div>
                  </a>
                </div>
                <div>
                  <a href="#" class="a-block d-flex align-items-center height-lg" style="background-image: url('Blogimages/img_2.jpg'); ">
                    <div class="text half-to-full">
                      <span class="category mb-5">Travel</span>
                      
                      <h3>How to Find the Video Games of Your Youth</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta eaque ipsa laudantium!</p>
                    </div>
                  </a>
                </div>
                <div>
                  <a href="#" class="a-block d-flex align-items-center height-lg" style="background-image: url('Blogimages/img_3.jpg'); ">
                    <div class="text half-to-full">
                      <span class="category mb-5">Sports</span>
                     
                      <h3>How to Find the Video Games of Your Youth</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta eaque ipsa laudantium!</p>
                    </div>
                  </a>
                </div>
              </div>
              
            </div>
          </div>
          
        </div>

        <!--script for liking without refressing the page -->
        <script type="text/javascript">

function submit_like()
{
 var like=document.getElementById( "like" );
 

 $.ajax({
  type: 'post',
  url: 'Server_Side.php',
  data: {
   user_like:like,
   
  },
  
 });
	
 return false;
}

</script>
      


      </section>
      
      <!-- END section -->
      <?php     $sql = "SELECT * FROM userpost INNER JOIN userprofile ON userpost.user_id = userprofile.user_id ORDER BY post_id DESC";
                $result = mysqli_query($db,$sql);

      ?>
 
      

     


      <section class="site-section py-sm " style="background:#00000" >
        <div class="container" style="background:#00000">
          
          <div class="row blog-entries" style="background:#00000;">
            <div class="col-md-12 col-lg-8 main-content border-primary">
              <div class="row" >

                
                 <!--  Here we desplay all users posts from the table userpost and userprofile -->
                <?php while ($row = mysqli_fetch_assoc($result)) {?>

                    <?php 
                       $image_post = $row['image_post'];
                       $video_post = $row['video_post'];
                       $content = $row['content'];
                    
                    ?>

                   

                    

                    
      
                    
                        <div class="col-md-11 border-primary mb-3" style="margin-top:10px;"  >
                   
                      <a href="" class="blog-entry element-animate  border-primary mb" data-animate-effect="fadeIn" >

                      <?php
                      
                      if ( $image_post == 'No image') { ?>
                          <video controls width="100%">

                            <source src="<?php  echo $video_post ?>" type=""></source>
                         </video>

                      <?php }elseif ( $video_post == 'No Video') { ?>
                        
                        <img src="<?php echo $image_post  ?>" alt="" srcset="">
                        

                        
                     <?php } ?>
                      
                    <div class="blog-content-body" >
                          <div class="post-meta">
                          
                            <form action="Home.php" method="post" onclick="return submit_like()">
                               <input type="hidden" name="user_id" value=<?php  echo $user_id ?>>
                               <input type="hidden" name="post_id" value=<?php  echo $row['post_id'] ?>>

                               <!-- in case that user does not a profile avatar but posted on the site the system must post with the default avatar-->
                               
                              
                                <a href="Single_User_Profile.php?U_ID=<?php  echo $row['user_id'] ?>"><span class="author mr-2" style="color:white">
                                 
                                <img src=<?php echo $row['avatar']  ?> alt="Colorlib"> <?php echo $row['posted_by']?></span>&bullet;</a>
                              
                                
                              
                                
                 <!--  Query for count users likes -->
                  <?php    
                     $post_id = $row['post_id'];
                     $sql = "SELECT * FROM userlikes WHERE post_id = '$post_id'";
                     $query = mysqli_query($db, $sql);
                     $count_likes = mysqli_num_rows($query);

      
                  ?>


                  
                    <!--  Query for count users comments -->
                 <?php    
                     
                     $post_id = $row['post_id'];
                     $sql = "SELECT * FROM usercomments WHERE post_id = '$post_id'";
                     $query = mysqli_query($db, $sql);
                     $count_comments = mysqli_num_rows($query);

      
                  ?>
                              
                               
                              
                                <?php  if($count_likes):?>
                                  <button type="submit" name="like" style="background:none;border:none;color:orange" id="like">
                                   <span class="ml-2"><span class="fa fa-heart"> <?php   echo $count_likes ?></span> </span>
                                </button>
                                <?php else :?>
                                  <button type="submit" name="like" style="background:none;border:none;color:#D1D0CE" onclick="return likeCheck()" id="like">
                                   <span class="ml-2"><span class="fa fa-heart"></span> Aimer </span>
                                   
                                </button>
                                <?php endif ?>


                                <?php  if($count_comments):?>
                                
                                  <span class="fa fa-comments" style="background:none;border:none;color:#D1D0CE"> <?php   echo $count_comments ?>
                                <?php else :?>
                                  <span class="fa fa-comments" style="background:none;border:none;color:#D1D0CE">
                                <?php endif ?>
                                
                                
                              
                                 
                               </span><br><br>
                                 <?php if (!empty($content)) {?>
                                  <h2 style="color:#eef;font-size:17px;margin-top:-20px"><?php  echo $row['content']  ?></h2>
                                 <?php } ?>
                               
                               
                               
                               <button type="button"  style="background:none;border:none;style:blue;margin-top:-400px"  >
                                   <!-- Getting id from each users -->
                                   <p ><a href="comment.php?post_id=<?php  echo $post_id ?>" >Commenter</a>
                                   </p> 
                              </button>
                               
                              </form>
                              
                              <!-- Button trigger modal --><button type="button" class="btn btn-primary" style="margin-top:-20px"></button>
 

                  </div>
                  
                          <small ><b><span class="mr-2" >Publier le <?php echo $row['Time_posted'] ?> </span> &bullet;</b></small>
                          
                          
                        </div>
                       
                      </a>
                      <hr height="40px">
                    </div>
                    

                    


                  
             <?php } ?>

                

                <!--  End Part for user posts -->
               
                  
              </div>
              
            </div>
            
         
            

            <!-- END main-content -->


            <?php   

              $id = $_SESSION['id'];
              $username = $_SESSION['username'];
              $query = "SELECT * FROM userprofile WHERE username = '$username'";

              $result = mysqli_query($db,$query);

              if (mysqli_num_rows($result) > 0) {
                while ($profile = mysqli_fetch_assoc($result)) {
                    $id = $profile['id'];
                   
                    $username = $profile['username'];
                    $avatar = $profile['avatar'];
                    $profession = $profile['profession'];

                }
}


?>




       <br>
       <?php  if($_SESSION['username']) :?>
        <div class=" col-lg-4 sidebar ">
            
                  <!-- END sidebar-box -->
          <div class="sidebar-box bg-dark " style="margin-top:50px;">
               <div class="bio text-center "  >

                      <?php if(isset($avatar)):?>
                          <a href="">
                              <img src=<?php echo $avatar ?> width="100px" >
                          </a>
                    <?php else :?>
                        <img src=<?php echo $full_path?> width="100px" ><br><br>
                  <?php endif ?>

               <div class="bio-body">
                    
                    <h4 style="color:black;font-family:cursive"><?php echo $_SESSION['username']  ?></h4><br>
                    
                    <?php endif ?>
                    
                    
                    <p ><a href="profile_gallery.php?user_id=<?php  echo  $user_id?>" class="btn btn-primary btn-sm rounded" style="border-radius:50px;">Profile</a></p>
                    
                    <p class="social">
                  
                   
                     </p>
              </div>
          </div>
        </div>

        
              <!-- END sidebar-box -->  
              <div class="sidebar-box " >
              <?php  
        $sql = "SELECT * FROM universities ";
        $result = mysqli_query($db,$sql);
        $count_school = mysqli_num_rows($result);

        

      ?>
      
                     

                   


                  
                </div>
               
              </div>
               
              
               

               <!-- Login As a administrator -->
              

              
     
              </div>

              
             
             

              
            </div>
            <!-- END sidebar -->

          </div>
        </div>
      </section>
    
      <footer class="site-footer">
        <div class="container">
          <div class="row mb-5">
            
          <div class="row">
            <div class="col-md-12 text-center">
              <p class="small">
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy; <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All Rights Reserved | This template is made with <i class="fa fa-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>
        </div>
      </footer>
      <!-- END footer -->

    </div>
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



    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>
    







  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>

    
    <script src="js/main.js"></script>
  </body>
</html>


<?php endif ?>