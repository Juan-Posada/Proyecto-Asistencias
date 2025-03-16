<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/coordinador/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <form action="/coordinador/update" method="post">
            <div class="form-group">
                <label for="">ID del Coordinador:</label>
                <input type="text" readonly value="<?php echo $coordinador->id ?>" name="txtId" id="txtId" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nombre del Coordinador:</label>
                <input type="text" value="<?php echo $coordinador->nombre ?>" name="txtNombre" id="txtNombre" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit">Editar</button>
            </div>
        </form>
    </div>
</div>