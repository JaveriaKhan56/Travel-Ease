<?php
include("db.php");
print_r($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $selectedId = $_POST['selectedId'];
     $sql = 'SELECT * FROM travel_packages WHERE PackageID=?';
     $stmt = $conn->prepare($sql);
     $stmt->bind_param("i", $selectedId);

     $stmt->execute();
     $result = $stmt->get_result();
     if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
     } else {
          echo "No records found";
     }
     $stmt->close();
     $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Update Travel Packages</title>
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
     .heading{
            font-family:'Courier New', Courier, monospace;
        }
       
    </style>
</head>

<body class="container" style="background-color:var(--secondary-color);  padding:50px 100px;">
<div class="container d-flex px-5" style="flex-direction:column; align-items:center; ">
<h1 class='text-center text-white heading'>Update Travel Pacakges</h1>
                      <form action="adminUpdateFinal.php" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate method="post">
                         <div class="col-12">
                              <label for="PackageID" class="text-white">You are updating the ID No: <?php echo $row['PackageID'] ?></label>
                              <input type="hidden" name="PackageID" value="<?php echo $row['PackageID'] ?>">
                         </div>
                         <div class="col-12">
                                <label class="input-text fs-5 text-white col-12">Package Name</label>
                                <input value="<?php echo $row['PackageName']; ?>" type="text" name="PackageName" style="font-size: 15px;" class="form-control" required>
                         </div>
                            
                            <div class="text-white "> <span class="fs-5">Packages Type </span>
                                <select required class="col-12 border pt-1 pb-1 pe-2 ps-2  rounded-2" name="PackageType" id="myDropdown packageType " onchange="displaySelectedValue()"> 
                                    <option class="shadow rounded-2" disabled selected hidden><span class="text-secondary">
                                    Select a Packages Type</span></option>
                                    <option class="shadow rounded-2" value="Solo">Solo</option>
                                    <option class="shadow rounded-2" value="Couple">Couple </option>
                                    <option class="shadow rounded-2" value="Family">Family</option>
                                </select>
                               <center><small class="col-12 text-white pt-1" name="PackageType" id="selectedValue">Selected: <?php echo $row['PackageType']; ?></small></center>                                 
                            </div>

                            <div class="mb-1">
                                <label class="fs-5 text-white col" for="pkgImage">Select a Travel Package Image</label>
                                <input type="file" value="<?php echo $row['pkgImage']; ?>" accept="image/" class="form-control pt-1 pb-1 col-9" name="pkgImage" required id="inputGroupFile01">
                            </div>

                            <div class="input-group col-12">
                                <label class="input-text fs-5 text-white col-12">Add Details</label>
                                <textarea class="form-control" name="Details" aria-label="With textarea" style="resize: none;font-size: 12px;"><?php echo $row['Details']; ?></textarea>
                            </div>

                            <!-- <div class="input-group mb-3">
                                   <label class="input-text fs-5 text-white col-12" id="basic-addon1">Enter the Discount</label>
                                   <input type="number" name="" accept="number_format" max="99" min="1" class="form-control pt-1 pb-1 col-9 fs-5" placeholder="Discount" aria-label="Discount" aria-describedby="bookDiscount">
                              </div> -->

                              <div class="input-group mb-3">
                                   <label class="input-text fs-4 text-white col-12"> Package Price</label>
                                   <input type="number" value="<?php echo $row['Price']; ?>" name="Price" class="form-control  pt-1 pb-1 col-9 " aria-label="Amount (to the nearest dollar)">
                                   <span class="input-group-text ">$</span>
                              </div>

                                   <!-- Start Date Input -->
                                   <div class="input-group mb-3">
                                   <label class="input-text fs-4 text-white col-12" id="basic-addon2">Start Date</label>
                                   <input type="date" value="<?php echo $row['StartDate']; ?>" name="StartDate" class="form-control " aria-label="Start Date" required>
                              </div>

                                   <!-- End Date Input -->
                                   <div class="input-group mb-3">
                                   <label class="input-text fs-4 text-white col-12" id="basic-addon3">End Date</label>
                                   <input type="date" value="<?php echo $row['EndDate']; ?>" name="EndDate" class="form-control " aria-label="End Date" required>
                              </div>


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


                            <div class="col-12">
                               <center> <input type="submit" class="input-text btn fs-5" style="color:#fff;background-color:#E07A5F;" value="Enter to submit"></center>
                            </div>
                        </form>
                                </div>
     </div>
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