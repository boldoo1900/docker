<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registration</title>

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<!------ Include the above in your HEAD tag ---------->

<body>
    </br></br></br></br></br>
    <div class="container">
        <div class="row">
            <div class="col-3">
            </div>

            <div class="col-6 shadow-lg p-3 mb-5 bg-white rounded">
                <?php echo Message::display(); ?>

                <form action="/register" method="POST" name="FormRegistration" >
                    <img class="mb-4" src="assets/images/user-registration.png" style="margin-left: 40%;" width="100" height="100">
                    <h1 class="h3 mb-3 font-weight-normal" style="margin-left: 30%;">Registration Form</h1>

                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email address:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nickname" class="col-sm-3 col-form-label">Nickname:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Allowed text length between 4 to 31">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Allowed text length between 8 to 31">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="birth_date" class="col-sm-3 col-form-label">Birth date:</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="">
                        </div>
                    </div>

                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Gender:</legend>
                            <div class="col-sm-9 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="M" checked>
                                    <label class="form-check-label" for="gridRadios1">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="F">
                                    <label class="form-check-label" for="gridRadios2">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10"><br><br>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-3">
            </div>
        </div>
    </div>


</body>

<script src="assets/vendor/jquery/jquery.min.js"></script>
<!-- <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

</html>