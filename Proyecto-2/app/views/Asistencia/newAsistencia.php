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
                <select name="txtIdAprendiz" id="txtIdAprendiz" class="form-control" required onchange="updateFichas()">
                    <option value="" data-ficha=""></option>
                    <?php foreach ($aprendices as $aprendiz): ?>
                        <option value="<?php echo $aprendiz->id; ?>" data-ficha="<?php echo $aprendiz->id_ficha; ?>"><?php echo $aprendiz->nombre; ?></option>
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
                    <option value="excusa">Excusa</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Ficha:</label>
                <select name="txtIdFicha" id="txtIdFicha" class="form-control" required>
                    <?php foreach ($fichas as $ficha): ?>
                        <option value="<?php echo $ficha->id; ?>"><?php echo $ficha->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>

<script>
function updateFichas() {
    const aprendizSelect = document.getElementById('txtIdAprendiz');
    const fichaSelect = document.getElementById('txtIdFicha');
    const selectedAprendiz = aprendizSelect.options[aprendizSelect.selectedIndex];
    const fichaId = selectedAprendiz.getAttribute('data-ficha');

    // Reset the ficha select
    for (let i = 0; i < fichaSelect.options.length; i++) {
        fichaSelect.options[i].style.display = 'none'; // Hide all options
    }

    // Show only the related ficha
    for (let i = 0; i < fichaSelect.options.length; i++) {
        if (fichaSelect.options[i].value == fichaId) {
            fichaSelect.options[i].style.display = 'block'; // Show the related ficha
            fichaSelect.value = fichaId; // Set the value to the related ficha
        }
    }
}
</script>