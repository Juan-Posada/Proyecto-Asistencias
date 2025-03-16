<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/programaFormacion/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <form action="/programaFormacion/update" method="post">
            <div class="form-group">
                <label for="">ID del Programa:</label>
                <input type="text" readonly value="<?php echo $programa->id ?>" name="txtId" id="txtId" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Código del Programa:</label>
                <input type="text" value="<?php echo $programa->codigo ?>" name="txtCodigo" id="txtCodigo" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nombre del Programa:</label>
                <input type="text" value="<?php echo $programa->nombre ?>" name="txtNombre" id="txtNombre" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit">Editar</button>
            </div>
        </form>
    </div>
</div>