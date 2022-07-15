<?php
$con=mysqli_connect("localhost","root","","clgwebsite");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Subject page On Admin Panel of college management system</title>
    <link rel="stylesheet" href="../CollegeManagementSystem/AAssignSubject.css">
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
            <div class="two"><a href="#">Assign Subjects</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AStudent.php">Students</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AMarkSheetReport.php">Marksheet Report</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AAttendanceReport.php">Attendance Report</a></div>
            <div class="two"><a href="../CollegeManagementSystem/ASearch.php">Search </a></div>
            <div class="two"><a href="../CollegeManagementSystem/AdminProfile.php">Profile</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AdminLogin.html">LogOut</a></div>
        </div>
        <div class="container2">
            <div class="one">
                <p class="p1">Assign Subject</p>
                <div class="a">
                   <button  type="submit"   id="mybtn">Edit Faculty Subject</button>  
               </div>
            
           <div id="subject-model" class="model">
            <div id="model-content">
                <div id="model-header">
                    <p class="model-close" >&times;</p>
                    <p class="model-heading">Assign Subject</p>
                </div>
             <div id="model-body">
              <form action="AAssignSubject.php" method="post">
                    <div class="line"></div>
                     <div class="form-group">
                                <label for="">Faculty Id:</label>
                                 <input type="text" name="getid">
                                 <button type="submit" name="searchid">Search</button>
                     </div>
                     <table>
                           <tr>
                            <th>Faculty Id</th>
                            <th>Faculty Name</th>
                            <th>Quaification</th>
                            <th>Experience</th>
                           </tr>
                      <?php
                      $con = mysqli_connect("localhost","root","","clgwebsite");
                      if(isset($_POST['searchid']))
                         {
                           $id = $_POST['getid'];
                           $query = "select * from faculty where id = '$id'";
                          $sql = mysqli_query($con,$query);
                     
                       if(mysqli_num_rows($sql) > 0)
                      {
                          while($row = mysqli_fetch_array($sql))
                          {
                      ?>
                       <tr>
                            <td><?php echo $row['id'] ;?></td>
                            <td><?php echo $row['facultyname'];?></td>
                            <td><?php echo $row['qualification'];?></td>
                            <td><?php echo $row['experience'];?></td>
                        </tr>
                        <label for="">Faculty Id</label>
                          <input type="text" name="fid" value="<?php  echo $row['id'] ;?>" readonly style="width:200px;margin-left:10px">&nbsp;&nbsp;
                          <label for="">Faculty Name</label>
                           <input type="text" name="fname" value="<?php echo $row['facultyname'];?>" readonly style="width:200px;margin-left:10px">
                        <?php
                           }
                        }
                        else
                        { 
                            ?>
                            <tr><td colspan="4">No record Found</td></tr>
                            <?php
                           
                        }
                    }
                        ?>
                    </table>
                    <div class="form-group ">
                          <label for="course">Course Name</label>
                            <select style=" width: 350px;margin-left: 50px;" name="course" id="course-list" onChange="getSubject(this.value);">
                                <option value="" > Select Course </option>
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
                         <label for="semester">Semester/Year</label>
                            <select style="width: 350px;margin-left: 45px;" name="semester" id="semester-list">
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
                           <select style=" width: 350px;margin-left: 89px;" name="subject" id="subject-list">
                            <option value=""> Select Subject </option>
                        </select>    
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                            <select id="input14" name="position" id="position">
                                <option value=""> Select Position </option>
                                <option value="Professor">Professor</option>
                                <option value="Assistant Professor">Assistant Professor</option>
                                <option value="Lecturer">Lecturer</option>
                                
                            </select>
                             
                    </div> 
                   <div class="line"></div>
                    <div class="form-group ">
                        <button class="button button2" name="assignsub" type="submit" >Assign Subject</button>
                    </div>
                 </form>
                 </div>
            </div>
            </div>
          </div>
            
         

         

           <div class="two">
           <?php
          if(isset($_POST['assignsub']))
          {
              $Id  = $_POST['fid'];
              $FName = $_POST['fname'];
              $Course = $_POST['course'];
              $Semester = $_POST['semester'];
              $Subject = $_POST['subject'];
              $Position = $_POST['position'];
              
             
              $sql = "insert into assignsubject(fid,fname,course,semester,subject,position) values('$Id','$FName','$Course','$Semester','$Subject','$Position')";
              
              if(mysqli_query($con,$sql)){
                  echo "<script>alert('Record Saved Successfully')</script>";                  
                  $query = mysqli_query($con,"select * from assignsubject");
                  $nums = mysqli_num_rows($query);
                  if($nums != 0)
                  {
                      ?>
                          <table border=1px solid>
                          <tr>
                              <th>Faculty Id</th>
                              <th>Faculty Name</th>
                              <th>Course</th>
                              <th>Semester</th>
                              <th>Subject</th>
                              <th>Position</th>
                          </tr>
                          
                      <?php
                      while($res = mysqli_fetch_array($query))
                     {
                       echo '<tr  height="30px"; style="text-align:center"; >';
                       echo '<td>'.$res['fid'].'</td>';
                       echo '<td>'.$res['fname'].'</td>';
                       echo '<td>'.$res['course'].'</td>';
                       echo '<td>'.$res['semester'].'</td>';
                       echo '<td>'.$res['subject'].'</td>';
                       echo '<td>'.$res['position'].'</td>';
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
        var model=document.getElementById('subject-model');
        var openModel=document.getElementById('mybtn');
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
    </script>
</body>
</html>