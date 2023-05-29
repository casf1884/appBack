<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url()?>/dashboard" class="brand-link">
        <img src="<?=media()?>/images/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light"><?=NOMBRE_EMPRESA?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <br>
        <span class="badge bg-primary w-100"><?=$_SESSION['userData']['nombrerol']?></span>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=media()?>/images/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=$_SESSION['userData']['nombres']." ".$_SESSION['userData']['apellidos']?></a>
            </div>
        </div>
        
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php if(!empty($_SESSION['permisos'][1]['r'])): ?>
                <li class="nav-item">
                    <a href="<?=base_url()?>/dashboard" class="nav-link">
                        <i class="nav-icon fa-solid fa-chart-pie"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(!empty($_SESSION['permisos'][2]['r']) || !empty($_SESSION['permisos'][3]['r'])): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Usuarios
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if(!empty($_SESSION['permisos'][2]['r'])): ?>
                        <li class="nav-item">
                            <a href="<?=base_url()?>/roles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(!empty($_SESSION['permisos'][3]['r'])): ?>
                        <li class="nav-item">
                            <a href="<?=base_url()?>/usuarios" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if(!empty($_SESSION['permisos'][4]['r'])): ?>
                <li class="nav-item">
                    <a href="<?=base_url()?>/clientes" class="nav-link">
                        <i class="nav-icon fa-solid fa-people-carry-box"></i>
                        <p>
                            Clientes
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(!empty($_SESSION['permisos'][5]['r']) || !empty($_SESSION['permisos'][6]['r'])): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-store"></i>
                        <p>
                            Tienda
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if(!empty($_SESSION['permisos'][5]['r'])): ?>
                        <li class="nav-item">
                            <a href="<?=base_url()?>/categorias" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categorías</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(!empty($_SESSION['permisos'][6]['r'])): ?>
                        <li class="nav-item">
                            <a href="<?=base_url()?>/productos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Productos</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if(!empty($_SESSION['permisos'][7]['r'])): ?>
                <li class="nav-item">
                    <a href="<?=base_url()?>/pedidos" class="nav-link">
                        <i class="nav-icon fa-solid fa-cart-flatbed"></i>
                        <p>
                            Pedidos
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a href="<?=base_url()?>/logout" class="nav-link">
                        <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                        <p>
                            Cerrar Sesión
                        </p>
                    </a>
                </li>
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>