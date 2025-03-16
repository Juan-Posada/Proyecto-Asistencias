<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/programaFormacion/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <form action="/programaFormacion/remove" method="post">
            <div class="form-group">
                <label>Programa:</label>
                <input type="text" readonly value="<?php echo $programa->nombre ?>" name="txtId" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit">Eliminar</button>
            </div>
        </form>
    </div>
</div>