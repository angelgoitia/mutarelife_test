<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Iniciar Sesión</title>
    <!-- Style css -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/style.css');?>">
    
    <!-- Script js -->
    <script src="<?=base_url('assets/js/library/jquery.min.js');?>"></script>
    <script src="<?=base_url('assets/js/library/parsley.js');?>"></script>
    <script src="<?=base_url('assets/js/i18n/es.js');?>"></script>
    <script src="<?=base_url('assets/js/login.js');?>"></script>

</head>

<body class="homepage-5 accounts">
    <!--====== Scroll To Top Area Start ======-->
    <div id="scrollUp" title="Scroll To Top">
        <i class="fas fa-arrow-up"></i>
    </div>
    <!--====== Scroll To Top Area End ======-->

    <div class="main">

        <!-- ***** Welcome Area Start ***** -->
        <section id="home" class="section welcome-area bg-overlay d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <!-- Welcome Intro Start -->
                    <div class="col-12 col-lg-7">
                        <div class="welcome-intro">
							<h1 class="text-white">Bienvenido al mutarelife!</h1>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-5">
                        <!-- Contact Box -->
                        <div class="contact-box bg-white text-center rounded p-4 p-sm-5 mt-5 mt-lg-0 shadow-lg">
							<?php if (isset($status_error)): ?>
                                <div class="alert alert-danger">
                                    <strong>Error: </strong> <?php echo $message_error; ?>
                                </div>
                            <?php endif; ?>
                            <!-- Contact Form -->
                            <form class="contact-form" id="login-form" method='POST' action="<?=base_url('login/form');?>">
                                <div class="contact-top">
                                    <h3 class="contact-title">Iniciar Sesión</h3>
                                    <h5 class="text-secondary fw-3 py-3">Complete todos los campos para que podamos obtener información sobre usted.</h5>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group form-section">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope-open"></i></span>
                                              </div>
                                              <input type="text" class="form-control" id="usernameEmail" name="usernameEmail" placeholder="Usuario o Correo Electrónico" data-parsley-errors-container="#email-errors" required="required">
                                            </div>
                                        </div>
                                        <div id="email-errors" style="color:red;"></div>
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" data-parsley-required="true" data-parsley-errors-container="#errorPassword" required="required" aria-label="Password" aria-describedby="basic-addon2">
                                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-eye" id="spanEye"></i><i class="fas fa-eye-slash" id="spanEyeSlash"></i></span>
                                            </div>
                                            <div id="errorPassword" style="color:red;"></div>
                                        </div> 
                                    </div>
                                    <div class="col-12">
                                        <button class="submit btn btn-bordered w-100 mt-3 mt-sm-4" type="button">Ingresar</button>
                                        <div class="hide" id="loading">
										    <img class="justify-content-center" src="<?=base_url('assets/img/loading.gif');?>" style="max-width:80px !important;">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="form-message"></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shape Bottom -->
            <div class="shape-bottom">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                    <path class="shape-fill" fill="#FFFFFF" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7  c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4  c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
                </svg>
            </div>
        </section>
        <!-- ***** Welcome Area End ***** -->
    </div>
    <!-- <iframe id="iframe_wordpress" src="<?php echo $urlLogin; ?>" frameborder="0" style="display:none;"></iframe>  -->                         
</body>

</html>