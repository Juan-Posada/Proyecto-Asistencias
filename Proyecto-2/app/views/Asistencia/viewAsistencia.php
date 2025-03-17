<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/login/init"><img src="/img/back.svg"></a>
        </div>
        <div class="create">
            <a href="/asistencia/new"><button>+</button></a>
        </div>
    </div>
    <div class="info">
        <?php
            if (empty($asistencias)) {
                echo '<br>No se encuentran asistencias en la base de datos';
            } else {
                // Crear la tabla tipo Excel
                echo '<div class="excel-table">';
                
                // Encabezados de la tabla
                echo '<div class="excel-row header-row">
                        <div class="excel-cell">ID</div>
                        <div class="excel-cell">Fecha</div>
                        <div class="excel-cell">Aprendiz</div>
                        <div class="excel-cell">Estado</div>
                        <div class="excel-cell">Acciones</div>
                    </div>';
                
                // Datos de la tabla
                foreach ($asistencias as $asistencia) {
                    // Buscar el nombre del aprendiz correspondiente
                    $aprendizNombre = '';
                    foreach ($aprendices as $aprendiz) {
                        if ($aprendiz->id == $asistencia->id_aprendiz) {
                            $aprendizNombre = $aprendiz->nombre;
                            break;
                        }
                    }
                    
                    echo '<div class="excel-row">
                            <div class="excel-cell">' . $asistencia->id . '</div>
                            <div class="excel-cell">' . $asistencia->fecha . '</div>
                            <div class="excel-cell">' . $aprendizNombre . '</div>
                            <div class="excel-cell">' . $asistencia->estado . '</div>
                            <div class="excel-cell actions">
                                <div class="buttons">
                                    <a href="/asistencia/view/' . $asistencia->id . '"> <button title="Consultar"><i class="fas fa-eye"></i></button> </a>
                                    <a href="/asistencia/edit/' . $asistencia->id . '"> <button title="Editar"><i class="fas fa-edit"></i></button> </a>
                                    <a href="/asistencia/delete/' . $asistencia->id . '"> <button title="Eliminar"><i class="fas fa-trash"></i></button> </a>
                                </div>
                            </div>
                        </div>';
                }
                
                echo '</div>'; // Cierre de excel-table
            }
        ?>
    </div>
</div>