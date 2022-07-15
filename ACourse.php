

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Page On Admin Dashboard Of College Management System</title>
    <link rel="stylesheet" href="../CollegeManagementSystem/ACourse.css">
    
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
            <div class="two"><a href="#">Courses</a></div>
            <div class="two"><a href="../CollegeManagementSystem/ASubMgt.php">Subjects</a></div>
            <div class="two"><a href="../CollegeManagementSystem/ASyllabus.php">Syllabus</a></div>
            <div class="two"><a href="../CollegeManagementSystem/ATimetable.php">Time Table</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AFaculty.php">Faculties</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AAssignSubject.php">Assign Subjects</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AStudent.php">Students</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AMarkSheetReport.php">Marksheet Report</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AAttendanceReport.php">Attendance Report</a></div>
            <div class="two"><a href="../CollegeManagementSystem/ASearch.php">Search </a></div>
            <div class="two"><a href="#../CollegeManagementSystem/AdminProfile.php">Profile</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AdminLogin.html">LogOut</a></div>
        </div>
        <div class="container2">
            <div class="one">
                <p class="p1">All Courses</p>
                <div class="a">
                    <button  type="submit"   id="MyBtn">Roll Generator</button>  
                   <button  type="submit"  id="myBtn">Add Course</button>  
               </div>
               
               
               <div id="rollno-model" class="model">
                <div id="model-content">
                    <div id="model-header">
                        <p class="model-close" >&times;</p>
                        <p class="model-heading">Roll number Generator</p>
                    </div>
                 <div id="model-body">
                     <form action="" name="abc">
                         
                         
                        <div class="form-group">
                            <label for="course">Select Course</label>
                            <select class="input5" name="course" id="course">
                                <option value="select sem/year">--- Select Course ---</option>
                                <option value="ba">BA</option>
                                <option value="bcom">BCom</option>
                                <option value="bsc">BSc</option>
                                <option value="msc">MSc</option>
                                <option value="ma">MA</option>
                                <option value="mcom">MCom</option>
                            </select>
                        </div>
                        
                        <table >
                            <tr>
                                <th>Course Code</th>
                                <th>Sem/Year</th>
                                <th>Master Roll Number</th>
                            </tr>
                        </table>

                        <div class="line"></div>
                        <div class="form-group button">
                            <button type="submit" name="rollgenerator" >Save</button>
                        </div>
                     </form>
                 </div>
                </div>
            </div>
             
             


               <div id="course-modal" class="modal">
                <div id="modal-content">
                    <div id="modal-header">
                        <p class="modal-close" >&times;</p>
                        <p class="modal-heading">Add New Course</p>
                    </div>
                 <div id="modal-body">
                     <form action="ACourse.php" method="post" name="xyz">
                         <div class="form-group">
                             <label for="coursecode">Course Code</label>
                             <input class="input1" type="text" id="coursecode" name="coursecode" required>
                         </div>
                         <div class="form-group">
                            <label for="coursename">Course Name</label>
                            <input class="input2" type="text" id="coursename" name="coursename" required>
                        </div>
                        <div class="form-group">
                            <label for="">Select Semesters</label><br>
                           <input type="checkbox" name="semester[]" value="Semester1" >Semester1
                           <input type="checkbox" name="semester[]" value="Semester2" >Semester2
                           <input type="checkbox" name="semester[]" value="Semester3" >Semester3
                           <input type="checkbox" name="semester[]" value="Semester4" >Semester4
                           <input type="checkbox" name="semester[]" value="Semester5" >Semester5
                           <input type="checkbox" name="semester[]" value="Semester6" >Semester6
                           
                        </div>
                        <div class="form-group">
                            <label for="totalsemyear">Total Semester</label>
                            <input class="input4" type="number" id="totalsemyear" name="totalsemyear" required>
                        </div>
                        <div class="line"></div>
                        <div class="form-group button">
                            <input type="submit" name="addcourse" value="AddCourse" >
                        </div>
                     </form>
                 </div>
                </div>
            </div>    
           

           </div>
           <div class="two">
           
           <?php
               $con=mysqli_connect("localhost","root","","clgwebsite");
               if(isset($_POST['addcourse']))
                    {
                      $CourseCode = $_POST['coursecode'];
                      $CourseName = $_POST['coursename'];
                      $Semester = $_POST['semester'];
                      $TotalSemYear = $_POST['totalsemyear'];
                      
                      $sql1 = "insert into dcourse(coursecode,coursename) values('$CourseCode','$CourseName')";
                      $result = mysqli_query($con,$sql1);
                     foreach($Semester as $item){
                        $sql = "insert into course(coursecode,coursename,semester,totalsemester) values('$CourseCode','$CourseName','$item','$TotalSemYear')";
                        $query_run = mysqli_query($con,$sql);

                        
                      }
                     if($query_run)
                    {
                       echo "<script>alert('Record Saved Successfully ');</script>";
                      $query = mysqli_query($con,"select * from course");
                      $nums = mysqli_num_rows($query);
                 
                      if($nums != 0)
                      {
                       ?>
                     <table border=1px solid>
                <tr>
                    <th>Index No.</th>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Semester</th>
                    <th>Total Semester</th>
                </tr>
                
            <?php
            while($res = mysqli_fetch_array($query))
           {
             echo '<tr  height="30px"; style="text-align:center"; >';
             echo '<td >'.$res['id'].'</td>';
             echo '<td>'.$res['coursecode'].'</td>';
             echo '<td>'.$res['coursename'].'</td>';
             echo '<td>'.$res['semester'].'</td>';
             echo '<td>'.$res['totalsemester'].'</td>';
             echo  '</tr>'; 
           }
         
        } 
    }

    else{
        echo "error:".mysqli_error($con);
    }

}
?>
</table>
        </div>
        
           
        </div>
    </div>
    <script >
       var model=document.getElementById('rollno-model');
        var openModel=document.getElementById('MyBtn');
        var  closeModel=document.querySelector('.model-close');

       openModel.onclick= function(){
                           model.style.display='block';
                        }
        closeModel.onclick=function(){
                           model.style.display='none';
                        }
        window.onclick=function(e){
                           if(e.target==model){
                                        model.style.display='none';
                                     }
                                   } 
                                   
                                   
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


