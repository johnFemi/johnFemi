<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function fetchMaritalStatus(){
    global $con;
        $fetchMaritalStatus = $con->prepare("select * from marital_status");
        $fetchMaritalStatus->setFetchMode(PDO::FETCH_ASSOC);
        $fetchMaritalStatus->execute();

        while($rowMaritalStatus = $fetchMaritalStatus->fetch()){
            echo "<option value='".$rowMaritalStatus['marital_id']."'>".$rowMaritalStatus['marital_status']."</option>";
        }
}


function fetchMeansOfId(){
    global $con;
        $fetchMeansOfId = $con->prepare("select * from means_of_id");
        $fetchMeansOfId->setFetchMode(PDO::FETCH_ASSOC);
        $fetchMeansOfId->execute();

        while($rowMeansOfId = $fetchMeansOfId->fetch()){
            echo "<option value='".$rowMeansOfId['means_of_iden_id']."'>".$rowMeansOfId['means_of_id']."</option>";
        }
}

if(isset($_POST['artisan_reg'])){
        $firstName = strip_tags($_POST['first_name']);
        $firstName = ucwords($firstName);
        $firstName = str_replace(' ', '', $firstName);
       
        $lastName = strip_tags($_POST['last_name']);
        $lastName = ucwords($lastName);
        
       
        $maritalId = strip_tags($_POST['marital_id']);
        
        $age = strip_tags($_POST['age']);
        $age = ucwords($age);
       
        $stateOfOrigin = strip_tags($_POST['state_of_origin']);
        $stateOfOrigin = ucwords($stateOfOrigin);
       
        $lga = strip_tags($_POST['lga']);
        $lga = ucwords($lga);
       
        $residentAddress = strip_tags($_POST['resident_address']);
        $residentAddress = ucwords($residentAddress);
       
        $officeAddress = strip_tags($_POST['office_address']);
        $officeAddress = ucwords($officeAddress);
       
        $occupation = strip_tags($_POST['occupation']);
        $occupation = ucwords($occupation);
        
       
        $specialization = strip_tags($_POST['specialization']);
        $specialization = ucwords($specialization);
       
        $phoneNumber = strip_tags($_POST['phone_no']);
    
        $meansOfId = strip_tags($_POST['means_of_iden_id']);
       
        $idImage = $_FILES['id_image']['name'];
        $idImageTmp = $_FILES['id_image']['tmp_name'];
        $idImageSize = $_FILES['id_image']['size'];
        $idImageError = $_FILES['id_image']['error'];
        $idImageType = $_FILES['id_image']['type'];
       
        $passport = $_FILES['passport']['name'];
        $passportTmp = $_FILES['passport']['tmp_name'];
        $passportSize = $_FILES['passport']['size'];
        $passportError = $_FILES['passport']['error'];
        $passportType = $_FILES['passport']['type'];
       
        $idExt = explode('.', $idImage);
        $idActualExt = strtolower(end($idExt));
       
        $passportExt = explode('.', $passport);
        $passportActualExt = strtolower(end($passportExt));
       
       
        $allowed = array('jpg', 'jpeg', 'png', 'pdf');
        
       if(in_array($passportActualExt, $allowed) AND in_array($idActualExt, $allowed)){
           if($idImageError === 0 AND $passportError === 0){
               if($idImageSize < 5000000 AND  $passportSize < 5000000){
                    $check_artisian = $con->prepare("select * from artisan where phone_no=:pn");
                    $check_artisian->bindParam(":pn", $phoneNumber);
                    $check_artisian->setFetchMode(PDO::FETCH_ASSOC);
                    $check_artisian->execute();
                    $count = $check_artisian->rowCount();
                    if($count === 1){
                        echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'Artisan with this phone number already registered!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
                    }else{
                        $check_artisian_name = $con->prepare("select * from artisan where first_name=:fn and last_name=:ln");
                        $check_artisian_name->bindParam(":fn", $firstName);
                        $check_artisian_name->bindParam(":ln", $lastName);
                        $check_artisian_name->setFetchMode(PDO::FETCH_ASSOC);
                        $check_artisian_name->execute();
                        $count_name = $check_artisian_name->rowCount();
                        
                        if($count_name === 1){
                            echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'User with These name has been Registered, Pls Change Last Name!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
                        }else{
                           move_uploaded_file($idImageTmp, "images/idImage/$idImage");
                           move_uploaded_file($passportTmp, "images/passport/$passport");
                            
                           
                            $insert_artisan_data = $con->prepare("insert into artisan(first_name, last_name, marital_id, age, state_of_origin, lga, resident_address, office_address, occupation, specialization, phone_no, means_of_iden_id, id_image, passport) values(:fn, :ln, :ma, :ag, :so, :lg, :ra, :oa, :oc, :sp, :pn, :mi, :id, :ps)");
                            $insert_artisan_data->bindParam(":fn", $firstName);
                            $insert_artisan_data->bindParam(":ln", $lastName);
                            $insert_artisan_data->bindParam(":ma", $maritalId);
                            $insert_artisan_data->bindParam(":ag", $age);
                            $insert_artisan_data->bindParam(":so", $stateOfOrigin);
                            $insert_artisan_data->bindParam(":lg", $lga);
                            $insert_artisan_data->bindParam(":ra", $residentAddress);
                            $insert_artisan_data->bindParam(":oa", $officeAddress);
                            $insert_artisan_data->bindParam(":oc", $occupation);
                            $insert_artisan_data->bindParam(":sp", $specialization);
                            $insert_artisan_data->bindParam(":pn", $phoneNumber);
                            $insert_artisan_data->bindParam(":mi", $meansOfId);
                            $insert_artisan_data->bindParam(":id", $idImage);
                            $insert_artisan_data->bindParam(":ps", $passport);
                            
                            if($insert_artisan_data->execute()){
                                
                                // Instantiation and passing [ICODE]true[/ICODE] enables exceptions
                                    $mail = new PHPMailer(true);
                                    
                                        //Server settings
                                        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                                        $mail->isSMTP();                                            // Set mailer to use SMTP
                                        $mail->Host       = 'jobs360.org';  // Specify main and backup SMTP servers
                                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                        $mail->Username   = 'elite@jobs360.org';                     // SMTP username
                                        $mail->Password   = 'IA*PTzqhSAy(';                               // SMTP password
                                        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
                                        $mail->Port       = 587;                                    // TCP port to connect to
                                    
                                        //Recipients
                                        $mail->setFrom('elite@jobs360.org', 'jobs360');
                                        $mail->addAddress('jobs360elite@gmail.com', 'Jobs360');     // Add a recipient
                                        $mail->addAddress('jobs360elite@gmail.com');               // Name is optional
                                        $mail->addReplyTo('elite@jobs360.org', 'Information');
                                        $mail->AddCC("ayoeljah1997@gmail.com", "cc-recipient-name");
                                        
                                    
                                    
                                        // Content
                                        $mail->isHTML(true);                                  // Set email format to HTML
                                        $mail->Subject = 'Artisan Registration Notification';
                                        $mail->Body    = $firstName. " " . $lastName." " . 'just registered';
                                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                    
                                        $mail->send();
                                        
                                echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Wow!',
                                        text: 'Record Submited Succesfully!',
                                        icon: 'success',
                                        type: 'success'
                                    }).then(function() {
                                        window.location = 'index.php';
                                    });
                                    </script>";
                            }else{
                                echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'Record wasnt submited please check records and try again!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
                            } 
                        }
                    }
                   
                 }else{
                    echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'File Too Big!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
                 }
               
            }else{
               echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'There was an error uploading ur file!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
            }
        }else{
           echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'You cannot upload this file type!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
        }
              
    
}

