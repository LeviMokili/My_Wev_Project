







<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="chat, user, comments, wide" />

		<title>Comment Section With Flexbox</title>

        <link rel="stylesheet" href="styles.css">
        <link href="styleEmoji.css" rel="stylesheet">

         <!--Link that will allow us to use imoji -->
     
  

        <link href="vendor/emoji-picker/lib/css/emoji.css" rel="stylesheet">
        <link href="styleEmoji.css" rel="stylesheet">

        <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
   

    <link href="vendor/emoji-picker/lib/css/emoji.css" rel="stylesheet">
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/emoji-picker/lib/js/config.js"></script>
<script src="vendor/emoji-picker/lib/js/util.js"></script>
<script src="vendor/emoji-picker/lib/js/jquery.emojiarea.js"></script>
<script src="vendor/emoji-picker/lib/js/emoji-picker.js"></script>

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/emoji-picker/lib/js/config.js"></script>
<script src="vendor/emoji-picker/lib/js/util.js"></script>
<script src="vendor/emoji-picker/lib/js/jquery.emojiarea.js"></script>
<script src="vendor/emoji-picker/lib/js/emoji-picker.js"></script>
    

	</head>

	<body>
    <style>
       body{
           background:#000D;
       }
    </style>



<!-- Desplay the profile photo -->

<?php  
        $sql = "SELECT * FROM userprofile WHERE user_id ='$user_id'";
        $result_1 = mysqli_query($db,$sql);
        
?>

<?php 
$post_id = $_GET['post_id'];
$sql = "SELECT * FROM userpost  WHERE  post_id = '$post_id'";
$result_K = mysqli_query($db,$sql);

if (mysqli_num_rows($result_K)) {
     while ($K = mysqli_fetch_array($result_K)) {
         $image_post = $K['image_post'];
     }
}
?>
 
 <!-- Getting the id post a single post from Home Page in hidden input we have created   -->
<?php   $post_id = $_GET['post_id']; ?>


            

                 <small><a href="Home.php" style="margin-top:-4px;color:white"> <i class="fa fa-home" style="font-size:20px"></i> retourner a la page d'accuille</a></small>>
                      <li class="write-new" style="margin-top:-4px">
                 
                  <?php while ($row = mysqli_fetch_assoc($result_1)) { ?>
                    <img src=<?php  echo $row['avatar']  ?> width="35" alt="Profile Avatar" title="Anie Silverston" />
                    <br>
                    <br>
                 <?php } ?>

                
                       
                            <form action="#" method="post">
                            <input type="hidden" name="post_id" value=<?php   echo $post_id ?>>
                                
                                <textarea placeholder="Ecrivez un commentaire ici" name="comment" required  data-emojiable="true"
							data-emoji-input="unicode"></textarea>
                            <div>
                        <button type="submit" name="Add_Comment" class="btn btn-primary"><i class="fa fa-pencil"></i> Commenter</button> <br><br>
                            </div>
                          

                  <?php    
                     
                           
                            $sql = "SELECT * FROM usercomments WHERE post_id = '$post_id'";
                            $query = mysqli_query($db, $sql);
                            $count_comments = mysqli_num_rows($query);

      
                  ?>
                            <h4 style="color:white;"><?php  echo $count_comments  ?> Commentaires</h4>
                            </form>
                            <hr>
                    </li>
                 </div>

                    



  <!--  Desplaying user profile WHERE user_id = $user_id-->

  <?php  
       
       $sql = "SELECT * FROM  userprofile  INNER JOIN usercomments ON usercomments.user_id = userprofile.user_id  WHERE post_id = '$post_id'";
       $result = mysqli_query($db,$sql);

?>
     
    <?php  while ($a = mysqli_fetch_array($result)) {?>       l
           <?php  
              $comment_id = $a['comment_id'];
                  
           ?>
           
           <form action="" method="post">

           <ul class="comment-section">
             

             <li class="comment user-comment" style="margin-top:-50px">
             
                 <div class="info">
                     <input type="hidden" name="comment_id" value=<?php echo  $a['comment_id']; ?>>
                    <input type="hidden" name="post_id" value=<?php  echo $a['post_id'] ?>>
                   
                     <a href="#"><?php echo $a['username']  ?></a>
                     <a href="Reply_Comments.php?comment_id=<?php  echo $a['comment_id']?> && post_id=<?php  echo $a['post_id']  ?>  ">
                             
                             <small style="color:#eef">Repondre</small> 
                        
                         </a>
                     <span>4 hours ago </span>
                 </div>
             
                 <a class="avatar" href="#">
                     <img src=<?php  echo $a['avatar']?> width="35" alt="Profile Avatar" title="Anie Silverston" />
                 </a>
             
                 <p>
                     
                 
                 <?php  echo $a['comment']?>
                   <?php  
                     $sql = "SELECT * FROM userlikescomments WHERE comment_id = '$comment_id' ";
                     $qK = mysqli_query($db, $sql);
                     $count_likes = mysqli_num_rows($qK);
                   
                   ?>
             
             <?php  if($count_likes) :?>
                                  <button type="submit" name="like_Commennt" style="background:none;border:none;color:red">
                                   <span class="ml-2"><span class="fa fa-heart"> <?php   echo $count_likes ?></span> </span>
                                </button>
                                <?php else :?>
                                  <button type="submit" name="like_Commennt" style="background:none;border:none;color:black" onclick="return likeCheck()" id="like">
                                   <span class="ml-2"><span class="fa fa-heart"></span> </span>
                                   Aimer
                                </button>
                                <?php endif ?>

                                
                 
                 
             
             </p>
                 
             
             </li>
             
             
             
             
             </ul>

           </form>

     
 
   
            



            

     <?php } ?>


     
    
            

            
           
           

               




                
            
    

		

        

    </body>


   <!--  For emojies -->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/emoji-picker/lib/js/config.js"></script>
    <script src="vendor/emoji-picker/lib/js/util.js"></script>
    <script src="vendor/emoji-picker/lib/js/jquery.emojiarea.js"></script>
    <script src="vendor/emoji-picker/lib/js/emoji-picker.js"></script>



    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>

    
    <script src="js/main.js"></script>

</html>
