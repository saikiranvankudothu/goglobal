<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="register.css" />

    <title>Sign in & Sign up Form</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="login.php" method="post" class="sign-in-form" onsubmit="return validateForm()"
                    class="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Enter your email" name="username" id="username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" id="password" />
                    </div>
                    <input type="submit" value="Login" class="btn solid" />

                    <div class="forgot-btn" id="forgotbutton" style="">
                        <button type="button" style="
                            border: none;
                            background-color: transparent;
                            outline: none;
                            font-weight: 450;
                            cursor: pointer;">
                            <a href="forgotindex.html" style="text-decoration: none;">Forgot Password?</a>
                    </div>

                    <p class="social-text">Or Sign in with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
                <form action="signup.php" method="post" onsubmit="return validateForm()" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Enter your Email" name="username" id="username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Enter your Password" name="password" id="password" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Confirm Password" name="cpassword" id="cpassword" />
                    </div>
                    <input type="submit" class="btn" value="Sign up" />

                    <p class="social-text">Or Sign up with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>






        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                    Adventure awaits! Join us on a journey around the world
                     – Sign up now for exclusive travel deals and destinations
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Go to Sign up
                    </button>
                </div>
                <img src="img/logo.svg" class="image" alt="logo" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                    Welcome back to your travel hub!
                     Sign in to continue your journey and access personalized travel experiences
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Go to Sign in
                    </button>
                </div>
                <img src="img/logo2.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="register.js"></script>
</body>

</html>