if(isset($_POST['3_in_1_package'])){
    $name = strip_tags($_POST['name']);
    $name = ucwords($name);

    $phoneNumber = strip_tags($_POST['phone_no']);
    
    
    $email = strip_tags($_POST['email']);
    $email = strtolower($email);
    $email = str_replace(' ', '', $email);
    
    $address = strip_tags($_POST['address']);
    $address = ucwords($address);
    
    $city = strip_tags($_POST['city']);
    $city = ucwords($city);
    $city = str_replace(' ', '', $city);
    
    $state = strip_tags($_POST['state']);
    $state = ucwords($state);
    $state = str_replace(' ', '', $state);
    
    $jobTitle = strip_tags($_POST['job_title']);
    $jobTitle = ucwords($jobTitle);
    
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'Invaild email!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
        }else{
            $check_user = $con->prepare("select * from 3_in_one_package where phone_no=:pn");
            $check_user->bindParam(":pn", $phoneNumber);
            $check_user->setFetchMode(PDO::FETCH_ASSOC);
            $check_user->execute();
            $count = $check_user->rowCount();
            if($count === 1){
                echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'User with this phone number already registered!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
            }else{
                $insert_3_in_one = $con->prepare("insert into 3_in_one_package(name, phone_no, email, address, city, state, job_title) values(:na, :ph, :em, :ad, :ct, :st, :jb)");
                $insert_3_in_one->bindParam(":na", $name);
                $insert_3_in_one->bindParam(":ph", $phoneNumber);
                $insert_3_in_one->bindParam(":em", $email);
                $insert_3_in_one->bindParam(":ad", $address);
                $insert_3_in_one->bindParam(":ct", $city);
                $insert_3_in_one->bindParam(":st", $state);
                $insert_3_in_one->bindParam(":jb", $jobTitle);
                
                if($insert_3_in_one->execute()){
                    // Instantiation and passing [ICODE]true[/ICODE] enables exceptions
                                    $mail = new PHPMailer(true);
                                    
                                        //Server settings
                                        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                                        $mail->isSMTP();                                            // Set mailer to use SMTP
                                        $mail->Host       = 'jobs360.org';  // Specify main and backup SMTP servers
                                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                        $mail->Username   = 'elite@jobs360.org';                     // SMTP username
                                        $mail->Password   = 'IA*PTzqhSAy(';                               // SMTP password
                                        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
                                        $mail->Port       = 587;                                    // TCP port to connect to
                                    
                                        //Recipients
                                        $mail->setFrom('elite@jobs360.org', 'jobs360');
                                        $mail->addAddress('jobs360elite@gmail.com', 'Jobs360');     // Add a recipient
                                        $mail->addAddress('jobs360elite@gmail.com');               // Name is optional
                                        $mail->addReplyTo('elite@jobs360.org', 'Information');
                                        $mail->AddCC("ayoeljah1997@gmail.com", "cc-recipient-name");
                                        
                                    
                                    
                                        // Content
                                        $mail->isHTML(true);                                  // Set email format to HTML
                                        $mail->Subject = '3 in 1 Package Registration Notification';
                                        $mail->Body    = $name." ". 'just registered';
                                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                    
                                        $mail->send();
                    
                    
                    echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Wow!',
                                        text: 'Record Submited Succesfully!',
                                        icon: 'success',
                                        type: 'success'
                                    }).then(function() {
                                        window.location = 'index.php';
                                    });
                                    </script>";
                }else{
                    echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'Record wasnt submited please check records and try again!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";  
                } 
            }
        
    }
  
}

