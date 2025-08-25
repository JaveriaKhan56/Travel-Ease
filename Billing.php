<?php
include("db.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['Logged_In'])) {
    header("Location: login.php");
    exit();
}
// Retrieve and validate GET parameters
if (isset($_GET['PackageID']) && isset($_GET['user_id'])) {
    $package_id = $_GET['PackageID'];
    $user_id = $_GET['user_id'];
} else {
    die("Required parameters not provided.");
}
// Fetch package details
$sql = "SELECT * FROM travel_packages WHERE PackageID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $package_id);
$stmt->execute();
$package_result = $stmt->get_result();

if ($package_result->num_rows > 0) {
    $package = $package_result->fetch_assoc();
    $original_price = $package['Price'];
} else {
    die("Package not found.");
}

// Fetch user membership details
$sql = "SELECT membership FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_result = $stmt->get_result();

if ($user_result->num_rows > 0) {
    $user = $user_result->fetch_assoc();
    $membership = $user['membership'];
} else {
    $membership = "None";
}
// Calculate discount
$discount_percentage = 0;
switch (strtolower($membership)) {
    case 'silver':
        $discount_percentage = 10;
        break;
    case 'gold':
        $discount_percentage = 15;
        break;
    case 'platinum':
        $discount_percentage = 20;
        break;
    case 'diamond':
        $discount_percentage = 25;
        break;
    case 'premium':
        $discount_percentage = 50;
        break;
}

$tax = $original_price * 10 / 100;
$discount_amount = ($original_price * $discount_percentage) / 100;
$total_price = $original_price + $tax - $discount_amount;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .maindiv {
            background: url(https://www.novo-monde.com/app/uploads/2017/03/pexels-photo-269633.jpeg);
            background-position: center;
            background-size: cover;
        }
    </style>
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/templatemo-tiya-golf-club.css" rel="stylesheet">
</head>

<body>

    <div class="px-4 px-lg-0 maindiv">
        <div class="container text-white py-5 text-center">
            <h1 class="display-4">Booking Your Package!</h1>
            <p class="lead mb-0">TravelEase</p>
            <p class="lead">Back to <a href="index.php" class="text-white"><u>Home</u></a></p>
        </div>
        <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                        <form action="submitBilling.php" method="POST">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-black border-0 bg-light">
                                                <div class="p-2 px-3 text-uppercase">Package</div>
                                            </th>
                                            <th scope="col" class="text-black border-0 bg-light">
                                                <div class="py-2 text-uppercase">Price</div>
                                            </th>
                                            <th scope="col" class="text-black border-0 bg-light">
                                                <div class="py-2 text-uppercase">Remove</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="border-0">
                                                <div class="p-2">
                                                    <img src="./static/images/<?php echo $package['pkgImage']; ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0">
                                                    <a href="#" class="text-dark d-inline-block align-middle">Package: <?php echo $package['PackageName']; ?>
                                                    </a></h5>
                                                        <span class="text-muted font-weight-normal font-italic d-block">Category: <?php echo $package['PackageType']; ?> Package</span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="border-0 align-middle"><strong>$<?php echo number_format($original_price, 2); ?></strong></td>
                                            <td class="border-0 align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                            <input type="hidden" name="PackageID" value="<?php echo $package_id; ?>">
                            <input type="hidden" name="totalPrice" id="totalPrice" value="<?php echo number_format($total_price, 2); ?>">
                            <input type="hidden" name="tax" id="tax" value="<?php echo number_format($tax, 2); ?>">
                            <input type="hidden" name="memberDiscount" id="memberDiscount" value="<?php echo number_format($discount_amount, 2); ?>">
                            <input type="hidden" name="payment_method" value="Online Payment">

                            <div class="row py-5 p-4 bg-white rounded shadow-sm">
                                <div class="col-lg-6">
                                    

                                    
                                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Information about Your Booking</div>
<div class="p-4">

    <!-- Name -->
    <label for="name" class="font-weight-bold">Name</label>
    <input type="text" id="name" name="name" class="form-control" placeholder="Name" required> <br>
    
    <!-- Email -->
    <label for="email" class="font-weight-bold">Email</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="Email" required> <br>
        
    <!-- Phone Number -->
        <label for="phone" class="font-weight-bold">Phone Number</label>
    <input type="tel" id="phone" name="phone" class="form-control" placeholder="Phone Number" required> <br>
    
    <!-- Address -->
    <label for="address" class="font-weight-bold">Address</label>
    <input type="text" id="address" name="address" class="form-control" placeholder="Address" required> <br>
    
<!-- City Dropdown -->
<label for="city" class="font-weight-bold">City</label>
    <select id="city" name="city" class="form-control" required>
        <option value="" disabled selected>Select your city</option>
        <?php
        // Fetch cities from database
        include("db.php");
        $sql = "SELECT CityID, name FROM cities";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['CityID']}'>{$row['name']}</option>";
        }
        $conn->close();
        ?>
    </select> <br>

    <!-- Card Holder Name -->
    <label for="card_name" class="font-weight-bold">Card Holder Name</label>
    <input type="text" id="card_name" name="card_name" class="form-control" placeholder="Card Holder Name" required> <br>
    
    <!-- Card Holder Number -->
    <label for="card_number" class="font-weight-bold">Card Holder Number</label>
    <input type="number" id="card_number" name="card_number" class="form-control" placeholder="Card Holder Number" required> <br>
    
</div>



                                </div>

                                
                                <div class="col-lg-6">
                                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Membership Discount</div>
                                    <div class="p-4">
                                        <p class="font-italic mb-4">If you have a membership, get your discount below</p>
                                        <div class=" mb-4 border rounded-pill px-4 p-3">
                                            <span>Your Membership is: <strong> <?php echo $user['membership']; ?> </strong></span> 
                                            <br>
                                            <span>Your Membership discount is: <strong> <?php echo $discount_percentage; ?>%</strong> </span>
                                            
                                            
                                            <!-- <input type="text" name="coupon_code" placeholder="Your amount" aria-describedby="button-addon3" class="form-control border-0">
                                            <div class="input-group-append border-0">
                                                <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Discount</button>
                                            </div> -->
                                        </div>
                                    </div>

                                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Payment Information</div>
                                    <div class="p-4">
                                        <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
                                        <ul class="list-unstyled mb-4">
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>$<?php echo number_format($total_price, 2); ?></strong></li>
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax(10%) </strong><strong>$<?php echo number_format($tax, 2); ?></strong></li>
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Discount (<?php echo $discount_percentage; ?>%)</strong><strong>-$<?php echo number_format($discount_amount, 2); ?></strong></li>
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                                <h5 class="font-weight-bold">$<?php echo number_format($total_price, 2); ?></h5>
                                            </li>
                                        </ul>
                                        <button type="submit" class="btn btn-dark rounded-pill py-2 btn-block">Proceed to checkout</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>