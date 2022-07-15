<?php
            $con=mysqli_connect("localhost","root","","clgwebsite");
 ?>
<?php
            $query1 = "select * from faculty order by id desc ";
            $result = mysqli_query($con,$query1);
            $row = mysqli_fetch_array($result);
            $lastno = $row['id'];
            if($lastno == " ")
            {
                $srollno = "FACULTY1";
            }
            else{
                $srollno = substr($lastno, 7);
                $srollno = intval($srollno);
                $srollno = "FACULTY" . ($srollno + 1);
            }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty page On Admin Panel of College Management System</title>
    <link rel="stylesheet" href="../CollegeManagementSystem/AFaculty.css">
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
            <div class="two"><a href="#">Faculties</a></div>
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
                <p class="p1">All Faculties</p>
                <div class="a">
                   <button  type="submit"    id="myBtn">Add Faculty</button>  
               </div>

               <div id="course-modal" class="modal">
                <div id="modal-content">
                    <div id="modal-header">
                        <p class="modal-close" >&times;</p>
                        <p class="modal-heading">Add New Faculty</p>
                    </div>
                 <div id="modal-body">
                     <form action="AFaculty.php" method="post">
                         
                         <div class="form-group ">
                            <div class="one">
                                <label for="id">Faculty Id</label><br>
                                <input class="input1" type="text" id="id" value="<?php echo $srollno?>" name="id" readonly>
                            </div>

                            <div class="one">
                                <label for="fname">Faculty Name</label><br>
                                <input class="input2" type="text" name="fname" id="fname" required>
                            </div>
                        </div>
                        <div class="form-group">
                           
                            <div class="one">
                                <label for="state">State</label><br>
                                <input class="input1" type="text" id="state" name="state" required>
                            </div>

                            <div class="one">
                                <label for="city">City</label><br>
                                <input class="input2" type="text" name="city" id="city" required>
                            </div>
                        </div>
                        <div class="form-group">
                           <div class="one">
                               <label for="email">Email Id</label><br>
                            <input class="input1" type="email" name="email" id="email" placeholder="Email ID" required>
                           </div>
                           <div class="one">
                            <label for="contact">Contact Number</label><br>
                            <input class="input2" type="number" id="number" name="number" placeholder="Contact Number" required>
                           </div>
                        </div>
                        <div class="form-group">
                            <div class="one">
                                <label for="dob">Date of Birth :</label><br>
                                <input class="input1" type="date" id="dob" name="dob">
                            </div>
                            <div class="one">
                                <label for="gender">Gender</label><br>
                                <select class="input2" name="gender" id="gender">
                                    <option value="select gender">--- Select Gender ---</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="one">
                                <label for="qualification">Qualification</label><br>
                             <input class="input1" type="text" name="qualification" id="qualification" required>
                            </div>
                            <div class="one">
                             <label for="experience">Experience</label><br>
                             <input class="input2" type="number" id="experience" name="experience" required>
                            </div>
                         </div>

                        <div class="line"></div>
                        <div class="form-group ">
                            <label for="photo">Photo :</label><br>
                            <input type="file" name="photo" id="photo" required>
                            <button class="button" type="submit" name="addfaculty" >Add Faculty</button>
                        </div>
                     </form>
                 </div>
                </div>
            </div>    
           

           </div>
           <div class="two">
            <?php
            $con=mysqli_connect("localhost","root","","clgwebsite");
            if(isset($_POST['addfaculty']))
            {
                $FacultyId = $_POST['id'];
                $FacultyName = $_POST['fname'];
                $State = $_POST['state'];
                $City = $_POST['city'];
                $EmailId = $_POST['email'];
                $Contact = $_POST['number'];
                $DOB = $_POST['dob'];
                $Gender = $_POST['gender'];
                $Qualification = $_POST['qualification'];
                $Experience = $_POST['experience'];
                $Photo = $_POST['photo'];
            
                $sql = "insert into faculty(id,facultyname,state,city,emailid,contact,dob,gender,qualification,experience,photo) values('$FacultyId','$FacultyName','$State','$City','$EmailId','$Contact','$DOB','$Gender','$Qualification','$Experience','$Photo')";
                
                if(mysqli_query($con,$sql)){
                    echo "<script>alert('Record Saved Successfully')</script>";
                    $query = mysqli_query($con,"select * from faculty");
                    $nums = mysqli_num_rows($query);
                    if($nums != 0)
                    {
                        ?>
                            <table border=1px solid>
                            <tr>
                                <th>Faculty Id</th>
                                <th>Faculty Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Contact No</th>
                                <th>Qualification</th>
                                <th>Experience</th>
                            </tr>
                            
                        <?php
                        while($res = mysqli_fetch_array($query))
                       {
                         echo '<tr  height="30px"; style="text-align:center"; >';
                         echo '<td>'.$res['id'].'</td>';
                         echo '<td>'.$res['facultyname'].'</td>';
                         echo '<td>'.$res['city'].'</td>';
                         echo '<td>'.$res['emailid'].'</td>';
                         echo '<td>'.$res['contact'].'</td>';
                         echo '<td>'.$res['qualification'].'</td>';
                         echo '<td>'.$res['experience'].'</td>';
                         echo  '</tr>'; 
                       }
                        
                    } 
                
                }
                else{
                    echo "error:".mysqli_error($con);
                }
               
                $to = $_POST['email'];
                $subject = "Welcome to College of Education & Knowledge . Your Login Credentials are here...";
                $message ="Username = " .$_POST['fname']. " Password = " .$_POST['id'];
                $from ="salunkheaa2020@gmail.com";
                $headers ="From : $from ";
                mail($to, $subject, $message, $headers);
            }
            
            ?>
            </table>
           </div>
        
           
        </div>
    </div>




    <script >
        var modal=document.getElementById('course-modal');
        var openModal=document.getElementById('myBtn');
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