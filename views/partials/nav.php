<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Icons styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Bootstrap style -->
    <link rel="stylesheet" href="views/public/styles/bootstrap.css">
    <link rel="shortcut icon" href="views/public/images/handymanFavicon.png">
    <!-- Styles -->
    <link rel="stylesheet" href="views/public/styles/styles.css">
    <title>Nav</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold border-bottom"><i class="me-2"><img src="views/public/images/handymanFavicon.png" alt=""></i>Handyman</div>
                    <?php 
                        if($_SESSION['rol']=='CLIENTE'):
                    ?>
                        <div class="list-group list-group-flush my-3">
                            <a href="index.php?c=main" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                    class="fas fa-home me-2"></i>Home</a>
                            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                    class="fas fa-tv me-2"></i>Productos</a>
                            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                    class="fas fa-bullhorn me-2"></i>Reportar</a>
                            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                    class="fas fa-project-diagram me-2"></i>Contacto</a>
                            <a href="index.php?c=login&a=cerrar" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                                    class="fas fa-power-off me-2"></i>Logout</a>
                        </div>
                    <?php 
                        elseif($_SESSION['rol']=='TECNICO'):
                    ?>
                        <div class="list-group list-group-flush my-3">
                            <a href="index.php?c=main" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                    class="fas fa-home me-2"></i>Home</a>
                            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                    class="fas fa-bullhorn me-2"></i>Reportes</a>
                            <a href="index.php?c=Tecnico&a=mostrarTrabajos&id=<?php echo $_SESSION['idusuario']; ?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                    class="fas fa-bullhorn me-2"></i>Trabajos</a>
                            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                    class="fas fa-project-diagram me-2"></i>Contacto</a>
                            <a href="index.php?c=login&a=cerrar" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                                    class="fas fa-power-off me-2"></i>Logout</a>
                        </div>
                    <?php 
                        elseif($_SESSION['rol']=='GESTOR'):
                    ?>
                        <div class="list-group list-group-flush my-3">
                                <a href="index.php?c=main" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                        class="fas fa-home me-2"></i>Home</a>
                                <a href="index.php?c=Usuario&a=mostrar" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                        class="fas fa-users me-2"></i>Usuarios</a>
                                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                        class="fas fa-tv me-2"></i>Productos</a>
                                <a href="index.php?c=Parte&a=mostrar" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                        class="fas fa-bullhorn me-2"></i>Reportes</a>
                                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                        class="fas fa-project-diagram me-2"></i>Contacto</a>
                                <a href="index.php?c=login&a=cerrar" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                                        class="fas fa-power-off me-2"></i>Logout</a>
                        </div>
                    <?php 
                        else:
                    ?>
                        <div class="list-group list-group-flush my-3">
                                    <a href="index.php?c=main" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                            class="fas fa-home me-2"></i>Home</a>
                                    <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                            class="fas fa-project-diagram me-2"></i>Contacto</a>
                                    <a href="index.php?c=Login&a=index" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                                            class="fas fa-power-off me-2"></i>Login</a>
                                </div>
                    <?php 
                        endif;
                    ?>
        </div>   
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light primary-bg bg-gradient py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left third-text fs-4 me-3" id="menu-toggle"></i>
                    <i class="me-2"><img src="views/public/images/handymanFavicon.png" alt=""></i>
                    <h2 class="fs-2 m-0 sidebar-heading">Handyman</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php
                            if($_SESSION['log'] == true):
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?php echo $_SESSION['username'] ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                        <?php
                            else:
                        ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user me-2"></i>Login
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Login</a></li>
                                </ul>
                            </li>
                        <?php
                            endif;
                        ?>
                    </ul>
                </div>
            </nav>
        <script src="views/public/scripts/bootstrap.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>