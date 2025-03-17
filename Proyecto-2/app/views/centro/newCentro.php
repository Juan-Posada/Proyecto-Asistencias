<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/centro/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <form action="/centro/create" method="post">
            <div class="form-group">
                <label for="">Nombre del Centro:</label>
                <input type="text" name="txtNombre" id="txtNombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">ID de la Regional:</label>
                <select name="txtIdRegional" id="txtIdRegional" class="form-control" required>
                    <?php foreach ($regionales as $regional): ?>
                        <option value="<?php echo $regional->id; ?>"><?php echo $regional->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>