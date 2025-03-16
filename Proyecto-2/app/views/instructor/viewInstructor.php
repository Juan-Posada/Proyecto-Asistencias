<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/login/init"><img src="/img/back.svg"></a>
        </div>
        <div class="create">
            <a href="/instructor/new"><button>+</button></a>
        </div>
    </div>
    <div class="info">
    <?php
    if (empty($instructores)) {
        echo '<br>No se encuentran instructores en la base de datos';
    } else {
        foreach ($instructores as $instructor) {
            echo
            "<div class='record'>
                <span>ID: $instructor->id - Nombre: $instructor->nombre</span>
                <div class='buttons'>
                    <a href='/instructor/view/$instructor->id'> <button>Consultar</button> </a> 
                    <a href='/instructor/edit/$instructor->id'> <button>Editar</button> </a> 
                    <a href='/instructor/delete/$instructor->id'> <button>Eliminar</button> </a> 
                </div>
            </div>";
        }
    }
    ?>
    </div>
</div>