<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <link rel="stylesheet" href="../css/main.css" />
    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.slim.min.js"></script>
</head>

<body>


    <?php
    extract($_POST);
    $con = mysqli_connect("localhost", "root", "", "iug");
    if ($con === false) {
        die("ERROR" . mysqli_connect_error($con));
    }
    $id = mysqli_escape_string($con, $id);
    
    $query = "select * from paswrd where userid=" . $id .
    " and password='" . $password . "'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row=mysqli_fetch_assoc($result)) {
            $type= $row['type'];
        
        if ($type == "clacker") {
            header("Location: ../clacker/");
        } else if ($type == "admin") {
            header("Location: ../admin/");
        } else if ($type == "teacher") {
            session_start();
            $_SESSION['teacherId'] = $id;
            
            header("Location: ../teacher/");
        } else if ($type == "student") {
            session_start();
            $_SESSION['studentId'] = $id;
            header("Location: ../student/");
        }}
    } else {
        echo "Username or password is not correct!";
    }

    // $query = "select * from paswrd where userid=" . $id .
    //     " and password='" . $password . "'  and type='" . $type . "'";
 
    // $result = mysqli_query($con, $query);
    // if (mysqli_num_rows($result) > 0) {
        
    //     if ($type == "clacker") {
    //         header("Location: ../clacker/");
    //     } else if ($type == "admin") {
    //         header("Location: ../admin/");
    //     } else if ($type == "teacher") {
    //         header("Location: ../teacher/");
    //     } else if ($type == "student") {
    //         session_start();
    //         $_SESSION['studentId'] = $id;
    //         header("Location: ../student/");
    //     }
    // } else {
    //     echo "Username or password is not correct!";
    // }


   

    // session_start();
    // $_SESSION['user_id']=$id;
   ?>
</body>

</html>