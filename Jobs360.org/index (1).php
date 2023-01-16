<?php
include('includes/db.php');
error_reporting(0);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>360 Elite | Homepage</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5072971621875839"
     crossorigin="anonymous"></script>
     <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
     <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
     <script src="sweetalert/sweetalert.js"></script>
    
    
</head>
<body>
    
    <div id="wrap">
       <div class="nav-header">
        <div class="nav-overlay">
            <nav>
                <div class="logo">
                    <a href="index.php">
                        <img src="images/images__1_-removebg-preview.png" alt="" style="width: 100px;">
                    </a>
    
                </div>
                
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      Menu
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="index.php">Home</a></li>
                      <li><a class="dropdown-item" href="Artisans.php">Artisan</a></li>
                      <li><a class="dropdown-item" href="Request.php">Get an Artisan</a></li>
                      <li><a class="dropdown-item" href="KSC.html">Kuul Shaving Cream</a></li>
                      <li><a class="dropdown-item" href="about.html">About</a></li>
                      <li><a class="dropdown-item" href="#contact">Contact</a></li>
                    </ul>
                  </div>
                <ul class="nav-menu">
                    <li class="nav-item"><a href="index.php">Home</a></li>
                    <li class="nav-item dropdown">
                        <a href="Artisans.php">Artisans</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="Request.php">Get an Artisans</a>
                     </li>
                    <li class="nav-item dropdown">
                        <a href="KSC.html">Kuul Shaving Cream</a>
                     </li>
                    <li class="nav-item">
                        <a href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact">Contact</a>
                    </li>
            
                    
                </ul>
            </nav>
            

             <!--header section -->
            <div class="header" id="comp-head">
                <h1 class="name">
                    YOUR DREAM JOB AWAITS  YOU
                </h1>
                <p class="note">
                    <span>Find The Best Start Up That Fits You In JOBS 360.</span>
                </p> 
            </div>
        </div>
       </div>
    </div>

     <!--packages -->
    <div class="packages">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="images/job applicants.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Local Jobs</h5>
                    <p>Get your prefered job in Jobs360 for <strong>₦1,500</strong>.</p>
                    <a href="https://paystack.com/pay/local-jobs" class="btn btn-primary">Check Out</a>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/Corper.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Jobs For Corpers</h5>
                    <p>Get your prefered job as a Corper for <strong>₦2,000</strong>.</p>
                    <a href="https://paystack.com/pay/corper" class="btn btn-primary">Check Out</a>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/IT.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Jobs For IT Students (1 Year)</h5>
                    <p>Get your prefered IT job in Jobs360 for <strong>₦1,500</strong>.</p>
                    <a href="https://paystack.com/pay/it-jobs" class="btn btn-primary">Check Out</a>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/IT.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Jobs For IT Students (4 Months)</h5>
                    <p>IT jobs in Jobs360 for <strong>₦1000</strong>.</p>
                    <a href="https://paystack.com/pay/it-4months" class="btn btn-primary">Check Out</a>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/job 032.jfif" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="images/3 in 1.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>3 in 1</h5>
                    <p>Creat Your CV, Get a training on Interview and Apply for any Job for <strong>₦5,000</strong>.</p>
                    <a href="https://paystack.com/pay/3in-1" class="btn btn-primary">Check Out</a>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/job 034.jfif" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="images/international p.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>International Jobs</h5>
                    <p>Apply for Jobs abroad in any Country of your  choice for <strong>₦10,000</strong>.</p>
                    <a href="https://paystack.com/pay/-international" class="btn btn-primary">Check Out</a>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/jobs 045.jfif" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="images/Artisan random.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Artisan Registration</h5>
                    <p>You can get more  customers as our Artisan with <strong>₦5,000</strong> Annually.</p>
                    <a href="https://paystack.com/pay/artisans" class="btn btn-primary">Check Out</a>
                  </div>
              </div>
              <div class="carousel-item">
                <img src="images/Artisan.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Artisan Registration</h5>
                    <p>You can get more  customers as our Artisan with <strong>₦5,000</strong> Annually.</p>
                    <a href="https://paystack.com/pay/artisans" class="btn btn-primary">Check Out</a>
                  </div>
              </div>
              <div class="carousel-item">
                <img src="images/Artisan mech.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Artisan Registration</h5>
                    <p>You can get more  customers as our Artisan with <strong>₦5,000</strong> Annually.</p>
                    <a href="https://paystack.com/pay/artisans" class="btn btn-primary">Check Out</a>
                  </div>
              </div>
              <div class="carousel-item">
                <img src="images/soap 01.jfif" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Country Dirtibutor </h5>
                    <p>Become a Country Distributor with <strong>$10,000</strong>.</p>
                    <a href="https://paystack.com/pay/zh7udzv0tr" class="btn btn-primary">Check Out</a>
                  </div>
              </div>
              <div class="carousel-item">
                <img src="images/soap 02.jfif" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>State Dirtibutor</h5>
                    <p>Become a State Distributor with <strong>₦5,000,000</strong>.</p>
                    <a href="https://paystack.com/pay/zh7udzv0tr" class="btn btn-primary">Check Out</a>
                  </div>
              </div>
              <div class="carousel-item">
                <img src="images/fill.jfif" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>


        

          <div class="mobile-packages">
            <div class="package">
                <div class="plan">
                        <h3>Available Plans at Jobs360</h3>
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                Package 1
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Local Jobs</h5>
                                <p class="card-text">Get your prefered job in Jobs360 for <strong>₦1,500</strong>.</p>
                                <a href="https://paystack.com/pay/local-jobs" class="btn btn-primary">Check Out</a>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                Package 2
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Corpers</h5>
                                <p class="card-text">Get your prefered job in Jobs360 for <strong>₦2,000</strong>.</p>
                                <a href="https://paystack.com/pay/corper" class="btn btn-primary">Check Out</a>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                Package 3
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">IT Students (1 Year)</h5>
                                <p class="card-text">Get your prefered job in Jobs360 for <strong>₦1,500</strong>.</p>
                                <a href="payment.html" class="btn btn-primary">Check Out</a>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                Package 4
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">IT Students (4 Months)</h5>
                                <p class="card-text">Get your prefered job in Jobs360 for <strong>₦1000</strong>.</p>
                                <a href="payment.html" class="btn btn-primary">Check Out</a>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                Package 5
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">3 in 1</h5>
                                <p class="card-text">Creat Your CV, Get a training on Interview and Apply for any Job for <strong>₦5,000</strong>.</p>
                                <a href="https://paystack.com/pay/3in-1" class="btn btn-primary">Check Out</a>
                            </div>
                        </div>
                
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                Package 6
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">International Jobs</h5>
                                <p class="card-text">Apply for Jobs abroad in any Country of your  choice for<strong>₦10,000</strong>.</p>
                                <a href="https://paystack.com/pay/-international" class="btn btn-primary">Check Out</a>
                            </div>
                        </div>
                
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                Package 7
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Artisan Registration</h5>
                                <p class="card-text">Do you need more customer?Registar as an Artisan in Jobs360 for <strong>₦5,000</strong> Annually.</p>
                                <a href="https://paystack.com/pay/artisans" class="btn btn-primary">Check Out</a>
                            </div>
                        </div>
                        <div class="soap">
                          <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                Package 8
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Country Distributor</h5>
                                <p class="card-text">Become a Country Distributor with<strong>₦$10,000</strong> Annually.</p>
                                <a href="https://paystack.com/pay/zh7udzv0tr" class="btn btn-primary">Check Out</a>
                            </div>
                        </div>
                        
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                Package 9
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">State Distributor</h5>
                                <p class="card-text">Become a State Distributor with<strong>₦5,000,000</strong> Annually.</p>
                                <a href="https://paystack.com/pay/zh7udzv0tr" class="btn btn-primary">Check Out</a>
                            </div>
                        </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
     <!--why JOB 360 -->
    <div class="why">
        <div class="content">
                <div class="why-header">
                    <h2>
                        WHY ARE WE DIFFERENT?
                    </h2>
                </div>
                <div class="why-body">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">More Jobs Everyday</h5>
                              <p class="card-text">Jobs360  Provide enough Jobs for employees. More Jobs update everyday.</p>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Creative Jobs</h5>
                              <p class="card-text">Creativity is a major innovation of  Job360 particularly through  the creation of orginal Jobs</p>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Online Jobs</h5>
                              <p class="card-text">We offer remote jobs to any location. You  can choose to work remotely or move down to the location of the Job.</p>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Easy to Manage</h5>
                              <p class="card-text">We offer Jobs with little or no stress. Jobs offerd at Jobs360 are easy to manage.</p>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">Location Search</h5>
                                <p class="card-text">Do you search for local jobs or international jobs? Jobs 360 gives Jobs irrespective of the location you are.</p>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">Online Reviews</h5>
                                <p class="card-text">Job360 gets and gives good comments on our employees and employers. These are social proof tools which helps businesses build up an online presence and trust.</p>
                              </div>
                            </div>
                          </div>
                      </div>
                </div>
        </div>
    </div>
    
      <!--Kuul Shaving Cream -->
      <div class="ksc">
        <h4>
          Kuul Shaving Cream, the best shaving cream you can use. Want to know more and how to be a distributor  all over the states and countries? <br>
          Click <a href="KSC.html">here</a> to apply to be a distributor.
        </h4>
      </div>
     <!--about -->
