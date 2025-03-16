<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/login/init"><img src="/img/back.svg"></a>
        </div>
        <div class="create">
            <a href="/centro/new"><button>+</button></a>
        </div>
    </div>
    <div class="info">
    <?php
    if (empty($centros)) {
        echo '<br>No se encuentran centros en la base de datos';
    } else {
        foreach ($centros as $centro) {
            echo
            "<div class='record'>
                <span>ID: $centro->id - Nombre: $centro->nombre</span>
                <div class='buttons'>
                    <a href='/centro/view/$centro->id'> <button>Consultar</button> </a> 
                    <a href='/centro/edit/$centro->id'> <button>Editar</button> </a> 
                    <a href='/centro/delete/$centro->id'> <button>Eliminar</button> </a> 
                </div>
            </div>";
        }
    }
    ?>
    </div>
</div>