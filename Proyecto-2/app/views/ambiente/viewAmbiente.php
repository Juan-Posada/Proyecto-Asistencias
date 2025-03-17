<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/main"><img src="/img/back.svg"></a>
        </div>
        <div class="create">
            <a href="/ambiente/new"><button>+</button></a>
        </div>
    </div>
    <div class="info">
    <?php
    if (empty($ambientes)) {
        echo '<br>No se encuentran ambientes en la base de datos';
    } else {
        foreach ($ambientes as $ambiente) {
            echo
            "<div class='record'>
                <span>ID: $ambiente->id - Nombre: $ambiente->nombre</span>
                <div class='buttons'>
                    <a href='/ambiente/view/$ambiente->id'> <button>Consultar</button> </a> 
                    <a href='/ambiente/edit/$ambiente->id'> <button>Editar</button> </a> 
                    <a href='/ambiente/delete/$ambiente->id'> <button>Eliminar</button> </a> 
                </div>
            </div>";
        }
    }
    ?>
    </div>
</div>