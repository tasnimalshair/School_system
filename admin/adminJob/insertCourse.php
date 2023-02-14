<?PHP
extract($_POST);
$con = mysqli_connect("localhost", "root", "", "iug");
if ($con === false) {
    die("ERROR" . mysqli_connect_error($con));
}

if (isset($save)) {
    $id = mysqli_escape_string($con, $id);
    $tId = mysqli_escape_string($con, $tId);
    $name = htmlspecialchars($name, ENT_QUOTES);
    
    $checkBoth = "SELECT * FROM courses WHERE id=$id AND name='$name' AND teacher_id=$tId;";
    $run = mysqli_query($con, $checkBoth);

    $checkCId = "SELECT id FROM courses WHERE id= $id ";
    $run2 = mysqli_query($con, $checkCId);

    $checkTId = "SELECT id FROM teachers WHERE id= $tId";
    $run3= mysqli_query($con, $checkTId);
    
    if (mysqli_num_rows($run) > 0) {
        echo "Course has already assigned to this teacher!!";
    } else if(mysqli_num_rows($run2) > 0){
        echo "This course is exist";
    } else if(!mysqli_num_rows($run3) > 0){
        echo "This teacher is not exist";
    }
    else {
        $query = "INSERT INTO courses VALUES ( $id  , ' $name ',  $tId );";
        $result = mysqli_query($con, $query);
        if ($result === false) {
            echo "error";
        } else {
            echo "Course added Successfully :)";
        }
    }
}
