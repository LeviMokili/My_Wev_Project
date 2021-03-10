<?php 
session_start();
include("config/db.php");
$username = "";
$email = "";
$errors = array();

  if (isset($_POST['Register'])) {
    //Casting and initialising our variables
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);

    //check if the username or email has been already used by someone else

      $user_check = "SELECT * FROM users WHERE email = '$email' OR username ='$username'";
      $query = mysqli_query($db, $user_check);
      $User = mysqli_fetch_assoc($query);

    if ($User) {
        if ($User['username'] == $username || $User['email'] == $email) {
          array_push($errors, "The username or email is already used by someone else please try an another one");
        }
    }
     
    //Check if the passoword match if not the system desplay an error message
    if ($password != $cpassword) {
        array_push($errors, "The two passoword does not match");
    }
    
    //If all credentials are checked then we can proceed in other term the variable "errors" is equal to zero
    if (count($errors) == 0) {
        $sql = "INSERT INTO users(username,email,password,created_at,user_role) VALUES('$username','$email','$password',now(),0)";
        $query = mysqli_query($db, $sql);
        if ($query) {
            header("location:Login.php");
        }else{
            array_push("Failed to insert into the Database");
        }
    }
  }

 
  #Login Users to thier Account
  if (isset($_POST['Login'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (count($errors) == 0) {
       
       $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
       $results = mysqli_query($db, $query);

      
       if (mysqli_num_rows($results) > 0) {
         while ($row = mysqli_fetch_array($results)) {
              $id = $row['user_id'];
              $username = $row['username'];
              $email = $row['email'];
              $password = $row['password'];
              $user_role = $row['user_role'];

              
              $_SESSION['id'] = $id;
              $_SESSION['user_role'] = $user_role;
              $_SESSION['username'] = $username;
              $_SESSION['email'] = $email;
              $_SESSION['password'] = $password;

             

        }
       
       }else {
           array_push($errors, "Wrong username/password combination");
       }
   }
 }

 #Adding user profile

 if (isset($_POST['Save'])) {
   
   $profession = mysqli_real_escape_string($db, $_POST['profession']);
   $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
   $province = mysqli_real_escape_string($db, $_POST['province']);
   $birthday = mysqli_real_escape_string($db, $_POST['birthday']);
   $avatar = mysqli_real_escape_string($db, $_FILES['avatar']['name']);
   $Etat_Civil = mysqli_real_escape_string($db, $_POST['Etat_Civil']);
   $Bio = mysqli_real_escape_string($db, $_POST['Bio']);
   $ville_actuel = mysqli_real_escape_string($db, $_POST['ville_actuel']);


   $upload = "Blogimages/User_Current_Picture/". $avatar;
  

   if (count($errors) == 0) {
        $user_id = $_SESSION['id'];
        $username = $_SESSION['username'];
        $sql = "INSERT INTO userprofile(profession,phone_number,province,ville_actuel,birthday,avatar,Etat_Civil,Bio,user_id,username) VALUES('$profession','$phone_number','$province','$ville_actuel','$birthday','$upload','$Etat_Civil','$Bio','$user_id','$username')";
        $query = mysqli_query($db, $sql);
        move_uploaded_file($_FILES['avatar']['tmp_name'], $upload);
       header("location:Home.php");
       

       
       
      
   }
 }


 #Adding users posts into the database and deplay them in the main page

 if (isset($_POST['Add_Post'])) {
   $user_id = $_SESSION['id'];
   $username = $_SESSION['username'];
   $content = mysqli_real_escape_string($db, $_POST['content']);
   $image_post = mysqli_real_escape_string($db, $_FILES['image_post']['name']);
   $upload_post =  "Blogimages/Post_Images/".  $image_post;
   $upload_post_video =  "Blogimages/Video_posts/".  $image_post;

   

   $supported_image_format = array(
     'gif',
     'jpg',
     'jpeg',
     'png'

   );
 
   
   $extension = strtolower(pathinfo($image_post, PATHINFO_EXTENSION));

  //for video
   $supported_video_format = array(
    'mp4',
    'mkv'
    

  );

  $extension_video = strtolower(pathinfo($image_post, PATHINFO_EXTENSION));

   

   

   if (count($errors) == 0) {

    if (in_array($extension,$supported_image_format)) {
     $sql = "INSERT INTO userpost(user_id,posted_by,content,image_post,video_post,Time_posted) VALUES('$user_id','$username','$content','$upload_post','No Video', now())";
    $query = mysqli_query($db, $sql) or trigger_error("QUERY FAILED: $sql - ERROR :".mysqli_error($db), E_USER_ERROR);
    move_uploaded_file($_FILES['image_post']['tmp_name'], $upload_post);
    header("Home.php");
    
     }

     if(in_array($extension_video,$supported_video_format)){
      $sql = "INSERT INTO userpost(user_id,posted_by,content,image_post,video_post,Time_posted) VALUES('$user_id','$username','$content','No image','$upload_post_video', now())";
      $query = mysqli_query($db, $sql) or trigger_error("QUERY FAILED: $sql - ERROR :".mysqli_error($db), E_USER_ERROR);
      move_uploaded_file($_FILES['image_post']['tmp_name'], $upload_post_video);
      header("Home.php");
     }
    
   }



   
   
   
  }


 #like system 
 if (isset($_POST['like'])) {
  $user_id = $_SESSION['id'];
  $post_id = $_POST['post_id'];
  $username = $_SESSION['username'];
  
  $R = "SELECT * FROM userlikes WHERE user_id = '$user_id' AND post_id = '$post_id'";
  $q3 = mysqli_query($db, $R);
  $count = mysqli_num_rows($q3);
  if ($count >= 1) {
    $delete = "DELETE FROM userlikes WHERE user_id = '$user_id' AND post_id = '$post_id'";
    mysqli_query($db, $delete);
  }else{
    $sql = "INSERT INTO userlikes(user_id,post_id,username) VALUES('$user_id', '$post_id','$username')  ";
  $query = mysqli_query($db, $sql);
  }

   if ($q3) {
     header("location:Home.php");
    
  }else{
     array_push($errors, "Failed to insert");
  }
}






#Login Admin



if (isset($_POST['LoginAdmin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if ($email === "levismp8d@gmail.com" || $password === "12345678") {
       header("location:DashAdmin.php");
    }else{
      array_push($errors, "Incorrect information");
    }
}







#Adding users comment

if (isset($_POST['Add_Comment'])) {
   $user_id = $_SESSION['id'];
   $username = $_SESSION['username'];
   $post_id = $_POST['post_id'];
   $comment = $_POST['comment'];


   if (count($errors) == 0) {
      $sql = "INSERT INTO usercomments(user_id,post_id,username,comment) VALUES('$user_id','$post_id','$username','$comment')";
      mysqli_query($db, $sql);

      $_SESSION['post_id'] = $post_id;

    }
}


//Reply to comments

if (isset($_POST['Reply'])) {
  $comment_id = $_GET['comment_id'];
  $user_id = $_SESSION['id'];
  $username = $_SESSION['username'];
  $post_id = $_GET['post_id'];
  $Reply_content = mysqli_real_escape_string($db, $_POST['Reply_content']);

  if (count($errors) == 0) {
    $sql = "INSERT INTO user_repy_comments(comment_id,user_id,post_id,username,Reply_content) VALUES('$comment_id','$user_id','$post_id','$username','$Reply_content')";
    $query = mysqli_query($db, $sql);

    
  }
}


#Adding universities into the database

if (isset($_POST['Add_Universities'])) {
   $Univ_name = mysqli_real_escape_string($db, $_POST['Univ_name']);
   $University_Province = mysqli_real_escape_string($db, $_POST['University_Province']);
   $Univ_bio = mysqli_real_escape_string($db, $_POST['Univ_bio']);
   $Univ_Photo = $_FILES['Univ_Photo']['name'];

   $upload = "Blogimages/Univerties_Photo/" . $Univ_Photo;


   if (count($errors) == 0) {
     echo  $sql = "INSERT INTO universities(University_name,University_Province,University_bio,University_photo) VALUES('$Univ_name','$University_Province','$Univ_bio','$upload')";
     move_uploaded_file($_FILES['Univ_Photo']['tmp_name'], $upload);
     mysqli_query($db, $sql);
    exit();

  }
}

//Deleting users Post

if (isset($_POST['Delete'])) {
  $post_id = $_POST['post_id'];
 $user_id = $_SESSION['id'];
 $sql = "DELETE FROM userpost WHERE user_id = '$user_id' AND post_id = '$post_id'";
 mysqli_query($db, $sql);
 $_SESSION['message'] = "Le post a ete suprimer"; 
}

//Edting users post

if (isset($_POST['Update_Post'])) {
  $user_id = $_SESSION['id'];
  $post_id = $_POST['post_id'];
  $content = mysqli_real_escape_string($db, $_POST['content']);
  $oldimage = mysqli_real_escape_string($db, $_POST['oldimage']);

  if (isset($_FILES['image_post']['name']) && ($_FILES['image_post']['name']!="")) {
    $newimage = "Blogimages/Post_Images/".$_FILES['image_post']['name'];
    unlink($oldimage);
    move_uploaded_file($_FILES['image_post']['tmp_name'], $newimage);
  }else{
    $newimage = $oldimage;
  }

  $sql = "UPDATE userpost SET content = '$content', image_post = '$newimage' WHERE post_id = '$post_id' AND user_id = '$user_id'";
  mysqli_query($db, $sql);

  $_SESSION['message_success'] = "Le post a ete modifier avec success";
  header("location:profile_gallery.php");

}


#Updating the userprofile

if (isset($_POST['Update_Profile'])) {
  $user_id = $_POST['user_id'];
  $profession = $_POST['profession'];
  $phone_number = $_POST['phone_number'];
  $province = $_POST['province'];
  $birthday = $_POST['birthday'];
  $Etat_Civil = $_POST['Etat_Civil'];
  $username = $_SESSION['username'];
  $Bio = $_POST['Bio'];
  

  $OldAvatarImage = $_POST['OldAvatarImage'];


  if (isset($_FILES['avatar']['name']) && ($_FILES['avatar']['name']!="")) {
    $newimage = "Blogimages/User_Current_Picture/" .$_FILES['avatar']['name'];
    unlink($OldAvatarImage);
    move_uploaded_file($_FILES['avatar']['tmp_name'], $newimage);
    # code...
  }else{
   $newimage = $OldAvatarImage;
  }

  $sql = "UPDATE userprofile SET profession = '$profession', avatar = '$newimage', province = '$province', phone_number = '$phone_number',  Bio = '$Bio' , birthday = '$birthday', username = '$username' WHERE user_id = '$user_id'";
  mysqli_query($db, $sql);
  $_SESSION['message_success'] = "Profile profile etait changer avec success";

  

}

//like comment

if (isset($_POST['like_Commennt'])) {
  $user_id = $_SESSION['id'];
  $post_id = $_POST['post_id'];
  $comment_id = $_POST['comment_id'];
  $username = $_SESSION['username'];


  $SQl = "SELECT * FROM userlikescomments WHERE user_id = '$user_id' AND post_id = '$post_id'";
  $QUERY = mysqli_query($db, $SQl);

  $count = mysqli_num_rows($QUERY);

  if ($count >= 1) {
     $SQL_Count = "DELETE FROM userlikescomments WHERE user_id = '$user_id' AND post_id = '$post_id'";
      mysqli_query($db, $SQL_Count);
  }else{
    $sql = "INSERT INTO userlikescomments(user_id,post_id,comment_id,username) VALUES('$user_id', '$post_id','$comment_id','$username')  ";
    $query = mysqli_query($db, $sql)or trigger_error("QUERY FAILED: $sql - ERROR :".mysqli_error($db), E_USER_ERROR);
  }
  

 

   
}



//Confirm email for reset the password

if (isset($_POST['Confirm_Email'])) {
   $email = $_POST['email'];

   if (empty($email)) {
      array_push($errors, "Fill");
   }

   if (count($errors) == 0) {
      $check_email = mysqli_query($db, "SELECT * FROM users WHERE email = '$email'");
      if (mysqli_num_rows($check_email) == 1) {
          header('location:ResetPassword.php?email='.$email);
      }else{
        array_push($errors, "Wrong");
    }
   }

   

   
}

//RESET PASSWORD FOR USERS IF THEY HAVE FORGOTTON

if (isset($_POST['Reset_Password'])) {
   $New_Password = mysqli_real_escape_string($db, $_POST['New_Password']);
   $ConfirmPassword = mysqli_real_escape_string($db, $_POST['ConfirmPassword']);
   $email = mysqli_real_escape_string($db, $_POST['email']);



   if ($New_Password != $ConfirmPassword) {
     array_push($errors, "Le deux mot de passe ne correspond pas");
   }

   if (count($errors) == 0) {
       $change_Password = mysqli_query($db, "UPDATE users SET password = '$New_Password' WHERE email = '$email'");
      

       $_SESSION['message'] = "Le votre password a ete changer avec success";
       header("location:Login.php");
   }
}













	





 

?>

