<!DOCTYPE html>
<html lang="">

<head>
    <title>University</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

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
    setcookie('teachervisit', time(), $expire);
    if (isset($_COOKIE['teachervisit'])) {
        $visit = $_COOKIE['teachervisit'];
        $last = (time() - $visit) / 60;
        echo "<script>window.alert(' Welcome again! Your last visit was before  $last m');
                   </script>";
    } else {
        echo "<script>window.alert('You've got some stale cookies!');
                  </script>";
    }
    ?>
    <div class="wrapper fadeInDown">
        <div id="formContent">

            <?php

            extract($_POST);
            $con = mysqli_connect("localhost", "root", "", "iug");
            if ($con === false) {
                die("ERROR" . mysqli_connect_error($con));
            }
            session_start();
            $tID = $_SESSION['teacherId'];
            $query = "SELECT DISTINCT g.student_id  FROM grades g , courses c  WHERE c.teacher_id= $tID AND g.course_id = c.id  ";
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
                                <th scope="col">Student ID</th>
                                <th scope="col">Course ID</th>
                                <th scope="col">Grade</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <form action="grades.php" method="POST">

                                    <td>
                                        <select name="student" class="form-select" aria-label="Default select example">
                                            <?php
                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <option><?php echo $row['student_id']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </td>


                                    <td>
                                        <select name="course" class="form-select" aria-label="Default select example">
                                            <?php
                                            $query2 = "SELECT DISTINCT id FROM  courses   WHERE teacher_id= $tID";
                                            $result2 = mysqli_query($con, $query2);
                                            while ($row = mysqli_fetch_assoc($result2)) { ?>
                                                <option><?php echo $row['id']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </td>

                                    <td><input type="text" name="grade"></td>


                                    <td>
                                        <button name="submit" type="submit" class="btn btn-warning">Update</button>
                                    </td>
                                </form>
                            </tr>

                        </tbody>
                    </table>

                </section>
            </main>


        </div>
    </div>
</body>

</html>