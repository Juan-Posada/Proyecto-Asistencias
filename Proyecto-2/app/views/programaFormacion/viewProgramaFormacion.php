<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/login/init"><img src="/img/back.svg"></a>
        </div>
        <div class="create">
            <a href="/programaFormacion/new"><button>+</button></a>
        </div>
    </div>
    <div class="info">
    <?php
    if (empty($programas)) {
        echo '<br>No se encuentran programas de formación en la base de datos';
    } else {
        foreach ($programas as $programa) {
            echo
            "<div class='record'>
                <span>ID: $programa->id - Nombre: $programa->nombre</span>
                <div class='buttons'>
                    <a href='/programaFormacion/view/$programa->id'> <button>Consultar</button> </a> 
                    <a href='/programaFormacion/edit/$programa->id'> <button>Editar</button> </a> 
                    <a href='/programaFormacion/delete/$programa->id'> <button>Eliminar</button> </a> 
                </div>
            </div>";
        }
    }
    ?>
    </div>
</div>