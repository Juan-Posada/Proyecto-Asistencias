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
            foreach ($asistencias as $asistencia) {
                echo
                "<div class='record'>
                <span>ID: $asistencia->id - Fecha: $asistencia->fecha - Aprendiz ID: $asistencia->aprendizId</span>
                <div class='buttons'>
                    <a href='/asistencia/view/$asistencia->id'> <button>Consultar</button> </a> 
                    <a href='/asistencia/edit/$asistencia->id'> <button>Editar</button> </a> 
                    <a href='/asistencia/delete/$asistencia->id'> <button>Eliminar</button> </a> 
                </div>
            </div>";
            }
        }
        ?>
    </div>
</div>