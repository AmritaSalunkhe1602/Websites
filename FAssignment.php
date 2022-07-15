<?php 
session_start();
 ?>
<?php
$con=mysqli_connect("localhost","root","","clgwebsite");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Page on Faculty Panel Of College Management System</title>
    <link rel="stylesheet" href="../CollegeManagementSystem/FAssignment.css">
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
            <div class="two"><a href="../CollegeManagementSystem/FInternalMarks.php">Internal Marks</a></div>
            <div class="two"><a href="../CollegeManagementSystem/FAttendance.php">Attendance</a></div>
            <div class="two"><a href="#">Assignments</a></div>
            <div class="two"><a href="../CollegeManagementSystem/FacultyProfile.php">My Profile</a></div>
            <div class="two"><a href="../CollegeManagementSystem/FacultyLogin.html">LogOut</a></div>
           
        </div>
        <div class="container2">
            <div class="one">
                <p class="p1">Assignments</p>
                
           </div>
           <div class="two">
              
        <form action="FAssignment.php" method="post">
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
            <div class="form-group">
                <label for="file">Select file</label>
                <input class="input4" type="file" name="file" id="file">
            </div>

            <button id="mybtn" name="upload">Upload Assignment</button>
        </form>
            
         </div>
           <div class="three">
            <?php
            $con=mysqli_connect("localhost","root","","clgwebsite");
            if(isset($_POST['upload']))
            {
                $Course = $_POST['course'];
                $Semester = $_POST['semester'];
                $Subject = $_POST['subject'];
                $File = $_POST['file'];
            
                $sql = "insert into fassignment(course,semyear,subject,file) values('$Course','$Semester','$Subject','$File')";
                
                if(mysqli_query($con,$sql)){
                    echo "<script>alert('Assignment Uploaded Successfully')</script>";
                    $query = mysqli_query($con,"select * from fassignment");
            $nums = mysqli_num_rows($query);
            if($nums != 0)
            {
            ?>
            <table border=1px solid>
            <tr>
            <th>Index No.</th>
            <th>Course </th>
            <th>Semester</th>
            <th>Subject</th>
            <th>File</th>
            </tr>
            
            <?php
            while($res = mysqli_fetch_array($query))
            {
            echo '<tr  height="30px"; style="text-align:center"; >';
            echo '<td >'.$res['id'].'</td>';
            echo '<td>'.$res['course'].'</td>';
            echo '<td>'.$res['semyear'].'</td>';
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
            </table>
            
        </div>
       
        </div>
    </div>
</body>
</html>