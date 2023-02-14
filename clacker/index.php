<?php if (count($_POST) == 0) {
    $expire = time() + 7 * 24 * 60 * 60;
    setcookie('clackervisit', time(), $expire);
    if (isset($_COOKIE['clackervisit'])) {
        $visit = $_COOKIE['clackervisit'];
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
            <h2>What do you want to insert?</h2>
            <button name="insertS" type="submit" class="btn btn-primary btn-rounded"> Student</button>
            <button name="insertT" type="submit" class="btn btn-info btn-rounded"> Teacher</button>
            <button name="list" type="submit" class="btn btn-warning">Generate a list of students based on grade</button>

        </form>


    </body>

    </html>

<?php die();
} else {
    extract($_POST);
    if (isset($insertS)) {
        header("Location: student/");
    }

    if (isset($insertT)) {
        header("Location: teacher/");
    }
    if (isset($list)) {
        header("Location: list/");
    }
}
?>