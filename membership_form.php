<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <!-- CSS FILES -->                
      <link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/bootstrap-icons.css" rel="stylesheet">

<link href="css/templatemo-tiya-golf-club.css" rel="stylesheet">
</head>
<body>
    
<section class="membership-section section-padding" id="section_3">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 text-center mx-auto mb-lg-5 mb-4">
                            <h2><span>Membership</span> at TravelEase</h2>
                        </div>

                        <div class="col-lg-6 col-12 mb-3 mb-lg-0">
                            <h4 class="mb-4 pb-lg-2">Our Membership Plan & Price</h4>

                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th style="width: 34%;">Yearly Access</th>
                                            
                                            <th style="width: 22%;"> $420</th>
                                            
                                            <th style="width: 22%;"> $640</th>
                                            
                                            <th style="width: 22%;">$860</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-start">Diamond</th>
                                            
                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>
                                            
                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>
                                            
                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="text-start">Gold</th>

                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="text-start"> Silver</th>

                                            <td>
                                                <i class="bi-x-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="text-start"> platinium</th>

                                            <td>
                                                <i class="bi-x-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="text-start">Premium</th>

                                            <td>
                                                <i class="bi-x-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-x-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <th scope="row" class="text-start">Pro's Networking</th>

                                            <td>
                                                <i class="bi-x-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-x-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <?php
    if (isset($_SESSION["accountError"])) {
        echo '<div class="alert alert-danger" role="alert">Create an account first</div>';
    }
    ?>
                        <div class="col-lg-5 col-12 mx-auto">
                        <h4 class="mb-4 pb-lg-2">Please join us!</h4>
                            <form action="process_membership.php" method="post" class="custom-form membership-form shadow-lg" role="form">
                                <h4 class="text-white mb-4">Become a member</h4>
                                <?php
                    if (isset($_SESSION["planError"])) {
                        $msg = $_SESSION["planError"];
                        echo '<div class="alert alert-danger" role="alert">' . $msg . '</div>';
                        unset($_SESSION["planError"]); // Clear the error after displaying it
                    }
                    ?>       
                                    <div class="form-floating">
                                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required="">
                                        
                                        <label for="floatingInput">Email address</label>
                                    </div>

                                    <div class="form-floating">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                                            <label for="password">Password</label>
                                    </div>     
                                    <div class="form-floating">
                        <label for="membership" class="section-subtitle!" style="color: #ffff;"><center>Select the Plan</center></label><br><br>
                        <select required class="input-field border border-1 col-12" style="border-radius: 15px;" class="form-control" name="selectedOption" id="">
                            <option disabled selected>Select a plan</option>
                            <option value="Diamond">Diamond</option>
                            <option value="Gold">Gold</option>
                            <option value="Silver">Silver</option>
                            <option value="Platinum">Platinum</option>
                            <option value="Basic">Basic</option>
                            <option value="Premium">Premium</option>
                        </select>
                    </div><br>
                                    <button type="submit" class="form-control">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>
</body>
</html>