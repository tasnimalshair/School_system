<!DOCTYPE html>
<html lang="">

<head>
    <title>University</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <link rel="stylesheet" href="../../css/main.css" />
    <script src="../../js/jquery-3.6.0.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.slim.min.js"></script>

</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">

            <form action="studentData.php" method="POST"><br>
            <h2 style="color: green;">Insert new student</h2><br>
            
                <input type="text" id="login" class="fadeIn second" name="id" placeholder="ID">
                <br> <br> <input type="text" class="fadeIn third" name="name" placeholder="Name">
                <br> <br> <input type="text" class="fadeIn third" name="email" placeholder="Email">
                <br> <br>  <button name="save" type="submit" class="btn btn-success btn-rounded">Save</button>
                <button name="back" type="submit" class="btn btn-info btn-rounded">Back</button>


            </form>
        </div>
    </div>
</body>
</html>