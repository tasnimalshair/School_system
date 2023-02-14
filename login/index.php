<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="../image/iug.jpg" class="img-fluid" alt="" width="700">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form method="POST" action="login.php">
                        <!-- ID input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example13">ID</label>
                            <input name="id" type="text" id="form1Example13" class="form-control form-control-lg" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example23">Password</label>
                            <input name="password" type="password" id="form1Example23" class="form-control form-control-lg" />
                        </div>

                        <!-- <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example23">Type</label>
                            <div class="dropdown">
                                <select name="type" class="form-select" aria-label="Default select example">
                                    <option>student</option>
                                    <option >clacker</option>
                                    <option >teacher</option>
                                    <option >admin</option>
                                </select>
                            </div>
                        </div> -->


                        <br><br>

                        <!-- Submit button -->
                        <button name="submit"  type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>

                </div>
                

                </form>
            </div>
        </div>
        </div>
    </section>
    <script>

</script>
</body>

</html>