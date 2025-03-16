<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/asistencia/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <form action="/asistencia/create" method="post">
            <div class="form-group">
                <label for="">Fecha de Asistencia:</label>
                <input type="date" name="txtFecha" id="txtFecha" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">ID del Aprendiz:</label>
                <input type="number" name="txtAprendizId" id="txtAprendizId" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>