<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nav - TravelEase</title>
    <!-- CSS FILES -->                
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/templatemo-tiya-golf-club.css" rel="stylesheet">
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div style="background-color: rgb(61, 64, 91);" class="container-fluid">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <?php
                if (isset($_SESSION['adminLogged'])) {
                    echo '<a class="navbar-brand d-flex align-items-center" href="admin.php">Admin Home</a>';
                } else {
                    echo "<a class='navbar-brand d-flex align-items-center' href='index.php'>
                            <img src='images/logo.png' class='navbar-brand-image img-fluid' alt='TravelEase'>
                            <span class='navbar-brand-text'>
                                Travel
                                <small>Ease</small>
                            </span>
                          </a>";
                }
                ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                        <?php
                        if (!isset($_SESSION['adminLogged'])) {
                            echo '<li class="nav-item"><a class="nav-link click-scroll" href="index.php#section_1">Home</a></li>';
                            echo '<li class="nav-item"><a class="nav-link click-scroll" href="index.php#section_2">About</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="index.php#section_3">Membership</a></li>';
                        }
                        ?>
                        <li class="nav-item"><a class="nav-link" href="index.php#section_4">Events</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#section_5">Contact Us</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Our Packages</a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li><a class="dropdown-item" href="./customizePackages.php">Create Custom Trip</a></li>
                                <li><a class="dropdown-item" href="./solopkgs.php">Solo Packages</a></li>
                                <li><a class="dropdown-item" href="./couplepkgs.php">Couple Packages</a></li>
                                <li><a class="dropdown-item" href="./familypkgs.php">Family Packages</a></li>
                            </ul>
                        </li>

                        
                        <?php
                        if (isset($_SESSION["Logged_In"])) {
                            if (!isset($_SESSION['adminLogged'])) {
                                echo '<li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">My Profile</a></li>';
                            }
                        } else {
                            if (!isset($_SESSION['adminLogged'])) {
                                echo '<div class="d-none d-lg-block ms-lg-3 py-2">
                        <a class="btn custom-btn custom-border-btn" data-bs-toggle="offcanvas" href="./login.php"
                            role="button" aria-controls="offcanvasExample"> Login</a>
                    </div>
                    <div class="d-none d-lg-block ms-lg-3 py-2">
                        <a class="btn custom-btn custom-border-btn" data-bs-toggle="offcanvas" href="./signUp.php"
                            role="button" aria-controls="offcanvasExample"> Sign In</a>
                    </div>';
                            }
                        }

                        if (isset($_SESSION['adminLogged'])) {
                            echo '<li class="nav-item"><a class="nav-link" href="adminlogout.php">Admin Logout</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end navbar -->
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 style="color: #505477; font-family:monospace;" class="modal-title fs-4" id="exampleModalLabel"> My Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?php
                        if (isset($_SESSION['Logged_In'])) {
                            $sql = "SELECT * FROM users WHERE email=?";
                            $stmt = $conn->prepare($sql);
                            if ($stmt) {
                                $stmt->bind_param("s", $_SESSION['Logged_In']['email']);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    ?>
                                    <h4 for="username" style="font-family: 'Times New Roman', Times, serif; margin-bottom: 0;">Your Username: </h4>
                                    <p style="margin-top: 0;"><?php echo $row['username']; ?></p>
                                </div>
                                <div class="form-group">
                                    <h4 for="email" style="font-family: 'Times New Roman', Times, serif; margin-bottom: 0;">Your Email: </h4>
                                    <p style="margin-top: 0;"><?php echo $row['email']; ?></p>
                                </div>
                                <div class="form-group">
                                    <h4 for="membership" style="font-family: 'Times New Roman', Times, serif; margin-bottom: 0;">Your Membership: </h4>
                                    <p style="margin-top: 0;"><?php echo !empty($row['membership']) ? $row['membership'] : "No Membership acquired"; ?></p>
                                </div>
                                <div class="form-group">
                                    <h4 for="password" style="font-family: 'Times New Roman', Times, serif; margin-bottom: 0;">Your Password: </h4>
                                    <input type="password" id="password" disabled value="<?php echo $_SESSION['Logged_In']['password']; ?>">
                                    <button class="toggle-password btn rounded-circle" onclick="togglePasswordVisibility()"><i class="bi bi-eye fs-3"></i></button>
                                </div>
                                <?php
                                }
                            }
                        }
                        ?>
                    <div class="form-group pt-4">
                        <small class="text-danger"><a href="./logout.php">Log Out</a></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="color: white;background-color: #505477;font-size: 15px;" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var toggleButton = document.querySelector(".toggle-password");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleButton.innerHTML = '<i class="bi bi-eye-fill fs-3"></i>';
            } else {
                passwordInput.type = "password";
                toggleButton.innerHTML = '<i class="bi bi-eye fs-3"></i>';
            }
        }
    </script>
</body>
</html>
