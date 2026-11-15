<?php
require __DIR__ . '/../include/bootstrap.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration Form</title>
    <link rel="icon" href="/resources/images/film-reel.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="/resources/css/form.css">
</head>

<body>

    <div class="form-container">
        <div class="forms">
            <!-- Login Form -->
            <div class="form login">
                <span class="title">Login</span>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo cinemoto_flash('error'); ?></p>
                <?php } ?>
                <form action="login-conn.php" method="post">
                    <?php echo cinemoto_form_guards(); ?>
                    <div class="input-field">
                        <input type="email" name="email" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" class="password" placeholder="Enter your password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        <a href="#" class="text">Forgot password?</a>
                    </div>
                    <div class="input-field button">
                        <input type="submit" value="Login">
                    </div>
                </form>
                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="#" class="text signup-link">Signup Now</a>
                    </span>
                </div>
            </div>

            <!-- Registration Form -->
            <div class="form signup">
                <span class="title">Registration</span>
                <?php if (isset($_GET['reg_error'])) { ?>
                    <p class="error"><?php echo cinemoto_flash('reg_error'); ?></p>
                <?php } ?>
                <?php if (isset($_GET['reg_success'])) { ?>
                    <p class="success"><?php echo cinemoto_flash('reg_success'); ?></p>
                <?php } ?>
                <form action="register.php" method="post">
                    <?php echo cinemoto_form_guards(); ?>
                    <div class="input-field">
                        <input type="text" name="name" placeholder="Enter your Name*" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <select name="gender" required>
                            <option value="" disabled selected>Gender</option>
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                            <option value="non-binary">Non-Binary</option>
                            <option value="other">Other</option>
                            <option value="prefer-not-to-answer">Prefer not to answer</option>
                        </select>
                        <i class="uil uil-user icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="tel" id="phone" name="phone" placeholder="Mobile Number*" required>
                        <i class="uil uil-phone"></i>
                    </div>
                    <div class="input-field">
                        <input type="email" name="email" placeholder="Enter your E-mail*" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" class="password" placeholder="Password*" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="confirm_password" class="password" placeholder="Confirm Password*" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon" required>
                            <label for="termCon" class="text">I accept all terms and conditions</label>
                        </div>
                    </div>
                    <div class="input-field button">
                        <input type="submit" value="Signup">
                    </div>
                </form>
                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="#" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script>
        const container = document.querySelector(".container"),
            pwShowHide = document.querySelectorAll(".showHidePw"),
            pwFields = document.querySelectorAll(".password"),
            signUp = document.querySelector(".signup-link"),
            login = document.querySelector(".login-link");

        // JS code to show/hide password and change icon
        pwShowHide.forEach(eyeIcon => {
            eyeIcon.addEventListener("click", () => {
                pwFields.forEach(pwField => {
                    if (pwField.type === "password") {
                        pwField.type = "text";
                        pwShowHide.forEach(icon => {
                            icon.classList.replace("uil-eye-slash", "uil-eye");
                        });
                    } else {
                        pwField.type = "password";
                        pwShowHide.forEach(icon => {
                            icon.classList.replace("uil-eye", "uil-eye-slash");
                        });
                    }
                });
            });
        });

        // JS code to appear signup and login form
        signUp.addEventListener("click", () => {
            container.classList.add("active");
        });
        login.addEventListener("click", () => {
            container.classList.remove("active");
        });
    </script>
</body>

</html>