if(isset($_POST['international_package'])){
    $name = strip_tags($_POST['name']);
    $name = ucwords($name);

    $phoneNumber = strip_tags($_POST['phone_no']);
    
    
    $email = strip_tags($_POST['email']);
    $email = strtolower($email);
    $email = str_replace(' ', '', $email);
    
    $address = strip_tags($_POST['address']);
    $address = ucwords($address);
    
    $city = strip_tags($_POST['city']);
    $city = ucwords($city);
    
    $state = strip_tags($_POST['state']);
    $state = ucwords($state);
    
    $jobTitle = strip_tags($_POST['job_title']);
    $jobTitle = ucwords($jobTitle);
    
    $preferedCountry = strip_tags($_POST['prefered_country']);
    $preferedCountry = ucwords($preferedCountry);
    
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'Invaild email!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
        }else{
            $check_user = $con->prepare("select * from 3_in_one_package where phone_no=:pn");
            $check_user->bindParam(":pn", $phoneNumber);
            $check_user->setFetchMode(PDO::FETCH_ASSOC);
            $check_user->execute();
            $count = $check_user->rowCount();
            if($count === 1){
                echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'User with this phone number already registered!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
            }else{
                $insert_international_pack = $con->prepare("insert into international_package(name, phone_no, email, address, city, state, job_title, prefered_country) values(:na, :ph, :em, :ad, :ct, :st, :jb, :pc)");
                $insert_international_pack->bindParam(":na", $name);
                $insert_international_pack->bindParam(":ph", $phoneNumber);
                $insert_international_pack->bindParam(":em", $email);
                $insert_international_pack->bindParam(":ad", $address);
                $insert_international_pack->bindParam(":ct", $city);
                $insert_international_pack->bindParam(":st", $state);
                $insert_international_pack->bindParam(":jb", $jobTitle);
                $insert_international_pack->bindParam(":pc", $preferedCountry);
                
                if($insert_international_pack->execute()){
                    // Instantiation and passing [ICODE]true[/ICODE] enables exceptions
                                    $mail = new PHPMailer(true);
                                    
                                        //Server settings
                                        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                                        $mail->isSMTP();                                            // Set mailer to use SMTP
                                        $mail->Host       = 'jobs360.org';  // Specify main and backup SMTP servers
                                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                        $mail->Username   = 'elite@jobs360.org';                     // SMTP username
                                        $mail->Password   = 'IA*PTzqhSAy(';                               // SMTP password
                                        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
                                        $mail->Port       = 587;                                    // TCP port to connect to
                                    
                                        //Recipients
                                        $mail->setFrom('elite@jobs360.org', 'jobs360');
                                        $mail->addAddress('jobs360elite@gmail.com', 'Jobs360');     // Add a recipient
                                        $mail->addAddress('jobs360elite@gmail.com');               // Name is optional
                                        $mail->addReplyTo('elite@jobs360.org', 'Information');
                                        $mail->AddCC("ayoeljah1997@gmail.com", "cc-recipient-name");
                                        
                                    
                                    
                                        // Content
                                        $mail->isHTML(true);                                  // Set email format to HTML
                                        $mail->Subject = 'International Package Registration Notification';
                                        $mail->Body    = $name." ". 'just registered';
                                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                    
                                        $mail->send();
                    
                    echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Wow!',
                                        text: 'Record Submited Succesfully!',
                                        icon: 'success',
                                        type: 'success'
                                    }).then(function() {
                                        window.location = 'index.php';
                                    });
                                    </script>";
                }else{
                    echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'Record wasnt submited please check records and try again!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
                                    } 
            }
        
    }
  
}


