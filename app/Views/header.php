<?php
$user_session=session();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Movisdo App</title>
    <link href="<?php echo base_url(); ?>/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/css/styles.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>/js/all.min.js"></script>


    <style>
        .sb-sidenav-dark {
            background: #29323E;
        }

        #layoutSidenav_content {
            background: #E5EAED;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?php echo base_url(); ?>/preguntaTab">Movisdo</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-warning" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/logout">Cerrar sesión</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <div class="sb-sidenav-menu-heading">Menú</div>
                        <?php
                        if ($user_session->tipo_usuario == 1) {
                        ?>
                            <a class="nav-link" href="<?php echo base_url(); ?>/coordinadorTab">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-shield"></i></div>
                                Coordinadores
                            </a>
                            <a class="nav-link" href="<?php echo base_url(); ?>/promotorTab">
                                <div class="sb-nav-link-icon"><i class="fas fa-id-card-alt"></i></div>
                                Promotores
                            </a>
                            <a class="nav-link" href="<?php echo base_url(); ?>/encuestadoTab">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Apoderados &<br>Gestantes
                            </a>
                            <a class="nav-link" href="<?php echo base_url(); ?>/gestanteTab">
                                <div class="sb-nav-link-icon"><i class="fas fa-female"></i></div>
                                Gestaciones &<br>Infantes
                            </a>

                            <a class="nav-link" href="<?php echo base_url(); ?>/visitaGestanteTab">
                                <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                                Visitas
                            </a>
                            <a class="nav-link" href="<?php echo base_url(); ?>/respuestaOfVisitaOfGestanteTab">
                                <div class="sb-nav-link-icon"><i class="fas fa-spell-check"></i></div>
                                Respuestas
                            </a>
                            <a class="nav-link" href="<?php echo base_url(); ?>/preguntaTab">
                                <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                                Formularios
                            </a>
                            <a class="nav-link" href="<?php echo base_url(); ?>/reporteTab">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-download"></i></div>
                                Reportes
                            </a>
                           
                    
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Registrado como:</div>
                    <?php echo $user_session->nombre.' '.$user_session->apPaterno;?>
                </div>

                <?php
                        }
                ?>
            </nav>
        </div>