<?php

extract($_POST);
$con = mysqli_connect("localhost", "root", "", "iug");
if ($con === false) {
    die("ERROR" . mysqli_connect_error($con));
}

// if (isset($submit)) {
//     $sid = mysqli_escape_string($con, $sid);
//     $cid = mysqli_escape_string($con, $cid);
//     $grade = htmlspecialchars($grade, ENT_QUOTES);
//     // $query = "INSERT INTO grades VALUES ($sid,  $cid , ' $grade');";
//     $query = "UPDATE grades SET grade=' $grade ' WHERE student_id=$sid AND course_id=$cid";
//     $result = mysqli_query($con, $query);
//     if ($result === false) {
//         echo "error!!!";
//     } else {
//         echo "Updated Succssfully";
//     }
// }

// if (isset($submit)) {
//     if (!empty($hidden)) {
//         $query = "UPDATE grades SET grade=' $grade ' WHERE student_id=1 AND course_id=10008";
//         $result=mysqli_query($con,$query);		
//         if ($result === false) {
//             echo "error!!!";
//         } else {
//             echo "Updated Succssfully";
//         }
//     }
// }


if (isset($submit)) {
    $q = "SELECT * FROM grades WHERE student_id=$student AND course_id=$course";
    $r = mysqli_query($con, $q);
    if (mysqli_num_rows($r) > 0) {
        $query = "UPDATE grades SET grade=' $grade ' WHERE student_id=$student AND course_id=$course";
        $result = mysqli_query($con, $query);
        if ($result === false) {
            echo "error!!!";
        } else {
            echo "Updated Succssfully";
        }
    }else{
            echo "This student was not register this course";
    }
}
