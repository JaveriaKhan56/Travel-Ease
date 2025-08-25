<?php
include "db.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user_id = $_SESSION['Logged_In']['id'] ?? "";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Our Travel Packages</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap"
        rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/templatemo-tiya-golf-club.css?v=<?php echo time() ?>" rel="stylesheet">
    <style>
        /* Styles for the card container */
        .card {
            overflow: hidden;
            /* Ensure that the border-radius is applied to children */
            transition: transform 0.3s ease;
            /* Smooth transition for hover effect */
        }

        .card-img-top {
            border-bottom: 1px solid #ddd;
            /* Optional: adds a subtle border between image and content */
            transition: transform 0.3s ease;
            /* Smooth zoom effect */
        }

        /* Hover effect for the image */
        .card:hover .card-img-top {
            transform: scale(1.02);
            /* Zoom in effect on hover */
        }

        .bttn:hover {
            background-color: #579577;
        }
    </style>
</head>

<body>
    <?php
    include("nav.php");
    ?>
    </div>
    <main>


        <section class="hero-section hero-50 d-flex justify-content-center align-items-center" id="section_1">

            <div class="section-overlay"></div>

            <svg viewBox="0 0 1962 178" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path fill="#3D405B" d="M 0 114 C 118.5 114 118.5 167 237 167 L 237 167 L 237 0 L 0 0 Z"
                    stroke-width="0"></path>
                <path fill="#3D405B" d="M 236 167 C 373 167 373 128 510 128 L 510 128 L 510 0 L 236 0 Z"
                    stroke-width="0"></path>
                <path fill="#3D405B" d="M 509 128 C 607 128 607 153 705 153 L 705 153 L 705 0 L 509 0 Z"
                    stroke-width="0"></path>
                <path fill="#3D405B" d="M 704 153 C 812 153 812 113 920 113 L 920 113 L 920 0 L 704 0 Z"
                    stroke-width="0"></path>
                <path fill="#3D405B" d="M 919 113 C 1048.5 113 1048.5 148 1178 148 L 1178 148 L 1178 0 L 919 0 Z"
                    stroke-width="0"></path>
                <path fill="#3D405B" d="M 1177 148 C 1359.5 148 1359.5 129 1542 129 L 1542 129 L 1542 0 L 1177 0 Z"
                    stroke-width="0"></path>
                <path fill="#3D405B" d="M 1541 129 C 1751.5 129 1751.5 138 1962 138 L 1962 138 L 1962 0 L 1541 0 Z"
                    stroke-width="0"></path>
            </svg>

            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12">

                        <h1 class="text-white mb-4 pb-2">Our Packages</h1>

                        <a href="#section_3" class="btn custom-btn smoothscroll me-3">Explore Packages</a>
                    </div>

                </div>
            </div>

            <svg viewBox="0 0 1962 178" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path fill="#ffffff" d="M 0 114 C 118.5 114 118.5 167 237 167 L 237 167 L 237 0 L 0 0 Z"
                    stroke-width="0"></path>
                <path fill="#ffffff" d="M 236 167 C 373 167 373 128 510 128 L 510 128 L 510 0 L 236 0 Z"
                    stroke-width="0"></path>
                <path fill="#ffffff" d="M 509 128 C 607 128 607 153 705 153 L 705 153 L 705 0 L 509 0 Z"
                    stroke-width="0"></path>
                <path fill="#ffffff" d="M 704 153 C 812 153 812 113 920 113 L 920 113 L 920 0 L 704 0 Z"
                    stroke-width="0"></path>
                <path fill="#ffffff" d="M 919 113 C 1048.5 113 1048.5 148 1178 148 L 1178 148 L 1178 0 L 919 0 Z"
                    stroke-width="0"></path>
                <path fill="#ffffff" d="M 1177 148 C 1359.5 148 1359.5 129 1542 129 L 1542 129 L 1542 0 L 1177 0 Z"
                    stroke-width="0"></path>
                <path fill="#ffffff" d="M 1541 129 C 1751.5 129 1751.5 138 1962 138 L 1962 138 L 1962 0 L 1541 0 Z"
                    stroke-width="0"></path>
            </svg>
        </section>


        <section class="events-section section-padding" id="section_2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <h2 class="mb-lg-5 mb-4">Couples Packages</h2>
                    </div>
                    <?php
                    $query = "SELECT * FROM travel_packages WHERE PackageType = 'couple'";
                    $data = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($data)) {

                        echo '
    <div class="border-0 col-lg-6 col-12 mb-5 mb-lg-4">
        <div class="card border-0 position-relative rounded-top-5">
            <a href="#" class="packagesImageWrapper">
                <div class="position-absolute top-50 start-50 translate-middle">
                    <i class="bi-link fs-1"></i>
                </div>
                <img height="400px" src="static/images/' . $row['pkgImage'] . '" class="card-img-top rounded-top-5" alt="...">
            </a>
            <div class="card-body p-0 border-0">
                <div class="col-12 d-flex">
                    <div class="custom-btn-wrap col-6 rounded-0" style="background-color: #81B29A;">
                        <form action="couplePackageDetails.php" class="w-100 bttn pb-0" method="get">
                            <input type="hidden" name="PackageID" value="' . $row['PackageID'] . '">
                            <button class="btn col-12 text-white d-flex align-items-center justify-content-center py-3 rounded-0" type="submit">
                                <strong style="font-size: smaller;">View Package</strong>
                            </button>
                        </form>
                    </div>
                    <div class="custom-btn-wrap col-6 rounded-0 border-0">
                        <a href="billing.php?PackageID=' . $row['PackageID'] . '&user_id=' . $user_id . '" class="custom-btn col-12 d-flex align-items-center justify-content-center py-3 rounded-0">
                            Buy Package
                        </a>
                    </div>
                </div>
            </div>
            <div class="custom-block-info">
                <center>
                    <a href="event-detail.html" class="events-title mb-2">' . $row['PackageName'] . '</a>
                    <p class="mb-0">Enjoy our amazing Tour</p>
                </center>
            </div>
        </div>
    </div>';
                    }
                    ?>

                    <div class="col-lg-6 col-12 mb-5 mb-lg-4">
                        <div class="card border-0 position-relative rounded-top-5">
                            <a href="" class="packagesImageWrapper">
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <i class="bi-link fs-1"></i>
                                </div>
                                <img height="400px" src="../TravelEase/images/coparis.webp"
                                    class="card-img-top rounded-top-5" alt="...">
                            </a>

                            <div class="card-body p-0 border-0">
                                <div class="col-12 d-flex">
                                    <div class="custom-block-date-wrap py-3 col-6 rounded-0">
                                        <strong class="text-white">18 Feb 2023</strong>
                                    </div>
                                    <div class="custom-btn-wrap col-6 rounded-0">
                                        <a href="Packages_details.php"
                                            class="btn custom-btn col-12 d-flex align-items-center justify-content-center py-3 rounded-0"
                                            style="height: 60px;">Buy Package
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-block-info">
                                <a href="event-detail.html" class="align-items-center justify-content-center d-flex events-title mb-2">Paris Tour</a>

                                <p class="align-items-center justify-content-center d-flex mb-0">Enjoy our amazing Tour</p>


                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-12 mb-5 mb-lg-4">
                        <div class="card border-0 position-relative rounded-top-5">
                            <a href="#" class="packagesImageWrapper">
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <i class="bi-link fs-1"></i>
                                </div>
                                <img height="400px" src="../TravelEase/images/cod.webp"
                                    class="card-img-top rounded-top-5" alt="...">
                            </a>

                            <div class="card-body p-0 border-0">
                                <div class="col-12 d-flex">
                                    <div class="custom-block-date-wrap py-3 col-6 rounded-0">
                                        <strong class="text-white">18 Feb 2023</strong>
                                    </div>
                                    <div class="custom-btn-wrap col-6 rounded-0">
                                        <a href="Packages_details.php"
                                            class="btn custom-btn col-12 d-flex align-items-center justify-content-center py-3 rounded-0"
                                            style="height: 60px;">Buy Package
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-block-info">
                                <a href="event-detail.html" class="align-items-center justify-content-center d-flex events-title mb-2">Dubai Tour</a>

                                <p class="align-items-center justify-content-center d-flex mb-0">Enjoy our amazing Tour</p>


                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-lg-6 col-12 mb-5 mb-lg-4">
                        <a class="position-relative packagesImageWrapper col-12" href="#">
                            <img src="./images/anna-rosar-ZxFyVBHMK-c-unsplash.jpg"
                                class="img-fluid object-fit-cover object-position-center rounded-top-5 w-100 h-auto">
                            <div class="position-absolute top-50 start-50 translate-middle">
                                <i class="bi-link fs-1"></i>
                            </div>
                        </a>
                        <div class="col-12 d-flex rounded-bottom-5">
                            <div class="custom-block-date-wrap py-3 col-6 rounded-0">
                                <strong class="text-white">18 Feb 2023</strong>
                            </div>
                            <div class="custom-btn-wrap col-6 rounded-0">
                                <a href="Packages_details.php"
                                    class="btn custom-btn col-12 d-flex align-items-center justify-content-center py-3 rounded-0"
                                    style="height: 60px;">Buy Package
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12 mb-5 mb-lg-4" style="height: 400px;">
                        <a class="position-relative packagesImageWrapper col-12" href="#">
                            <img src="./images/anna-rosar-ZxFyVBHMK-c-unsplash.jpg"
                                class="img-fluid object-fit-cover object-position-center rounded-top-5 w-100 h-auto"
                                style="transition: all 0.3s ease;">
                            <div class="position-absolute top-50 start-50 translate-middle">
                                <i class="bi-link fs-1"></i>
                            </div>
                        </a>
                        <div class="col-12 d-flex rounded-bottom-5">
                            <div class="custom-block-date-wrap py-3 col-6 rounded-0">
                                <strong class="text-white">18 Feb 2023</strong>
                            </div>
                            <div class="custom-btn-wrap col-6 rounded-0">
                                <a href="Packages_details.php"
                                    class="btn custom-btn col-12 d-flex align-items-center justify-content-center py-3 rounded-0"
                                    style="height: 60px;">Buy Package</a>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </section>


        <section class="events-section events-listing-section section-bg section-padding" id="section_3">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <h2 class="mb-3">Upcoming Couple Travel Packages</h2>
                    </div>

                    <div class="row custom-block mb-3">
                        <div class="col-lg-2 col-md-4 col-12 order-2 order-md-0 order-lg-0">
                            <div
                                class="custom-block-date-wrap d-flex d-lg-block d-md-block align-items-center mt-3 mt-lg-0 mt-md-0">
                                <h6 class="custom-block-date mb-lg-1 mb-0 me-3 me-lg-0 me-md-0">24</h6>

                                <strong class="text-white">Feb 2023</strong>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-8 col-12 order-1 order-lg-0">
                            <div class="custom-block-image-wrap">
                                <a href="event-detail.html">
                                    <img src="images/professional-golf-player.jpg" class="custom-block-image img-fluid"
                                        alt="">

                                    <i class="custom-block-icon bi-link"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12 order-3 order-lg-0">
                            <div class="custom-block-info mt-2 mt-lg-0">
                                <a href="event-detail.html" class="events-title mb-3">Malaysia</a>

                                <p class="mb-0">You can browse many different categories of CSS templates using <a
                                        href="https://templatemo.com/tag" target="_blank">tags</a> on TemplateMo
                                    website. Feel free to browse more templates and download them free instantly.</p>

                                <div class="d-flex flex-wrap border-top mt-4 pt-3">

                                    <div class="mb-4 mb-lg-0">
                                        <div class="d-flex flex-wrap align-items-center mb-1">
                                            <span class="custom-block-span">Location:</span>

                                            <p class="mb-0">National Center, NYC</p>
                                        </div>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <span class="custom-block-span">Ticket:</span>

                                            <p class="mb-0">$150</p>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center ms-lg-auto">
                                        <a href="event-detail.html" class="btn custom-btn">Buy Ticket</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row custom-block custom-block-bg">
                        <div class="col-lg-2 col-md-4 col-12 order-2 order-md-0 order-lg-0">
                            <div
                                class="custom-block-date-wrap d-flex d-lg-block d-md-block align-items-center mt-3 mt-lg-0 mt-md-0">
                                <h6 class="custom-block-date mb-lg-1 mb-0 me-3 me-lg-0 me-md-0">16</h6>

                                <strong class="text-white">Mar 2023</strong>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-8 col-12 order-1 order-lg-0">
                            <div class="custom-block-image-wrap">
                                <a href="event-detail.html">
                                    <img src="images/girl-taking-selfie-with-friends-golf-field.jpg"
                                        class="custom-block-image img-fluid" alt="">

                                    <i class="custom-block-icon bi-link"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12 order-3 order-lg-0">
                            <div class="custom-block-info mt-2 mt-lg-0">
                                <a href="event-detail.html" class="events-title mb-3">America</a>

                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.</p>

                                <div class="d-flex flex-wrap border-top mt-4 pt-3">

                                    <div class="mb-4 mb-lg-0">
                                        <div class="d-flex flex-wrap align-items-center mb-1">
                                            <span class="custom-block-span">Location:</span>

                                            <p class="mb-0">National Center, NYC</p>
                                        </div>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <span class="custom-block-span">Ticket:</span>

                                            <p class="mb-0">$250</p>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center ms-lg-auto">
                                        <a href="event-detail.html" class="btn custom-btn">Buy Ticket</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 me-auto mb-5 mb-lg-0">
                    <a class="navbar-brand d-flex align-items-center" href="index.html">
                        <img src="images/logo.png" class="navbar-brand-image img-fluid" alt="">
                        <span class="navbar-brand-text">
                            Travel
                            <small>Ease</small>
                        </span>
                    </a>
                </div>

                <div class="col-lg-3 col-12">
                    <h5 class="site-footer-title mb-4">Join Us</h5>

                    <p class="d-flex border-bottom pb-3 mb-3 me-lg-3">
                        <span>Mon-Fri</span>
                        6:00 AM - 6:00 PM
                    </p>

                    <p class="d-flex me-lg-3">
                        <span>Sat-Sun</span>
                        6:30 AM - 8:30 PM
                    </p>
                    <br>
                    <p class="copyright-text">Copyright © 2048 TravelEase</p>
                </div>

                <div class="col-lg-2 col-12 ms-auto">
                    <ul class="social-icon mt-lg-5 mt-3 mb-4">
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-instagram"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-twitter"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-whatsapp"></a>
                        </li>
                    </ul>

                    <p class="copyright-text"> <a rel="nofollow" href="https://templatemo.com"
                            target="_blank"></a></p>
                </div>

            </div>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#81B29A" fill-opacity="1"
                d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
            </path>
        </svg>
    </footer>


    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>