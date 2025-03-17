<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/asistencia/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
    <?php
        if($asistencia && is_object($asistencia)){
            echo "
                <div class='record-one'>
                    <span>ID: $asistencia->id</span>
                    <span>Nombre Aprendiz: $aprendiz</span>
                    <span>Fecha: $asistencia->fecha</span>
                    <span>Estado: $asistencia->estado</span>
                    <span>Ficha: $ficha</span> <!-- Mostrar el nombre de la ficha -->
                </div>
            ";      
        }
    ?>
    </div>
</div>