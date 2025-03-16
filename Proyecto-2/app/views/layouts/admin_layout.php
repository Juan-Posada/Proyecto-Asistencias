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
                    <img src="/img/logo_gymcpic.png" alt="logoImg">
                    <span class="logo-text">SENA HORARIOS</span>
                </div>
                <nav class="menu">
                    <ul>
                        <li><a href="><i class="fas fa-user-tag"></i><span class="span"></span></a></li>
                        <li><a href=""><i class="fas fa-running"></i><span class="span"></span></a></li>
                        <li><a href=""><i class="fas fa-user"></i><span class="span"></span></a></li>
                    </ul>
                </nav>
            </div>
        </aside>
        <main class="main-content">
            <header class="header">
                <div class="header-container">
                    <button class="menu-toggle"><i class="fas fa-bars"></i></button>
                    <h1> <?php echo $title ?> </h1>
                    <div class="search-container">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Buscar...">
                    </div>
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