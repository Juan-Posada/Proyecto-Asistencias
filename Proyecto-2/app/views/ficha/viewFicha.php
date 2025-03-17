<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/login/init"><img src="/img/back.svg"></a>
        </div>
        <div class="create">
            <a href="/ficha/new"><button>+</button></a>
        </div>
    </div>
    <div class="info">
    <?php
    if (empty($fichas)) {
        echo '<br>No se encuentran fichas en la base de datos';
    } else {
        foreach ($fichas as $ficha) {
            echo
            "<div class='record'>
                <span>ID: $ficha->id - Ficha: $ficha->nombre</span>
                <div class='buttons'>
                    <a href='/ficha/view/$ficha->id'> <button>Consultar</button> </a> 
                    <a href='/ficha/edit/$ficha->id'> <button>Editar</button> </a> 
                    <a href='/ficha/delete/$ficha->id'> <button>Eliminar</button> </a> 
                </div>
            </div>";
        }
    }
    ?>
    </div>
</div>