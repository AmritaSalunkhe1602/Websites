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
    <title>My Subjects Page on Faculty Panel Of College Management System</title>
    <link rel="stylesheet" href="../CollegeManagementSystem/FMySubjects.css">
    
</head>
<body>
    <div class="main">
        <div class="container1">
            <div class="logo">
                <img class="img1" src="../CollegeManagementSystem/Images/delogo.png" alt="img"><br>
                <p class="p1"><?php echo  $_SESSION['user'];?></p>
            </div>
            <div class="one"></div>
            <div class="two"><a href="../CollegeManagementSystem/FacultyDashboard.php">Home</a></div>
            <div class="two"><a href="#">My Subjects</a></div>
            <div class="two"><a href="../CollegeManagementSystem/FInternalMarks.php">Internal Marks</a></div>
            <div class="two"><a href="../CollegeManagementSystem/FAttendance.php">Attendance</a></div>
            <div class="two"><a href="../CollegeManagementSystem/FAssignment.php">Assignments</a></div>
            <div class="two"><a href="../CollegeManagementSystem/FacultyProfile.php">My Profile</a></div>
            <div class="two"><a href="../CollegeManagementSystem/FacultyLogin.html">LogOut</a></div>
           
        </div>
        <div class="container2">
            <div class="one">
                <p class="p1">Lectures Assigned</p>
                
           </div>
          
           <div class="three">
            <?php 
             
            $user = $_SESSION["user"];
            $sql1 = mysqli_query($con,"select * from faculty where facultyname ='$user'");
            $row1 = mysqli_fetch_array($sql1);
            $id=$row1["id"];
    
            $sql2= mysqli_query($con,"select * from assignsubject where fid='$id' ");
            $rowcount=mysqli_num_rows($sql2);
            $row2=mysqli_fetch_array($sql2);
            $Subject=$row2["subject"];

            $sql= mysqli_query($con,"select * from syllabus where subject='$Subject' ");
            $rowcount=mysqli_num_rows($sql);
            $row=mysqli_fetch_array($sql);
            ?>
            
             <table>
                 <tr>
                     <th>Class</th>
                     <th>Sem/Year</th>
                     <th>Subject</th>
                     <th>Download Syllabus</th>
                 </tr>
                 <tr>
                 <td><?php echo $row2['course']?></td>
                 <td><?php echo $row2['semester']?></td>
                 <td><?php echo $row2['subject']?></td>
                 <td><?php echo $row['file']?></td>
                 </tr>
             </table>
            
        </div>
        </div>
    </div>
</body>
</html>