<?php 
session_start();
 ?>
<?php
$con = mysqli_connect("localhost","root","","clgwebsite");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internal Marks Page on Faculty Panel Of College Management System</title>
    <link rel="stylesheet" href="../CollegeManagementSystem/FInternalMarks.css">
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
    <div class="main">
        <div class="container1">
            <div class="logo">
                <img class="img1" src="../CollegeManagementSystem/Images/delogo.png" alt="img"><br>
                <p class="p1"><?php echo  $_SESSION['user'];?></p>
            </div>
            <div class="one"></div>
            <div class="two"><a href="../CollegeManagementSystem/FacultyDashboard.php">Home</a></div>
            <div class="two"><a href="../CollegeManagementSystem/FMySubjects.php">My Subjects</a></div>
            <div class="two"><a href="#">Internal Marks</a></div>
            <div class="two"><a href="../CollegeManagementSystem/FAttendance.php">Attendance</a></div>
            <div class="two"><a href="../CollegeManagementSystem/FAssignment.php">Assignments</a></div>
            <div class="two"><a href="../CollegeManagementSystem/FacultyProfile.php">My Profile</a></div>
            <div class="two"><a href="../CollegeManagementSystem/FacultyLogin.html">LogOut</a></div>
           
        </div>
        <div class="container2">
            <div class="one">
                <p class="p1">Enter Student Internal Marks</p>
                
           </div>
           <div class="two">
           <form action="FInternalMarks.php" method="post">
           <div class="form-group">
                <label for="course">Select Course</label>
                <select class="input1" name="course" id="course-list"  onChange="getSubject(this.value);">
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
                 <label for="semester">Select Sem/Year</label>
                <select class="input2" name="semester" id="semester-list">
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
                <label for="subject">Subject</label>
                <select class="input3" name="subject" id="subject-list">
                 <option value=""> Select Subject </option>
            </select>
            </div>
            <button id="mybtn" name="search">Fetch Students</button>
        </div>
           <div class="three">
           <table>
                           <tr>
                            <th>RollNO</th>
                            <th>Student Name</th>
                            <th>Course</th>
                            <th>Subject</th>
                            <th>Max Practical Marks</th>
                            <th>Practical Marks</th>
                            <th>MaxTheoryMarks</th>
                            <th>TheoryMarks</th>
                           </tr>
                      <?php
                      $con = mysqli_connect("localhost","root","","clgwebsite");
                      if(isset($_POST['search']))
                         { 
                           $Subject = $_POST['subject'];
                            $query = "select * from student ,subject where student.subject = subject.subjectcode and subject= '$Subject' ";
                           $sql = mysqli_query($con,$query);
                           
                       if(mysqli_num_rows($sql) > 0)
                      {
                          while($row = mysqli_fetch_array($sql))
                          {
                      ?>
                       <tr style="text-align:center">
                            <td><input type="text" name="srollno" value="<?php  echo $row['rollno']; ?>" readonly style="width:60px;"></td>
                            <td><input type="text" name="name" value="<?php echo $row['fname']; ?>" readonly style="width:80px;"></td>
                            <td><input type="text" name="course" value="<?php echo $row['course']; ?>" readonly style="width:60px;"></td>
                            <td><input type="text" name="subject" value="<?php  echo $row['subject']; ?>" readonly style="width:150px;"></td>
                            <td><input type="text" name="maxpracticalmarks" value="<?php  echo $row['practicalmarks']; ?>" readonly style="width:40px;"></td>
                            <td><input type="text" name="practicalmks" style="width:40px;"></td>
                            <td> <input type="text" name="maxtheorymarks" value="<?php echo $row['theorymarks'];?>" readonly style="width:40px;"></td>
                            <td><input type="text" name="theorymks" style="width:40px;"></td>
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
                   <button id="mybtn" type="submit" name="save">Submit Marks</button>
        </form>
        </div>
        <?php
            if(isset($_POST['save']))
            {
                $Course = $_POST['course'];
                $Subject = $_POST['subject'];
                $Rollno = $_POST['srollno'];
                $SName = $_POST['name'];
                $MaxPracticalMks = $_POST['maxpracticalmarks'];
                $PracticalMks = $_POST['practicalmks'];
                $MaxTheoryMarks = $_POST['maxtheorymarks'];
                $TheoryMarks = $_POST['theorymks'];
            
                $sql = "insert into finternalmarks(course,subject,rollno,sname,maxpracticalmarks,practicalmarks,maxtheorymarks,theorymarks) values('$Course','$Subject','$Rollno','$SName','$MaxPracticalMks','$PracticalMks','$MaxTheoryMarks','$TheoryMarks')";
                
                if(mysqli_query($con,$sql)){
                    echo "<script>alert('Record Saved Successfully')</script>";
                }
                else{
                    echo "error:".mysqli_error($con);
                }
               
            }
            
            ?>
    </div>
</body>
</html>