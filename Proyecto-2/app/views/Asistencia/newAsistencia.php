<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/asistencia/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <form action="/asistencia/create" method="post">
            <div class="form-group">
                <label for="">Aprendiz:</label>
                <select name="txtIdAprendiz" id="txtIdAprendiz" class="form-control" required>
                    <?php foreach ($aprendices as $aprendiz): ?>
                        <option value="<?php echo $aprendiz->id; ?>"><?php echo $aprendiz->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Fecha de Asistencia:</label>
                <input type="date" name="txtFecha" id="txtFecha" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Estado de Asistencia:</label>
                <select name="txtEstado" id="txtEstado" class="form-control" required>
                    <option value="presente">Presente</option>
                    <option value="ausente">Ausente</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>