<div class="about">
    <div class="about-overlay">
        <div class="about-title">
            <h2>
                More About Job 360
            </h2>
        </div>
        <div class="about-content">
            <div class="content-1">
                <p>
                   Jobs360 is a diversified and fully integrated conglomerate. The company's interest is at a range of sectors in Ngeria with a plan of exploring products and services globally. Job360 provides Jobs for everyone in both Local and International sectors. <br><br> 
                </p>

                <h5>Nuturing A Vision</h5>
                <p>
                    Elite 360 continues to grow its vision of becoming the leading  provider of essential needs and services in sub-saharran Africa.
                   We are determined to help reduce time in our communities via creating Job opportunities for our youths talent hunt and supporting Security Agencies with basic tools that can help reduce crime.
                </p>
                <a class="btn btn-primary" href="about.html" role="button">Continue</a>
            </div>
        </div>
    </div>
</div>

     <!--Artisan -->
<div class="artisan">
    <div class="artisan-overlay">
        <h1 class=artisan-header>
            Are you a qualified ARTISAN? Find out how JOB 360 can help your business.
        </h1>
        <div class="artisan-link">
            <a href="Artisans.php" class="link">
                <span id="link"></span>
                CLICK HERE TO JOIN
            </a>
        </div>
    </div>
</div>

     <!--Contact -->
    <div class="call" id="contact">
        <h3>Meet Us</h3>
        <ul>
            <li>
                <a href="mailto:jobs360elite@gmail.com">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    Send a Mail</a>
            </li>
            <li>
                <a href="tel:09168020366"><i class="fa fa-phone" aria-hidden="true"></i>+2349168020366</a>
            </li>
            <li class="office-call">
                <a href="tel:09168098316"><i class="fa fa-phone" aria-hidden="true"></i>Place A Call</a>
            </li>

        </ul>
    </div>

