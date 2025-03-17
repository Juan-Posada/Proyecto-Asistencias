<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/centro/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <?php
            if($centro && is_object($centro)){
                echo "
                    <div class='record-one'>
                        <span>ID: $centro->id</span>
                        <span>Nombre: $centro->nombre</span>
                        <span>Regional: $regional</span> <!-- Mostrar el nombre de la regional -->
                    </div>
                ";      
            }
        ?>
    </div>
</div>