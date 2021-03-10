<?php  include("config/db.php")?>
<?php include("Server_Side.php");?>

<?php  $user_id = $_SESSION['id'];
       $username = $_SESSION['username'];
       
?>


<?php  
   $U_ID = $_GET['U_ID'];
   $sql = "SELECT * FROM users INNER JOIN userprofile ON users.username = userprofile.username WHERE id  = '$U_ID'";
   $query = mysqli_query($db, $sql) or trigger_error("QUERY FAILED: $sql - ERROR :".mysqli_error($db), E_USER_ERROR);
   
   if (mysqli_num_rows($query)) {
    while ($a = mysqli_fetch_array($query)) {
        $usernameC = $a['username'];
        $avatarC = $a['avatar'];
        $ville_actuel = $a['ville_actuel'];
        $birthday = $a['birthday'];
        $province = $a['province'];
        $phone_number = $a['phone_number'];
        $profession = $a['profession'];
        $Etat_Civil = $a['Etat_Civil'];
        
    }
}




    

   
   
   

?>

<?php  
   $U_ID = $_GET['U_ID'];
   $sql = "SELECT * FROM users INNER JOIN userprofile ON users.username = userprofile.username WHERE id  = '$U_ID'";
   $query = mysqli_query($db, $sql) or trigger_error("QUERY FAILED: $sql - ERROR :".mysqli_error($db), E_USER_ERROR);
  



   //Check if the link is corresponding to the user SESSION if yes the system must send him to his account profile

   $Check_User = mysqli_fetch_assoc($query);

   if ($Check_User) {
      if ($Check_User['user_id'] == $user_id  || $Check_User['username'] == $username ) {
        header("location:profile_gallery.php");
      }
   }

    

   
   
   

?>





<?php  
    $user_id = $_SESSION['id'];
   $sql = "SELECT * FROM userprofile  WHERE user_id  = '$user_id'";
   $queryL = mysqli_query($db, $sql) or trigger_error("QUERY FAILED: $sql - ERROR :".mysqli_error($db), E_USER_ERROR);

   if (mysqli_num_rows($queryL)) {
       while ($row = mysqli_fetch_array($queryL)) {
           $avatar_profile = $row['avatar'];
       }
   }
  
?>

<?php  

$U_ID = $_GET['U_ID'];
$sql = "SELECT * FROM userprofile INNER JOIN userpost ON userpost.user_id = userprofile.user_id WHERE id  = '$U_ID'";
$query_K = mysqli_query($db, $sql) or trigger_error("QUERY FAILED: $sql - ERROR :".mysqli_error($db), E_USER_ERROR);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.6.3/jquery.timeago.js"></script>

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <title>Document</title>
</head>
<style>
:root {
  --blue: #5e72e4;
  --indigo: #5603ad;
  --purple: #8965e0;
  --pink: #f3a4b5;
  --red: #f5365c;
  --orange: #fb6340;
  --yellow: #ffd600;
  --green: #2dce89;
  --teal: #11cdef;
  --cyan: #2bffc6;
  --white: #fff;
  --gray: #8898aa;
  --gray-dark: #32325d;
  --light: #ced4da;
  --lighter: #e9ecef;
  --primary: #5e72e4;
  --secondary: #f7fafc;
  --success: #2dce89;
  --info: #11cdef;
  --warning: #fb6340;
  --danger: #f5365c;
  --light: #adb5bd;
  --dark: #212529;
  --default: #172b4d;
  --white: #fff;
  --neutral: #fff;
  --darker: black;
  --breakpoint-xs: 0;
  --breakpoint-sm: 576px;
  --breakpoint-md: 768px;
  --breakpoint-lg: 992px;
  --breakpoint-xl: 1200px;
  --font-family-sans-serif: Open Sans, sans-serif;
  --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace;
}

*,
*::before,
*::after {
  box-sizing: border-box;
}

@-ms-viewport {
  width: device-width;
}

figcaption,
footer,
main,
nav,
section {
  display: block;
}

body {
  font-family: Open Sans, sans-serif;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  margin: 0;
  text-align: left;
  color: #525f7f;
  background-color: #000D;
}

[tabindex='-1']:focus {
  outline: 0 !important;
}

hr {
  overflow: visible;
  box-sizing: content-box;
  height: 0;
}

h2,
h3,
h5 {
  margin-top: 0;
  margin-bottom: .5rem;
}

p {
  margin-top: 0;
  margin-bottom: 1rem;
}

