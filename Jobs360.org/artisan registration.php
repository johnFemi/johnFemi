<?php
include('includes/db.php');
error_reporting(0);
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artisan Registration</title>
    <link rel="stylesheet" href="sign%20up.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                       <li><a class="dropdown-item" href="Request.html">Get an Artisan</a></li>
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
                        <a href="Request.html">Get an Artisans</a>
                     </li>
                     <li class="nav-item">
                         <a href="about.html">About</a>
                     </li>
                     <li class="nav-item">
                         <a href="#contact">Contact</a>
                     </li>
             
                     
                 </ul>
             </nav>
             
         </div>
        </div>
     </div>
     
<?php
include('functions/functions.php');
?>

     <!-- sign up -->
     <div class="sign">
        <div class="form">
            <form class="row g-3" method="POST" enctype="multipart/form-data">
            <h3 style="text-align:center">
                Register for Artisan package
            </h3>
                <div class="col-md-6">
                  <label for="inputName4" class="form-label">First Name</label>
                  <input type="name" name="first_name" class="form-control" id="inputName4" required value="<?php echo"$firstName";?>">
                </div>
                <div class="col-md-6">
                  <label for="inputName4" class="form-label">Last name</label>
                  <input type="name" name="last_name" class="form-control" id="inputName4" required value="<?php echo"$lastName";?>">
                </div>
                <div class="col-md-2">
                  <label for="inputMaritalststus" class="form-label">Marital Status</label>
                  <select id="inputMaritalststus" class="form-select" name="marital_id" required>
                    <option selected>Choose...</option>
                        <?php fetchMaritalStatus();?>
                  </select>
                </div>
                <div class="col-md-2">
                  <label for="inputAge" class="form-label">Age</label>
                  <input type="number" name="age" class="form-control" id="inputAge4" required value="<?php echo"$age";?>">
                </div>
                <div class="col-md-4">
                  <label for="inputState" class="form-label">State Of Origin</label>
                  <input type="text" name="state_of_origin" class="form-control" id="inputState4" required value="<?php echo"$stateOfOrigin";?>">
                </div>
                <div class="col-md-4">
                  <label for="inputLga" class="form-label">LGA</label>
                  <input type="text" name="lga" class="form-control" id="inputLGA4" required value="<?php echo"$lga";?>">
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Residential Address</label>
                  <input type="text" name="resident_address" class="form-control" id="inputAddress" required value="<?php echo"$residentAddress";?>">
                </div>
                <div class="col-12">
                  <label for="inputAddress2" class="form-label"> Office Address</label>
                  <input type="text" name="office_address" class="form-control" id="inputAddress2"  required value="<?php echo"$officeAddress";?>">
                </div>
                <div class="col-6">
                    <label for="inputWork2" class="form-label">Occupation</label>
                    <input type="text" name="occupation" class="form-control" id="inputWork2" required value="<?php echo"$occupation";?>">
                  </div>
                  <div class="col-6">
                    <label for="inputWork2" class="form-label">Specialization</label>
                    <input type="text" name="specialization" class="form-control" id="inputWork2" required value="<?php echo"$specialization";?>">
                  </div>
                <div class="col-md-6">
                  <label for="inputNumber" class="form-label">Phone Number</label>
                  <input type="number" name="phone_no" class="form-control" id="inputNmber" required value="<?php echo"$phoneNumber";?>">
                </div>
                <div class="col-md-6">
                  <label for="inputID" class="form-label">Means of ID</label>
                  <select id="inputID" name="means_of_iden_id" class="form-select form-control" role="">
                    <option selected>Choose...</option>
                    <?php fetchMeansOfId(); ?>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="inputID" class="form-label">ID Image <span style="color:grey;">Max. Size  5MB</span></label>
                  
                  <input type="file" name="id_image" class="form-control" id="inputID">
                </div>
                <div class="col-md-6">
                  <label for="inputPassport" class="form-label">Passport <span style="color:grey;">Max. Size 5 MB</span></label>
                  
                  <input type="file" name="passport" class="form-control" id="inputPassport">
                </div>
                
                <div class="col-12">
                  <button type="submit" class="btn btn-primary form-control" name="artisan_reg">Submit</button>
                </div>
              </form>
        </div>
     </div>
     
    


     <script src="js/plugins.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $('.btn').click(function() {
    if (isformfilled()) {
        swal("Click on either the button or outside the modal.")
    .then((value) => {
    swal(`The returned value is: ${value}`);
});
    } else {
      return;
    }
  });
    </script>
</body>
</html>