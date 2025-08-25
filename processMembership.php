<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanks for purchasing the Membership</title>
</head>

<body>
    <section class="section hero" id="home" aria-label="home" style="min-height: 100vh;">
        <div class="container-fluid">
            <?php
            include("db.php");
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $selectedPlan = isset($_POST['selectedOption']) ? $_POST['selectedOption'] : null;

                $checkQuery = "SELECT * FROM users WHERE email = '$email'";
                $result = $conn->query($checkQuery);
                if (isset($_SESSION["Logged_In"])) {
                    if ($result->num_rows > 0) {
                        if ($selectedPlan == null) {
                            $_SESSION["planError"] = "Please select a membership plan.";
                            echo "<script>window.location.href='index.php#section_3'</script>";
                            exit();
                        } else {
                            $updateQuery = "UPDATE users SET membership = ? WHERE email = ?";
                            $stmt = $conn->prepare($updateQuery);
                            $stmt->bind_param("ss", $selectedPlan, $email);
                            if ($stmt->execute()) {
                                echo "<h1 class='h2 hero-title text-center'>Thanks for purchasing the plan</h1><br>
                                <h2 class='text-center'>Your new Features are unlocked</h2>
                                <h2 class='h2 section-title text-align-start fs-3'><a class='nav-link' href='index.php'>Home</a></h2>";


                                $_SESSION["memberlogged"] = $selectedPlan;
                                $_SESSION["email"] = $email;
                            } else {
                                echo "Data failed to update: " . $stmt->error;
                            }
                            $stmt->close();
                        }
                    } else {
                        $_SESSION["accountError"] = "Create an account first";
                        echo '<script>window.location.href="signUp.php"</script>';
                    }
                } else {
                    $_SESSION["accountError"] = "Create an account first";
                    echo '<script>window.location.href="signUp.php"</script>';
                }
            }
            $conn->close();
            ?>
        </div>
    </section>

</body>

</html>