dfn {
  font-style: italic;
}

strong {
  font-weight: bolder;
}

a {
  text-decoration: none;
  color: #5e72e4;
  background-color: transparent;
  -webkit-text-decoration-skip: objects;
}

a:hover {
  text-decoration: none;
  color: #233dd2;
}

a:not([href]):not([tabindex]) {
  text-decoration: none;
  color: inherit;
}

a:not([href]):not([tabindex]):hover,
a:not([href]):not([tabindex]):focus {
  text-decoration: none;
  color: inherit;
}

a:not([href]):not([tabindex]):focus {
  outline: 0;
}

img {
  vertical-align: middle;
  border-style: none;
}

caption {
  padding-top: 1rem;
  padding-bottom: 1rem;
  caption-side: bottom;
  text-align: left;
  color: #8898aa;
}

button {
  border-radius: 0;
}

button:focus {
  outline: 1px dotted;
  outline: 5px auto -webkit-focus-ring-color;
}

input,
button {
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
  margin: 0;
}

button,
input {
  overflow: visible;
}

button {
  text-transform: none;
}

button,
[type='reset'],
[type='submit'] {
  -webkit-appearance: button;
}

button::-moz-focus-inner,
[type='button']::-moz-focus-inner,
[type='reset']::-moz-focus-inner,
[type='submit']::-moz-focus-inner {
  padding: 0;
  border-style: none;
}

input[type='radio'],
input[type='checkbox'] {
  box-sizing: border-box;
  padding: 0;
}

input[type='date'],
input[type='time'],
input[type='datetime-local'],
input[type='month'] {
  -webkit-appearance: listbox;
}

legend {
  font-size: 1.5rem;
  line-height: inherit;
  display: block;
  width: 100%;
  max-width: 100%;
  margin-bottom: .5rem;
  padding: 0;
  white-space: normal;
  color: inherit;
}

[type='number']::-webkit-inner-spin-button,
[type='number']::-webkit-outer-spin-button {
  height: auto;
}

[type='search'] {
  outline-offset: -2px;
  -webkit-appearance: none;
}

[type='search']::-webkit-search-cancel-button,
[type='search']::-webkit-search-decoration {
  -webkit-appearance: none;
}

::-webkit-file-upload-button {
  font: inherit;
  -webkit-appearance: button;
}

[hidden] {
  display: none !important;
}

h2,
h3,
h5,
.h2,
.h3,
.h5 {
  font-family: inherit;
  font-weight: 600;
  line-height: 1.5;
  margin-bottom: .5rem;
  color: #32325d;
}

h2,
.h2 {
  font-size: 1.25rem;
}

h3,
.h3 {
  font-size: 1.0625rem;
}

h5,
.h5 {
  font-size: .8125rem;
}

hr {
  margin-top: 2rem;
  margin-bottom: 2rem;
  border: 0;
  border-top: 1px solid rgba(0, 0, 0, .1);
}

.btn {
  font-size: 1rem;
  font-weight: 600;
  line-height: 1.5;
  display: inline-block;
  padding: .625rem 1.25rem;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
  text-align: center;
  vertical-align: middle;
  white-space: nowrap;
  border: 1px solid transparent;
  border-radius: .375rem;
}

@media screen and (prefers-reduced-motion: reduce) {
  .btn {
    transition: none;
  }
}

.btn:hover,
.btn:focus {
  text-decoration: none;
}

.btn:focus {
  outline: 0;
  box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
}

.btn:disabled {
  opacity: .65;
  box-shadow: none;
}

.btn:not(:disabled):not(.disabled) {
  cursor: pointer;
}

.btn:not(:disabled):not(.disabled):active {
  box-shadow: none;
}

.btn:not(:disabled):not(.disabled):active:focus {
  box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08), none;
}

.btn-info {
  color: #fff;
  border-color: #11cdef;
  background-color: #11cdef;
  box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
}

.btn-info:hover {
  color: #fff;
  border-color: #11cdef;
  background-color: #11cdef;
}

.btn-info:focus {
  box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 0 rgba(17, 205, 239, .5);
}

.btn-info:disabled {
  color: #fff;
  border-color: #11cdef;
  background-color: #11cdef;
}

.btn-info:not(:disabled):not(.disabled):active {
  color: #fff;
  border-color: #11cdef;
  background-color: #0da5c0;
}

.btn-info:not(:disabled):not(.disabled):active:focus {
  box-shadow: none, 0 0 0 0 rgba(17, 205, 239, .5);
}