<?php
include('functions/functions.php');
?>
       <!--join us | News Letter -->
      <div class="join-content">
          <div class="join-us">
              <h3>Subscribe for News Letter</h3>
                <form class="row g-3" method="post">
                    <div class="col-md-4">
                    <label for="inputName4" class="form-label">Name</label>
                    <input type="name" name="name" class="form-control" id="inputName4" value="<?php echo "$name";?>" required>
                    </div>
                    <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="Email" name="email" class="form-control" id="inputEmail4" value="<?php echo "$email";?>"  required>
                    </div>
                    <div class="col-md-4">
                    <label for="inputNumber4" class="form-label">Number</label>
                    <input type="number" name="phone_no" class="form-control" id="inputNumber4" value="<?php echo "$phoneNumber";?>"  required>
                    </div>
                    <div class="col-12">
                    <button type="submit" name="subscribe_news" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>    
      </div>

     

       <!--footer  -->
      <footer class="footer">
          <div class="inner-footer">
            <div class="about-footer">
                <h5>About</h5>
                <p  style="width: 300px;">
                    We connect manufacturers with customers,  artisan  with  customers, help people get their desired jobs and help companies get staff.
                </p>
                <a class="btn btn-primary" href="about.html" role="button">More Info</a>
            </div>
            <div class="address-footer">
              <h5>Address</h5>
              <div class="add-seg">
                  <h6>Headquater Address</h6>
                  <p>Zone 4 No 11, Idi oro, Along Alao Akala Expressway behind oluyole Health Centre
                      New Garage
                      Ibadan.
                      Tell phone number <br>
                      <a href="tel:09043472929">+2349043472929</a>
                  </p>
                  <h6>Branch Address</h6>
                  <p>
                      Tollgate branch.
                      Ajumobi complex shop No 012 behind chillarz bar and restaurant
                      Tollgate Ibadan
                      <a href="tel:09168098316">+2349168098316</a>
                  </p>
              </div>
          </div>
             
              <div class="quick-links">
                <h5>Quick Menu</h5>
                  <ul>
                      <li class="quick-items">
                          <a href="index.php">Home</a>
                      </li>
                      
                      <li class="quick-items">
                          <a href="Artisans.php">Artisans</a>
                      </li>
                      <li class="quick-items">
                          <a href="https://paystack.com/pay/artisans">Artisans Registration</a>
                      </li>
                  </ul>
              </div>

              <div class="social-footer">
                <h5>Contact</h5>
                  <ul>
                    <li>
                        <a href="mailto:jobs360elite@gmail.com">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                          </a>
                      </li>
                      <li>
                        <a href="https://www.instagram.com/jobs360org/"> 
                          <i class="fab fa-instagram"></i> 
                        </a>
                      </li>
                      <li>
                        <a href="https://www.youtube.com/results?search_query=kodamutv">
                           <i class="fab fa-youtube"></i> 
                          </a>
                      </li>
                      <li>
                        <a href="https://twitter.com/Jobs3601">
                           <i class="fab fa-twitter"></i> 
                          </a>
                      </li>
                      
                  </ul>
              </div>
          </div>
          <div class="outer-footer">
              <p id="copyright">
                copyright © 2022.All Rigts Reserved
              </p>
          </div>
      </footer>
     

    
      
      
      <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="script.js"></script>
	
	
	Data Table
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>

   
</body>
</html>