<?php
$con=mysqli_connect("localhost","root","","clgwebsite");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attenance Report On Admin Dashboard of College Management System</title>
    <link rel="stylesheet" href="../CollegeManagementSystem/AAttendanceReport.css">
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
            <div class="two"><a href="../CollegeManagementSystem/AStudent.php">Students</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AMarkSheetReport.php">Marksheet Report</a></div>
            <div class="two"><a href="#">Attendance Report</a></div>
            <div class="two"><a href="../CollegeManagementSystem/ASearch.php">Search </a></div>
            <div class="two"><a href="../CollegeManagementSystem/AdminProfile.php">Profile</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AdminLogin.html">LogOut</a></div>
        </div>
        <div class="container2">
            <div class="z">
                <p class="p1">Attendance Report</p>
            </div>
        
            <form action="AAttendanceReport.php" method="post">
            <div id="subjectwise" class="subjectwise">
                <div class="one">
                    <div class="a">
                       <div class="a1">
                           <label for="course">Select Course</label>
                           <select name="course" id="course-list" onChange="getSubject(this.value);" style="margin-left:50px;width:800px;height:30px;">
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
                       <div class="a1">
                           <label for="">Select Sem/Year</label>
                           <select name="semester" id="semester-list" style="margin-left:30px;width:800px;height:30px;">
                            <option value="">Select Semester</option>
                            <option value="Semester1">Semester1</option>
                            <option value="Semester2">Semester2</option>
                            <option value="Semester3">Semester3</option>
                            <option value="Semester4">Semester4</option>
                            <option value="Semester5">Semester5</option>
                            <option value="Semester6">Semester6</option>
                       </select>
                       </div>
                    <div class="a1">
                        <label for="subject">Subject</label>
                        <select name="subject" name="subject" id="subject-list" style="margin-left:100px;width:800px;height:30px;">
                         <option value=""> Select Subject </option>
                     </select>
                       </div>
                    </div>
                       <button  type="submit" name="search"  class="MyBtn1">Fetch Details</button>
              </form >
               </div>
              <div class="two">
                   <table>
                       <tr>
                           <th>Roll No</th>
                           <th>Student Name</th>
                           <th>Class</th>
                           <th>Subject</th>
                           <th>Attendance Date</th>
                           <th>Attendance</th>
                       </tr>
                       
                 <?php
                      $con = mysqli_connect("localhost","root","","clgwebsite");
                       if(isset($_POST['search']))
                          { $Subject = $_POST['subject'];
                             $query = "select * from fattendance where subject = '$Subject'";
                            $sql = mysqli_query($con,$query);
                            
                        if(mysqli_num_rows($sql) > 0)
                       {
                           while($row = mysqli_fetch_array($sql))
                           {
                             
                       ?>
                        <tr style="text-align:center">
                             <td><?php  echo $row['srollno']; ?></td>
                             <td><?php echo $row['name']; ?></td>
                             <td><?php echo $row['course']; ?></td>
                             <td><?php  echo $row['subject']; ?></td>
                             <td><?php  echo $row['attendate']; ?></td>
                             <td><?php echo $row['attendance'];?></td>
                         </tr>
                          <?php
                            }
                         }
                         else
                         { 
                             ?>
                             <tr><td colspan="3">No record Found</td></tr>
                             <?php
                            
                         }
                     }
                     ?>
              
                   </table>
    
                   
               </div>
            </div>


        
           
        </div>
    </div>
   

</body>
</html>