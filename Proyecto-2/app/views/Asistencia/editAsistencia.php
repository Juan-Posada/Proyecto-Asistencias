<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/asistencia/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <form action="/asistencia/update" method="post">
            <div class="form-group">
                <label for="">ID de Asistencia:</label>
                <input type="text" readonly value="<?php echo $asistencia->id ?>" name="txtId" id="txtId" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Fecha de Asistencia:</label>
                <input type="date" value="<?php echo $asistencia->fecha ?>" name="txtFecha" id="txtFecha" class="form-control">
            </div>
            <div class="form-group">
                <label for="">ID del Aprendiz:</label>
                <input type="number" value="<?php echo $asistencia->aprendiz_id ?>" name="txtAprendizId" id="txtAprendizId" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit">Editar</button>
            </div>
        </form>
    </div>
</div>