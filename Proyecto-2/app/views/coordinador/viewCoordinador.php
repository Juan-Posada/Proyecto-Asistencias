<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/login/init"><img src="/img/back.svg"></a>
        </div>
        <div class="create">
            <a href="/coordinador/new"><button>+</button></a>
        </div>
    </div>
    <div class="info">
    <?php
    if (empty($coordinadores)) {
        echo '<br>No se encuentran coordinadores en la base de datos';
    } else {
        foreach ($coordinadores as $coordinador) {
            echo
            "<div class='record'>
                <span>ID: $coordinador->id - Nombre: $coordinador->nombre</span>
                <div class='buttons'>
                    <a href='/coordinador/view/$coordinador->id'> <button>Consultar</button> </a> 
                    <a href='/coordinador/edit/$coordinador->id'> <button>Editar</button> </a> 
                    <a href='/coordinador/delete/$coordinador->id'> <button>Eliminar</button> </a> 
                </div>
            </div>";
        }
    }
    ?>
    </div>
</div>