.btn-default {
  color: #fff;
  border-color: #172b4d;
  background-color: #172b4d;
  box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
}

.btn-default:hover {
  color: #fff;
  border-color: #172b4d;
  background-color: #172b4d;
}

.btn-default:focus {
  box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 0 rgba(23, 43, 77, .5);
}

.btn-default:disabled {
  color: #fff;
  border-color: #172b4d;
  background-color: #172b4d;
}

.btn-default:not(:disabled):not(.disabled):active {
  color: #fff;
  border-color: #172b4d;
  background-color: #0b1526;
}

.btn-default:not(:disabled):not(.disabled):active:focus {
  box-shadow: none, 0 0 0 0 rgba(23, 43, 77, .5);
}

.btn-sm {
  font-size: .875rem;
  line-height: 1.5;
  padding: .25rem .5rem;
  border-radius: .375rem;
}

.card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  border: 1px solid rgba(0, 0, 0, .05);
  border-radius: .375rem;
  background-color: #fff;
  background-clip: border-box;
}

.card>hr {
  margin-right: 0;
  margin-left: 0;
}

.card-body {
  padding: 1.5rem;
  flex: 1 1 auto;
}

.card-header {
  margin-bottom: 0;
  padding: 1.25rem 1.5rem;
  border-bottom: 1px solid rgba(0, 0, 0, .05);
  background-color: #fff;
}

.card-header:first-child {
  border-radius: calc(.375rem - 1px) calc(.375rem - 1px) 0 0;
}

@keyframes progress-bar-stripes {
  from {
    background-position: 1rem 0;
  }

  to {
    background-position: 0 0;
  }
}

.bg-default {
  background-color: #172b4d !important;
}

a.bg-default:hover,
a.bg-default:focus,
button.bg-default:hover,
button.bg-default:focus {
  background-color: #0b1526 !important;
}

.border-0 {
  border: 0 !important;
}

.rounded-circle {
  border-radius: 50% !important;
}

.d-flex {
  display: flex !important;
}

.justify-content-center {
  justify-content: center !important;
}

.justify-content-between {
  justify-content: space-between !important;
}

.align-items-center {
  align-items: center !important;
}

@media (min-width: 1200px) {
  .justify-content-xl-between {
    justify-content: space-between !important;
  }
}

.float-right {
  float: right !important;
}

.shadow,
.card-profile-image img {
  box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15) !important;
}

.mr-2 {
  margin-right: .5rem !important;
}

.mt-4,
.my-4 {
  margin-top: 1.5rem !important;
}

.mr-4 {
  margin-right: 1.5rem !important;
}

.my-4 {
  margin-bottom: 1.5rem !important;
}

.mb-5 {
  margin-bottom: 3rem !important;
}

.mt-7 {
  margin-top: 6rem !important;
}

.pt-0 {
  padding-top: 0 !important;
}

.pb-0 {
  padding-bottom: 0 !important;
}

.pt-8 {
  padding-top: 8rem !important;
}

.m-auto {
  margin: auto !important;
}

@media (min-width: 768px) {
  .mt-md-5 {
    margin-top: 3rem !important;
  }

  .pt-md-4 {
    padding-top: 1.5rem !important;
  }

  .pb-md-4 {
    padding-bottom: 1.5rem !important;
  }
}

@media (min-width: 1200px) {
  .mb-xl-0 {
    margin-bottom: 0 !important;
  }
}

.text-center {
  text-align: center !important;
}

.font-weight-light {
  font-weight: 300 !important;
}

@media print {

  *,
  *::before,
  *::after {
    box-shadow: none !important;
    text-shadow: none !important;
  }

  a:not(.btn) {
    text-decoration: underline;
  }

  img {
    page-break-inside: avoid;
  }

  p,
  h2,
  h3 {
    orphans: 3;
    widows: 3;
  }

  h2,
  h3 {
    page-break-after: avoid;
  }

  @ page {
    size: a3;
  }
}

@keyframes floating-lg {
  0% {
    transform: translateY(0px);
  }

  50% {
    transform: translateY(15px);
  }

  100% {
    transform: translateY(0px);
  }
}

@keyframes floating {
  0% {
    transform: translateY(0px);
  }

  50% {
    transform: translateY(10px);
  }

  100% {
    transform: translateY(0px);
  }
}

@keyframes floating-sm {
  0% {
    transform: translateY(0px);
  }

  50% {
    transform: translateY(5px);
  }

  100% {
    transform: translateY(0px);
  }
}

