<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Panel Of College Management System</title>
    <link rel="stylesheet" href="../CollegeManagementSystem/StudentDashboard.css">
</head>
<body>
    <div class="main">
        <div class="container1">
            <div class="logo">
                <img class="img1" src="../CollegeManagementSystem/Images/delogo.png" alt="img"><br>
                <p class="p1"><?php echo  $_SESSION['user'];?></p>
            </div>
            <div class="one"></div>
            <div class="two"><a href="#">Home</a></div>
            <div class="two"><a href="../CollegeManagementSystem/SMySubject.php">My Subjects</a></div>
             <div class="two"><a href="../CollegeManagementSystem/STimetable.php">Time Table</a></div>
            <div class="two"><a href="../CollegeManagementSystem/SMarkSheet.php">MarkSheet</a></div>
            <div class="two"><a href="../CollegeManagementSystem/SMyProfile.php">My Profile</a></div>
            <div class="two"><a href="../CollegeManagementSystem/SAssignment.php">Assignments</a></div>
            <div class="two"><a href="../CollegeManagementSystem/StudentLogin.html">LogOut</a></div>
        </div>
        <div class="container2">
            <div class="one">
                <p class="p1">Welcome To College of Education & Knowledge</p>
                <div class="a">
                    <p class="p1">Welcome <?php echo  $_SESSION['user'];?></p>
                    <p class="p2"><a href="../CollegeManagementSystem/ChangePassword.html">Change Password</a></p>
                    <p class="p2"><a href="../CollegeManagementSystem/StudentLogin.html">LogOut</a></p>
               </div>
           </div>
           <div class="two">
               <div class="a">
                   <img src="../CollegeManagementSystem/Images/studenticon.png" alt="img">
                   <h3>Students</h3>
                   <p>4</p>
               </div>
               <div class="a">
                <img src="../CollegeManagementSystem/Images/faculty.webp" alt="img">
                <h3>Faculties</h3>
                <p>4</p>
               </div>
               <div class="a">
                <img src="../CollegeManagementSystem/Images/subjects.webp" alt="img">
                <h3>Subjects</h3>
                <p>4</p>
               </div>
               <div class="a">
                <img src="../CollegeManagementSystem/Images/admission.jpg" alt="img">
                <h3>Notifications</h3>
                <p>4</p>
               </div>
           </div>

           <div class="three">
            <div class="a "><p>Notifications</p></div>
            <div class="b">
             <marquee  direction="up"  behaviour="scroll"  onmouseover="this.stop();"
             onmouseout="this.start();">
                 <ul>
                     <a href="#"> <li>veritatis vel non impedit minus, ducimus modi repudiandae, nihil commodi. Corporis accusantium dicta dolor vel placeat reiciendis.</li><br></a>
                     <a href="#"><li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur dolor, sint fugiat aliquid </li><br></a>
                     <a href="#">  <li>nihil commodi. Corporis accusantium dicta dolor vel placeat reiciendis. </li><br></a>
                     <a href="#"><li>The Farewell Party arranged for MSc arranged on 8th may,2022</li><br></a>
                     <a href="#"><li>Result Announcement</li><br></a>
                     <a href="#"> <li>Admission Process Will be start on 12 June,2022</li><br></a>
                     <a href="#"><li>Launching New Courses</li><br></a>
                     <a href="#"><li>Convacation Function 2022</li><br></a>
                     <a href="#"><li>Lorem ipsum dolor sit amet consectetur</li><br></a>
                     <a href="#"><li> adipisicing elit. Distinctio quae sint qui dolorum perferendis .</li><br></a>
                     <a href="#"><li>dicta aperiam praesentium sit ea nam esse ad recusandae est debitis laborum quo adipisci, amet veritatis</li><br></a>
                 </ul>
             </marquee>
            </div>
           </div>
           
        </div>
    </div>
</body>
</html>