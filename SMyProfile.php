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
    <title>Profile Page on Student Panel Of College Management System</title>
    <link rel="stylesheet" href="../CollegeManagementSystem/SMyProfile.css">
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
            <div class="two"><a href="../CollegeManagementSystem/SMarkSheet.php">MarkSheet</a></div>
            <div class="two"><a href="#">My Profile</a></div>
            <div class="two"><a href="../CollegeManagementSystem/SAssignment.php">Assignments</a></div>
            <div class="two"><a href="../CollegeManagementSystem/StudentLogin.html">LogOut</a></div>
        </div>
        <div class="container2">
            <div class="one">             
                <p class="p1">Student Profile</p>
                <div class="a">                  
                   <button  type="submit"  id="MyBtn"  class="myBtn editdetails">Edit Details</button>  
               </div>
           </div>
           
           <div id="course-modal" class="modal">
            <div id="modal-content">
                <div id="modal-header">
                    <p class="modal-close" >&times;</p>
                    <p class="modal-heading">Edit Student Profile</p>
                </div>
             <div id="modal-body">
                 <form action="">   
                     
                    <div class="form-group">
                        <label for="email">Email Id :</label>
                       <input class="input2" type="email" name="email" id="email" >
                      
                    </div>
                    <div class="form-group">
                       <label for="contact">Contact Number:</label>
                        <input class="input3" type="number" id="contact" name="contact" >
                    </div>
                   
                    <div class="form-group">
                        <label for="pass">Password :</label>
                        <input class="input4" type="password" name="pass" id="pass" >
                        
                     </div>
                     <div class="form-group">
                         <label for="address">Address :</label>
                        <input class="input5" type="text" name="address" id="address">
                       
                     </div>
                     
                    <div class="line"></div>
                    <div class="form-group ">
                        <label for="photo">Photo :</label>
                        <input type="file" name="photo" id="photo">
                        <button class="button" type="submit" >Update Details</button>
                    </div>
                 </form>
             </div>
            </div>
        </div> 

        <?php 
        $user = $_SESSION["user"];
        $sql1 = mysqli_query($con,"select * from student where fname ='$user'");
        $row1 = mysqli_fetch_array($sql1);
        $id=$row1["rollno"];

       
        
        $sql= mysqli_query($con,"select * from student where rollno='$id' ");
        $rowcount=mysqli_num_rows($sql);
        $row=mysqli_fetch_array($sql);
        ?>
           <div class="two">
                   <table class="table1">
                       <tr class="tr">
                           <td class="td1" rowspan="6"><img src="../CollegeManagementSystem/Images/<?php echo $row['photo'];?>" width="200px" height="200px" "></td>

                           <td class="td2">Roll No:</td>
                           <td class="td3"><?php echo $row['rollno']?></td>
                       </tr>
                       <tr>
                           
                           <td class="td2">Student Name :</td>
                           <td class="td3"><?php echo $row['fname']?></td>
                       </tr>
                       <tr>
                          
                           <td class="td2">Address :</td>
                           <td class="td3"><?php echo $row['city']?></td>
                       </tr>
                       <tr>
                           
                           <td class="td2">Email Id :</td>
                           <td class="td3"><?php echo $row['emailid']?></td>
                       </tr>
                       <tr>
                           
                           <td class="td2">Date Of Birth :</td>
                           <td class="td3"><?php echo $row['dob']?></td>
                       </tr>
                       <tr>
                           <td class="td2">Contact No :</td>
                           <td class="td3"><?php echo $row['contact']?></td>
                       </tr>
                          
                           
                   </table>

                   <table class="table2">

                       <tr>
                        <td class="td2">Course :</td>
                        <td class="td3"><?php echo $row['course']?></td>
                        <td class="td2">Semester/Year :</td>
                          <td class="td3"><?php echo $row['semester']?></td>
                        
                    </tr>
                    <tr>
                        <td class="td2">Father's Name :</td>
                        <td class="td3"><?php echo $row['fathername']?></td>
                       <td class="td2">Father's Occupation :</td>
                       <td class="td3"><?php echo $row['fatheroccupation']?></td>
                    </tr>
                    <tr>
                        <td class="td2">Mother's Name :</td>
                          <td class="td3"><?php echo $row['mothername']?></td>
                          <td class="td2">Mother's Occupation :</td>
                          <td class="td3"><?php echo $row['motheroccupation']?></td>
                       
                    </tr>
                    <tr>
                        <td class="td2">Subjects</td>
                        <td class="td3"><?php echo $row['subject']?></td>
                        <td class="td2">Password :</td>
                        <td class="td3"><?php echo $row['rollno']?></td>
                    </tr>
                   </table>
           </div>
               
        
           
        </div>
    </div>

    <script >
        var modal=document.getElementById('course-modal');
        var openModal=document.getElementById('MyBtn');
        var  closeModal=document.querySelector('.modal-close');

       openModal.onclick= function(){
                           modal.style.display='block';
                        }
        closeModal.onclick=function(){
                           modal.style.display='none';
                        }
        window.onclick=function(e){
                           if(e.target==modal){
                                        modal.style.display='none';
                                     }
                                   }
    </script>
</body>
</html>