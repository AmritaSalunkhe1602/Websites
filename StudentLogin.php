<?php
session_start();
$con = mysqli_connect("localhost","root");
$db=mysqli_select_db($con,'clgwebsite');

if(isset($_POST['submit'])){

    $UName = $_POST['user'];
    $Password = $_POST['pass'];

    $sql = "select * from student where fname ='".$UName."' AND rollno='".$Password."' ";
    $query=mysqli_query($con,$sql);
    $row=mysqli_num_rows($query);
   
    if($row==1){

        $_SESSION['user']=$UName;
        header('Location:StudentDashboard.php');
        exit();
    }
    else{
        header('Location:Studentlogin.html');
        exit();
    }
}
?>