<?php  include("config/db.php")?>
<?php include("Server_Side.php");?>
<?php  $user_id = $_SESSION['id'];
       $username = $_SESSION['username'];
      
       
       
      
 ?>


<?php  if(!$_SESSION['username']) :?>
   <?php    header("location:Login.php") ?>

<?php else :?>


<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="chat, user, comments, wide" />

		<title>Comment Section With Flexbox</title>
        <link href="vendor/emoji-picker/lib/css/emoji.css" rel="stylesheet">


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
		<link rel="stylesheet" href="styles.css">

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






   <!-- Getting the comment_id and post_id from comment page so that we can use them for reply comment query-->
    <?php   $comment_id = $_GET['comment_id']; ?>
    <?php   $post_id = $_GET['post_id']; ?>
   
    
   
    
    
        
    <div class="container">
    
        
    
    <?php while ($row = mysqli_fetch_assoc($result_1)) { ?>
                    <img src=<?php  echo $row['avatar']  ?> width="80" alt="Profile Avatar" title="Anie Silverston" />
                    <br>
                    <br>
    <?php } ?>

    

    

    <a href="Home.php">back</a>

                 
                 <small><a href="Home.php" style="margin-top:-4px;color:white"> <i class="fa fa-home" style="font-size:20px"></i> retourner a la page d'accuille</a></small>
                 <li class="write-new" style="margin-top:-4px">
                 
                       
                            <form action="#" method="post">
                            
                                
                                <textarea placeholder="Ecrivez un commentaire ici" name="Reply_content" required  data-emojiable="true"
							data-emoji-input="unicode"></textarea>
                            <div>
                                
                                <button type="submit" name="Reply" class="btn btn-primary"><i class="fa fa-pencil"></i> Repondre</button> <br><br>
                           
                          
                            </div>

                           
                            </form>
                            <hr>
                    </li>
                 </div>

                 

                 <?php    
                     
                            $comment_id = $_GET['comment_id'];
                            $post_id = $_GET['post_id'];
                            $sql = "SELECT * FROM user_repy_comments WHERE post_id = '$post_id' AND comment_id = '$comment_id'";
                            $query = mysqli_query($db, $sql);
                            $count_Reply_comments = mysqli_num_rows($query)
                            

      
                  ?>
                  <div class="container">
                  <h3 style="color:white">Personnes repondu a ce commentaire (<?php  echo  $count_Reply_comments ?> )</h3>
                  </div>
                



 <!-- desplaying all reply commemts -->

<?php  
       $comment_id = $_GET['comment_id'];
       $post_id = $_GET['post_id'];
       $sql = "SELECT * FROM  userprofile  INNER JOIN user_repy_comments ON user_repy_comments.user_id = userprofile.user_id  WHERE post_id = '$post_id' AND comment_id = '$comment_id'";
       $desplay = mysqli_query($db,$sql);

?>
<?php while ($show = mysqli_fetch_assoc($desplay)) { ?>
    <ul class="comment-section">

                <li class="comment user-comment">

                    <div class="info">
                        <a href="#"><?php  echo $show['username']  ?></a>
                        <span>4 hours ago</span>
                    </div>

                    <a class="avatar" href="#">
                        <img src="images/avatar_user_1.jpg" width="35" alt="Profile Avatar" title="Anie Silverston" />
                    </a>

                    <p><?php  echo $show['Reply_content']  ?></p>

                </li>

    </ul>
     
<?php } ?>



		

        <footer>
            <a class="tz" href="http://tutorialzine.com/2015/11/using-flexbox-to-create-a-responsive-comment-section/">Using Flexbox to Create a Responsive Comment Section</a>
        </footer>

    </body>
    
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
<?php endif ?>
