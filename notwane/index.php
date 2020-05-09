<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/styles.min.css">
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>
    <body>
        <div class="login-card"><img src="assets/img/avatar_2x.png" class="profile-img-card">
            <p class="profile-name-card"> </p>
            <form method="post" action="app/LoginValidate.php" class="form-signin"><span class="reauth-email"> </span>
                <input class="form-control" type="email" name="email" required placeholder="Email address" autofocus="" id="inputEmail">
                <input class="form-control" type="password" name="password" required placeholder="Password" id="inputPassword">
                    <div class="checkbox">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="formCheck-1">
                            <label class="form-check-label" for="formCheck-1">Remember me</label>
                        </div>
                    </div>
                <button class="btn btn-primary btn-block btn-lg btn-signin" name="submit" type="submit">Sign in</button>
            </form>
            <a href="register.blade.php" class="forgot-password">Forgot your password?</a>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
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
    </body>

</html>