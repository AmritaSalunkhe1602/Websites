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
    <title>Profile Page on Faculty Panel Of College Management System</title>
    <link rel="stylesheet" href="../CollegeManagementSystem/FacultyProfile.css">
    
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
            <div class="two"><a href="../CollegeManagementSystem/FMySubjects.php">My Subjects</a></div>
            <div class="two"><a href="../CollegeManagementSystem/FInternalMarks.php">Internal Marks</a></div>
            <div class="two"><a href="../CollegeManagementSystem/FAttendance.php">Attendance</a></div>
            <div class="two"><a href="../CollegeManagementSystem/FAssignment.php">Assignments</a></div>
            <div class="two"><a href="#">My Profile</a></div>
            <div class="two"><a href="../CollegeManagementSystem/FacultyLogin.html">LogOut</a></div>
           
        </div>
        <div class="container2">
            <div class="one">             
                <p class="p1">Faculty Profile</p>
                <div class="a">                  
                   <button  type="submit"  id="MyBtn"  class="myBtn editdetails">Edit Details</button>  
               </div>
           </div>
           
           <div id="course-modal" class="modal">
            <div id="modal-content">
                <div id="modal-header">
                    <p class="modal-close" >&times;</p>
                    <p class="modal-heading">Edit Faculty Profile</p>
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
                        <input class="input4" type="password" name="pass" id="pass" value="" >
                        
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
        $sql1 = mysqli_query($con,"select * from faculty where facultyname ='$user'");
        $row1 = mysqli_fetch_array($sql1);
        $id=$row1["id"];

        $sql2= mysqli_query($con,"select * from assignsubject where fid='$id' ");
        $rowcount=mysqli_num_rows($sql2);
        $row2=mysqli_fetch_array($sql2);
        
        $sql= mysqli_query($con,"select * from faculty where id='$id' ");
        $rowcount=mysqli_num_rows($sql);
        $row=mysqli_fetch_array($sql);
        ?>
           <div class="two">
                   <table class="table1">
                       <tr class="tr">
                           <td class="td1" rowspan="6"><img src="../CollegeManagementSystem/Images/<?php echo $row1['photo'];?>" width="150px" height="150px" "></td>
                         <td class="td2">Faculty Id:</td>
                           <td class="td3"><?php echo $row['id']?></td>
                       </tr>
                       <tr>
                           
                           <td class="td2">Faculty Name :</td>
                           <td class="td3"><?php echo $row['facultyname']?></td>
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
                           <td class="td2">Qualification :</td>
                           <td class="td3"><?php echo $row['qualification']?></td>
                          <td class="td2">Experience :</td>
                          <td class="td3"><?php echo $row['experience']?></td>
                       </tr>
                       <tr>
                        <td class="td2">Course :</td>
                        <td class="td3"><?php echo $row2['course']?></td>
                        <td class="td2">Semester/Year :</td>
                          <td class="td3"><?php echo $row2['semester']?></td>
                        
                    </tr>
                    <tr>
                        <td class="td2">Subject :</td>
                          <td class="td3"><?php echo $row2['subject']?></td>
                          <td class="td2">Position :</td>
                          <td class="td3"><?php echo $row2['position']?></td>
                       
                    </tr>
                    <tr>
                        <td class="td2">Password :</td>
                          <td class="td3"><?php echo $row['id']?></td>
                          
                       
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