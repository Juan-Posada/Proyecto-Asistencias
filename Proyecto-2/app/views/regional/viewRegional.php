<div class="data-container">
    <div class="navegate-group">
        <div class="back">
        <a href="/main"><img src="/img/back.svg"></a>
        </div>
        <div class="create">
            <a href="/regional/new"><button>+</button></a>
        </div>
    </div>
    <div class="info">
    <?php
    if (empty($regionales)) {
        echo '<br>No se encuentran regionales en la base de datos';
    } else {
        foreach ($regionales as $regional) {
            echo
            "<div class='record'>
                <span>ID: $regional->id - Nombre: $regional->nombre</span>
                <div class='buttons'>
                    <a href='/regional/view/$regional->id'> <button>Consultar</button> </a> 
                    <a href='/regional/edit/$regional->id'> <button>Editar</button> </a> 
                    <a href='/regional/delete/$regional->id'> <button>Eliminar</button> </a> 
                </div>
            </div>";
        }
    }
    ?>
    </div>
</div>