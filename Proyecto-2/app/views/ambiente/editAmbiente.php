<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/ambiente/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <form action="/ambiente/update" method="post">
            <div class="form-group">
                <label for="">ID del Ambiente:</label>
                <input type="text" readonly value="<?php echo $ambiente->id ?>" name="txtId" id="txtId" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nombre del Ambiente:</label>
                <input type="text" value="<?php echo $ambiente->nombre ?>" name="txtNombre" id="txtNombre" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Tipo del Ambiente:</label>
                <select name="txtTipo" id="txtTipo" class="form-control" required>
                    <option value="aula" <?php echo $ambiente->tipo == 'aula' ? 'selected' : ''; ?>>Aula</option>
                    <option value="taller" <?php echo $ambiente->tipo == 'taller' ? 'selected' : ''; ?>>Taller</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">ID del Programa:</label>
                <select name="txtIdPrograma" id="txtIdPrograma" class="form-control" required>
                    <?php foreach ($programas as $programa): ?>
                        <option value="<?php echo $programa->id; ?>" <?php echo $ambiente->id_programa == $programa->id ? 'selected' : ''; ?>><?php echo $programa->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Editar</button>
            </div>
        </form>
    </div>
</div>