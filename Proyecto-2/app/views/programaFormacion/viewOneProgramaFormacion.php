<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/programaFormacion/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <?php
            if($programa && is_object($programa)){
                echo "
                    <div class='record-one'>
                        <span>ID: $programa->id</span>
                        <span>Programa: $programa->nombre</span>
                    </div>
                ";      
            }
        ?>
    </div>
</div>