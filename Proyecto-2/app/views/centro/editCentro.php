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
                <button type="submit">Editar</button>
            </div>
        </form>
    </div>
</div>