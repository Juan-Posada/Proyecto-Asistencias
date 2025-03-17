<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/ficha/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <form action="/ficha/update" method="post">
            <div class="form-group">
                <label for="">ID de la Ficha:</label>
                <input type="text" readonly value="<?php echo $ficha->id ?>" name="txtId" id="txtId" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Ficha:</label>
                <input type="text" value="<?php echo $ficha->nombre ?>" name="txtNombre" id="txtNombre" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Programa:</label>
                <select name="txtIdPrograma" id="txtIdPrograma" class="form-control" required>
                    <?php foreach ($programas as $programa): ?>
                        <option value="<?php echo $programa->id; ?>" <?php echo $ficha->id_programa == $programa->id ? 'selected' : ''; ?>><?php echo $programa->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Editar</button>
            </div>
        </form>
    </div>
</div>