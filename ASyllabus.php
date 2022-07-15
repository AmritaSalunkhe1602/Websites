<?php
$con=mysqli_connect("localhost","root","","clgwebsite");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSyllabus Page On Admin Dashboard of College Management System</title>
    <link rel="stylesheet" href="../CollegeManagementSystem/ASyllabus.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <div class="two"><a href="#">Syllabus</a></div>
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
                <p class="p1">Syllabus</p> 
                <button  type="submit"   id="MyBtn1">Upload Syllabus</button>
            </div>
        
               <div id="course-modal" class="modal">
                <div id="modal-content">
                    <div id="modal-header">
                        <p class="modal-close" >&times;</p>
                        <p class="modal-heading">Upload Syllabus</p>
                    </div>
                 <div id="modal-body">
                     <form action="ASyllabus.php" method="post">
                         
                        <div class="form-group">
                            <label for="course">Select Course</label>
                            <select class="input1" name="course" id="course-list" onChange="getSubject(this.value);">
                                <option value disabled selected> Select Course </option>
                                <?php
                               $query = "select * from dcourse" ;
                               $result = mysqli_query($con,$query);
                              foreach($result as $course){
                              ?>
                              <option value="<?php echo $course["coursecode"]; ?>"><?php echo $course["coursename"]; ?></option>
                              <?php
                             }
                             ?>  </select>
                        </div>
                        <div class="form-group">
                            <label for="sem">Select Semester</label>
                            <select class=" input2" name="sem" id="semester-list">
                                <option value=""> Select Semester</option>
                                <option value="Semester1">Semester1</option>
                                   <option value="Semester2">Semester2</option>
                                   <option value="Semester3">Semester3</option>
                                   <option value="Semester4">Semester4</option>
                                   <option value="Semester5">Semester5</option>
                                   <option value="Semester6">Semester6</option>
                              </select>
                        </div>
                        <div class="form-group">
                            <label for="subject">Select Subject</label>
                            <select class="input1" name="subject" id="subject-list">
                                <option value=""> Select Subject</option>                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="file">Upload File :</label>
                           <input type="file" name="file" id="file" required>
                        </div>
                        
                        <div class="line"></div>
                        <div class="form-group button">
                            
                            <button type="submit" name="upload">Upload Syllabus</button>
                        </div>
                     </form>
                 </div>
                </div>
            </div> 


               <div class="two">
                <?php
                $con=mysqli_connect("localhost","root","","clgwebsite");
                if(isset($_POST['upload']))
                {
                    $Course = $_POST['course'];
                    $Semester = $_POST['sem'];
                    $Subject = $_POST['subject'];
                    $File = $_POST['file'];
                
                    $sql = "insert into syllabus(course,semester,subject,file) values('$Course','$Semester','$Subject','$File')";
                    
                    if(mysqli_query($con,$sql)){
                        echo "<script>alert('Record Saved Successfully')</script>";
                        $query = mysqli_query($con,"select * from syllabus");
                    $nums = mysqli_num_rows($query);
                    if($nums != 0)
                    {
                        ?>
                            <table border=1px solid>
                            <tr>
                                <th>Index No</th>
                                <th>Course</th>
                                <th>Semetser</th>
                                <th>Subject</th>
                                <th>File</th>
                            </tr>
                            
                        <?php
                        while($res = mysqli_fetch_array($query))
                       {
                         echo '<tr  height="30px"; style="text-align:center"; >';
                         echo '<td >'.$res['id'].'</td>';
                         echo '<td>'.$res['course'].'</td>';
                         echo '<td>'.$res['semester'].'</td>';
                         echo '<td>'.$res['subject'].'</td>';
                         echo '<td>'.$res['file'].'</td>';
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
        var openModal=document.getElementById('MyBtn1');
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