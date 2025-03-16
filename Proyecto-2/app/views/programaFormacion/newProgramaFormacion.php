<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/programaFormacion/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <form action="/programaFormacion/create" method="post">
            <div class="form-group">
                <label for="">Código del Programa:</label>
                <input type="text" name="txtCodigo" id="txtCodigo" class="form-control" required>
                
                <label for="">Nombre del Programa:</label>
                <input type="text" name="txtNombre" id="txtNombre" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>