<?php

//Php class File Receiving the Form Datas for Processing

include_once "../includes/user.class.php";

// Instance of the Class -- Class Object

$instance = new User;

// Check If Form Inputs was Sent and Perform Operation

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['schname'])&& isset($_POST['schaddress']) && isset($_POST['schposition'])) {

        // Store form Values in an Array

        $userarr = array(
            "email" => $_POST['email'],
            "name" => $_POST['name'],
            "phone" => $_POST['phone'],
            "schname" => $_POST['schname'],
            "schaddress" => $_POST['schaddress'],
            "schposition" => $_POST['schposition'],
        );

        // Pass the Array to the register function to process the Data. It is either stored in the Database if a Database has been Created or send to an Email

        // Now Calling Method of the User Object that will process the User Data
        
        $instance->validator($userarr);
}else{
    //$instance->errmsg = "Fill all Fields";
}
    
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
        <link rel="stylesheet" href="WOW-master/css/libs/animate.css">
        <link rel="shortcut icon" href="../Images/logo.png" type="image/x-icon">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
        <title>Register</title>
    </head>

    <body>
        <!-- Nav bar -->
        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg">
            <a class="navbar-brand" href="../"><img src="Images/BiG.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
               </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   About Us
                               </a>
                        <div class="dropdown-menu bg-black" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../about/">Who are we</a>
                            <a class="dropdown-item" href="../about/">Vision / Mission</a>
                            <a class="dropdown-item" href="../about/">Our Scope</a>
                        </div>
                        <li class="nav-item">
                            <a class="nav-link" href="../blog/">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact Us</a>
                        </li>
                </ul>
                <ul class="nav-item mt-4 ml-lg-auto">
                    <span class="line ml-3 none"></span>
                    <a class="text-black" href="https://twitter.com/binary_labs?s=09"><i class="fab fa-twitter"></i></a>
                    <a class="text-black" href="https://instagram.com/binary_labs?igshid=16sl4pz78zadp"><i class="fab fa-instagram"></i></a>
                    <a class="text-black" href="https://web.facebook.com/binarygenerationlabs"><i class="fab fa-facebook-f"></i></a>
                </ul>
        </nav>
        <header class="container-fluid gray pt-2 pt-md-4" id="who">
            <h2 class="py-5 container wow animate__animated animate__flip animate__fast">Register School</h2>
        </header>
        <main class="container py-5">
            <h6 class="wow animate__animated animate__slower animate__fadeInUp">
                Do you want your students/kids to be skilled in technology?
            </h6>
            <h6 class="wow animate__slower animate__animated animate__headShake pt-2">Register your school now!</h6>
                
            <form action="../register/" class="partner-form" method="post">

                <p class="succlass w-50 alert-success"><?php echo $instance->done; ?></p>
                <div class="succlass w-50 alert-danger"><?php echo $instance->errmsg; ?></div>

                <label for="name">NAME</label>
                <input class="form-item" type="text" name="name" id="" required>
                <label for="email">EMAIL</label>
                <input class="form-item" type="email" name="email" id="" required>
                <label for="phone">PHONE NUMBER</label>
                <input class="form-item" type="tel" name="phone" id="" required>
                <label for="school-name">SCHOOL NAME</label>
                <input class="form-item" type="text" name="schname" id="" required>
                <label for="school-address">SCHOOL ADDRESS</label>
                <textarea class="form-item" name="schaddress" id="" cols="20" required rows="3"></textarea>
                <label for="position">POSITION IN SCHOOL</label>
                <input class="form-item" type="text" name="schposition" id="">
                <input class="send" type="submit" value="Register Now">
            </form>
            <section class="container-fluid pt-5 pb-md-5" id="contact">
                <div class="row ml-2 justify-content-around">
                    <div class="col-md-3 d-flex animate__animated animate__flipInX animate__slow animate__delay-2s animate__repeat-2">
                        <i class="fab fa-whatsapp align-self-center"></i>
                        <span class="align-self-center pl-4">
                       <h5>Telephone</h5>
                      <a class="text-dark" href="tel:+2349030113621">+2349030113621</a>
                  </span>
                    </div>
                    <span class="side-line none"></span>
                    <div class="col-md-3 d-flex animate__animated animate__flipInX animate__slow animate__delay-2s animate__repeat-2">
                        <i class="far fa-envelope align-self-center"></i>
                        <span class="align-self-center pl-4">
                        <h5>Email</h5>
                        <a class="text-dark" href="mailto:hi@binarygenerationlabs.com">hi@binarygenerationlabs.com</a>
                    </span>
                    </div>
                    <span class="side-line none"></span>
                    <div class="col-md-3 d-flex animate__animated animate__flipInX animate__slow animate__delay-2s animate__repeat-2">
                        <i class="fas fa-map-marker-alt align-self-center"></i>
                        <span class="align-self-center pl-4">
                           <h5>ADDRESS</h5>
                          <P>Airforce 1, off stateline Futa Southgate, Akure, Ondo State, Nigeria.</P>
                      </span>
                    </div>
                </div>
            </section>
            <div class="py-4">
                <img class="wow animate__slower animate__flipInY" src="../Images/BiG.png" alt="logo">
            </div>
        </main>
        <section class="gray container-fluid mt-2 pt-5">
            <h3 class="text-center">
                Subscribe to our Newsletter

            </h3>
            <div class="under-line centers mb-3"></div>
            <form action="" class="form-container">
                <input type="email" class="form-input" name="" id="" placeholder="ENTER YOUR EMAIL">
                <input class="rect" type="button" value="Subscribe">
            </form>
            <div class="others">
                <ul>
                    <li>How to support</li>
                    <li><a href="https://paystack.com/pay/6dch35ah2n">Donate for outside school clubs</a></li>
                    <li><a href="../become/">Become a Tutor</a></li>
                    <li><a href="../partner/">Partner with us</a></li>
                </ul>
            </div>
        </section>
        <button onclick="topFunction()" id="myBtn" title="Back to top">
                <i class="fas fa-sort-up"></i>
              </button>
        <footer class="container-fluid">
            <div class="row justify-content-around">
                <div class="text-center col-lg-1">
                    <img class="navbar-brand" src="../Images/BiG.png" alt="logo">
                </div>
                <div class="col-lg-7 align-self-center text-center">
                    <p>&COPY; 2020 Binary Generation Labs</p>
                </div>
                <div class="col-sm-4 col-lg-3 align-self-center text-center">
                    <ul class="d-flex justify-content-around ">
                        <li><a href="https://twitter.com/binary_labs?s=09"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://instagram.com/binary_labs?igshid=16sl4pz78zadp"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="https://web.facebook.com/binarygenerationlabs"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href=""><i class="fab fa-whatsapp"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <script src="WOW-master/dist/wow.min.js"></script>
        <script src="JS/app.js"></script>
    </body>

    </html>