if(isset($_POST['local_package'])){
    $name = strip_tags($_POST['name']);
    $name = ucwords($name);

    $phoneNumber = strip_tags($_POST['phone_no']);
    
    
    $email = strip_tags($_POST['email']);
    $email = strtolower($email);
    $email = str_replace(' ', '', $email);
    
    $address = strip_tags($_POST['address']);
    $address = ucwords($address);
    
    $city = strip_tags($_POST['city']);
    $city = ucwords($city);
    $city = str_replace(' ', '', $city);
    
    $state = strip_tags($_POST['state']);
    $state = ucwords($state);
    $state = str_replace(' ', '', $state);
    
    $jobTitle = strip_tags($_POST['job_title']);
    $jobTitle = ucwords($jobTitle);
    
    $cvReview = $_FILES['cv']['name'];
    $cvReviewTemp = $_FILES['cv']['tmp_name'];
    $cvReviewSize = $_FILES['cv']['size'];
    $cvReviewError = $_FILES['cv']['error'];
    $cvReviewType = $_FILES['cv']['type'];
    
    $cvReviewExt = explode('.', $cvReview);
    $cvReviewActualExt = strtolower(end($cvReviewExt));
    
    
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
        
       if(in_array($cvReviewActualExt, $allowed)){
           if($cvReviewError === 0){
               if($cvReviewSize < 500000){
                    $check_user = $con->prepare("select * from local_package where phone_no=:pn");
                    $check_user->bindParam(":pn", $phoneNumber);
                    $check_user->setFetchMode(PDO::FETCH_ASSOC);
                    $check_user->execute();
                    $count = $check_user->rowCount();
                    if($count === 1){
                        echo "<script type='text/javascript'>
                                        jQuery(function validation(){
                                        swal({
                                        title: 'Woops!',
                                        text: 'User with this phone number already registered,
                                        icon: 'error',
                                        button: 'OK!',
                                        });
                                        });
                                        </script>
                                ";
                    }else{
                        $check_name = $con->prepare("select * from local_package where name=:fn");
                        $check_name->bindParam(":fn", $name);
                        $check_name->setFetchMode(PDO::FETCH_ASSOC);
                        $check_name->execute();
                        $count_name = $check_name->rowCount();
                        
                        if($count_name === 1){
                            echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'First and Last name already exist please change lastname!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
                        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'Invaild email!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
                        }else{
                            move_uploaded_file($cvReviewTemp, "images/cvReview/$cvReview");                            
                           
                            $insert_local_pack = $con->prepare("insert into local_package(name, phone_no, email, address, city, state, job_title, cv_review) values(:na, :ph, :em, :ad, :ct, :st, :jb, :cv)");
                            $insert_local_pack->bindParam(":na", $name);
                            $insert_local_pack->bindParam(":ph", $phoneNumber);
                            $insert_local_pack->bindParam(":em", $email);
                            $insert_local_pack->bindParam(":ad", $address);
                            $insert_local_pack->bindParam(":ct", $city);
                            $insert_local_pack->bindParam(":st", $state);
                            $insert_local_pack->bindParam(":jb", $jobTitle);
                            $insert_local_pack->bindParam(":cv", $cvReview);

                            if($insert_local_pack->execute()){
                                // Instantiation and passing [ICODE]true[/ICODE] enables exceptions
                                    $mail = new PHPMailer(true);
                                    
                                        //Server settings
                                        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                                        $mail->isSMTP();                                            // Set mailer to use SMTP
                                        $mail->Host       = 'jobs360.org';  // Specify main and backup SMTP servers
                                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                        $mail->Username   = 'elite@jobs360.org';                     // SMTP username
                                        $mail->Password   = 'IA*PTzqhSAy(';                               // SMTP password
                                        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
                                        $mail->Port       = 587;                                    // TCP port to connect to
                                    
                                        //Recipients
                                        $mail->setFrom('elite@jobs360.org', 'jobs360');
                                        $mail->addAddress('jobs360elite@gmail.com', 'Jobs360');     // Add a recipient
                                        $mail->addAddress('jobs360elite@gmail.com');               // Name is optional
                                        $mail->addReplyTo('elite@jobs360.org', 'Information');
                                        $mail->AddCC("ayoeljah1997@gmail.com", "cc-recipient-name");
                                        
                                    
                                    
                                        // Content
                                        $mail->isHTML(true);                                  // Set email format to HTML
                                        $mail->Subject = 'Local Package Registration Notification';
                                        $mail->Body    = $name." ". 'just registered';
                                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                    
                                        $mail->send();
                                
                                echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Wow!',
                                        text: 'Record Submited Succesfully!',
                                        icon: 'success',
                                        type: 'success'
                                    }).then(function() {
                                        window.location = 'index.php';
                                    });
                                    </script>";
                            }else{
                                echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'Record wasnt submited please check records and try again!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
                            }
                    }
                   
                 }
               
            }else{
                   echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'Your File is too Big!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
            }
        }else{
               echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'There was an error uploading ur file!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
           }
  
       }else{
           echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'You cannot upload this file type!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
        }
}