[class*='shadow'] {
  transition: all .15s ease;
}

.font-weight-300 {
  font-weight: 300 !important;
}

.btn {
  font-size: .875rem;
  position: relative;
  transition: all .15s ease;
  letter-spacing: .025em;
  text-transform: none;
  will-change: transform;
}

.btn:hover {
  transform: translateY(-1px);
  box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
}

.btn:not(:last-child) {
  margin-right: .5rem;
}

.btn i:not(:first-child) {
  margin-left: .5rem;
}

.btn i:not(:last-child) {
  margin-right: .5rem;
}

.btn-sm {
  font-size: .75rem;
}

[class*='btn-outline-'] {
  border-width: 1px;
}

.card-profile-image {
  position: relative;
}

.card-profile-image img {
  position: absolute;
  left: 50%;
  max-width: 180px;
  transition: all .15s ease;
  transform: translate(-50%, -30%);
  border-radius: .375rem;
}

.card-profile-image img:hover {
  transform: translate(-50%, -33%);
}

.card-profile-stats {
  padding: 1rem 0;
}

.card-profile-stats>div {
  margin-right: 1rem;
  padding: .875rem;
  text-align: center;
}

.card-profile-stats>div:last-child {
  margin-right: 0;
}

.card-profile-stats>div .heading {
  font-size: 1.1rem;
  font-weight: bold;
  display: block;
}

.card-profile-stats>div .description {
  font-size: .875rem;
  color: #adb5bd;
}

.main-content {
  position: relative;
}

.footer {
  padding: 2.5rem 0;
  background: #f7fafc;
}

.footer .copyright {
  font-size: .875rem;
}

@media (min-width: 768px) {
  @ keyframes show-navbar-dropdown {
    0% {
      transition: visibility .25s, opacity .25s, transform .25s;
      transform: translate(0, 10px) perspective(200px) rotateX(-2deg);
      opacity: 0;
    }

    100% {
      transform: translate(0, 0);
      opacity: 1;
    }
  }

  @keyframes hide-navbar-dropdown {
    from {
      opacity: 1;
    }

    to {
      transform: translate(0, 10px);
      opacity: 0;
    }
  }
}

@keyframes show-navbar-collapse {
  0% {
    transform: scale(.95);
    transform-origin: 100% 0;
    opacity: 0;
  }

  100% {
    transform: scale(1);
    opacity: 1;
  }
}

@keyframes hide-navbar-collapse {
  from {
    transform: scale(1);
    transform-origin: 100% 0;
    opacity: 1;
  }

  to {
    transform: scale(.95);
    opacity: 0;
  }
}

p {
  font-size: 1rem;
  font-weight: 300;
  line-height: 1.7;
}

.description {
  font-size: .875rem;
}

.heading {
  font-size: .95rem;
  font-weight: 600;
  letter-spacing: .025em;
  text-transform: uppercase;
}

