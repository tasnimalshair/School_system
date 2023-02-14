<?php
extract($_POST);
$con = mysqli_connect("localhost", "root", "", "iug");
if ($con === false) {
    die("ERROR" . mysqli_connect_error($con));
}

if(isset($save)){
    $id = mysqli_escape_string($con, $id);
    $name = htmlspecialchars($name, ENT_QUOTES);
$query = "INSERT INTO teachers VALUES (" . $id . ", '" . $name ."');";
$result = mysqli_query($con, $query);
if($result === false){
    echo "This teacher id is already exist";
}else{
    echo "Added Successfully";
}
}

if(isset($back)){
    header("Location: ../index.php");
}
