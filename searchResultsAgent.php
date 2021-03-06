<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>TRAVEL EXPERTS - DIRECTORY &amp; LISTING</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive/responsive.css" rel="stylesheet">

    <!-- Subscribe or register CSS -->
    <link rel="stylesheet" href="css/responsive/subscribeStyle.css">

    <link rel="stylesheet" href="css/responsive/searchResultsStyle.css">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="dorne-load"></div>
    </div>

    <!-- ***** Search Form Area ***** -->
    <div class="dorne-search-form d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-close-btn" id="closeBtn">
                        <i class="pe-7s-close-circle" aria-hidden="true"></i>
                    </div>
                    <form action="#" method="get">
                        <input type="search" name="caviarSearch" id="search" placeholder="Search Your Desire Destinations or Events">
                        <input type="submit" class="d-none" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area" id="header">
            <div class="container-fluid h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <nav class="h-100 navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.php"><img src="img/core-img/logo1.png" alt=""></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dorneNav" aria-controls="dorneNav" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                            <!-- Nav -->
                            <div class="collapse navbar-collapse" id="dorneNav">
                                <ul class="navbar-nav mr-auto" id="dorneMenu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                                    </li>


                                    <li class="nav-item">
                                        <a class="nav-link" href="contact.html">Contact</a>
                                    </li>
                                </ul>
                                <!-- Search btn
                                <div class="dorne-search-btn">
                                    <a id="search-btn" href="#"><i class="fa fa-search" aria-hidden="true"></i> Search</a>
                                </div> -->
                                <!-- Signin btn -->
                                <div class="dorne-signin-btn">
                                    <a style="color: #fff;">Agent: <?php  print($_GET["agentEmail"]);  ?></a>
                                </div>
                                <!-- Add listings btn-->
                                <div class="dorne-add-listings-btn">
                                    <a href="index.php" class="btn dorne-btn">Sign out</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    <!-- ***** Header Area End ***** -->


    <!-- ***** Breadcumb Area Start ***** -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/hero-1.jpg)">
    </div>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- ***** Contact Area Start ***** -->
    <div class="dorne-contact-area d-md-flex" id="contact">
    <section class="container">
         <h2>Flights appeared in the search: </h2>
           <p>Select and book! Have a wonderful trip withe Travel experts!</p>

         <div class="trip_table_wdg">

               <?php
                       $dbh = @mysqli_connect("localhost","AliMoussa","password","travelexperts");
                       if (! $dbh)
                       {
                         die("Error: " . mysqli_connect_errno() . " - " . mysqli_connect_error());
                       }

                       $select1 = $_GET["custom-select1"];
                       $select2 = $_GET["custom-select2"];
                       $select3 = $_GET["custom-select3"];
                       $str_arr = explode ("-", $select3);

                       if($select1 != "Your Destinations" & $select2 != "All Classes" & $select3 != "Price Range")
                       {
                           $sql = "SELECT  bookingdetails.Destination,bookingdetails.Description, bookingdetails.TripStart,
                           bookingdetails.TripEnd, bookingdetails.BasePrice,bookingdetails.AgencyCommission, classes.ClassName
                           FROM bookingdetails INNER JOIN classes ON bookingdetails.ClassId = classes.ClassId
                           WHERE (bookingdetails.Destination = '".$select1."')
                           & (BasePrice > $str_arr[0]) & (BasePrice <$str_arr[1]) & (classes.ClassName='".$select2."')";


                           if ($result = mysqli_query($dbh, $sql))
                           {
                             while ($row = mysqli_fetch_assoc($result))
                             {
                               print("<ul>");
                               foreach ($row as $col)
                               {
                                 print("<li>$col</li>");
                               }
                               print("<li><a href=\"flightBooked.html\" class=\"buy_now\">Book Now</a></li>");
                               print("</ul>");
                             }
                             mysqli_free_result($result);

                           }

                        }elseif($select1 != "Your Destinations" & $select2 != "All Classes" )
                        {
                            $sql = "SELECT  bookingdetails.Destination,bookingdetails.Description, bookingdetails.TripStart,
                            bookingdetails.TripEnd, bookingdetails.BasePrice,bookingdetails.AgencyCommission, classes.ClassName
                            FROM bookingdetails INNER JOIN classes ON bookingdetails.ClassId = classes.ClassId
                            WHERE (bookingdetails.Destination = '".$select1."')
                            & (classes.ClassName='".$select2."')";


                            if ($result = mysqli_query($dbh, $sql))
                            {
                              while ($row = mysqli_fetch_assoc($result))
                              {
                                print("<ul>");
                                foreach ($row as $col)
                                {
                                  print("<li>$col</li>");
                                }
                                print("<li><a href=\"flightBooked.html\" class=\"buy_now\">Book Now</a></li>");
                                print("</ul>");
                              }
                              mysqli_free_result($result);
                            }

                         }elseif($select1 != "Your Destinations" & $select3 != "Price Range")
                         {
                             $sql = "SELECT  bookingdetails.Destination,bookingdetails.Description, bookingdetails.TripStart,
                             bookingdetails.TripEnd, bookingdetails.BasePrice,bookingdetails.AgencyCommission, classes.ClassName
                             FROM bookingdetails INNER JOIN classes ON bookingdetails.ClassId = classes.ClassId
                             WHERE (bookingdetails.Destination = '".$select1."')
                             & (BasePrice > $str_arr[0]) & (BasePrice <$str_arr[1]))";

                             if ($result = mysqli_query($dbh, $sql))
                             {

                               while ($row = mysqli_fetch_assoc($result))
                               {
                                 print("<ul>");
                                 foreach ($row as $col)
                                 {
                                   print("<li>$col</li>");
                                 }
                                 print("<li><a href=\"flightBooked.html\" class=\"buy_now\">Book Now</a></li>");
                                 print("</ul>");
                               }
                               mysqli_free_result($result);
                             }

                          }else
                          {
                              $sql = "SELECT  bookingdetails.Destination,bookingdetails.Description, bookingdetails.TripStart,
                              bookingdetails.TripEnd, bookingdetails.BasePrice,bookingdetails.AgencyCommission, classes.ClassName
                              FROM bookingdetails INNER JOIN classes ON bookingdetails.ClassId = classes.ClassId";

                              if ($result = mysqli_query($dbh, $sql))
                              {

                                while ($row = mysqli_fetch_assoc($result))
                                {
                                  print("<ul>");
                                  foreach ($row as $col)
                                  {
                                    print("<li>$col</li>");
                                  }
                                  print("<li><a href=\"flightBooked.html\" class=\"buy_now\">Book Now</a></li>");
                                  print("</ul>");
                                }
                                mysqli_free_result($result);
                              }

                           }

                       mysqli_close($dbh);
                     ?>


     </section>
    </div>
  </div>
    <!-- ***** Contact Area End ***** -->

    <!-- ****** Footer Area Start ****** -->
    <footer class="dorne-footer-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-md-flex align-items-center justify-content-between">
                    <div class="footer-text">
                        <p>

Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="index.php" target="_blank">Travel Experts team</a>
                        </p>
                    </div>
                    <div class="footer-social-btns">
                        <a href="https://www.linkedin.com/"><i class="fa fa-linkedin" aria-haspopup="true"></i></a>
                        <a href="https://www.behance.net/"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        <a href="https://twitter.com/?lang=en"><i class="fa fa-twitter" aria-haspopup="true"></i></a>
                        <a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-haspopup="true"></i></a>
                        <a href="https://slack.com/"><i class="fa fa-slack" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ****** Footer Area End ****** -->

    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/others/plugins.js"></script>


	<!--<script src="js/google-map/map-active.js"></script>
     Active JS -->
    <script src="js/active.js"></script>
     <!-- Validate JS -->
    <script src="js/validate.js"></script>
</body>

</html>