if(isset($_POST['it_package'])){
    $name = strip_tags($_POST['name']);
    $name = ucwords($name);

    $phoneNumber = strip_tags($_POST['phone_no']);
    
    
    $email = strip_tags($_POST['email']);
    $email = strtolower($email);
    $email = str_replace(' ', '', $email);
    
    $address = strip_tags($_POST['address']);
    $address = ucwords($address);
    
    $city = strip_tags($_POST['city']);
    $city = ucwords($city);
    $city = str_replace(' ', '', $city);
    
    $state = strip_tags($_POST['state']);
    $state = ucwords($state);
    $state = str_replace(' ', '', $state);
    
    $itLetter = $_FILES['it']['name'];
    $itLetterTemp = $_FILES['it']['tmp_name'];
    $itLetterSize = $_FILES['it']['size'];
    $itLetterError = $_FILES['it']['error'];
    $itLetterType = $_FILES['it']['type'];
    
    $itLetterExt = explode('.', $itLetter);
    $itLetterActualExt = strtolower(end($itLetterExt));
    
    
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
        
       if(in_array($itLetterActualExt, $allowed)){
           if($itLetterError === 0){
               if($itLetterSize < 500000){
                    $check_user = $con->prepare("select * from IT_package where phone_no=:pn");
                    $check_user->bindParam(":pn", $phoneNumber);
                    $check_user->setFetchMode(PDO::FETCH_ASSOC);
                    $check_user->execute();
                    $count = $check_user->rowCount();
                    if($count === 1){
                        echo "<script type='text/javascript'>
                                        jQuery(function validation(){
                                        swal({
                                        title: 'Woops!',
                                        text: 'User with this phone number already registered,
                                        icon: 'error',
                                        button: 'OK!',
                                        });
                                        });
                                        </script>
                                ";
                    }else{
                        $check_name = $con->prepare("select * from IT_package where name=:fn");
                        $check_name->bindParam(":fn", $name);
                        $check_name->setFetchMode(PDO::FETCH_ASSOC);
                        $check_name->execute();
                        $count_name = $check_name->rowCount();
                        
                        if($count_name === 1){
                            echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'First and Last name already exist please change lastname!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
                        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'Invaild email!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
                        }else{
                            move_uploaded_file($itLetterTemp, "images/IT_letter/$itLetter");                            
                           
                            $insert_IT_pack = $con->prepare("insert into IT_package(name, phone_no, email, address, city, state, it_letter) values(:na, :ph, :em, :ad, :ct, :st, :it)");
                            $insert_IT_pack->bindParam(":na", $name);
                            $insert_IT_pack->bindParam(":ph", $phoneNumber);
                            $insert_IT_pack->bindParam(":em", $email);
                            $insert_IT_pack->bindParam(":ad", $address);
                            $insert_IT_pack->bindParam(":ct", $city);
                            $insert_IT_pack->bindParam(":st", $state);
                            $insert_IT_pack->bindParam(":it", $itLetter);

                            if($insert_IT_pack->execute()){
                                // Instantiation and passing [ICODE]true[/ICODE] enables exceptions
                                    $mail = new PHPMailer(true);
                                    
                                        //Server settings
                                        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                                        $mail->isSMTP();                                            // Set mailer to use SMTP
                                        $mail->Host       = 'jobs360.org';  // Specify main and backup SMTP servers
                                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                        $mail->Username   = 'elite@jobs360.org';                     // SMTP username
                                        $mail->Password   = 'IA*PTzqhSAy(';                               // SMTP password
                                        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
                                        $mail->Port       = 587;                                    // TCP port to connect to
                                    
                                        //Recipients
                                        $mail->setFrom('elite@jobs360.org', 'jobs360');
                                        $mail->addAddress('jobs360elite@gmail.com', 'Jobs360');     // Add a recipient
                                        $mail->addAddress('jobs360elite@gmail.com');               // Name is optional
                                        $mail->addReplyTo('elite@jobs360.org', 'Information');
                                        $mail->AddCC("ayoeljah1997@gmail.com", "cc-recipient-name");
                                        
                                    
                                    
                                        // Content
                                        $mail->isHTML(true);                                  // Set email format to HTML
                                        $mail->Subject = 'I.T Package Registration Notification';
                                        $mail->Body    = $name." ". 'just registered';
                                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                    
                                        $mail->send();
                                
                                echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Wow!',
                                        text: 'Record Submited Succesfully!',
                                        icon: 'success',
                                        type: 'success'
                                    }).then(function() {
                                        window.location = 'index.php';
                                    });
                                    </script>";
                            }else{
                                echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'Record wasnt submited please check records and try again!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
                            }
                    }
                   
                 }
               
            }else{
                   echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'Your File is too Big!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
            }
        }else{
               echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'There was an error uploading ur file!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
           }
  
       }else{
           echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'You cannot upload this file type!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
        }
}

