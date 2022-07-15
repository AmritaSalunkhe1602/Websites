<?php
$con=mysqli_connect("localhost","root","","clgwebsite");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Table Page On Admin Dashboard</title>
    <link rel="stylesheet" href="../CollegeManagementSystem/ATimeTable.css">
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
            <div class="two"><a href="#">Time Table</a></div>
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
                <p class="p1">Time Table</p> 
            </div>
        
            <div id="subjectwise" class="subjectwise">
                <div class="one">
                   <button  type="submit"   id="MyBtn1">Define Period</button>
           
               </div>

              
               <div id="course-modal" class="modal">
                <div id="modal-content">
                    <div id="modal-header">
                        <p class="modal-close" >&times;</p>
                        <p class="modal-heading">Set Time Table</p>
                    </div>
                 <div id="modal-body">
                     <form action="ATimeTable.php" method="post">
                         <div class="form-group">
                         <label for="course">Select Course</label>
                           <select name="course" id="course-list" style="width:200px;height:30px"  onChange="getSubject(this.value);" >
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
                         </div>
                         <div class="form-group">
                           <label for="semester">Select Semester</label>
                           <select name="semester" id="semester-list" style="width:200px;height:30px" >
                            <option value="" > Select Semester</option>
                            <option value="Semester1">Semester1</option>
                                   <option value="Semester2">Semester2</option>
                                   <option value="Semester3">Semester3</option>
                                   <option value="Semester4">Semester4</option>
                                   <option value="Semester5">Semester5</option>
                                   <option value="Semester6">Semester6</option>
                        </select>
                         </div>
                        <div class="form-group">
                            <label for="lecture">Select Lecture</label>
                            <select class="input1" name="lecture" id="lecture">
                                <option value="select">--- Select Period---</option>
                                <option value="lecture1">Lecture1</option>
                                <option value="lecture2">Lecture2</option>
                                <option value="lecture3">Lecture3</option>
                                <option value="lecture4">Lecture4</option>
                                <option value="lecture5">Lecture5</option>
                                <option value="lecture6">Lecture6</option>
                                <option value="lecture7">Lecture7</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="days">Select Days</label>
                            <input type="checkbox" name="days[]" id="mon" value="Monday"> 
                            <label  for="mon">Monday</label><br>
                            <input class="input" type="checkbox" name="days[]" id="tues" value="Tuesday">
                            <label for="tues">Tuesday</label><br>
                            <input class="input" type="checkbox" name="days[]" id="wed" value="Wednesday">
                            <label for="wed">Wednesday</label><br>
                            <input class="input" type="checkbox" name="days[]" id="thurs" value="Thursday">
                            <label for="thurs">Thursday</label><br>
                            <input class="input" type="checkbox" name="days[]" id="fri" value="Friday">
                            <label for="fri">Friday</label><br>
                            <input class="input" type="checkbox" name="days[]" id="sat" value="Saturday">
                            <label for="sat">Saturday</label>
                        </div>
                        <div class="form-group">
                            <label for="subject">Select Subject</label>
                            <select class="input1" name="subject" id="subject-list">
                                <option value=""> Select Subject</option>
                            </select>
                        </div>
                        <div class="line"></div>
                        <div class="form-group button">
                            <button type="submit" >Free Lecture</button>
                            <button type="submit" name="save">Save Lecture</button>
                        </div>
                     </form>
                 </div>
                </div>
            </div> 


               <div class="two">
                <?php
                $con=mysqli_connect("localhost","root","","clgwebsite");
                if(isset($_POST['save']))
                {
                    $Course = $_POST['course'];
                    $Semester =$_POST['semester'];
                    $Lecture = $_POST['lecture'];
                    $Days = $_POST['days'];
                    $AllDays = implode("," ,$Days);
                    $Subject = $_POST['subject'];
                    
                        $sql = "insert into timetable(course,semester,lecture,days,subjects) values('$Course','$Semester','$Lecture','$AllDays','$Subject')";
                        $query_run = mysqli_query($con,$sql);
                   
                    if( $query_run){
                        echo "<script>alert('Record Saved Successfully')</script>";
                        $query = mysqli_query($con,"select * from timetable");
                        $nums = mysqli_num_rows($query);
                        if($nums != 0)
                        {
                            ?>
                                <table border=1px solid>
                                <tr>
                                    <th>Index No</th>
                                    <th>Course</th>
                                    <th>Semester</th>
                                    <th>lecture</th>
                                    <th>Days</th>
                                    <th>Subject</th>
                                </tr>
                                
                            <?php
                            while($res = mysqli_fetch_array($query))
                           {
                             echo '<tr  height="30px"; style="text-align:center"; >';
                             echo '<td >'.$res['id'].'</td>';
                             echo '<td>'.$res['course'].'</td>';
                             echo '<td>'.$res['semester'].'</td>';
                             echo '<td>'.$res['lecture'].'</td>';
                             echo '<td>'.$res['days'].'</td>';
                             echo '<td>'.$res['subjects'].'</td>';
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