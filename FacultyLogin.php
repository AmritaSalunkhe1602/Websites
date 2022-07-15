<?php
session_start();
$con = mysqli_connect("localhost","root");
$db=mysqli_select_db($con,'clgwebsite');

if(isset($_POST['submit'])){

    $UName = $_POST['user'];
    $Password = $_POST['pass'];

    $sql = "select * from faculty where facultyname ='".$UName."' AND id='".$Password."' ";
    $query=mysqli_query($con,$sql);
    $row=mysqli_num_rows($query);
   
    if($row==1){

        $_SESSION['user']=$UName;
        $_SESSION['pass']=$Password;
        header('Location:FacultyDashboard.php');
        exit();
    }
    else{
        header('Location:Facultylogin.html');
        exit();
    }
}
?>