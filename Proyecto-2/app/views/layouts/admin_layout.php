<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $title ?> </title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style_admin_layout.css">
    <!-- Añadiendo Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <div class="sidebar-content">
                <div class="logo">
                    <img src="/img/logo-sena.png" alt="logoImg">
                    <span class="logo-text">ASISTENCIAS</span>
                </div>
                <nav class="menu">
                    <ul>
                    <?php if(isset($_SESSION['rol']) && $_SESSION['rol']=='super_admin'): ?>
                        <li><a href="/usuario/view"><i class="fas fa-user-tag"></i><span class="span">Usuarios</span></a></li>
                        <li><a href="/regional/view"><i class="fas fa-map-marker-alt"></i><span class="span">Regionales</span></a></li>
                        <li><a href="/centro/view"><i class="fas fa-building"></i><span class="span">Centros</span></a></li>
                        <li><a href="/ambiente/view"><i class="fas fa-door-open"></i><span class="span">Ambientes</span></a></li>
                        <li><a href="/ficha/view"><i class="fas fa-file-alt"></i><span class="span">Fichas</span></a></li>
                        <li><a href="/programaFormacion/view"><i class="fas fa-graduation-cap"></i><span class="span">Programas</span></a></li>
                        <li><a href="/aprendiz/view"><i class="fas fa-user-graduate"></i><span class="span">Aprendices</span></a></li>
                        <li><a href="/asistencia/view"><i class="fas fa-check-circle"></i><span class="span">Asistencias</span></a></li>
                    <?php endif ?>
                    <?php if(isset($_SESSION['rol']) && $_SESSION['rol']=='coordinador'): ?>
                        <li><a href="/usuario/view"><i class="fas fa-user-tag"></i><span class="span">Usuarios</span></a></li>
                        <li><a href="/ambiente/view"><i class="fas fa-door-open"></i><span class="span">Ambientes</span></a></li>
                        <li><a href="/ficha/view"><i class="fas fa-file-alt"></i><span class="span">Fichas</span></a></li>
                        <li><a href="/programaFormacion/view"><i class="fas fa-graduation-cap"></i><span class="span">Programas</span></a></li>
                        <li><a href="/aprendiz/view"><i class="fas fa-user-graduate"></i><span class="span">Aprendices</span></a></li>
                        <li><a href="/asistencia/view"><i class="fas fa-check-circle"></i><span class="span">Asistencias</span></a></li>
                    <?php endif ?>
                    <?php if(isset($_SESSION['rol']) && $_SESSION['rol']=='instructor'): ?>
                        <li><a href="/aprendiz/view"><i class="fas fa-user-graduate"></i><span class="span">Aprendices</span></a></li>
                        <li><a href="/asistencia/view"><i class="fas fa-check-circle"></i><span class="span">Asistencias</span></a></li>
                    <?php endif ?>
                    <?php if(isset($_SESSION['nombre'])){ ?>
                            <li>
                                <a href="/login/logout">
                                    <i class="fas fa-sign-in-alt"></i>
                                    <span class="span">Cerrar Sesión</span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </aside>
        <main class="main-content">
            <header class="header">
                <div class="header-container">
                    <button class="menu-toggle"><i class="fas fa-bars"></i></button>
                    <h1> <?php echo $title ?> </h1>
                    <div class="header-icons">
                        <a href="#" class="icon-link"><i class="fas fa-user-circle"></i></a>
                        <a href="#" class="icon-link"><i class="fas fa-bell"></i></a>
                        <a href="#" class="icon-link" id="theme-toggle"><i class="fas fa-moon"></i></a>
                    </div>
                </div>
            </header>
            <div class="content">
                <?php include_once $content; ?>
            </div>
        </main>
    </div>

    <!-- Script para cambiar entre tema oscuro y claro -->
    <script>
        document.getElementById('theme-toggle').addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
            const icon = this.querySelector('i');
            if (icon.classList.contains('fa-moon')) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
            }

            
        });
        const menuToggle = document.querySelector('.menu-toggle');
        const sidebar = document.querySelector('.sidebar');
        
        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('sidebar-hidden');
        });
    </script>
</body>

</html>