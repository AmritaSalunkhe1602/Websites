<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile page On Admin Panel of College Management System</title>
    <link rel="stylesheet" href="../CollegeManagementSystem/AdminProfile.css">
    
</head>
<body>
    <div class="main" >
        <div class="container1">
            <div class="logo">
                <img class="img1" src="../CollegeManagementSystem/Images/delogo.png" alt="img">
                <p class="p1">Administrator</p>
            </div>
            <div class="one"></div>
            <div class="two"><a href="../CollegeManagementSystem/AdminDashboard.php">Home</a></div>
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
            <div class="two"><a href="#">Profile</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AdminLogin.html">LogOut</a></div>
        </div>
        <div class="container2">
            <div class="one">             
                <p class="p1">Admin Profile</p>
                <div class="a">                  
                   <button  type="submit"  id="MyBtn"  class="myBtn editdetails">Edit Details</button>  
               </div>
           </div>
           
           <div id="course-modal" class="modal">
            <div id="modal-content">
                <div id="modal-header">
                    <p class="modal-close" >&times;</p>
                    <p class="modal-heading">Edit Admin Profile</p>
                </div>
             <div id="modal-body">
                 <form action="">   
                     <div class="form-group">
                        <label for="collegename">College Name :</label>
                        <input class="input1" type="text" id="collegename" name="collegename">
                        
                    </div>
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
                    
                        <button class="button" type="submit" >Update Details</button>
                    </div>
                 </form>
             </div>
            </div>
        

           <div class="two">
                   <table class="table1">
                       <tr class="tr">
                           <td class="td1" rowspan="6"><img src="../CollegeManagementSystem/Images/delogo.png" height="200px" width="200px" alt="img"></td>
                           <td class="td2">College Name :</td>
                           <td class="td3">Shivaji University,Kolhapur</td>
                       </tr>
                       <tr>
                           
                           <td class="td2">Email Id :</td>
                           <td class="td3">info@heavenuni.ac.in</td>
                       </tr>
                       <tr>
                          
                           <td class="td2">Contact No :</td>
                           <td class="td3">+91-79-67798756</td>
                       </tr>
                       <tr>
                           
                           <td class="td2">Website :</td>
                           <td class="td3"><a href="#">https://heavenuni.ac.in/</a></td>
                       </tr>
                       <tr>
                           
                           <td class="td2">Address :</td>
                           <td class="td3">Shivaji University ,Vidyanagar,Kolhapur - 415124</td>
                       </tr>
                       <tr>
                          
                           
                   </table>

                   <table class="table2">
                       <tr>
                           <td class="td2">Facebook :</td>
                           <td class="td3"><a href="#">https://www.facebook.com/HeavenUni/</a></td>
                          
                       </tr>
                       <tr>
                        <td class="td2">Instagram</td>
                        <td class="td3"><a href="#">https://www.instagram.com/HeavenUni/</a></td>
                        
                    </tr>
                    <tr>
                        <td class="td2">Twitter</td>
                        <td class="td3"><a href="#">https://www.twitter.com/HeavenUni/</a></td>
                       
                    </tr>
                    <tr>
                        <td class="td2">Linkdin</td>
                        <td class="td3"><a href="#">https://www.linkdin.com/HeavenUni/</a></td>
                        
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