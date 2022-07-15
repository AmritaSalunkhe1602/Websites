<?php
$con=mysqli_connect("localhost","root","","clgwebsite");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Page On Admin Dashboard of college Manaagement System</title>
    <link rel="stylesheet" href="../CollegeManagementSystem/ASubMgt.css">
   
</head>
<body>
    <div class="main" id="blur">
        <div class="container1">
            <div class="logo">
                <img class="img1" src="../CollegeManagementSystem/Images/delogo.png" alt="img">
                <p class="p1">Administrator</p>
            </div>
            <div class="one"></div>
            <div class="two"><a href="../CollegeManagementSystem/AdminDashboard.php">Home</a></div>
            <div class="two"><a href="../CollegeManagementSystem/ACourse.php">Courses</a></div>
            <div class="two"><a href="#">Subjects</a></div>
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
            <div class="z">
                <p class="p1">Subject Management</p>
            </div>
            <div class="one">
                <div class="a">
                 <div class="a3">
                    <button  type="submit"   id="myBtn">Add New Subject</button>  
                   </div>
               </div>
              <div id="course-modal" class="modal">
                <div id="modal-content">
                    <div id="modal-header">
                        <p class="modal-close" >&times;</p>
                        <p class="modal-heading">Add New Subject</p>
                    </div>
                 <div id="modal-body">
                     <form action="ASubMgt.php" method="post">
                         <div class="form-group">
                            <label for="course">Select Course</label>
                            <select class="input6" name="course" id="course">
                           <option value="">Select Course</option>
                           <?php
                                      $query = "select * from dcourse ";
                                       $result =mysqli_query($con,$query);
                                    while ($row = mysqli_fetch_array($result)) {
                                ?>
                                   <option value="<?php echo $row['coursecode']; ?>"><?php echo $row['coursename']; ?></option>
                             <?php
                                   }
                                  
                                ?>
                           </select>
                         </div>
                         <div class="form-group">
                           <label for="semester">Select Sem/Year</label>
                             <select class="input7" name="sem" id="semester">
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
                             <label for="subcode">Subject Code</label>
                             <input class="input1" type="text" id="subcode" name="subcode" required>
                         </div>
                         <div class="form-group">
                            <label for="subname">Subject Name</label>
                            <input class="input2" type="text" id="subname" name="subname" required>
                        </div>
                        <div class="form-group">
                            <label for="coursetype">Course Type</label>
                            <select class="input3" name="coursetype" id="coursetype">
                                <option value="select">--- Select ---</option>
                                <option value="Core">Core</option>
                                <option value="Optional">Optional</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="theorymks">Theory Marks</label>
                            <input class="input4" type="number" id="theorymks" name="theorymks" required>
                        </div>
                        <div class="form-group">
                            <label for="practicalmks">Practical Marks</label>
                            <input class="input5" type="number" id="practicalmks" name="practicalmks" required>
                        </div>
                        <div class="line"></div>
                        <div class="form-group button">
                            <button type="submit" name="addsubject" >Add Subject</button>
                        </div>
                     </form>
                 </div>
                </div>
            </div>    
           

           </div>
           <div class="two">
            <?php
            $con=mysqli_connect("localhost","root","","clgwebsite");
            if(isset($_POST['addsubject']))
            {
                $Course = $_POST['course'];
                $Semester = $_POST['sem'];
                $SubjectCode = $_POST['subcode'];
                $SubjectName = $_POST['subname'];
                $CourseType = $_POST['coursetype'];
                $TheoryMks = $_POST['theorymks'];
                $PracticalMks = $_POST['practicalmks'];

                $query = "insert into subject(course,semester,subjectcode,subjectname,coursetype,theorymarks,practicalmarks) values('$Course','$Semester','$SubjectCode','$SubjectName','$CourseType','$TheoryMks','$PracticalMks')";
                $sql = mysqli_query($con,$query);

                $query1 = "insert into dsubject(subject,course,semestername,subjectname) values('$SubjectName','$Course','$Semester','$SubjectCode')";
                $sql1= mysqli_query($con,$query1);
                
               if($sql){
                   
                    echo "<script>alert('Record Saved Successfully')</script>";
                    $query = mysqli_query($con,"select * from subject");
                    $nums = mysqli_num_rows($query);
                    if($nums != 0)
                    {
                        ?>
                            <table border=1px solid>
                            <tr>
                                <th>Course</th>
                                <th>Semester</th>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Course</th>
                                <th>Theory Marks</th>
                                <th>Practical Marks</th>
                            </tr>
                            
                        <?php
                        while($res = mysqli_fetch_array($query))
                       {
                         echo '<tr  height="30px"; style="text-align:center"; >';
                         echo '<td >'.$res['course'].'</td>';
                         echo '<td >'.$res['semester'].'</td>';
                         echo '<td >'.$res['subjectcode'].'</td>';
                         echo '<td>'.$res['subjectname'].'</td>';
                         echo '<td>'.$res['coursetype'].'</td>';
                         echo '<td>'.$res['theorymarks'].'</td>';
                         echo '<td>'.$res['practicalmarks'].'</td>';
                         echo  '</tr>'; 
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