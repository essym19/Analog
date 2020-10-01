<?php
session_start();
//obtain the information
$data=$_POST;
//create a connection
$con=mysqli_connect('localhost', 'root', '','Utilities _checker');
//insert the information to the database
$email=$data['email'];
$uname=$data['userName'];
$pword=md5($data['passWord']);
if($email!=""){
 $sql="SELECT user_email FROM `userDetails` WHERE `user_email`= '$email'";
    
    $result=mysqli_query($con, $sql);

    if(mysqli_num_rows($result)==0){
    
    $insert="INSERT INTO userDetails(user_email, username, user_password)
    VALUES('$email', '$uname', '$pword')";
}
else if(mysqli_num_rows($result)!=0){
echo '<script type="text/javascript">alert("Your email is already in our system. Try logging in instead"); window.location = "homePage.php";</script>';
}
//execute the php
$saved=mysqli_query($con, $insert);
if($saved){
    $_SESSION["id"]= $uname;
    header('location: mainpage.php');
    //userName='.$row['uname'].'
}
else{
    echo '<script type="text/javascript">alert("An error occured. Try signing up again"); window.location = "homePage.php";</script>';
}
}
?>

