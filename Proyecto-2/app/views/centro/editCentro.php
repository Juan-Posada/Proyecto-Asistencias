<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/centro/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <form action="/centro/update" method="post">
            <div class="form-group">
                <label for="">ID del Centro:</label>
                <input type="text" readonly value="<?php echo $centro->id ?>" name="txtId" id="txtId" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nombre del Centro:</label>
                <input type="text" value="<?php echo $centro->nombre ?>" name="txtNombre" id="txtNombre" class="form-control">
            </div>
            <div class="form-group">
                <label for="">ID de la Regional:</label>
                <select name="txtIdRegional" id="txtIdRegional" class="form-control" required>
                    <?php foreach ($regionales as $regional): ?>
                        <option value="<?php echo $regional->id; ?>" <?php echo $centro->id_regional == $regional->id ? 'selected' : ''; ?>><?php echo $regional->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Editar</button>
            </div>
        </form>
    </div>
</div>