<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/ficha/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <form action="/ficha/remove" method="post">
            <div class="form-group">
                <label>Ficha:</label>
                <input type="text" readonly value="<?php echo $ficha->id ?>" name="txtId" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit">Eliminar</button>
            </div>
        </form>
    </div>
</div>