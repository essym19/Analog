<?php
session_start();
//receive the data
$data=$_POST;

//create a connection
$con=mysqli_connect('localhost', 'root', '','Utilities _checker');
//cross check from the database
$useremail=$data['youremail'];
$userpass=md5($data['yourpassword']);
if($useremail!=""){
    $sql="SELECT user_email, user_password, username FROM `userDetails` WHERE `user_email`= '$useremail'";
    
    $result=mysqli_query($con, $sql);

    if(mysqli_num_rows($result)!=0){
        while($row=mysqli_fetch_assoc($result)){
            $dbemail= $row['user_email'];
            $dbPassword=$row['user_password'];
            $dbuserna=$row['username'];
        }
        if($userpass==$dbPassword ){
            $_SESSION["id"]= $dbuserna;
            header('location: mainpage.php');
        }
        else{
            echo '<script type="text/javascript">alert("wrong password"); window.location = "homePage.php";</script>';
        }
        
    }
    else{
       echo '<script type="text/javascript">alert("User not found"); window.location = "homePage.php";</script>';
       
                  }
                  
    
}
?>
