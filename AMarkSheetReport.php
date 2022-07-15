<?php
$con=mysqli_connect("localhost","root","","clgwebsite");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarkSheet Report Page On Admin Dashboard of College Management System</title>
    <link rel="stylesheet" href="../CollegeManagementSystem/AMarkSheetReport.css">
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
            <div class="two"><a href="#">Marksheet Report</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AAttendanceReport.php">Attendance Report</a></div>
            <div class="two"><a href="../CollegeManagementSystem/ASearch.php">Search </a></div>
            <div class="two"><a href="../CollegeManagementSystem/AdminProfile.php">Profile</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AdminLogin.html">LogOut</a></div>
        </div>
        <div class="container2">
            <div class="z">
                <p class="p1">MarkSheet Report</p>
             </div>
        
             <div class="two">
           <form action="AMarkSheetReport.php" method="post">
           <div class="form-group" >
                <label for="course" style=" margin:20px;font-size:20px;">Select Course</label>
                <select class="input1" name="course" id="course-list"  onChange="getSubject(this.value);" style="margin:20px 10px 0px 50px;width:800px;height:30px;">
                    <option value disabled selected> Select Course</option>
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
                 <label for="semester" style=" margin:20px;font-size:20px;">Select Semester</label>
                <select class="input2" name="semester" id="semester-list" style="margin:20px 10px 20px 30px;width:800px;height:30px;">
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
                <label for="subject" style=" margin:20px;font-size:20px;">Subject</label>
                <select class="input3" name="subject" id="subject-list" style="margin-left:100px;width:800px;height:30px;">
                 <option value=""> Select Subject </option>
            </select>
            </div>
            <button id="mybtn" name="search" style="border:1px solid white;background-color:rgb(52, 142, 142);padding:10px;margin:20px 10px 10px 1000px ;color:white;font-weight:bold;font-size:15px;">Fetch Details</button>
        </div>
           <div class="three">
           <table>
                           <tr border=1px solid;>
                            <th>RollNO</th>
                            <th>Student Name</th>
                            <th>Course</th>
                            <th>Subject</th>
                            <th>Total</th>
                            <th>Obtained Marks</th>
                        
                           </tr>
                      <?php
                      $con = mysqli_connect("localhost","root","","clgwebsite");
                      if(isset($_POST['search']))
                         { 
                           $Subject = $_POST['subject'];
                            $query = "select * from finternalmarks where  subject= '$Subject' ";
                           $sql = mysqli_query($con,$query);
                           
                       if(mysqli_num_rows($sql) > 0)
                      {
                          while($row = mysqli_fetch_array($sql))
                          {
                      ?>
                       <tr style="text-align:center" >
                            <td> <?php  echo $row['rollno'];?> </td>
                            <td> <?php  echo $row['sname'];?> </td>
                            <td> <?php  echo $row['course'];?> </td>
                            <td> <?php  echo $row['subject'];?> </td>
                            <td> <?php echo  $row['maxpracticalmarks'] + $row['maxtheorymarks']; ?> </td>
                            <td> <?php echo $row['practicalmarks'] + $row['theorymarks']; ?> </td>
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
                   
        </form>
        </div>
</body>
</html>