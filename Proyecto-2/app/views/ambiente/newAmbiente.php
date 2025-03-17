<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/ambiente/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <form action="/ambiente/create" method="post">
            <div class="form-group">
                <label for="">Nombre del Ambiente:</label>
                <input type="text" name="txtNombre" id="txtNombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Tipo del Ambiente:</label>
                <select name="txtTipo" id="txtTipo" class="form-control" required>
                    <option value="aula">Aula</option>
                    <option value="taller">Taller</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">ID del Programa:</label>
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