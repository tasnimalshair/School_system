<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">

<title>My page title</title>
<style>
    main {
        display: flex;
        font-size: 18px;
    }

    section {
        flex: 4;
        margin-left: 20px;
        margin-right: 20px;

    }
</style>
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
    $expire = time() + 7 * 24 * 60 * 60;
    setcookie('studentvisit', time(), $expire);
    if (isset($_COOKIE['studentvisit'])) {
        $visit = $_COOKIE['studentvisit'];
        $last = (time() - $visit) / 60;
        echo "<script>window.alert(' Welcome again! Your last visit was before  $last m');
               </script>";
    } else {
        echo "<script>window.alert('You've got some stale cookies!');
              </script>";
    }


    extract($_POST);
    $con = mysqli_connect("localhost", "root", "", "iug");
    if ($con === false) {
        die("ERROR" . mysqli_connect_error($con));
    }



    session_start();
    $sID = $_SESSION['studentId'];
    $query = "SELECT  g.course_id,c.name,g.grade from grades g,courses c
     where student_id=$sID AND g.course_id=c.id ";
    $result = mysqli_query($con, $query);
    if ($result === false) {
        echo "error";
    }


    ?>
    <main>
        <section>
            <h2 style="color: red;">Grades</h2>
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">Course ID</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['course_id'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['grade'] ?></td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </section>
    </main>

</body>

</html>