if(isset($_POST['corper_package'])){
    $name = strip_tags($_POST['name']);
    $name = ucwords($name);

    $phoneNumber = strip_tags($_POST['phone_no']);
    
    
    $email = strip_tags($_POST['email']);
    $email = strtolower($email);
    $email = str_replace(' ', '', $email);
    
    $address = strip_tags($_POST['address']);
    $address = ucwords($address);
    
    $cityOfService = strip_tags($_POST['city_of_service']);
    $cityOfService = ucwords($cityOfService);
    
    $stateOfService = strip_tags($_POST['state_of_service']);
    $stateOfService = ucwords($stateOfService);
    
    $jobTitle = strip_tags($_POST['job_title']);
    $jobTitle = ucwords($jobTitle);
    
    $cvReview = $_FILES['cv']['name'];
    $cvReviewTemp = $_FILES['cv']['tmp_name'];
    $cvReviewSize = $_FILES['cv']['size'];
    $cvReviewError = $_FILES['cv']['error'];
    $cvReviewType = $_FILES['cv']['type'];
    
    $cvReviewExt = explode('.', $cvReview);
    $cvReviewActualExt = strtolower(end($cvReviewExt));
    
    
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
        
       if(in_array($cvReviewActualExt, $allowed)){
           if($cvReviewError === 0){
               if($cvReviewSize < 500000){
                    $check_user = $con->prepare("select * from corper_package where phone_no=:pn");
                    $check_user->bindParam(":pn", $phoneNumber);
                    $check_user->setFetchMode(PDO::FETCH_ASSOC);
                    $check_user->execute();
                    $count = $check_user->rowCount();
                    if($count === 1){
                        echo "<script type='text/javascript'>
                                        jQuery(function validation(){
                                        swal({
                                        title: 'Woops!',
                                        text: 'User with this phone number already registered,
                                        icon: 'error',
                                        button: 'OK!',
                                        });
                                        });
                                        </script>
                                ";
                    }else{
                        $check_name = $con->prepare("select * from corper_package where name=:fn");
                        $check_name->bindParam(":fn", $name);
                        $check_name->setFetchMode(PDO::FETCH_ASSOC);
                        $check_name->execute();
                        $count_name = $check_name->rowCount();
                        
                        if($count_name === 1){
                            echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'First and Last name already exist please change lastname!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
                        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'Invaild email!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
                        }else{
                            move_uploaded_file($cvReviewTemp, "images/cvReview/$cvReview");                            
                           
                            $insert_corper_pack = $con->prepare("insert into corper_package(name, phone_no, email, address, city_of_service, state_of_service, job_title, cv_review) values(:na, :ph, :em, :ad, :ct, :st, :jb, :cv)");
                            $insert_corper_pack->bindParam(":na", $name);
                            $insert_corper_pack->bindParam(":ph", $phoneNumber);
                            $insert_corper_pack->bindParam(":em", $email);
                            $insert_corper_pack->bindParam(":ad", $address);
                            $insert_corper_pack->bindParam(":ct", $cityOfService);
                            $insert_corper_pack->bindParam(":st", $stateOfService);
                            $insert_corper_pack->bindParam(":jb", $jobTitle);
                            $insert_corper_pack->bindParam(":cv", $cvReview);

                            if($insert_corper_pack->execute()){
                                // Instantiation and passing [ICODE]true[/ICODE] enables exceptions
                                    $mail = new PHPMailer(true);
                                    
                                        //Server settings
                                        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                                        $mail->isSMTP();                                            // Set mailer to use SMTP
                                        $mail->Host       = 'jobs360.org';  // Specify main and backup SMTP servers
                                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                        $mail->Username   = 'elite@jobs360.org';                     // SMTP username
                                        $mail->Password   = 'IA*PTzqhSAy(';                               // SMTP password
                                        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
                                        $mail->Port       = 587;                                    // TCP port to connect to
                                    
                                        //Recipients
                                        $mail->setFrom('elite@jobs360.org', 'jobs360');
                                        $mail->addAddress('jobs360elite@gmail.com', 'Jobs360');     // Add a recipient
                                        $mail->addAddress('jobs360elite@gmail.com');               // Name is optional
                                        $mail->addReplyTo('elite@jobs360.org', 'Information');
                                        $mail->AddCC("ayoeljah1997@gmail.com", "cc-recipient-name");
                                        
                                    
                                    
                                        // Content
                                        $mail->isHTML(true);                                  // Set email format to HTML
                                        $mail->Subject = 'Corper Registration Notification';
                                        $mail->Body    = $name." ". 'just registered';
                                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                    
                                        $mail->send();
                                
                                echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Wow!',
                                        text: 'Record Submited Succesfully!',
                                        icon: 'success',
                                        type: 'success'
                                    }).then(function() {
                                        window.location = 'index.php';
                                    });
                                    </script>";
                            }else{
                                echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'Record wasnt submited please check records and try again!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
                            }
                    }
                   
                 }
               
            }else{
                   echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'Your File is too Big!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
            }
        }else{
               echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'There was an error uploading ur file!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
           }
  
       }else{
           echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'You cannot upload this file type!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
        }
}


