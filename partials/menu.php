<!-- start nav -->
<nav id="menu">
<!-- start menu -->
    <ul>
        <li><a href="<?php echo BASE_URL;  ?>">Home</a></li>
        <li><a href="<?php echo BASE_URL . 'nosotros.php' ?>">Nosotros</a>
        
        </li>
        <li><a href="<?php echo BASE_URL . 'contacto.php' ?>">Contacto</a></li>
        <li><a href="#">Administración</a>
            <!-- start menu desplegable -->
            <ul>
                <li><a href="<?php echo COMUNAS; ?>">Comunas</a></li>
                <li><hr></li>
                <li><a href="<?php echo REGIONES; ?>">Regiones</a></li>               
                <li><hr></li>
                <li><a href="<?php echo ATRIBUTOS; ?>">Atributos</a></li>
                <li><hr></li>
                <li><a href="<?php echo ROLES; ?>">Roles</a></li>
                <li><hr></li>
                <li><a href="<?php echo MARCAS; ?>">Marcas</a></li>
                <li><hr></li>
                <li><a href="<?php echo PERSONAS; ?>">Personas</a></li> 
                <li><hr></li>
                <li><a href="<?php echo PRODUCTOS; ?>">Productos</a></li> 
                <li><hr></li>
                <li><a href="<?php echo PRODUCTOTIPO; ?>">Tipos de Productos</a></li>
                <li><hr></li>
            </ul>
            <!-- end menu desplegable -->
        </li>

        <a href="<?php echo USUARIOS . 'login.php';?>">Login</a>
    </ul>
    <!-- end menu -->
</nav>
<!-- end nav -->