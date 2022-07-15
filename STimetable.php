<?php
session_start();
$con = mysqli_connect("localhost","root");
$db=mysqli_select_db($con,'clgwebsite');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable page on Student Panel Of College Management System</title>
    <link rel="stylesheet" href="../CollegeManagementSystem/STimetable.css">
</head>
<body>
    <div class="main">
        <div class="container1">
            <div class="logo">
                <img class="img1" src="../CollegeManagementSystem/Images/delogo.png" alt="img"><br>
                <p class="p1"><?php echo  $_SESSION['user'];?></p>
            </div>
            <div class="one"></div>
            <div class="two"><a href="../CollegeManagementSystem/StudentDashboard.php">Home</a></div>
            <div class="two"><a href="../CollegeManagementSystem/SMySubject.php">My Subjects</a></div>
            <div class="two"><a href="#">Time Table</a></div>
            <div class="two"><a href="../CollegeManagementSystem/SMarkSheet.php">MarkSheet</a></div>
            <div class="two"><a href="../CollegeManagementSystem/SMyProfile.php">My Profile</a></div>
            <div class="two"><a href="../CollegeManagementSystem/SAssignment.php">Assignments</a></div>
            <div class="two"><a href="../CollegeManagementSystem/StudentLogin.html">LogOut</a></div>
        </div>
        <div class="container2">
            <div class="one">
                <p class="p1">Time Table</p>
           </div>
           <div class="two">
           <?php 
             
             $user = $_SESSION["user"];
        $sql1 = mysqli_query($con,"select * from student where fname ='$user'");
        $row1 = mysqli_fetch_array($sql1);
        $subject=$row1["subject"];

       
        
        $sql= mysqli_query($con,"select * from timetable where subjects='$subject' ");
        $rowcount=mysqli_num_rows($sql);
        $row=mysqli_fetch_array($sql);
        
             ?>
               <table>
                   <tr>
                       <th>Course</th>
                       <th>Smester</th>
                       <th>Subject</th>
                       <th>Lecture</th>
                       <th>Days</th>
                   </tr>
                   <tr>
                 <td><?php echo $row['course']?></td>
                 <td><?php echo $row['semester']?></td>
                 <td><?php echo $row['subjects']?></td>
                 <td><?php echo $row['lecture']?></td>
                 <td><?php echo $row['days'] ?></td>
                 </tr>
               </table>
           </div>

           
           
        </div>
    </div>
</body>
</html>