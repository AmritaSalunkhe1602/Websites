<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel Of College Management System</title>
    <link rel="stylesheet" href="../CollegeManagementSystem/AdminDashboard.css">
</head>
<body>
    <div class="main">
        <div class="container1">
            <div class="logo">
                <img class="img1" src="../CollegeManagementSystem/Images/delogo.png" alt="img">
                <p class="p1"><?php echo  $_SESSION['user'];?></p>
            </div>
            <div class="one"></div>
            <div class="two"><a href="#">Home</a></div>
            <div class="two"><a href="../CollegeManagementSystem/ACourse.php">Courses</a></div>
            <div class="two"><a href="../CollegeManagementSystem/ASubMgt.php">Subjects</a></div>
            <div class="two"><a href="../CollegeManagementSystem/ASyllabus.php">Syllabus</a></div>
            <div class="two"><a href="../CollegeManagementSystem/ATimetable.php">Time Table</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AFaculty.php">Faculties</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AAssignSubject.php">Assign Subjects</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AStudent.php">Students</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AMarkSheetReport.php">Marksheet Report</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AAttendanceReport.php">Attendance Report</a></div>
            <div class="two"><a href="../CollegeManagementSystem/ASearch.php">Search </a></div>
            <div class="two"><a href="../CollegeManagementSystem/AdminProfile.php">Profile</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AdminLogin.html">LogOut</a></div>
        </div>
        <div class="container2">
            <div class="one">
                <p class="p1">Welcome To College of Education & Knowledge</p>
                <div class="a">
                    <p class="p1">Welcome <?php echo  $_SESSION['user'];?></p>
                    <p class="p2"><a href="../CollegeManagementSystem/ChangePassword.html">Change Password</a></p>
                    <p class="p2"><a href="../CollegeManagementSystem/AdminLogin.html">LogOut</a></p>
               </div>
           </div>
           <div class="two">
               <div class="a">
                   <img src="../CollegeManagementSystem/Images/courses.png" alt="img">
                   <h3>Courses</h3>
                   <p>4</p>
               </div>
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
           </div>
          
           <div class="three">
          
               <div class="one" style="width: 50%;padding: 60px;">
               <form action="AdminDashboard.php" method="post">
                   <label for="receiver">Receiver</label><br><br>
                   <select class="receiver" id="receiver" name="receiver"  style=" width: 460px; padding: 5px;">
                    <option value="Choose " >! --- Choose Here --- !</option>
                    <option value="All" >All</option>
                    <option value="Students" >Students</option>
                    <option value="Faculties">Faculties</option>
                </select><br><br><br>
                   <label for="Message">Message</label><br><br>
                   <textarea name="message" id="Message" cols="60" rows="7" placeholder="Enter Message Here"></textarea><br><br>
                   <input class="btn" type="submit" value="Send Notice" name="send" style="border:  1px solid white; border-radius: 5px;color:white;padding: 5px; width: 150px;background-color:rgb(52, 142, 142) ;">
                </form>
                </div>
           
               <div class="two">
                <div class="a "><p>Notifications</p></div>
                <div class="b">
                <?php
                 $con=mysqli_connect("localhost","root","","clgwebsite");
                 if(isset($_POST['send']))
                {
                      $Receiver = $_POST['receiver'];
                      $Message = $_POST['message'];
            
                      $sql = "insert into anotification(receiver,message) values('$Receiver','$Message')";
                
                     if(mysqli_query($con,$sql)){
                       echo "<script>alert('Record Saved Successfully')</script>";
                       $query = mysqli_query($con,"select * from anotification");
                       $nums = mysqli_num_rows($query);
                      if($nums != 0)
                    {
                        while($res = mysqli_fetch_array($query))
                       {
                        ?>
                        <marquee  direction="up"  behaviour="scroll"  onmouseover="this.stop();"
                        onmouseout="this.start();">
                           <ul>
                                 <a href="#"> <li> <?php echo $res['message'];?></li><br></a>
                           </ul>
                       </marquee>
                        <?php
                         
                       }
                        
                    } 
                
                }
                else{
                    echo "error:".mysqli_error($con);
                }
               
            }
            ?>
                 
                </div>
               </div>
           </div>
           
        </div>
    </div>
</body>
</html>