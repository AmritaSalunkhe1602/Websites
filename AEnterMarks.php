<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Marks Page On Admin Dashboard of College Management System</title>
    <link rel="stylesheet" href="../CollegeManagementSystem/AEnterMarks.css">
    
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
            <div class="two"><a href="../CollegeManagementSystem/AStudent.php">Students</a></div>
            <div class="two"><a href="../CollegeManagementSystem/ASubMgt.php">Subjects</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AFaculty.php">Faculties</a></div>
            <div class="two"><a href="../CollegeManagementSystem/ATimetable.php">Time Table</a></div>
            <div class="two"><a href="../CollegeManagementSystem/ASyllabus.php">Syllabus</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AAssignSubject.php">Assign Subjects</a></div>
            <div class="two"><a href="#">Enter Marks</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AMarkSheetReport.php">Marksheet Report</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AAttendanceReport.php">Attendance Report</a></div>
            <div class="two"><a href="../CollegeManagementSystem/ASearch.php">Search </a></div>
            <div class="two"><a href="../CollegeManagementSystem/AdminProfile.php">Profile</a></div>
            <div class="two"><a href="../CollegeManagementSystem/AdminLogin.html">LogOut</a></div>
        </div>
        <div class="container2">
            <div class="z">
                <p class="p1">Enter Student Marks</p>
                
                    <button  type="submit"   id="MyBtn">Theory Marks</button>  
                    <button  type="submit"   id="mybtn">Practical Marks</button>  
                   
            </div>
        
            <div id="theory" class="theory">
                <div class="one">
                    <div class="a">
                       <div class="a1">
                           <label for="course">Select Course</label>
                           <select name="course" id="course">
                               <option value="select">--- Select Course ---</option>
                               <option value="ba">BA</option>
                               <option value="bcom">BCom</option>
                               <option value="bsc">BSc</option>
                               <option value="msc">MSc</option>
                               <option value="ma">MA</option>
                               <option value="mcom">MCom</option>
                           </select>
                       </div>
                       <div class="a1">
                           <label for="">Select Sem/Year</label>
                           <select name="course" id="sem">
                            <option value="select">--- Select Semester ---</option>
                            <option value="sem1">Semester1</option>
                            <option value="sem2">Semester2</option>
                            <option value="sem3">Semester3</option>
                            <option value="sem4">Semester4</option>
                            <option value="sem5">Semester5</option>
                            <option value="sem6">Semester6</option>
                        </select>
                       </div>
    
                       <div class="a1">
                        <label for="subject">Subject</label>
                        <select name="subject" id="subject">
                         <option value="select subject">--- Select Subject ---</option>
                         <option value="physics">Physics</option>
                         <option value="elec">Electronics</option>
                         <option value="maths">Maths</option>
                         <option value="computer">Compuetr Science</option>
                         
                     </select>
                       </div>
                      
                   </div>
           
               </div>
               <div class="two">
                   <table>
                       <tr>
                           <th>Roll No</th>
                           <th>Student Name</th>
                           <th>Subject Name</th>
                           <th> Max Theory Marks</th>
                           <th>Theory Marks</th>
                       </tr>
                   </table>
    
                   
               </div>
            </div>

           <div id="practical" class="practical">
            <div class="one" >
                <div class="a">
                   <div class="a1">
                       <label for="course">Select Course</label>
                       <select name="course" id="course">
                           <option value="select">--- Select Course ---</option>
                           <option value="ba">BA</option>
                           <option value="bcom">BCom</option>
                           <option value="bsc">BSc</option>
                           <option value="msc">MSc</option>
                           <option value="ma">MA</option>
                           <option value="mcom">MCom</option>
                       </select>
                   </div>
                   <div class="a1">
                       <label for="">Select Sem/Year</label>
                       <select name="course" id="sem">
                        <option value="select">--- Select Semester ---</option>
                        <option value="sem1">Semester1</option>
                        <option value="sem2">Semester2</option>
                        <option value="sem3">Semester3</option>
                        <option value="sem4">Semester4</option>
                        <option value="sem5">Semester5</option>
                        <option value="sem6">Semester6</option>
                    </select>
                   </div>
    
                   <div class="a1">
                    <label for="subject">Subject</label>
                    <select name="subject" id="subject">
                     <option value="select subject">--- Select Subject ---</option>
                     <option value="physics">Physics</option>
                     <option value="elec">Electronics</option>
                     <option value="maths">Maths</option>
                     <option value="computer">Compuetr Science</option>
                     
                 </select>
                   </div>
                  
               </div>
                 
            
        
           
    
           </div>
           <div class="two">
               <table>
                   <tr>
                       <th>Roll No</th>
                       <th>Student Name</th>
                       <th>Subject Name</th>
                       <th> Max Practical Marks</th>
                       <th>Practical Marks</th>
                   </tr>
               </table>
    
               
           </div>
           </div>
        
           <button  type="submit"   id="MyBtn1">Submit Marks</button>
        </div>
    </div>
    <script >
        var theory=document.getElementById('theory');
        var practical=document.getElementById('practical');

        var openTheory=document.getElementById('MyBtn');
        var closeTheory=document.getElementById('MyBtn');
        
        var openPractical=document.getElementById('mybtn');
        var  closepractical=document.getElementById('mybtn');
        
       openTheory.addEventListener ('click',function(){
                           theory.style.display='block';
                        })
       closeTheory.addEventListener ('click',function(){
                           practical.style.display='none';
                        })



       openPractical.addEventListener ('click',function(){
                           practical.style.display='block';
                        })
        closepractical.addEventListener ('click',function(){
                          theory.style.display='none';
                        }     )           
        
    </script>

</body>
</html>