if(isset($_POST['artisan_get'])){
    $name = strip_tags($_POST['name']);
    $name = ucwords($name);

    $phoneNumber = strip_tags($_POST['phone_no']);
    
    
    $email = strip_tags($_POST['email']);
    $email = strtolower($email);
    $email = str_replace(' ', '', $email);
    
    $artisanNeeded = strip_tags($_POST['artisan_needed']);
    $artisanNeeded = ucwords($artisanNeeded);
    
    $timeOfNeed = strip_tags($_POST['time_of_need']);
    $timeOfNeed = ucwords($timeOfNeed);
    
    $address = strip_tags($_POST['address']);
    $address = ucwords($address);
    
    
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'Invaild email!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
        }else{
            $check_user = $con->prepare("select * from artisan_get where phone_no=:pn");
            $check_user->bindParam(":pn", $phoneNumber);
            $check_user->setFetchMode(PDO::FETCH_ASSOC);
            $check_user->execute();
            $count = $check_user->rowCount();
            if($count === 1){
                echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'User with this phone number already registered!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
            }else{
                $insert_artisan_needed = $con->prepare("insert into artisan_get(name, phone_no, email, artisan_needed, time_of_need, address) values(:na, :ph, :em, :an, :tn, :ad)");
                $insert_artisan_needed->bindParam(":na", $name);
                $insert_artisan_needed->bindParam(":ph", $phoneNumber);
                $insert_artisan_needed->bindParam(":em", $email);
                $insert_artisan_needed->bindParam(":an", $artisanNeeded);
                $insert_artisan_needed->bindParam(":tn", $timeOfNeed);
                $insert_artisan_needed->bindParam(":ad", $address);
                
                if($insert_artisan_needed->execute()){
                    // Instantiation and passing [ICODE]true[/ICODE] enables exceptions
                                    $mail = new PHPMailer(true);
                                    
                                        //Server settings
                                        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                                        $mail->isSMTP();                                            // Set mailer to use SMTP
                                        $mail->Host       = 'jobs360.org';  // Specify main and backup SMTP servers
                                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                        $mail->Username   = 'elite@jobs360.org';                     // SMTP username
                                        $mail->Password   = 'IA*PTzqhSAy(';                               // SMTP password
                                        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
                                        $mail->Port       = 587;                                    // TCP port to connect to
                                    
                                        //Recipients
                                        $mail->setFrom('elite@jobs360.org', 'jobs360');
                                        $mail->addAddress('jobs360elite@gmail.com', 'Jobs360');     // Add a recipient
                                        $mail->addAddress('jobs360elite@gmail.com');               // Name is optional
                                        $mail->addReplyTo('elite@jobs360.org', 'Information');
                                        $mail->AddCC("ayoeljah1997@gmail.com", "cc-recipient-name");
                                        
                                    
                                    
                                        // Content
                                        $mail->isHTML(true);                                  // Set email format to HTML
                                        $mail->Subject = 'Request Artisan Registration Notification';
                                        $mail->Body    = $name." ". 'requested for an Artisan(s)';
                                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                    
                                        $mail->send();
                    
                    
                    echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Wow!',
                                        text: 'Record Submited Succesfully!',
                                        icon: 'success',
                                        type: 'success'
                                    }).then(function() {
                                        window.location = 'index.php';
                                    });
                                    </script>";
                }else{
                    echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'Record wasnt submited please check records and try again!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";  
                } 
            }
        
    }
  
}


