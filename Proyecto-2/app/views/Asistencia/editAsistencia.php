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
                <label for="">ID del Aprendiz:</label>
                <select name="txtIdAprendiz" id="txtIdAprendiz" class="form-control" required>
                    <?php foreach ($aprendices as $aprendiz): ?>
                        <option value="<?php echo $aprendiz->id; ?>" <?php echo $asistencia->id_aprendiz == $aprendiz->id ? 'selected' : ''; ?>><?php echo $aprendiz->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Fecha de Asistencia:</label>
                <input type="date" value="<?php echo $asistencia->fecha ?>" name="txtFecha" id="txtFecha" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Estado de Asistencia:</label>
                <select name="txtEstado" id="txtEstado" class="form-control" required>
                    <option value="presente" <?php echo $asistencia->estado == 'presente' ? 'selected' : ''; ?>>Presente</option>
                    <option value="ausente" <?php echo $asistencia->estado == 'ausente' ? 'selected' : ''; ?>>Ausente</option>
                    <option value="excusa" <?php echo $asistencia->estado == 'ausente' ? 'selected' : ''; ?>>Excusa</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Ficha:</label>
                <select name="txtIdFicha" id="txtIdFicha" class="form-control" required>
                    <?php foreach ($fichas as $ficha): ?>
                        <option value="<?php echo $ficha->id; ?>" <?php echo $asistencia->id_ficha == $ficha->id ? 'selected' : ''; ?>><?php echo $ficha->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Editar</button>
            </div>
        </form>
    </div>
</div>