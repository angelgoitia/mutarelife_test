    <!-- ***** Header Start ***** -->
    <header class="navbar navbar-sticky navbar-expand-lg navbar-dark">
        <div class="container position-relative">
            <a class="navbar-brand" href="/">
                <img class="navbar-brand-regular" src="<?=base_url('assets/img/logo.jpg');?>" width="180px" alt="brand-logo">
                <img class="navbar-brand-sticky" src="<?=base_url('assets/img/logo.jpg');?>" width="180px" alt="sticky brand-logo">
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-inner">
                <!--  Mobile Menu Toggler -->
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <nav>
                    <ul class="navbar-nav" id="navbar-nav">
                        <?php if($this->session->userdata('logged_in')): ?>
                        <li class="nav-item">
                            <p class="nav-link" ><?php echo 'Bienvenido '.$this->session->userdata('username');?></p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url();?>logout/">Salir</a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url();?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url();?>login/">Iniciar Sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url();?>register/">Registrarse</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- ***** Header End ***** -->