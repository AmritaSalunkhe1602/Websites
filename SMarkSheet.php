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
    <title>Marksheet Page on Student Panel Of College Management System</title>
    <link rel="stylesheet" href="../CollegeManagementSystem/SMarkSheet.css">
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
            <div class="two"><a href="../CollegeManagementSystem/STimetable.php">Time Table</a></div>
            <div class="two"><a href="#">MarkSheet</a></div>
            <div class="two"><a href="../CollegeManagementSystem/SMyProfile.php">My Profile</a></div>
            <div class="two"><a href="../CollegeManagementSystem/SAssignment.php">Assignments</a></div>
            <div class="two"><a href="../CollegeManagementSystem/StudentLogin.html">LogOut</a></div>
        </div>
        <div class="container2">
            <div class="one">
                <p class="p1">Marksheet</p>
                <button id="mybtn">DownLoad</button>
           </div>
           <div class="two">
           <?php 
             
             $user = $_SESSION["user"];
             $sql1 = mysqli_query($con,"select * from student where fname ='$user'");
             $row1 = mysqli_fetch_array($sql1);
             $rollno=$row1["rollno"];
     
            
             
             $sql= mysqli_query($con,"select * from finternalmarks where rollno='$rollno' ");
             $rowcount=mysqli_num_rows($sql);
             $row=mysqli_fetch_array($sql);
             
             ?>
                <table>
                    <tr>
                        <td class="td2">Roll No:</td>
                        <td class="td3"><?php echo $row1['rollno']?></td>
                        <td class="td2">Student Name</td>
                        <td class="td3"><?php echo $row1['fname']?></td>
                        <td rowspan="3"><img src="../CollegeManagementSystem/Images/<?php echo $row1['photo'];?>" width="100px" height="100px" alt="Image" "></td>
                    </tr>
                    <tr>
                        <td class="td2">Course</td>
                        <td class="td3"><?php echo $row1['course']?></td>
                        <td class="td2">Date Of Birth</td>
                        <td class="td3"><?php echo $row1['dob']?></td>
                    </tr>
                    <tr>
                        <td class="td2">Father's Name</td>
                        <td class="td3"><?php echo $row1['fathername']?></td>
                        <td class="td2">Mother's Name</td>
                        <td class="td3"><?php echo $row1['mothername']?></td>
                    </tr>
                </table>
           </div>
           <div class="three">
               <table>
                   <tr>
                       <th>Course</th>
                       <th>Subject Name</th>
                       <th>Theory Marks</th>
                       <th>Practical Marks</th>
                       <th>Total Max Marks</th>
                       <th>Obtained Total</th>
                   </tr>
                   <tr>
                       <td><?php echo $row['course']?></td>
                       <td><?php echo $row['subject']?></td>
                       <td><?php echo $row['theorymarks']?></td>
                       <td><?php echo $row['practicalmarks']?></td>
                       <td><?php echo $row['maxtheorymarks'] + $row['maxpracticalmarks']?></td>
                       <td><?php echo $row['theorymarks'] + $row['practicalmarks']?></td>
                   </tr>
               </table>
           </div>

           
           
        </div>
    </div>
</body>
</html>