if(isset($_POST['subscribe_news'])){
    $name = strip_tags($_POST['name']);
    $name = ucwords($name);
    
    $phoneNumber = strip_tags($_POST['phone_no']);
    
    $email = strip_tags($_POST['email']);
    $email = strtolower($email);
    $email = str_replace(' ', '', $email);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'Invaild email!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
        }else{
            $check_user = $con->prepare("select * from news_latter where phone_no=:pn");
            $check_user->bindParam(":pn", $phoneNumber);
            $check_user->setFetchMode(PDO::FETCH_ASSOC);
            $check_user->execute();
            $count = $check_user->rowCount();
            if($count === 1){
                echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'User with this phone number already registered!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
            }else{
                $subscriber = $con->prepare("insert into news_latter(name, phone_no, email) values(:na, :ph, :em)");
                $subscriber->bindParam(":na", $name);
                $subscriber->bindParam(":ph", $phoneNumber);
                $subscriber->bindParam(":em", $email);
        
                
                if($subscriber->execute()){
                    // Instantiation and passing [ICODE]true[/ICODE] enables exceptions
                                    $mail = new PHPMailer(true);
                                    
                                        //Server settings
                                        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                                        $mail->isSMTP();                                            // Set mailer to use SMTP
                                        $mail->Host       = 'jobs360.org';  // Specify main and backup SMTP servers
                                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                        $mail->Username   = 'elite@jobs360.org';                     // SMTP username
                                        $mail->Password   = 'IA*PTzqhSAy(';                               // SMTP password
                                        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
                                        $mail->Port       = 587;                                    // TCP port to connect to
                                    
                                        //Recipients
                                        $mail->setFrom('elite@jobs360.org', 'jobs360');
                                        $mail->addAddress('jobs360elite@gmail.com', 'Jobs360');     // Add a recipient
                                        $mail->addAddress('jobs360elite@gmail.com');               // Name is optional
                                        $mail->addReplyTo('elite@jobs360.org', 'Information');
                                        $mail->AddCC("ayoeljah1997@gmail.com", "cc-recipient-name");
                                        
                                    
                                    
                                        // Content
                                        $mail->isHTML(true);                                  // Set email format to HTML
                                        $mail->Subject = 'News Letter Subscription Notification';
                                        $mail->Body    = $name." ". 'just subscribed';
                                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                    
                                        $mail->send();
                    
                    echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Wow!',
                                        text: 'Record Submited Succesfully!',
                                        icon: 'success',
                                        type: 'success'
                                    }).then(function() {
                                        window.location = 'index.php';
                                    });
                                    </script>";
                }else{
                    echo "<script type='text/javascript'>
                                        swal({
                                        title: 'Woops!',
                                        text: 'Record wasnt submited please check records and try again!',
                                        icon: 'error',
                                        type: 'error'
                                    });
                                    </script>";
                    
                } 
            }
        
    }
  
}










