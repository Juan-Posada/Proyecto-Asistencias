<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/ficha/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <form action="/ficha/create" method="post">
            <div class="form-group">
                <label for="">Ficha:</label>
                <input type="text" name="txtNombre" id="txtNombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Programa:</label>
                <select name="txtIdPrograma" id="txtIdPrograma" class="form-control" required>
                    <?php foreach ($programas as $programa): ?>
                        <option value="<?php echo $programa->id; ?>"><?php echo $programa->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>