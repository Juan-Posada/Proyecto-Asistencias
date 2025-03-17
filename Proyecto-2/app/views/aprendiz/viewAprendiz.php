<div class="data-container">
    <div class="navegate-group">
        <div class="back">
        <a href="/main"><img src="/img/back.svg"></a>
        </div>
        <div class="create">
            <a href="/aprendiz/new"><button>+</button></a>
        </div>
    </div>
    <div class="info">
    <?php
    if (empty($aprendices)) {
        echo '<br>No se encuentran aprendices en la base de datos';
    } else {
        foreach ($aprendices as $aprendiz) {
            echo
            "<div class='record'>
                <span>ID: $aprendiz->id - Nombre: $aprendiz->nombre</span>
                <div class='buttons'>
                    <a href='/aprendiz/view/$aprendiz->id'> <button>Consultar</button> </a> 
                    <a href='/aprendiz/edit/$aprendiz->id'> <button>Editar</button> </a> 
                    <a href='/aprendiz/delete/$aprendiz->id'> <button>Eliminar</button> </a> 
                </div>
            </div>";
        }
    }
    ?>
    </div>
</div>