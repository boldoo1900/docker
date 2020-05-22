<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="-1">

  <title>Login</title>

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<!------ Include the above in your HEAD tag ---------->
<body class="text-center">
</br></br></br></br></br>
<div class="container">
    <div class="row">
        <div class="col-4">
        </div>

        <div class="col-4 shadow-lg p-3 mb-5 bg-white rounded">
            <?php echo Message::display(); ?>

            <form class="form-signin" method="post" action="/login">
                <img class="mb-4" src="assets/images/user-login.png" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

                <label for="email" class="sr-only">Email Address</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Email" autocomplete="off" >

                <label for="password" class="sr-only">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" autocomplete="off" ><br>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" id="btnLogin" name="btnLogin" type="submit">Sign in</button>

                <p class="mt-5 mb-3 text-muted">
                    Don't have an account? 
                    <a href="/register">Sign Up</a>
                </p>
                <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
            </form>
        </div>

        <div class="col-4">
        </div>
    </div>
</div>


</body>

</html>
