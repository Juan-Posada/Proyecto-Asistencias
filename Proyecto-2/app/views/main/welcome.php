<div class="data-container">
    <div class="navegate-group">
        <h2>Bienvenido a la Página Principal</h2>
    </div>
    <div class="info">
        <div class="container-links">
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
            </ul>
        </div>
    </div>
</div>