@media (max-width: 768px) {
  .btn {
    margin-bottom: 10px;
  }
}

}
</style>
<body>
   
   


    <div class="main-content bg-dark">
    <div class="container mt-7">
      <!-- Table -->
      
      <div class="row">
        <div class="col-xl-8 m-auto order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src=<?php  echo $avatarC ?> class="rounded-circle" width="30%">
                  </a>

                  
                 
                </div>
              
              </div>
              
            </div>
           
           
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                  
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5" style="margin-top:60px">
                     
                    <div><br>
                    <br>
                        <h5 style="margin-top:-40px"><?php   echo $usernameC ?></h5>
                        <h3 style="color:black;font-size:15px"><i class="fa fa-map-marker" aria-hidden="true"> ville actuel :  <?php echo $ville_actuel ?></i></h3>
                        <h3>Ne le <?php echo $birthday  ?> / Province d'origine : <?php echo $province ?></h3>
                        <h3 style="color:orange"><?php  echo $phone_number ?></h3>
                        <h6>Profession: <?php echo $profession ?></h3>
                        <h6>Etat_Civil : <?php echo $Etat_Civil ?></h4>

                        <a href="Chat.php?user_id=<?php  echo $user_id ?> && U_ID=<?php echo $U_ID ?> &&sender_username= <?php echo $username ?> && reveiver_username=<?php  echo $usernameC ?>">
                        <button class="btn btn-primary">Envoyer un message</button>
                        </a>
                       
                       
                     
                    </div>
                   
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <section class="gallery-block cards-gallery">
	    <div class="container">
	        <div class="heading">
	          <h2>Cards Gallery</h2>
	        </div>
	        <div class="row">
                <?php while ($a = mysqli_fetch_array($query_K)) { ?>

                    
                    <div class="col-md-6 col-lg-4">
	                <div class="card border-0 transform-on-hover">
	                	<a class="lightbox" href="../img/image1.jpg">
                        <?php 
                          $image_post = $a['image_post'];
                          $video_post = $a['video_post'];
                        
                        ?>

                     <?php
                      
                      if ($image_post == 'No image') { ?>
                          <video controls width="100%">

                            <source src="<?php  echo  $video_post ?>" type=""></source>
                         </video>

                      <?php }elseif ($video_post == 'No Video') { ?>
                        
                        <img src="<?php echo $image_post  ?>" alt="" srcset="" width="100%">
                        

                        
                     <?php } ?>
	                		
                            
	                	</a>
                        
	                    <div class="card-body">
                        <small>Poster le <p style="color:black"><?php  echo $a['Time_posted'] ?></p></small>
                            <?php 
                               $post_id = $a['post_id'];
                               $sql = "SELECT * FROM userlikes INNER JOIN userprofile ON userlikes.user_id = userprofile.user_id WHERE post_id = '$post_id'";
                               $q = mysqli_query($db, $sql);
                               $count_likes = mysqli_num_rows($q);
                            
                            ?>

                           <?php 
                               $post_id = $a['post_id'];
                               $sql = "SELECT * FROM usercomments WHERE post_id = '$post_id'";
                               $q2 = mysqli_query($db, $sql);
                               $count_comments = mysqli_num_rows($q2) ;
                            
                            ?>

                            <?php 
                               $post_id = $a['post_id'];
                               $sql3 = "SELECT * FROM usercomments WHERE post_id = '$post_id'";
                               $Result = mysqli_query($db, $sql3) or trigger_error("QUERY FAILED: $sql - ERROR :".mysqli_error($db), E_USER_ERROR);
                                

                               if (mysqli_num_rows($Result)) {
                                   while ($L = mysqli_fetch_array($Result)) {
                                        $usernameL = $L['username'];
                                   }
                               }
                            
                            ?>


                        <img src=<?php  echo $avatarC ?> class="rounded-circle" width="10%">
	                        <h6><a href="#"><small><?php echo $usernameC ?></small></a></h6>
	                        <p class="text-muted card-text"><?php echo  $a['content'] ?></p>

                           

                            <form action="Single_User_profile.php" method="post">
                                <input type="hidden" name="post_id" value=<?php echo $a['post_id'] ?>>
                                <button type="submit" name="like" style="background:none;border:none;">
                                    <span class="ml-2"><span class="fa fa-heart"></span> </span><?php  echo $count_likes ?>
                                </button>

                                <span class="fa fa-comments" style="background:none;border:none;padding-left:20px"> <?php  echo $count_comments ?>
                         </span><br>

                            </form>

                            <!-- Default dropup button -->
                                <div class="btn-group dropup">
                                    <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    <small>Nombre des j'aime</small>
                                    </button>
                                    <div class="dropdown-menu" style="width:300px">
                                        <h6 ><?php  echo $count_likes  ?> personnes ont aimer le post  <a href="comment.php?user_id=<?php echo $user_id  ?> && post_id=<?php echo $a['post_id'] ?>" style="color:red">
                                          </a></h6>   
                                  
                                        <?php while ($R = mysqli_fetch_array($q)) { ?>
                                          
                                          <div class="container">
                                            
                                              <div class="image" style="padding-bottom:5px">
                                                  <img src=<?php echo  $R['avatar']  ?> alt="DP" class=" rounded-circle img-fluid " width="40" height="40">
                                                  <small><b><?php echo  $R['username'] ?></b> : </small>
                                                
                                                  <hr>
                                                  
                                              </div> 
                                          </div>
                                          
                                        <?php  } ?>

                                    </div>
                                 </div>
                            
                              <a href="comment.php?post_id=<?php  echo $a['post_id'] ?> && user_id=<?php echo $U_ID ?>"   style="margin-left:-10px">
                              <small>Nombre commentaire</small>
                             </a>
                           
                                
                           
                            
                            
                           
	                    </div>
                       
	                </div>
                    
	            </div>
                <?php } ?>
	            
	            
	            
	        </div>
	    </div>


       
    </section>
    

    
 
</body>
</html>