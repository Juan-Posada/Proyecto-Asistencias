<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/aprendiz/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <form action="/aprendiz/update" method="post">
            <div class="form-group">
                <label for="">ID del Aprendiz:</label>
                <input type="text" readonly value="<?php echo $aprendiz->id ?>" name="txtId" id="txtId" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nombre del Aprendiz:</label>
                <input type="text" value="<?php echo $aprendiz->nombre ?>" name="txtNombre" id="txtNombre" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email del Aprendiz:</label>
                <input type="email" value="<?php echo $aprendiz->email ?>" name="txtEmail" id="txtEmail" class="form-control">
            </div>
            <div class="form-group">
                <label for="">ID de la Ficha:</label>
                <select name="txtIdFicha" id="txtIdFicha" class="form-control" required>
                    <?php foreach ($fichas as $ficha): ?>
                        <option value="<?php echo $ficha->id; ?>" <?php echo $aprendiz->id_ficha == $ficha->id ? 'selected' : ''; ?>><?php echo $ficha->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Editar</button>
            </div>
        </form>
    </div>
</div>