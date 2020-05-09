<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/styles.min.css">
    </head>
    <body>
        <div class="login-card"><img src="assets/img/avatar_2x.png" class="profile-img-card">
            <p class="profile-name-card"> </p>
            <form action="app/RegisterValidate.php" method="post" id="regForm" class="form-signin">
                <span class="reauth-email"> </span>
                <input class="form-control" type="email" name="email" required placeholder="Email address" autofocus="" id="inputEmail">
                <input class="form-control" type="text" name="username" minlength="3" maxlength="18" required placeholder="Username" id="inputUsername">
                <input class="form-control" type="text" name="type" minlength="5" maxlength="9" required placeholder="type of user e.g local or organizer" id="inputType">
                <input class="form-control" type="password" name="password" minlength="5" required placeholder="Password" id="inputPassword">
                <input class="form-control" type="password" name="repeat_pass" minlength="5" required placeholder="repeat Password" id="inputPassword">
                <button class="btn btn-primary btn-block btn-lg btn-signup" name="submit" type="submit">Sign up</button>
            </form>
            <a href="index.php" class="forgot-password">already have an account? login</a>
        </div>
        
        <div class="footer-basic">
            <footer>
                <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Home</a></li>
                    <li class="list-inline-item"><a href="#">Services</a></li>
                    <li class="list-inline-item"><a href="#">About</a></li>
                    <li class="list-inline-item"><a href="#">Terms</a></li>
                    <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                </ul>
                <p class="copyright">The Bearer © 2020</p>
            </footer>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
        <script src="jquery.validate.pack.js" type="text/javascript"></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>

</html>