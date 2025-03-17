<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/main"><img src="/img/back.svg"></a>
        </div>
        <div class="create">
            <a href="/asistencia/new"><button>+</button></a>
        </div>
    </div>
    
    <!-- Controles de filtrado -->
    <div class="filter-container">
        <select id="filtroSelect" onchange="cambiarFiltro()">
            <option value="todos">Todos</option>
            <option value="fecha">Por Fecha</option>
            <option value="aprendiz">Por Aprendiz</option>
            <option value="ficha">Por Ficha</option>
            <option value="estado">Por Estado</option>
        </select>
        
        <div id="filtroFecha" style="display:none;">
            <input type="date" id="fechaInput" onchange="aplicarFiltros()">
        </div>
        
        <div id="filtroAprendiz" style="display:none;">
            <select id="aprendizSelect" onchange="aplicarFiltros()">
                <option value="">Seleccione un aprendiz</option>
                <?php foreach($aprendices as $aprendiz): ?>
                    <option value="<?php echo $aprendiz->id; ?>"><?php echo $aprendiz->nombre; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div id="filtroFicha" style="display:none;">
            <select id="fichaSelect" onchange="aplicarFiltros()">
                <option value="">Seleccione una ficha</option>
                <?php foreach($fichas as $ficha): ?>
                    <option value="<?php echo $ficha->id; ?>"><?php echo $ficha->nombre; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div id="filtroEstado" style="display:none;">
            <select id="estadoSelect" onchange="aplicarFiltros()">
                <option value="">Seleccione un estado</option>
                <option value="presente">Presente</option>
                <option value="ausente">Ausente</option>
                <option value="excusa">Excusa</option>
            </select>
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
                        <div class="excel-cell">Ficha</div>
                        <div class="excel-cell">Acciones</div>
                    </div>';
                
                // Datos de la tabla con atributos data para facilitar el filtrado
                foreach ($asistencias as $asistencia) {
                    // Buscar el nombre del aprendiz correspondiente
                    $aprendizNombre = '';
                    foreach ($aprendices as $aprendiz) {
                        if ($aprendiz->id == $asistencia->id_aprendiz) {
                            $aprendizNombre = $aprendiz->nombre;
                            break;
                        }
                    }

                    // Buscar el nombre de la ficha correspondiente
                    $fichaNombre = '';
                    foreach ($fichas as $ficha) {
                        if ($ficha->id == $asistencia->id_ficha) {
                            $fichaNombre = $ficha->nombre;
                            break;
                        }
                    }
                    
                    echo '<div class="excel-row" data-fecha="' . $asistencia->fecha . '" data-aprendiz="' . $asistencia->id_aprendiz . '" data-estado="' . $asistencia->estado . '" data-ficha="' . $asistencia->id_ficha . '">
                            <div class="excel-cell">' . $asistencia->id . '</div>
                            <div class="excel-cell">' . $asistencia->fecha . '</div>
                            <div class="excel-cell">' . $aprendizNombre . '</div>
                            <div class="excel-cell">
                                <select class="status-select" data-id="' . $asistencia->id . '" onchange="updateStatus(this)">
                                    <option value="presente" ' . ($asistencia->estado == 'presente' ? 'selected' : '') . '>Presente</option>
                                    <option value="ausente" ' . ($asistencia->estado == 'ausente' ? 'selected' : '') . '>Ausente</option>
                                    <option value="excusa" ' . ($asistencia->estado == 'excusa' ? 'selected' : '') . '>Excusa</option>
                                </select>
                            </div>
                            <div class="excel-cell">' . $fichaNombre . '</div>
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

<script>
    // Función para actualizar el estado de asistencia
// Modificar la función updateStatus en viewAsistencia.php


// Función para cambiar el tipo de filtro
function cambiarFiltro() {
    const filtroSeleccionado = document.getElementById('filtroSelect').value;
    
    // Ocultar todos los filtros
    document.getElementById('filtroFecha').style.display = 'none';
    document.getElementById('filtroAprendiz').style.display = 'none';
    document.getElementById('filtroFicha').style.display = 'none';
    document.getElementById('filtroEstado').style.display = 'none';
    
    // Mostrar el filtro seleccionado
    if (filtroSeleccionado === 'fecha') {
        document.getElementById('filtroFecha').style.display = 'inline-block';
    } else if (filtroSeleccionado === 'aprendiz') {
        document.getElementById('filtroAprendiz').style.display = 'inline-block';
    } else if (filtroSeleccionado === 'ficha') {
        document.getElementById('filtroFicha').style.display = 'inline-block';
    } else if (filtroSeleccionado === 'estado') {
        document.getElementById('filtroEstado').style.display = 'inline-block';
    }
    
    // Aplicar filtros
    aplicarFiltros();
}

// Función para aplicar los filtros
function aplicarFiltros() {
    const filtroSeleccionado = document.getElementById('filtroSelect').value;
    const filas = document.querySelectorAll('.excel-row:not(.header-row)');
    
    // Mostrar todas las filas si se selecciona "Todos"
    if (filtroSeleccionado === 'todos') {
        filas.forEach(fila => {
            fila.style.display = '';
        });
        return;
    }
    
    // Filtrar por fecha
    if (filtroSeleccionado === 'fecha') {
        const fechaSeleccionada = document.getElementById('fechaInput').value;
        
        if (fechaSeleccionada) {
            filas.forEach(fila => {
                if (fila.getAttribute('data-fecha') === fechaSeleccionada) {
                    fila.style.display = '';
                } else {
                    fila.style.display = 'none';
                }
            });
        } else {
            // Si no hay fecha seleccionada, mostrar todas
            filas.forEach(fila => {
                fila.style.display = '';
            });
        }
    }
    
    // Filtrar por aprendiz
    if (filtroSeleccionado === 'aprendiz') {
        const aprendizSeleccionado = document.getElementById('aprendizSelect').value;
        
        if (aprendizSeleccionado) {
            filas.forEach(fila => {
                if (fila.getAttribute('data-aprendiz') === aprendizSeleccionado) {
                    fila.style.display = '';
                } else {
                    fila.style.display = 'none';
                }
            });
        } else {
            // Si no hay aprendiz seleccionado, mostrar todas
            filas.forEach(fila => {
                fila.style.display = '';
            });
        }
    }

    // Filtrar por ficha
    if (filtroSeleccionado === 'ficha') {
        const fichaSeleccionada = document.getElementById('fichaSelect').value;
        
        if (fichaSeleccionada) {
            filas.forEach(fila => {
                if (fila.getAttribute('data-ficha') === fichaSeleccionada) {
                    fila.style.display = '';
                } else {
                    fila.style.display = 'none';
                }
            });
        } else {
            // Si no hay ficha seleccionada, mostrar todas
            filas.forEach(fila => {
                fila.style.display = '';
            });
        }
    }
    
    // Filtrar por estado
    if (filtroSeleccionado === 'estado') {
        const estadoSeleccionado = document.getElementById('estadoSelect').value;
        
        if (estadoSeleccionado) {
            filas.forEach(fila => {
                if (fila.getAttribute('data-estado') === estadoSeleccionado) {
                    fila.style.display = '';
                } else {
                    fila.style.display = 'none';
                }
            });
        } else {
            // Si no hay estado seleccionado, mostrar todas
            filas.forEach(fila => {
                fila.style.display = '';
            });
        }
    }
    
    // Mostrar mensaje si no hay resultados
    let hayResultadosVisibles = false;
    filas.forEach(fila => {
        if (fila.style.display !== 'none') {
            hayResultadosVisibles = true;
        }
    });
    
    const infoDiv = document.querySelector('.info');
    const mensajeNoResultados = document.getElementById('sin-resultados');
    
    if (!hayResultadosVisibles) {
        if (!mensajeNoResultados) {
            const mensaje = document.createElement('div');
            mensaje.id = 'sin-resultados';
            mensaje.innerHTML = '<br>No se encuentran asistencias con los filtros seleccionados';
            infoDiv.insertBefore(mensaje, infoDiv.firstChild);
        }
    } else if (mensajeNoResultados) {
        mensajeNoResultados.remove();
    }
}

// Inicializar los filtros
document.addEventListener('DOMContentLoaded', function() {
    // Establecer la fecha actual en el input de fecha
    const hoy = new Date();
    const fechaFormateada = hoy.toISOString().split('T')[0];
    document.getElementById('fechaInput').value = fechaFormateada;
});
</script>