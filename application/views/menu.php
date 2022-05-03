<body>
    <div class="wrapper">
        <div class="sidebar" data-image="<?= base_url("assets/img/sidebar-5.jpg")?>">
 
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                      <img src="<?= base_url("assets/img/logo.png")?>" style="width: 150px; height: 75px">
                    </a>
                </div>
                <ul class="nav">
                    <li>
                        <a class="nav-link active" href="<?= site_url("Home")?>">
                            <i class="nc-icon nc-grid-45"></i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url("Cobranza")?>">
                            <i class="nc-icon nc-money-coins"></i>
                            <p>Cobranza</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?= site_url("Clientes")?>">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Clientes</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?= site_url("Agenda")?>">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <p>Agenda</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?= site_url("Reportes")?>">
                            <i class="nc-icon nc-chart-pie-36"></i>
                            <p>Reportes</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
<!--                     <a class="navbar-brand" href="#pablo"> Siempre preocupandonos por tu comodidad </a>
 -->                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                     <!--    <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;Buscar</span>
                                </a>
                            </li>
                        </ul> -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon">Perfil</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="<?= site_url("Ajustes")?>">&nbsp;Ajustes de cuenta&nbsp;<i class="fa fa-cog" style="color: #E99CC3;"></i></a>
                                    <div class="divider"></div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url("Inicio/close")?>">
                                    <span class="no-icon">Cerrar sesión</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
                
