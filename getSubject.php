<?php
$con = mysqli_connect("localhost","root","","clgwebsite");
if(! empty($_POST['course_id'])){
    $query = "select * from dsubject where course = '" . $_POST["course_id"] . "' order by subjectname asc";
    $result = mysqli_query($con,$query);
    ?>
    <option value disabled selected>Select Subject</option>
    <?php
    foreach($result as $subject){
        ?>
        <option value="<?php echo $subject["subject"]; ?>"><?php echo $subject["subjectname"]; ?></option>
        <?php
    }
}
?>