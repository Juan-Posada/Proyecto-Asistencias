<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/ficha/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <?php
            if($ficha && is_object($ficha)){
                echo "
                    <div class='record-one'>
                        <span>ID: $ficha->id</span>
                        <span>Ficha: $ficha->nombre</span>
                        <span>Programa: $programa</span> <!-- Mostrar el nombre del programa -->
                    </div>
                ";      
            }
        ?>
    </div>
</div>