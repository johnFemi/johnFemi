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
    <title>Job360/31n1/form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5072971621875839"
     crossorigin="anonymous"></script>
     <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
     <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
     <script src="sweetalert/sweetalert.js"></script>
    <style>
        nav{
     display: flex;
    justify-content: space-around;
    align-items: center;
    z-index: 1;
    right: 0;
    left: 0;
    top: 0;
    height: 70px;
    padding: 0  1.5em;
    /* margin-top: 10px; */
    background-color: chocolate;
}

nav .nav-menu{
    
    /* position: absolute; */
    /* right: 1.5em; */
    top: 0;
    padding: 0;
    margin: 0;
    /* list-style: none; */
    /* margin-top: 10px; */
}
nav .nav-item{
    display: inline-block;
}
nav .nav-item > a{
    display: inline-block;
    padding: 0 1.5em;
    line-height: 70px;
    color: black;
    text-decoration: none;
    font-family: 'Raleway', sans-serif;

}
nav .nav-item a:hover{
    background-color: rgba(210, 105, 30, 0.562);
    color: white;
    /* margin: 10px; */
    border-radius: 7px;
}

nav .log-in{
    list-style: none;
    display: flex;
    padding-left: 20em;
}

nav .log-in a{
    text-decoration: none;
    color: black;
    margin: 10px;
    /* font-weight: bolder; */
    font-family: 'Raleway', sans-serif;

}
nav .log-in a:hover{
    color: gainsboro;

    
}
.dropdown{
    display: none;
}
.row{
    padding-top: 5%;
    width: 900px;
    margin: auto;
}
.row .btn{
    background-color: chocolate;
    border: 1px solid goldenrod;
}
.row .btn:hover{
    background-color: rgb(161, 67, 0);
    border: 1px solid goldenrod;
}

@media screen and (max-width: 786px) {
    body{
        overflow-x: hidden;
        /* width: 424px; */
    }
   
  .dropdown{
    display: block;
 }
 .nav-menu{
    display: none;
 }
 .row{
    padding-top: 5%;
    width: 400px;
    margin: auto;
}
}
    </style>
</head>
<body>
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
            <li class="nav-item">
                <a href="about.html">About</a>
            </li>
            <li class="nav-item dropdown">
                <a href="Request.html">Get an Artisans</a>
            </li>
            <li class="nav-item">
                <a href="#contact">Contact</a>
            </li>
    
            
        </ul>
    </nav>
<?php
include('functions/functions.php');
?>    
    <form class="row g-3" method="POST">
    <h3 style="text-align:center">
        Register for 3 in 1  package
    </h3>
        <div class="col-md-4">
            <label for="inputName" class="form-label">Name</label>
            <input type="name" name="name" class="form-control" id="inputName" required value="<?php echo "$name";?>">
          </div>
          <div class="col-md-4">
            <label for="inputNumber4" class="form-label">Phone Number</label>
            <input type="number" name="phone_no" class="form-control" id="inputNumber4" required value="<?php echo "$phoneNumber";?>">
          </div>
          <div class="col-md-4">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail4" required value="<?php echo "$email";?>" >
          </div>
          <div class="col-6">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="inputAddress" required value="<?php echo "$address";?>">
          </div>
          
          <div class="col-md-6">
            <label for="inputCity" class="form-label">City</label>
            <input type="text" name="city" class="form-control" id="inputCity" required value="<?php echo "$city";?>">
          </div>
          <div class="col-md-6">
            <label for="inputState" class="form-label">State</label>
            <input type="text" name="state" class="form-control" id="inputstate" required value="<?php echo "$state";?>">
          </div>
          <div class="col-md-6">
            <label for="inputitle" class="form-label">Job Title</label>
            <input type="name" name="job_title" class="form-control" id="inputName" required value="<?php echo "$jobTitle";?>">
          </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
              <button type="submit" name="3_in_1_package" class="btn btn-primary btn-lg btn-block text-white btn-search form-control"><span class="icon-search icon mr-2"></span>Submit</button>
          </div>              
                    
    </form>

</body>
</html>