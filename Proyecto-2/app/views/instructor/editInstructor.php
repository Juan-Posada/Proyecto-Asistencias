<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/instructor/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <form action="/instructor/update" method="post">
            <div class="form-group">
                <label for="">ID del Instructor:</label>
                <input type="text" readonly value="<?php echo $instructor->id ?>" name="txtId" id="txtId" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nombre del Instructor:</label>
                <input type="text" value="<?php echo $instructor->nombre ?>" name="txtNombre" id="txtNombre" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit">Editar</button>
            </div>
        </form>
    </div>
</div>