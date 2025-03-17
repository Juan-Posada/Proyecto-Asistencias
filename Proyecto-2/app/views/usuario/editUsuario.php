<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/usuario/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <form action="/usuario/update" method="post">
            <div class="form-group">
                <label for="">ID del Usuario:</label>
                <input type="text" readonly value="<?php echo $usuario->id ?>" name="txtId" id="txtId" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nombre del Usuario:</label>
                <input type="text" value="<?php echo $usuario->nombre ?>" name="txtNombre" id="txtNombre" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email del Usuario:</label>
                <input type="email" value="<?php echo $usuario->email ?>" name="txtEmail" id="txtEmail" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Contraseña:</label>
                <input type="password" value="<?php echo $usuario->password ?>" name="txtPassword" id="txtPassword" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Rol:</label>
                <select name="txtRol" id="txtRol" class="form-control" required>
                    <option value="super_admin" <?php echo $usuario->rol == 'super_admin' ? 'selected' : ''; ?>>Super Admin</option>
                    <option value="coordinador" <?php echo $usuario->rol == 'coordinador' ? 'selected' : ''; ?>>Coordinador</option>
                    <option value="instructor" <?php echo $usuario->rol == 'instructor' ? 'selected' : ''; ?>>Instructor</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">ID del Centro:</label>
                <select name="txtIdCentro" id="txtIdCentro" class="form-control" required>
                    <?php foreach ($centros as $centro): ?>
                        <option value="<?php echo $centro->id; ?>" <?php echo $usuario->id_centro == $centro->id ? 'selected' : ''; ?>><?php echo $centro->nombre; ?></option>
                    <?php endforeach; ?>
                ```php
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Editar</button>
            </div>
        </form>
    </div>
</div>