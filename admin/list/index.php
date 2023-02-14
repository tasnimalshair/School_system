<?php if (count($_POST) == 0) { ?>
    <form action="" method="POST">
        <div class="form-outline mb-4">
            <b> <label>Enter a grade</label></b>
            <input name="grade" type="text" /><br><br>
            <button name="btn" type="submit">Search</button>
        </div>
    </form>

<?php die();
} else { ?>
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
    <link rel="stylesheet" href="../../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <link rel="stylesheet" href="../../css/main.css" />
    <script src="../../js/jquery-3.6.0.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.slim.min.js"></script>

    </head>

    <body>
        <?php

        extract($_POST);
        $con = mysqli_connect("localhost", "root", "", "iug");
        if ($con === false) {
            die("ERROR" . mysqli_connect_error($con));
        }

        $query = "SELECT s.id ,s.name , g.course_id , g.grade from students s ,grades g
    where s.id= g.student_id  AND g.grade='$grade'";
        $result = mysqli_query($con, $query);
        if ($result === false) {
            echo "error";
        }


        ?>
        <main>
            <section>
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Student ID</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Course ID</th>
                            <th scope="col">Grade</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['course_id'] ?></td>
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
<?php } ?>