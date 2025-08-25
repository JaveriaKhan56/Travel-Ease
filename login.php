<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["Logged_In"])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Travel Ease - Login</title>
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/templatemo-tiya-golf-club.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .mainDiv {
            display: flex;
            flex-direction: column;
            /* justify-content: space-between; */
            /* align-items: center; */
            min-height: 100vh;
            background-image: url('https://media.cntraveler.com/photos/5fd26c4ddf72876c320b8001/16:9/w_1920,c_limit/952456172');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 1;
        }

        .custom-form {
            padding: 10px;
            border-radius: 10px;
            /* background-color: rgba(255, 255, 255, 0.8); */
        }

        .svg-top,
        .svg-bottom {
            position: fixed;
            left: 0;
            width: 100%;
            height: auto;
            z-index: 0;
        }

        .svg-top {
            top: 0;
        }

        .svg-bottom {
            bottom: 0;
        }
    </style>
</head>

<body>

    <div class="mainDiv">
        <svg class="svg-top" viewBox="0 0 1962 178" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <path fill="#3D405B" d="M 0 114 C 118.5 114 118.5 167 237 167 L 237 167 L 237 0 L 0 0 Z" stroke-width="0"></path>
            <path fill="#3D405B" d="M 236 167 C 373 167 373 128 510 128 L 510 128 L 510 0 L 236 0 Z" stroke-width="0"></path>
            <path fill="#3D405B" d="M 509 128 C 607 128 607 153 705 153 L 705 153 L 705 0 L 509 0 Z" stroke-width="0"></path>
            <path fill="#3D405B" d="M 704 153 C 812 153 812 113 920 113 L 920 113 L 920 0 L 704 0 Z" stroke-width="0"></path>
            <path fill="#3D405B" d="M 919 113 C 1048.5 113 1048.5 148 1178 148 L 1178 148 L 1178 0 L 919 0 Z" stroke-width="0"></path>
            <path fill="#3D405B" d="M 1177 148 C 1359.5 148 1359.5 129 1542 129 L 1542 129 L 1542 0 L 1177 0 Z" stroke-width="0"></path>
            <path fill="#3D405B" d="M 1541 129 C 1751.5 129 1751.5 138 1962 138 L 1962 138 L 1962 0 L 1541 0 Z" stroke-width="0"></path>
        </svg>

        <?php
        if (isset($_SESSION['loginError'])) {
            echo '<div class="alert alert-light fs-4 alert-dismissible fade show text-center" role="alert">
                <strong><i class="bi bi-exclamation-triangle-fill"></i></strong> ' . $_SESSION['loginError'] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            unset($_SESSION['loginError']);
        }
        ?>

        <div class="container my-auto">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="offcanvas-header text-center">
                    <h3 class="offcanvas-title" id="offcanvasExampleLabel">TravelEAse Login</h3>
                    <a href="./index.php" class="btn-close" aria-label="Close"></a>
                </div>
                <div class="offcanvas-body d-flex flex-column">
                    <form class="custom-form member-login-form" action="processLogin.php" method="post" role="form">
                        <div class="member-login-form-body">
                            <div class="mb-4">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                            </div>

                            <div class="mb-3" style="position: relative;">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required style="padding-right: 40px;">
                                <button type="button" class="toggle-password btn rounded-circle" onclick="togglePasswordVisibility()" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: transparent; border: none;">
                                    <i class="bi bi-eye fs-5"></i>
                                </button>
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember me
                                </label>
                            </div>
                            <div class="col-lg-5 col-md-7 col-8 mx-auto">
                                <button type="submit" class="form-control btn btn-primary">Login</button>
                            </div>
                            <div class="text-center my-3">
                                <a class="py-2" href="./signUp.php"><strong>Create a new Account</strong></a> <br>
                                <!-- <a href="./index.php"><strong> Cancel</strong></a> -->

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <svg class="svg-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#3D405B" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
        </svg>
    </div>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/animated-headline.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/custom.js"></script>
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var toggleButton = document.querySelector(".toggle-password i");

            if (passwordField.type === "password") {
                passwordField.type = "text"; // Show the password
                toggleButton.classList.remove("bi-eye");
                toggleButton.classList.add("bi-eye-slash"); // Change the icon to eye-slash
            } else {
                passwordField.type = "password"; // Hide the password
                toggleButton.classList.remove("bi-eye-slash");
                toggleButton.classList.add("bi-eye"); // Change the icon back to eye
            }
        }
    </script>
</body>

</html>