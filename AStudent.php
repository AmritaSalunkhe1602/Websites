<?php
            $con=mysqli_connect("localhost","root","","clgwebsite");
  ?>
 <?php
            $query1 = "select rollno from student order by rollno desc ";
            $result = mysqli_query($con,$query1);
            $row = mysqli_fetch_array($result);
            $lastid = $row['rollno'];
            if(empty($lastid))
            {
                $number = "PRN001";
            }
            else{
                $idd = str_replace("PRN","",$lastid);
                $id = str_pad($idd + 1,3,0, STR_PAD_LEFT);
                $number = 'PRN' .$id;
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student page On Admin Panel of College Management System</title>
    <link rel="stylesheet" href="../CollegeManagementSystem/AStudent.css">
    <script src="../CollegeManagementSystem/jquery.main.js"></script>
<script>
    function getSubject(val){
        $.ajax({
            type:"POST",
            url:"getSubject.php",
            data:'course_id='+val,
            success:function(data){
                $("#subject-list").html(data);
                
            }
        });
    }
</script>
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
            <div class="two"><a href="#">Students</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AMarkSheetReport.php">Marksheet Report</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AAttendanceReport.php">Attendance Report</a></div>
            <div class="two"><a href="../CollegeManagementSystem/ASearch.php">Search </a></div>
            <div class="two"><a href="../CollegeManagementSystem/AdminProfile.php">Profile</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AdminLogin.html">LogOut</a></div>
        </div>
        <div class="container2">
            <div class="one">
                <p class="p1">All Students</p>
                <div class="a">
                   <button  type="submit"    id="myBtn">Add Student</button>  
               </div>

               <div id="course-modal" class="modal">
                <div id="modal-content">
                    <div id="modal-header">
                        <p class="modal-close" >&times;</p>
                        <p class="modal-heading">Add New Student</p>
                    </div>
                 <div id="modal-body">
                     <form action="AStudent.php" method="post" >
                         <div class="form-group">
                            <select class="input1" name="course" id="course-list"  onChange="getSubject(this.value);">
                                <option value disabled selected> Select Course </option>
                                <?php
                               $query = "select * from dcourse" ;
                               $result = mysqli_query($con,$query);
                              foreach($result as $course){
                              ?>
                              <option value="<?php echo $course["coursecode"]; ?>"><?php echo $course["coursename"]; ?></option>
                              <?php
                             }
                             ?> 
                               </select>
                            <select class="input2" name="semester" id="semester-list" >
                                <option value=""> Select Semester </option>
                                <option value="Semester1">Semester1</option>
                                   <option value="Semester2">Semester2</option>
                                   <option value="Semester3">Semester3</option>
                                   <option value="Semester4">Semester4</option>
                                   <option value="Semester5">Semester5</option>
                                   <option value="Semester6">Semester6</option>
                            </select>
                         </div>
                         <div class="form-group">
                            <label for="rollno">Roll Number :</label>
                            <input class="input3" type="text" id="rollno" value="<?php echo  $number;?>" name="rollno" readonly>
                            <select class="input4" name="subject" id="subject-list">
                                <option value=""> Select  Subject </option>

                            </select>
                        </div>
                        
                        <div class="form-group">
                           <input class="input5" type="text" name="fname" id="fname" placeholder="First Name" required>
                           <input class="input6" type="text" name="lname" id="lname" placeholder="Last Name" required>
                        </div>
                        <div class="form-group">
                            <input class="input7" type="email" name="email" id="email" placeholder="Email ID" required>
                            <input class="input8" type="number" id="number" name="number" placeholder="Contact Number" required>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth :</label>
                            <input class="input9" type="date" id="dob" name="dob" required>
                            <select class="input10" name="gender" id="gender" >
                                <option value="select gender">--- Select Gender ---</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="input11" type="text" name="state" id="state" placeholder="State" required>
                            <input class="input12" type="text" name="city" id="city" placeholder="City" required>
                         </div>
                         <div class="form-group">
                            <input class="input13" type="text" name="fathername" id="fathername" placeholder="Father Name" required>
                            <input class="input14" type="text" name="foccupation" id="foccupation" placeholder="Father Occupation" required>
                         </div>
                         <div class="form-group">
                            <input class="input15" type="text" name="mothername" id="mothername" placeholder="Mother Name" required>
                            <input class="input16" type="text" name="moccupation" id="moccupation" placeholder="Mother Occupation" required>
                         </div>
                        <div class="line"></div>
                        <div class="form-group ">
                            <label for="photo">Photo :</label>
                            <input type="file" name="photo" id="photo" required>
                            <input class="button" type="submit" name="addstudent"  value="Add Student">
                        </div>
                     </form>
                 </div>
                </div>
            </div>    
           

           </div>
           <div class="two">
            
            
           <?php
            if(isset($_POST['addstudent']))
            {
                $Course = $_POST['course'];
                $Semester = $_POST['semester'];
                $Rollno = $_POST['rollno'];
                $Subject = $_POST['subject'];
                $FName = $_POST['fname'];
                $LName = $_POST['lname'];
                $EmailId = $_POST['email'];
                $Contact = $_POST['number'];
                $DOB = $_POST['dob'];
                $Gender = $_POST['gender'];
                $State = $_POST['state'];
                $City = $_POST['city'];
                $FatherName = $_POST['fathername'];
                $FatherOccupation = $_POST['foccupation'];
                $MotherName = $_POST['mothername'];
                $MotherOccupation = $_POST['moccupation'];
                $Photo = $_POST['photo'];
            
                $sql = "insert into student(course,semester,rollno,subject,fname,lname,emailid,contact,dob,gender,state,city,fathername,fatheroccupation,mothername,motheroccupation,photo) values('$Course','$Semester','$Rollno','$Subject','$FName','$LName','$EmailId','$Contact','$DOB','$Gender','$State','$City','$FatherName','$FatherOccupation','$MotherName','$MotherOccupation','$Photo')";
                
                if(mysqli_query($con,$sql)){
                    echo "<script>alert('Record Saved Successfully')</script>";
                    $query = mysqli_query($con,"select * from student");
                    $nums = mysqli_num_rows($query);
                    if($nums != 0)
                    {
                        ?>
                            <table border=1px solid>
                            <tr>
                                <th>Course</th>
                                <th>Roll No</th>
                                <th>Student Name</th>
                                <th>Email Id</th>
                                <th>Contact No</th>
                                <th>Address</th>
                            </tr>
                            
                        <?php
                        while($res = mysqli_fetch_array($query))
                       {
                         echo '<tr  height="30px"; style="text-align:center"; >';
                         echo '<td >'.$res['course'].'</td>';
                         echo '<td>'.$res['rollno'].'</td>';
                         echo '<td>'.$res['fname'].'</td>';
                         echo '<td>'.$res['emailid'].'</td>';
                         echo '<td>'.$res['contact'].'</td>';
                         echo '<td>'.$res['city'].'</td>';
                         echo  '</tr>'; 
                       }
                        
                    } 
                }
                else{
                    echo "error:".mysqli_error($con);
                }
               
                $to = $_POST['email'];
                $subject = "Welcome to College of Education & Knowledge . Your Login Credentials are here...";
                $message ="Username = " .$_POST['fname']. " Password = " .$_POST['rollno'];
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