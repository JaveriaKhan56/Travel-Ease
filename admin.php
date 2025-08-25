<?php
include("db.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['adminLogged'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to admin panel</title>
    <!-- linksssssssssssssssssssssssssssssssssssssss -->
    <!-- <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> -->



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/templatemo-tiya-golf-club.css" rel="stylesheet">
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5ebe5;
            height: 100vh;


        }

        .sidePanel {
            font-family: 'Poppins', sans-serif;
            background-color: #f5ebe5;
            height: 100vh;
            background: linear-gradient(45deg, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url("images/adminAside.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-radius: 10px;
            padding: 10px 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .main-window {
            text-align: center;
            padding: 10px 20px;
            background: transparent;
            border-radius: 10px;
            background: linear-gradient(45deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(https://images.unsplash.com/photo-1499678329028-101435549a4e?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);
            background-size: cover;
            background-position: center;
            height: 100%;
            display: flex;

            /* justify-content: center; */
            align-items: center;
            flex-direction: column;
            overflow-y: scroll;
        }

        .sidePanel-bottom {
            display: flex;
            justify-content: end;
            align-items: end;
            /* height: 40%; */
        }

        .heading {
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>

<body>
    <div>
        <?php
        include("nav.php")
        ?>
    </div>
    <br>
    <section class="section hero container-fluid" style="height: auto;">
        <div class="row">
            <div class="col-3 d-lg-block d-md-block d-sm-none ">
                <div class="sidePanel" style="height: 110vh;">
                    <div class="row" >
                        <a href="admin.php?option=view_admin_home" class="logo text-center text-white col-12" title="Admin Home">Travel Ease</a>
                        <ul class="pt-5" style="list-style: none;display: flex;flex-direction: column;gap: 20px;">
                            <li>
                                <div class="dropdown w-100 col-12 ">
                                    <button class="btn dropdown-toggle sidePanel-btn" style="font-size: 16px;padding:5px 15px;color: white;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-journal-plus fs-1 pe-3"></i> TravelEase Packages
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item fs-5" href="admin.php?option=view_pkgs">View Packages & Table</a></li>
                                        <li><a class="dropdown-item fs-5" href="admin.php?option=add_pkgs">Add Package</a></li>
                                        <li><a class="dropdown-item fs-5" href="admin.php?option=update_pkgs">Update Package</a></li>
                                        <li><a class="dropdown-item fs-5" href="admin.php?option=remove_pkgs">Remove Package</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown w-100 col-12 ">
                                    <button class="btn dropdown-toggle sidePanel-btn" style="font-size: 16px;padding:5px 15px;color: white;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-journal-plus fs-1 pe-3"></i></i> Custom Packages
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item fs-5" href="admin.php?option=viewCustomize">View Custom Packages </a></li>
                                        <!-- <li><a class="dropdown-item fs-5" href="admin.php?option=updateCustomize">Update Custom Package </a></li> -->
                                        <li><a class="dropdown-item fs-5" href="admin.php?option=deleteCustomize">Remove Custom Package</a></li>

                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown w-100 col-12 ">
                                    <button class="btn dropdown-toggle sidePanel-btn" style="font-size: 16px;padding:5px 15px;color: white;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-journal-plus fs-1 pe-3"></i> Membership
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item fs-5" href="admin.php?option=viewMembers">View Membership & Table</a></li>
                                        <li><a class="dropdown-item fs-5" href="admin.php?option=deleteMembership">Remove Membership</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown w-100 col-12 ">
                                    <button class="btn dropdown-toggle sidePanel-btn" style="font-size: 16px;padding:5px 15px;color: white;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person fs-1 pe-3"></i></i> Countries
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item fs-5" href="admin.php?option=ViewCountry">View Countries & Table</a></li>
                                        <li><a class="dropdown-item fs-5" href="admin.php?option=addCountry">Add Country </a></li>
                                        <li><a class="dropdown-item fs-5" href="admin.php?option=deleteCountry">Remove Country </a></li>

                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown w-100 col-12 ">
                                    <button class="btn dropdown-toggle sidePanel-btn" style="font-size: 16px;padding:5px 15px;color: white;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person fs-1 pe-3"></i></i> Cities
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item fs-5" href="admin.php?option=viewCity ">View Cities & Table</a></li>
                                        <li><a class="dropdown-item fs-5" href="admin.php?option=addCity">Add City </a></li>
                                        <li><a class="dropdown-item fs-5" href="admin.php?option=deleteCity">Remove City </a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- <li>
                                <div class="dropdown w-100 col-12 ">
                                    <button class="btn dropdown-toggle sidePanel-btn" style="font-size: 16px;padding:5px 15px;color: white;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person fs-1 pe-3"></i></i> Reviews
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item fs-5" href="admin.php?option=">View Reviews Details</a></li>
                                        <li><a class="dropdown-item fs-5" href="admin.php?option=">Add Reviews </a></li>
                                        <li><a class="dropdown-item fs-5" href="admin.php?option=">Update Reviews </a></li>
                                        <li><a class="dropdown-item fs-5" href="admin.php?option=">Remove Reviews </a></li>

                                    </ul>
                                </div>
                            </li> -->
                            <li>
                                <div class="dropdown w-100 col-12">
                                    <button class="btn dropdown-toggle sidePanel-btn" style="font-size: 16px;padding:5px 15px;color: white;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-box-seam-fill fs-1 pe-3"></i> Manage Bookings
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item fs-5" href="admin.php?option=PendingBookings">Pending Booking</a></li>
                                        <li><a class="dropdown-item fs-5" href="admin.php?option=CompletedBookings">Completed Booking</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>

                        <div class="sidePanel-bottom">
                            <!-- <a class="text-white pe-3" href="./adminlogout.php">Logout</a> -->
                            <?php
                            if (isset($_SESSION['adminLogged'])) {
                                echo '<a class="text-white pe-4" href="adminlogout.php">Logout</a>';
                            }
                            ?>
<br>
<br><br>
<br>
                        </div> 
                        
                    </div>
                   
                </div>

            </div>


            <?php
            if (isset($_SESSION['adminOrderReminder'])) {
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    ' . $_SESSION['adminOrderReminder'] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>            ';
                unset($_SESSION['adminOrderReminder']);
            }
            ?>

            <div class="col-9">
                <div class="main-window">
                    <?php
                    $allIds = [];
                    $result = $conn->query("SELECT PackageID FROM travel_packages");
                    while ($row = $result->fetch_assoc()) {
                        $allIds[] = $row["PackageID"];
                    }
                    ?>
                    <?php
                    if (isset($_GET['option'])) {
                        $selectedOption = $_GET['option'];

                        if ($selectedOption == "view_admin_home") {
                            echo '<h1 class="text-white fs-1 pb-3"> Welcome Admin</h1>';
                            echo '<p class="text-light pt-3">Here You can Add, Update, Delete & View TravelEase in the Database</p>';
                        } else if ($selectedOption == "view_pkgs") {
                            $sql = "SELECT * FROM travel_packages";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<div class='table-responsive'>";
                                echo "<h1 class='text-center text-white heading'>View Travel Pacakges</h1>";
                                echo "<table  style='border-radius: 10px;' class='table table-responsive text-center' >
                                            <thead>
                                                <tr >
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package ID</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package Title</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package Type</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package Price</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package DurationDays</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package StartDate</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package EndDate</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package CreationDate</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package LastUpdated</th>
                                                    
                                                </tr>
                                            </thead>";

                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tbody>
                                            <tr>
                                                <th scope='row'>" . $row["PackageID"] . "</th>
                                                <td>" . $row["PackageName"] . "</td>
                                                <td>" . $row["PackageType"] . "</td>
                                                <td>" . $row["Price"] . "</td>
                                                <td>" . $row["DurationDays"] . "</td>
                                                <td>" . $row["StartDate"] . "</td>
                                                <td>" . $row["EndDate"] . "</td>
                                                <td>" . $row["CreationDate"] . "</td>
                                                <td>" . $row["LastUpdated"] . "</td>
                                                                                                
                                            </tr>";
                                }

                                echo "</table>";
                                echo '</div>';
                            } else {
                                echo "<div class='table-responsive'>";
                                echo "<h1 class='text-center text-white heading'>View Travel Pacakges</h1>";
                                echo "
                                            <table class='table text-center'>
                                            <thead >
                                                    <tr>
                                                     <th style='background-color:#ce6857;color:white;' scope='col'>Package ID</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package Title</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package Type</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package Price</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package DurationDays</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package StartDate</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package EndDate</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package CreationDate</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package LastUpdated</th>
                                                    
                                                    </tr>
                                                </thead>
                                            </table>";
                            }
                        } else if ($selectedOption == "add_pkgs") {
                            $result = $conn->query("SELECT * FROM cities");

                            echo "<h1 class='text-center text-white heading'>Add Travel Pacakges</h1>";

                            echo '
                                <div class="container d-flex px-5" style="flex-direction:column:align-items:center;">
                                <form action="addpkg.php" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate method="post">
                                
                            <div class="col-12">
                               <label class="input-text fs-5 text-white col-12">City ID</label>
                               
                            <select name="CityID" style="font-size: 15px;" class="w-100 form-control" required>
                            ';
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row["CityID"] . '">' . $row["name"] . '</option>';
                            }
                            echo '
                            </select>
                            </div> </br>
                        
                            <div class="col-12">
                                <label class="input-text fs-5 text-white col-12">Package Name</label>
                                <input type="text" name="PackageName" style="font-size: 15px;" class="form-control" required>
                            </div>
                            
                            <div class="text-white "> <span class="fs-5">Packages Type </span>
                                <select required class="col-12 border pt-1 pb-1 pe-2 ps-2  rounded-2" name="PackageType" id="myDropdown packageType " onchange="displaySelectedValue()"> 
                                    <option class="shadow rounded-2" disabled selected hidden><span class="text-secondary">
                                    Select a Packages Type</span></option>
                                    <option class="shadow rounded-2" value="Solo">Solo</option>
                                    <option class="shadow rounded-2" value="Couple">Couple </option>
                                    <option class="shadow rounded-2" value="Family">Family</option>
                                </select>
                                <small class="col-12 text-center text-white pt-1" name="PackageType" id="selectedValue">Selected Types will appear here.</small>                                
                            </div>
                        
                            <div class="mb-1">
                                <label class="fs-5 text-white col" for="pkgImage">Select a Travel Package Image</label>
                                <input type="file" accept="image/*" class="form-control pt-1 pb-1 col-9" name="pkgImage" required id="inputGroupFile01">
                            </div>
                        
                            <div class="input-group col-12">
                                <label class="input-text fs-5 text-white col-12">Add Details</label>
                                <textarea class="form-control" name="Details" aria-label="With textarea" style="resize: none;font-size: 12px;"></textarea>
                            </div>
                        

                        <!-- Durations -->
                        <div class="input-group mb-3">
                            <label class="input-text fs-5 text-white col-12" id="basic-addon4">Duration (Days)</label>
                            <select type="number" name="DurationDays" class="form-control " placeholder="Duration" min="1" aria-label="Duration" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                        </div>
                        
                        <!-- Start Date Input -->
                        <div class="input-group mb-3">
                            <label class="input-text fs-5 text-white col-12" id="basic-addon2">Start Date</label>
                            <input type="date" name="StartDate" class="form-control " aria-label="Start Date" required>
                        </div>
                        
                        <!-- End Date Input -->
                        <div class="input-group mb-3">
                            <label class="input-text fs-5 text-white col-12" id="basic-addon3">End Date</label>
                            <input type="date" name="EndDate" class="form-control " aria-label="End Date" required>
                        </div>
                    
                                  <div class="input-group mb-3">
                                                        <label class="input-text fs-5 text-white col-12"> Package Price</label>
                            <input type="number" name="Price" class="form-control  pt-1 pb-1 col-9 " aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text ">$</span>
                        </div>              
                        
                            <div class="col-12">
                                <input type="submit" class="input-text btn w-100 fs-5" style="color:#fff;background-color:#E07A5F;" value="Enter to submit">
                            </div>
                        </form>
                                </div>
                                     ';
                        } else if ($selectedOption == "update_pkgs") {
                            $result = $conn->query("SELECT PackageID FROM travel_packages");
                            $allIds = [];
                            while ($row = $result->fetch_assoc()) {
                                $allIds[] = $row['PackageID'];
                            }
                            echo '
                                <form action="adminUpdateProcess.php" method="post">
                                    <div class="col-12">
                                        <h1 class="text-center heading pb-3 text-light">Select ID to Update the Package</h1>
                                        <div class="form-group mb-3">
                                            <label for="updatePackages" class="text-white">Select ID</label>
                                            <select name="selectedId" class="w-100 form-control fs-5" id="selectedId" required>';

                            foreach ($allIds as $id) {
                                echo '<option value="' . $id . '">' . $id . '</option>';
                            }

                            echo '
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" class="input-text btn w-100 fs-5" style="padding: 6px 0px; color:#fff;background-color:#E07A5F;" value="Update">
                                    </div>
                                </form>';
                        } else if ($selectedOption == "remove_pkgs") {
                            echo '
                                <form method="post" action="adminDeleteProcess.php">
                            <h1 class="text-white pb-3 heading text-light">Select ID to delete the Package</h1>
                                <div class="col-12">
                            <div class="form-group mb-3">
                                <lable class="text-white">Select ID</lable>
                                    <select name="selectedId" class="w-100 form-control fs-5" id="selectedId" required>';
                            foreach ($allIds as $id) {
                                echo '<option value="' . $id . '">' . $id . '</option>';
                            }
                            echo '
                                    </select>
                                <div class="col-12 pt-3">
                                    <input type="submit" class="input-text btn w-100 fs-5" style="padding: 6px 0px; color:#fff;background-color:#E07A5F;" value="Delete">
                                </div>
                                
                                </form>
                            </div>
                            ';
                        } else if ($selectedOption == "ViewCountry") {
                            $sql = "SELECT * FROM countries";
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                echo "<div class='table-responsive'>";
                                echo "<h1 class='text-center text-white heading'>View Countries</h1>";
                                echo "<table  style='border-radius: 10px;' class='table table-responsive text-center' >
                                            <thead>
                                                <tr >
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Country ID</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Country Name</th>  
                                                </tr>
                                            </thead>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tbody>
                                            <tr>
                                                <th scope='row'>" . $row["CountryID"] . "</th>
                                                <td>" . $row["name"] . "</td>
                                                
                                                                                                
                                            </tr>";
                                }
                                echo "</table>";
                                echo '</div>';
                                mysqli_free_result($result);
                            } else {
                                echo '<table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                            </tr>
                                        </thead>';
                            }
                        } else if ($selectedOption == "addCountry") {
                            echo "<h1 class='text-center text-white heading'>Add Countries</h1>";

                            echo '
                                    <div class="container  px-5" >
                                    <form action="addCountries.php" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate method="post">
    
                                <div class="col-12">
                                    <label class="input-text fs-5 text-white col-12">Country Name</label>
                                    <input type="text" name="countryName" style="font-size: 15px;" class="w-100 form-control" required>
                                </div>
                            <div class="col-12">
                                <input type="submit" class="input-text btn w-100 fs-5" style="color:#fff;background-color:#E07A5F;" value="Enter to submit">
                            </div>
                        </form>
                                </div>
                                     ';
                        }
                        if ($selectedOption == "deleteCountry") {
                            // Fetch all country IDs
                            $result = $conn->query("SELECT CountryID FROM countries");
                            $allIds = [];
                            while ($row = $result->fetch_assoc()) {
                                $allIds[] = $row['CountryID'];
                            }

                            echo '
                            <form method="post" action="deleteCountries.php">
                                <h1 class="text-white pb-3 heading text-light">Select ID to delete the Country</h1>
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label class="text-white">Select ID</label>
                                        <select name="selectedId" class="w-100 form-control fs-5" id="selectedId" required>';
                            foreach ($allIds as $id) {
                                echo '<option value="' . $id . '">' . $id . '</option>';
                            }
                            echo '
                                        </select>
                                        <div class="col-12 pt-3">
                                            <input type="submit" class="input-text btn w-100 fs-5" style="padding: 6px 0px; color:#fff;background-color:#E07A5F;" value="Delete">
                                        </div>
                                    </div>
                                </div>
                            </form>';
                        } else if ($selectedOption == "viewCity") {
                            $sql = "SELECT * FROM cities";
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                echo "<div class='table-responsive'>";
                                echo "<h1 class='text-center text-white heading'>View Cities</h1>";
                                echo "<table  style='border-radius: 10px;' class='table table-responsive text-center' >
                                            <thead>
                                                <tr >
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>City ID</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>City Name</th>  
                                                </tr>
                                            </thead>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tbody>
                                            <tr>
                                                <th scope='row'>" . $row["CityID"] . "</th>
                                                <td>" . $row["name"] . "</td>
                                                
                                                                                                
                                            </tr>";
                                }
                                echo "</table>";
                                echo '</div>';
                                mysqli_free_result($result);
                            } else {
                                echo '<table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">City ID</th>
                                                <th scope="col">City Name</th>
                                            </tr>
                                        </thead>';
                            }
                        } else if ($selectedOption == "addCity") {

                            echo "<h1 class='text-center text-white heading'>Add Cities</h1>";

                            echo '
                            <div class="container px-5">
                                <form action="addCities.php" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate method="post">
                                    <div class="col-12">
                                        <label class="input-text fs-5 text-white col-12">City Name</label>
                                        <input type="text" name="cityName" style="font-size: 15px;" class="w-100 form-control" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="input-text fs-5 text-white col-12">Country</label>
                                        <select name="countryID" style="font-size: 15px;" class="w-100 form-control" required>';
                            // Fetch all countries from the database
                            $result = $conn->query("SELECT CountryID, name FROM countries");
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['CountryID'] . '">' . $row['name'] . '</option>';
                            }
                            echo '
                                </select>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" class="input-text btn w-100 fs-5" style="color:#fff;background-color:#E07A5F;" value="Enter to submit">
                                    </div>
                                </form>
                            </div>';
                        } else if ($selectedOption == "deleteCity") {
                            $result = $conn->query("SELECT CityID FROM cities");
                            $allIds = [];
                            while ($row = $result->fetch_assoc()) {
                                $allIds[] = $row['CityID'];
                            }
                            echo '
                            <form method="post" action="deleteCities.php">
                                <h1 class="text-white pb-3 heading text-light">Select ID to delete the City</h1>
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label class="text-white">Select ID</label>
                                        <select name="selectedId" class="w-100 form-control fs-5" id="selectedId" required>';
                            foreach ($allIds as $id) {
                                echo '<option value="' . $id . '">' . $id . '</option>';
                            }
                            echo '
                                        </select>
                                        <div class="col-12 pt-3">
                                            <input type="submit" class="input-text btn w-100 fs-5" style="padding: 6px 0px; color:#fff;background-color:#E07A5F;" value="Delete">
                                        </div>
                                    </div>
                                </div>
                            </form>';
                        }

                        // members
                        else if ($selectedOption == "viewMembers") {
                            $sql = "SELECT * FROM users WHERE membership IS NOT NULL AND membership <> '' ";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Output table if there are users with memberships
                                echo "<div class='table-responsive'>";
                                echo "<h1 class='text-center text-white heading'>View Users Membership</h1>";
                                echo "<table style='border-radius: 10px;' class='table table-responsive text-center'>
                                <thead>
                                    <tr>
                                        <th style='background-color:#ce6857;color:white;' scope='col'>User ID</th>
                                        <th style='background-color:#ce6857;color:white;' scope='col'>User Email</th>
                                        <th style='background-color:#ce6857;color:white;' scope='col'>User Membership</th>
                                    </tr>
                                </thead>
                                <tbody>";
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                <th scope='row'>" . htmlspecialchars($row["user_id"]) . "</th>
                                <td>" . htmlspecialchars($row["email"]) . "</td>
                                <td>" . htmlspecialchars($row["membership"]) . "</td>
                            </tr>";
                                }
                                echo "</tbody></table></div>";
                            } else {
                                // Output alternative message or empty table if no memberships
                                echo "<div class='table-responsive'>";
                                echo "<h1 class='text-center text-white heading'>No Memberships Available</h1>";
                                echo "<table class='table text-center'>
                            <thead>
                                <tr>
                                    <th style='background-color:#ce6857;color:white;' scope='col'>User ID</th>
                                    <th style='background-color:#ce6857;color:white;' scope='col'>User Email</th>
                                    <th style='background-color:#ce6857;color:white;' scope='col'>User Membership</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan='3'>No memberships found.</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>";
                            }
                        } else if ($selectedOption == "deleteMembership") {
                            // Query to select user IDs where membership is not null or empty
                            $sql = "SELECT user_id FROM users WHERE membership IS NOT NULL AND membership <> ''";
                            $result = $conn->query($sql);
                            $allIds = [];

                            // Fetch user IDs with memberships
                            while ($row = $result->fetch_assoc()) {
                                $allIds[] = $row['user_id'];
                            }

                            if (!empty($allIds)) {
                                // Show form if there are users with memberships
                                echo '
                                <form method="post" action="updateMembershipPro.php">
                                    <h1 class="text-white pb-3 heading text-light">Select ID to delete the Membership</h1>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label class="text-white">Select ID</label>
                                            <select name="selectedId" class="w-100 form-control fs-5" id="selectedId" required>';

                                foreach ($allIds as $id) {
                                    echo '<option value="' . htmlspecialchars($id) . '">' . htmlspecialchars($id) . '</option>';
                                }

                                echo '
                                            </select>
                                            <div class="col-12 pt-3">
                                                <input type="submit" class="input-text btn w-100 fs-5" style="padding: 6px 0px; color:#fff;background-color:#E07A5F;" value="Delete">
                                            </div>
                                        </div>
                                    </div>
                                </form>';
                            } else {
                                // Show a message if no users have memberships
                                echo '<p class="text-white">No memberships available to delete.</p>';
                            }
                        } else if ($selectedOption == "viewCustomize") {
                            $sql = "SELECT * FROM travel_custompackages";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<div class='table-responsive'>";
                                echo "<h1 class='text-center text-white heading'>View Customize Pacakges</h1>";
                                echo "<table  style='border-radius: 10px;' class='table table-responsive text-center' >
                                            <thead>
                                                <tr >
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Custom Package ID</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package Title</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package Price</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>No of Person</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package DurationDays</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package StartDate</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package EndDate</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package CreationDate</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package LastUpdated</th>
                                                    
                                                </tr>
                                            </thead>";

                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tbody>
                                            <tr>
                                                <th scope='row'>" . $row["CustomPackageID"] . "</th>
                                                <td>" . $row["PackageName"] . "</td>
                                                <td>" . $row["Price"] . "</td>
                                                <td>" . $row["No_Of_Person"] . "</td>
                                                <td>" . $row["DurationDays"] . "</td>
                                                <td>" . $row["StartDate"] . "</td>
                                                <td>" . $row["EndDate"] . "</td>
                                                <td>" . $row["CreationDate"] . "</td>
                                                <td>" . $row["LastUpdated"] . "</td>
                                                                                                
                                            </tr>";
                                }

                                echo "</table>";
                                echo '</div>';
                            } else {
                                echo "<div class='table-responsive'>";
                                echo "<h1 class='text-center text-white heading'>View Travel Pacakges</h1>";
                                echo "
                                            <table class='table text-center'>
                                            <thead >
                                                    <tr>
                                                     <th style='background-color:#ce6857;color:white;' scope='col'>Package ID</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package Title</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package Price</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>No Of Person</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package DurationDays</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package StartDate</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package EndDate</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package CreationDate</th>
                                                    <th style='background-color:#ce6857;color:white;' scope='col'>Package LastUpdated</th>
                                                    
                                                    </tr>
                                                </thead>
                                            </table>";
                            }
                        }
                        // else if ($selectedOption == "updateCustomize") {
                        //     $result = $conn->query("SELECT CustomPackageID FROM travel_custompackages");
                        //     $allIds = [];
                        //     while ($row = $result->fetch_assoc()) {
                        //         $allIds[] = $row['CustomPackageID'];
                        //     }
                        //     echo '
                        //         <form action="adminUpdateProcess.php" method="post">
                        //             <div class="col-12">
                        //                 <h1 class="text-center heading pb-3 text-light">Select ID to Update the Package</h1>
                        //                 <div class="form-group mb-3">
                        //                     <label for="updatePackages" class="text-white">Select ID</label>
                        //                     <select name="selectedId" class="w-100 form-control fs-5" id="selectedId" required>';

                        //     foreach ($allIds as $id) {
                        //         echo '<option value="' . $id . '">' . $id . '</option>';
                        //     }

                        //     echo '
                        //                     </select>
                        //                 </div>
                        //             </div>
                        //             <div class="col-12">
                        //                 <input type="submit" class="input-text btn w-100 fs-5" style="padding: 6px 0px; color:#fff;background-color:#E07A5F;" value="Update">
                        //             </div>
                        //         </form>';
                        // } 
                        else if ($selectedOption == "deleteCustomize") {
                            $result = $conn->query("SELECT CustomPackageID FROM travel_custompackages");
                            $allIds = [];
                            while ($row = $result->fetch_assoc()) {
                                $allIds[] = $row['CustomPackageID'];
                            }
                            echo '
                                <form method="post" action="">
                            <h1 class="text-white pb-3 heading text-light">Select ID to delete the Customize Package</h1>
                                <div class="col-12">
                            <div class="form-group mb-3">
                                <lable class="text-white">Select ID</lable>
                                    <select name="selectedId" class="w-100 form-control fs-5" id="selectedId" required>';
                            foreach ($allIds as $id) {
                                echo '<option value="' . $id . '">' . $id . '</option>';
                            }
                            echo '
                                    </select>
                                <div class="col-12 pt-3">
                                    <input type="submit" class="input-text btn w-100 fs-5" style="padding: 6px 0px; color:#fff;background-color:#E07A5F;" value="Delete">
                                </div>
                                
                                </form>
                            </div>
                            ';
                        }


                    else if ($selectedOption == "PendingBookings") {
                            include("db.php");
                        
                            $query = "SELECT 
                            billing.billing_id,
                            billing.user_id,
                            billing.PackageID,
                            billing.name,
                            billing.email,
                            billing.address,
                            billing.phone,
                            billing.totalPrice,
                            billing.tax,
                            billing.memberDiscount,
                            billing.card_name,
                            billing.card_number,
                            billing.payment_status,
                            billing.created_at,
                            travel_packages.PackageName AS PackageName,
                            travel_packages.PackageType AS PackageType,
                            cities.name AS city_name,
                            countries.name AS country_name
                          FROM 
                            billing
                            JOIN cities ON billing.CityID = cities.CityID
                            JOIN countries ON cities.CountryID = countries.CountryID
                            JOIN travel_packages ON billing.PackageID = travel_packages.PackageID";
                


                        
                            $result = $conn->query($query);
                        
                            if ($result->num_rows > 0) {
                                echo '<h2 class="h2 hero-title text-center text-white">Pending Booking</h2>';
                                echo '<table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>City</th>                                                
                                                <th>Booking Package</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                        
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>
                                                <td>' . $row['billing_id'] . '</td>
                                                <td>' . $row['name'] . '</td>
                                                <td>' . $row['email'] . '</td>
                                                <td>' . $row['phone'] . '</td>
                                                <td>' . $row['city_name'] . '</td>
                                                <td>' . $row['PackageName'] . '</td>
                                                <td>' . $row['payment_status'] . '</td>
                                                <td class="d-flex h-100 justify-content-center" style="margin-top: -15px;">
                                                    <button title="View Details" class="btn fs-4 p-2" data-toggle="modal" data-target="#viewDetailsModal' . $row['billing_id'] . '"><i class="bi bi-info-circle-fill"></i></button>
                                                    <a href="bookingAcception.php?id=' . $row['billing_id'] . '" title="Accept Booking" class="btn fs-4 p-2"><i class="bi bi-check-circle-fill text-success"></i></a>
                                                    <a href="bookingRejection.php?id=' . $row['billing_id'] . '" title="Reject Booking" class="btn fs-4 p-2"><i class="bi bi-x-circle-fill text-danger"></i></a>
                                                </td>
                                            </tr>';
                        
                                    // Modal for view details
                                    echo '<div class="modal fade" id="viewDetailsModal' . $row['billing_id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Booking Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        
                                                        <p class="text-dark">Address: ' . $row['address'] . '</p>
                                                        <p class="text-dark">Country: ' . $row['country_name'] . '</p>
                                                        <p class="text-dark">City: ' . $row['city_name'] . '</p>
                                                        <p class="text-dark">Package Name: ' . $row['PackageName'] . '</p>
                                                        <p class="text-dark">Package Type: ' . $row['PackageType'] . '</p>
                                                        <p class="text-dark">Total Price: ' . $row['totalPrice'] . '</p>
                                                        <p class="text-dark">Total Tax: ' . $row['tax'] . '</p>
                                                        <p class="text-dark">Membership Discount: ' . $row['memberDiscount'] . '</p>
                                                        <p class="text-dark">Card Holder Name: ' . $row['card_name'] . '</p>
                                                        <p class="text-dark">Card Number: ' . $row['card_number'] . '</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                }
                        
                                echo '</tbody></table>';
                            } else {
                                echo '
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>City</th>
                                                <th>PackageName</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                    </table>';
                            }
                            $result->free_result();
                        
                    
                        
                                }
                                
                                else if ($selectedOption == "CompletedBookings") {
                                    include("db.php");
    
                                    $query = "SELECT * FROM bookings WHERE payment_status = 'Completed'";
                                    $result = $conn->query($query);
    
                                    if ($result->num_rows > 0) {
                                        echo '<h2 class="h2 hero-title text-center text-white">Completed Orders</h2>';
                                        echo '<table class="table table-bordered table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Tax</th>
                                                        <th>Total Price</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>';
    
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr>
                                                            <td>' . $row['booking_id'] . '</td>
                                                            <td>' . $row['name'] . '</td>
                                                            <td>' . $row['email'] . '</td>
                                                            <td>' . $row['phone'] . '</td>
                                                            <td>' . $row['tax'] . '</td>
                                                            <td>' . $row['totalPrice'] . '</td>
                                                            <td>' . $row['payment_status'] . '</td>
                                                        </tr>';
                                        }
    
                                        echo '</tbody></table>';
                                    } else {
                                        echo '
                                            <table class="table table-bordered table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Tax</th>
                                                        <th>Grand Total</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                            </table>';
                                    }
                                    $result->free_result();

                                }












                        //      else if ($selectedOption == "") {
                        //         $sql = "SELECT * FROM travelling_Details";
                        //         $result = mysqli_query($conn, $sql);

                        //         if ($result) {
                        //             echo '<h2 class="h2 hero-title text-center text-white">View Travel Details</h2>';
                        //             echo '<table class="table">
                        //                     <thead>
                        //                         <tr>
                        //                             <th style="background-color:#f5ebe5;" scope="col">ID</th>
                        //                             <th style="background-color:#f5ebe5;" scope="col">Name</th>
                        //                             <th style="background-color:#f5ebe5;" scope="col">Email</th>
                        //                             <th style="background-color:#f5ebe5;" scope="col">Essay</th>
                        //                             <th style="background-color:#f5ebe5;" scope="col">Story</th>
                        //                             <th style="background-color:#f5ebe5;" scope="col">Declaration</th>
                        //                         </tr>
                        //                     </thead>
                        //                     <tbody>';

                        //             while ($row = mysqli_fetch_assoc($result)) {
                        //                 echo '<tr>
                        //                         <th>' . $row["id"] . '</th>
                        //                         <td>' . $row["adultname"] . '</td>
                        //                         <td>' . $row["email"] . '</td>
                        //                         <td>
                        //                             <button class="btn btn-outline-info" style="padding:5px 5px;font-size:16px;" data-toggle="modal" data-target="#essayModal' . $row["id"] . '">View Essay</button>
                        //                         </td>
                        //                         <td>
                        //                             <button class="btn btn-outline-info" style="padding:5px 5px;font-size:16px;" data-toggle="modal" data-target="#storyModal' . $row["id"] . '">View Story</button>
                        //                         </td>
                        //                         <td>
                        //                             <form action="declareWinnerAdult.php" method="post">
                        //                                 <input type="hidden" name="id" value="' . $row["id"] . '">
                        //                                 <input type="hidden" name="adultname" value="' . $row["adultname"] . '">
                        //                                 <input type="hidden" name="email" value="' . $row["email"] . '">
                        //                                 <input type="hidden" name="essay" value="' . $row["essay"] . '">
                        //                                 <input type="hidden" name="story" value="' . $row["story"] . '">
                        //                                 <input type="submit" class="btn btn-outline-success" style="padding:5px 0px;font-size:16px;" value="Delcare Winner">
                        //                             </form>
                        //                         </td>
                        //                     </tr>';

                        //                 echo '<div class="modal fade" id="essayModal' . $row["id"] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        //                         <div class="modal-dialog" role="document">
                        //                             <div class="modal-content">
                        //                                 <div class="modal-header">
                        //                                     <h3 class="modal-title" id="exampleModalLabel">Essay of ' . $row['adultname'] . '</h3>
                        //                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        //                                         <span aria-hidden="true">&times;</span>
                        //                                     </button>
                        //                                 </div>
                        //                                 <div class="modal-body">
                        //                                     <p class="text-dark">' . nl2br($row["essay"]) . '</p>
                        //                                 </div>
                        //                             </div>
                        //                         </div>
                        //                     </div>';
                        //                 echo '<div class="modal fade" id="storyModal' . $row["id"] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        //                         <div class="modal-dialog" role="document">
                        //                             <div class="modal-content">
                        //                                 <div class="modal-header">
                        //                                     <h3 class="modal-title" id="exampleModalLabel">Essay of ' . $row['adultname'] . '</h3>
                        //                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        //                                         <span aria-hidden="true">&times;</span>
                        //                                     </button>
                        //                                 </div>
                        //                                 <div class="modal-body">
                        //                                     <p class="text-dark">' . nl2br($row["story"]) . '</p>
                        //                                 </div>
                        //                             </div>
                        //                         </div>
                        //                     </div>';
                        //             }

                        //             echo '</tbody></table>';
                        //             mysqli_free_result($result);
                        //         } else {
                        //             echo '<table class="table">
                        //                     <thead>
                        //                         <tr>
                        //                             <th scope="col">ID</th>
                        //                             <th scope="col">Name</th>
                        //                             <th scope="col">Email</th>
                        //                             <th scope="col">Essay</th>
                        //                         </tr>
                        //                     </thead>';
                        //         }
                        //     } 

                        // } else if ($selectedOption == "PendingOrders") {
                        //         include("db.php");

                        //         $query = "SELECT * FROM manageOrders WHERE status = ''";
                        //         $result = $conn->query($query);

                        //         if ($result->num_rows > 0) {
                        //             echo '<h2 class="h2 hero-title text-center text-white">Pending Orders</h2>';
                        //             echo '<table class="table table-bordered table-responsive">
                        //                     <thead>
                        //                         <tr>
                        //                             <th>ID</th>
                        //                             <th>Name</th>
                        //                             <th>Email</th>
                        //                             <th>Phone</th>
                        //                             <th>Country</th>
                        //                             <th>Status</th>
                        //                             <th>Actions</th>
                        //                         </tr>
                        //                     </thead>
                        //                     <tbody>';

                        //             while ($row = $result->fetch_assoc()) {
                        //                 echo '<tr>
                        //                                 <td>' . $row['id'] . '</td>
                        //                                 <td>' . $row['name'] . '</td>
                        //                                 <td>' . $row['email'] . '</td>
                        //                                 <td>' . $row['phone'] . '</td>
                        //                                 <td>' . $row['Country'] . '</td>
                        //                                 <td>' . $row['status'] . '</td>
                        //                                 <td class="d-flex h-100 justify-content-center">
                        //                                     <button title="View Details" class="btn fs-2 p-2" data-toggle="modal" data-target="#viewDetailsModal' . $row['id'] . '"><i class="bi bi-info-circle-fill"></i></button>
                        //                                     <a href="orderAcception.php?id=' . $row['id'] . '" title="Accept Order" class="btn fs-2 p-2"><i class="bi bi-check-circle-fill text-success"></i></a>
                        //                                     <a href="orderRejection.php?id=' . $row['id'] . '" title="Reject Order" class="btn fs-2 p-2"><i class="bi bi-x-circle-fill text-danger"></i></a>
                        //                                 </td>
                        //                             </tr>';

                        //                 // Modal for view details
                        //                 echo '<div class="modal fade" id="viewDetailsModal' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        //                         <div class="modal-dialog modal-dialog-centered" role="document">
                        //                             <div class="modal-content">
                        //                                 <div class="modal-header">
                        //                                     <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                        //                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        //                                         <span aria-hidden="true">&times;</span>
                        //                                     </button>
                        //                                 </div>
                        //                                 <div class="modal-body">
                        //                                     <p class="text-dark">Name: ' . $row['name'] . '</p>
                        //                                     <p class="text-dark">Email: ' . $row['email'] . '</p>
                        //                                     <p class="text-dark">Phone: ' . $row['phone'] . '</p>
                        //                                     <p class="text-dark">Address: ' . $row['address'] . '</p>
                        //                                     <p class="text-dark">Country: ' . $row['Country'] . '</p>
                        //                                     <p class="text-dark">Card Holder Name: ' . $row['card_holder_name'] . '</p>
                        //                                     <p class="text-dark">Tax include:' . $row['total_tax'] . '</p>
                        //                                 </div>
                        //                             </div>
                        //                         </div>
                        //                     </div>';
                        //             }

                        //             echo '</tbody></table>';
                        //         } else {
                        //             echo '
                        //                 <table class="table table-bordered table-responsive">
                        //                     <thead>
                        //                         <tr>
                        //                             <th>ID</th>
                        //                             <th>Name</th>
                        //                             <th>Email</th>
                        //                             <th>Phone</th>
                        //                             <th>Country</th>
                        //                             <th>Status</th>
                        //                             <th>Actions</th>
                        //                         </tr>
                        //                     </thead>
                        //                 </table>';
                        //         }
                        //         $result->free_result();
                        //     } else if ($selectedOption == "CompletedOrders") {
                        //         include("db.php");

                        //         $query = "SELECT * FROM acceptedOrders WHERE status = 'Completed'";
                        //         $result = $conn->query($query);

                        //         if ($result->num_rows > 0) {
                        //             echo '<h2 class="h2 hero-title text-center text-white">Completed Orders</h2>';
                        //             echo '<table class="table table-bordered table-responsive">
                        //                     <thead>
                        //                         <tr>
                        //                             <th>ID</th>
                        //                             <th>Name</th>
                        //                             <th>Email</th>
                        //                             <th>Phone</th>
                        //                             <th>Country</th>
                        //                             <th>Grand Total</th>
                        //                             <th>Status</th>
                        //                         </tr>
                        //                     </thead>
                        //                     <tbody>';

                        //             while ($row = $result->fetch_assoc()) {
                        //                 echo '<tr>
                        //                                 <td>' . $row['id'] . '</td>
                        //                                 <td>' . $row['name'] . '</td>
                        //                                 <td>' . $row['email'] . '</td>
                        //                                 <td>' . $row['phone'] . '</td>
                        //                                 <td>' . $row['Country'] . '</td>
                        //                                 <td>' . $row['Grand_total'] . '</td>
                        //                                 <td>' . $row['status'] . '</td>
                        //                             </tr>';
                        //             }

                        //             echo '</tbody></table>';
                        //         } else {
                        //             echo '
                        //                 <table class="table table-bordered table-responsive">
                        //                     <thead>
                        //                         <tr>
                        //                             <th>ID</th>
                        //                             <th>Name</th>
                        //                             <th>Email</th>
                        //                             <th>Phone</th>
                        //                             <th>Country</th>
                        //                             <th>Grand Total</th>
                        //                             <th>Status</th>
                        //                         </tr>
                        //                     </thead>
                        //                 </table>';
                        //         }
                        //         $result->free_result();
                    } else {
                        echo '<h1 class="text-white h2 hero-title">Welcome Admin</h1><br>';
                        echo '<p class="text-light">Here You can Add, Update, Delete & View TravelEAse in the Database</p>';
                        echo '<p class="text-light">You can also view the remaining details of this Website</p>';
                    }

                    ?>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script>
        function displaySelectedValue() {
            var dropdown = document.getElementById("myDropdown");

            var selectedValue = dropdown.options[dropdown.selectedIndex].value;

            document.getElementById("selectedValue").innerText = selectedValue;
        }

        function displaySelectedFormat() {
            var dropdown = document.getElementById("myDropdown2");

            var selectedValue = dropdown.options[dropdown.selectedIndex].value;

            document.getElementById("selectedFormat").innerText = selectedValue;
        }
    </script>
</body>

</html>