<?php if (count($_POST) == 0) {
    $expire = time() + 7 * 24 * 60 * 60;
    setcookie('adminvisit', time(), $expire);
    if (isset($_COOKIE['adminvisit'])) {
        $visit = $_COOKIE['adminvisit'];
        $last = (time() - $visit) / 60;
        echo "<script>window.alert(' Welcome again! Your last visit was before  $last m');
           </script>";
    } else {
        echo "<script>window.alert('You've got some stale cookies!');
          </script>";
    }
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/main.css" />
        <script src="../js/jquery-3.6.0.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </head>

    <body>
        <form action="" method="POST">
            <h2>Choose a task</h2>
            <button name="assign" type="submit" class="btn btn-danger">Assign courses to teachers</button>
            <!-- <button name="list" type="submit" class="btn btn-warning">Generate a list of students based on grade</button> -->

        </form>

    </body>

    </html>

<?php die();
} else {
    extract($_POST);
    if (isset($assign)) {
        header("Location: adminJob/");
    }

    // if (isset($list)) {
    //     header("Location: list/");
    // }
}
?>