<?php
$connection = mysqli_connect('127.0.0.1','root','','signup');
if (!$connection){
    die("server connection Failed" .mysqli_error($connection));
}
if (isset($_POST['submit'])){
    $email=mysqli_real_escape_string($connection,$_POST['email']);
    $pasword=mysqli_real_escape_string($connection,$_POST['password']);
    $newpassword=mysqli_real_escape_string($connection,$_POST['password1']);
    

    $sql = "select * from register where email='$email'" or die("Failed to query Database".mysql_error());
    $result = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result) <= 0) {
      echo"email is not registered  ";
      header("Refresh:2;url=form.html");
    }
    else{
        $query= "UPDATE register SET password='$newpassword' where email='$email' AND password='$pasword'" ;
        $output=mysqli_query($connection,$query);
        echo"password changed";
        header("Refresh:2;url=form.html");
    }
   
    
}

    


?>